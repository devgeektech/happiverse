<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupMember extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'trngroupmember';
    protected $fillable = [
        'groupMemberId',
        'groupId',
        'memberRole',
        'memberStatus','addedById'


    ];
    public function group()
    {
        return $this->belongsTo(Group::class, 'groupId', 'groupId');
    }

    public function user()
    {
        return $this->hasOne(MstUser::class,  'userId', 'groupMemberId',);
    }
}
