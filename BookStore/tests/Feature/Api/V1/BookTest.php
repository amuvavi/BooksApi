<?php

namespace Tests\Feature\Api\V1;

use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookTest extends TestCase
{
    use RefreshDatabase;

    public function testBookIndex()
    {
        Book::factory()->count(2)->create();

        $this->json('GET', '/api/v1/books')
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                        'id',
                        'title',
                        'author_name',
                        'genre', 
                  ],
                
            ]);
    }

   
    public function testBookShow()
    {
        $book = Book::factory()->create([
            'title' => 'The Empire Strikes Back',
            'author_name' => 'Star',
            'genre' => 'comic'
        ]);
        Book::factory()->count(2)->create();

        $this->json('GET', "/api/v1/books/{$book->id}")
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'title',
                    'author_name',
                    'genre', 
                ],
            ])
            ->assertJson([
                'data' => [
                    'id' => $book->id,
                    'title' => 'The Empire Strikes Back',
                    'author_name' => 'Star',
                    'genre' => 'comic',
                  
                ],
            ]);
    }

}