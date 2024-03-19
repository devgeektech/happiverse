<?php

namespace App\Http\Controllers;

use App\Models\GroupInvites;
use App\Models\GroupMember;
use Illuminate\Http\Request;

class GroupMemberController extends Controller
{
    public function acceptInvitation($groupId, $memberId)
    {
        GroupMember::create(['groupId' => $groupId, 'groupMemberId' => $memberId, 'memberRole' => 'Member', 'memberStatus' => 1]);
        GroupInvites::where('groupId', $groupId)->where('inviterId', $memberId)->delete();
        return redirect()->back();
    }

    public function declineInvitation($groupId, $memberId)
    {
        GroupInvites::where('groupId', $groupId)->where('inviterId', $memberId)->delete();
        return redirect()->back();
    }
    public function memberRemove($groupId, $memberId)
    {
        GroupMember::where('groupId', $groupId)->where('groupMemberId', $memberId)->delete();
        return redirect()->to('/groups/' . $groupId)->withSuccess(__('Group member removed'));
    }
}
