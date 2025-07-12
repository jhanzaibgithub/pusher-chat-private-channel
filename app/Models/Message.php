<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    
protected $fillable = [
    'user_id',
    'message',
    // Add other attributes that you want to be mass assignable
];

}
