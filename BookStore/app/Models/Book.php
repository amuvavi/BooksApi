<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Book extends \BaoPham\DynamoDb\DynamoDbModel
{
    use HasFactory;

    protected $fillable = [
      'title',
      'author_name',
      'genre',
      
    ];

    public static function booted()
    {
        static::creating(function ($model){
         $model->id = Uuid::uuid4()->toString();
      
        });
    }
}

