<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attendance extends Model
{
    use HasFactory;

     protected $fillable = [
        'user_id', 
        'class_id', 
        'status',   
        'date',     
        'time_in',  
        'time_out'  
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function class()
    {
        return $this->belongsTo(ClassModel::class); 
    }
}
