<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller {
    
    
    public function getShowData()
    {
        $authors = Author::orderBy('last_name')->orderBy('first_name')->with('books')->get();
        return view('authors.show_data', compact('authors'));
    }
    
    
    public function postDatatables(Request $request)
    {
        
        $final = [];
        $final['results'] = [];

        $page = 1;
        if ($request->start >= 1) {
            $page = ($request->start / $request->length) + 1;
        }
        $request->merge(['page' => $page]);


        $builder = Author::query();

        $records_total = clone($builder);

        $builder->withCount('books');


        $authors = $builder->paginate($request->length); 

        foreach($authors as $author)
        {
            $d = [];
            $d['name'] = $author->name;
            $d['age'] = $author->age;
            $d['address'] = $author->address;
            $d['books'] = $author->books_count;
            $d['actions'] = "<a href='/books/create?author_id=" . $author->id . "' class='btn btn-primary btn-sm' role='button'>Add book</a>";
            
            $final['results'][] = $d;
        }


        $final['recordsTotal'] = $records_total->count();
        $final['draw'] = $request->draw;
        $final['recordsFiltered'] = $authors->total();



        return response()->json($final);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        return view('authors.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
    
        
        $validator = \Validator::make($request->all(), Author::$validation_rules);
        
        if($validator->fails())
        {
           return back()->withErrors($validator)->withInput();
        }

        $author = new Author();
        $author->fill($request->all());
        $author->save();
        
        return redirect('/authors');
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
