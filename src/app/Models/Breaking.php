<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breaking extends Model
{
    use HasFactory;
     protected $fillable = ['id','work_id', 'start_time','end_time' ];

     public function work()
    {
        return $this->belongsTo(Work::class);
    }
}
