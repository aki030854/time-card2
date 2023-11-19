<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Casser extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'breakstart','breakend' ];

     public function user()
    {
        $this->belongsTo(User::class);
    }
}
