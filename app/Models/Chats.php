<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chats extends Model
{
    use HasFactory;
    protected $table = 'chats_table';
    public $timestamps = false;
    protected $fillable = [
        'id',
         'sender_id',
        'sender_name',
        'message',
        'receiverId',
        'image'

    ];

}