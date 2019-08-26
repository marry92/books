<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;

class BookController extends Controller {

    public function postDatatables(Request $request) {

        $final = [];
        $final['results'] = [];

        $page = 1;
        if ($request->start >= 1) {
            $page = ($request->start / $request->length) + 1;
        }
        $request->merge(['page' => $page]);


        $builder = Book::query();

        $records_total = clone($builder);

        $builder->withCount('author');

        $builder->orderBy('name');

        $books = $builder->paginate($request->length);

        foreach ($books as $book) {
            $d = [];
            $d['name'] = $book->name;
            $d['release_date'] = $book->release_date ? $book->release_date->format('d.m.Y') : null;
            $d['author'] = $book->author->name;
           

            $final['results'][] = $d;
        }


        $final['recordsTotal'] = $records_total->count();
        $final['draw'] = $request->draw;
        $final['recordsFiltered'] = $books->total();



        return response()->json($final);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('books.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $authors = Author::get(['id', 'first_name', 'last_name']);
        return view('books.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {


        $validator = \Validator::make($request->all(), Book::$validation_rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $book = new Book();
        $book->fill($request->all());
        $book->save();

        return redirect('/books');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
