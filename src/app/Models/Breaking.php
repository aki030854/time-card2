<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breaking extends Model
{
    use HasFactory;
     protected $fillable = ['work_id', 'start_time','end_time' ];

     public function work()
    {
        $this->belongsTo(Work::class);
    }
}
