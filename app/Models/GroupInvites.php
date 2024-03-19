<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupInvites extends Model
{
    use HasFactory;
    protected $table = 'trngroupinvitation';

    public function user()
    {
        return $this->belongsTo(MstUser::class, 'userId', 'userId');
    }
}
