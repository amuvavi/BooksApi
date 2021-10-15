<?php

namespace Database\Seeders;
use BaoPham\DynamoDb\Facades\DynamoDb;
use Ramsey\Uuid\Uuid;
use App\Models\Book;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $records = [
            [
                'title' => 'The Grapes of Wrath',
                'author_name' => 'John Steinbeck',
                'genre' => 'comic' 
            ],
            [
                'title' => 'Love in the Time of Cholera',
                'author_name' => 'Gabriel Garcia Marquez',
                'genre' => 'romantic' 
            ],
            [
                'title' => 'The Post-American World',
                'author_name' => 'Fareed Zakaria',
                'genre' => 'action' 
            ],
            [
                'title' => 'Leonardo da Vinci',
                'author_name' => 'Walter Isaacson',
                'genre' => 'biography' 
            ],
        ];

        foreach ($records as $record) {
            $record['id'] = Uuid::uuid4()->toString();
            $book = Book::create($record);
            $book->save();
        }
    }
}