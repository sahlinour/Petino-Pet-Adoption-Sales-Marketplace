<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pet;
use App\Models\User;


class Listing extends Model
{
    use HasFactory;
    protected $fillable = [
        'pet_id',
        'title',
        'description',
        'price',
        'type',
        'status',
        'location',
        'published_at',
        'expires_at',
    ];
    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
}
