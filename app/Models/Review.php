<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'user_name',
        'comment',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
