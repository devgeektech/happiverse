<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'mstgroup';
    protected $fillable = [
        'groupName',
        'groupDescription',
        'groupAdminId',
        'groupPrivacy',
        'groupImageUrl'


    ];


    public function user()
    {
        return $this->belongsTo(MstUser::class, 'userId', 'userId');
    }
    public function groupPost()
    {
        return $this->hasMany(Post::class, 'groupId', 'groupId');
    }

    public function groupMembers()
    {
        return $this->hasMany(GroupMember::class, 'groupId', 'groupId');
    }

    public function groupInvitations()
    {
        return $this->hasMany(GroupInvites::class, 'groupId', 'groupId');
    }

    public function groupMembersCounts()
    {
        return $this->groupMembers() ?? $this->groupMembers()->count();
    }
}
