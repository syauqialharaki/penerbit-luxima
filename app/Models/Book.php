<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\BookImage;
use App\Models\purchase;

class Book extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'books';

    protected $fillable = [
        'title',
        'category_id',
        'description',
        'author',
        'publisher',
        'isbn',
        'year',
        'stock',
        'price'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function purchase()
    {
        return $this->hasMany(purchase::class);
    }


    public function images()
    {
        return $this->hasMany(BookImage::class);
    }
}
