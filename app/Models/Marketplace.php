<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Marketplace extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'marketplaces';

    protected $fillable = [
        'name',
        'image_url'
    ];

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
