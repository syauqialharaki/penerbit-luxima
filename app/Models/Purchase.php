<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Purchase extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'book_id',
        'marketplaces_id',
        'link_url',
        'order'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function marketplace()
    {
        return $this->belongsTo(Marketplace::class);
    }
}
