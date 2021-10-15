<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Http\Requests\BookRequest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BookResource::collection(Book::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\BookRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request): BookResource
    {
        return new BookResource(Book::create($request->validated()));
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book): BookResource
    {
        return BookResource::make($book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\BookRequest $request
     * @param \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, Book $book): BookResource
    {
        $book->update($request->validated());
        return new BookResource($book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return response()->noContent();
    }
}
