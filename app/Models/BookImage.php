<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookImage extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'image_url',
        'book_id',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
