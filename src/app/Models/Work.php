<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;
    protected $fillable = ['id','user_id', 'work_date','punchin' ,'punchout'];
    
    public function user()
    {
        $this->belongsTo(User::class);
    }
}
