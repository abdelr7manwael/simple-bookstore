<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
class BookController extends Controller
{
    //

    function list(){

        $books = Book::get();
        //dd($books);
        return view('books',[
            'Books'=>$books,
        ]);
    }

    function show($id){
        $book = Book::where('id','=',$id)->first();
        return view('show',[
            'book' => $book
        ]);
    }

    function create(){
        $cat =Category::get();
        return view('create',['cat'=>$cat]);
    }

    function store(Request $request){

        $validator = \Validator::make($request->all(),[
            'name' => 'required|max:100|min:3',
            'desc' => 'required|max:100|min:3',
            'img' => 'required|image|mimes:png,jpg,jpeg,gif,svg|max:4048'

        ]);

        if($validator->fails()){
            return redirect('books/create')
            ->withErrors($validator)
            ->withInput();
        }

        //image
        $image = $request->file('img');
        $name = time() . '_' . \Str::random(30) . '.' . $image->getClientOriginalExtension();
        $destinationpath = public_path('images');
        $image->move($destinationpath, $name);

        //store at DB
        $book = new Book();
        $book->name = $request->name;
        $book->desc = $request->desc;
        $book->image = $name;
        $book->save();
        $book->categories()->attach($request->categories);
        return redirect('books/create');


    }

    function edit($id){

        $book = BOOK::find($id);
        return view('edit',[

            'book'=>$book,
        ]);

    }

    function update($id, Request $request){

        $validator = \Validator::make($request->all(),[
            'name' => 'required|max:100|min:3',
            'desc' => 'required|max:100|min:3',
            'img' => 'image|mimes:png,jpg,jpeg,gif,svg|max:4048'

        ]);

        if($validator->fails()){
            return redirect('books/edit')
            ->withErrors($validator)
            ->withInput();
        }


        $book= Book::find($id);
        $book->name = $request->name;
        $book->desc = $request->desc;
        if($request->hasfile('img')){

            $image = $request->file('img');
            $name = time() . '_' . \Str::random(30) . '.' . $image->getClientOriginalExtension();
            $destinationpath = public_path('images');
            $image->move($destinationpath, $name);

            if(isset($book->image)){

                unlink('images/'.$book->image);
            }
            $book->image = $name;
        }
        $book->save();

        return redirect('books/show/'.$id);

    }

    function delete($id){


        $book = Book::find($id);
        if(isset($book->image)){

            unlink('images/'.$book->image);
        }
        $book->delete();

        return redirect('books/list');
    }


}
