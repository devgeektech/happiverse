<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use App\Models\BulletinBoard;
use App\Models\BulletinNotes;
use Illuminate\Support\Facades\Auth;
class BulletinBoardController extends Controller
{
    //
    public function index(Request $req){
     $bulletinBoard = BulletinBoard::all();
    return view('user-web.bulletinBoard.index',compact('bulletinBoard'));
    }
    public function createBulletinBoard(Request $req){
        $loggedIn = Auth::user()->getUserDetail;
     $notes = BulletinBoard::create([
        'businessId'=> $loggedIn->userId,
        'title'=> $req->board_title,
        'body' => $req->board_body,
         ]);
    return redirect()->back();
    }
    public function createBulletinNote(Request $req){
   
        $loggedIn = Auth::user()->getUserDetail;
     $notes = BulletinNotes::create([
         'bullitenId'=> $req->bulletinId,
        'userId'=> $loggedIn->userId,
        'title'=> $req->note_title,
        'body' => $req->note_body,
         ]);
    return redirect()->back();
    }
    
    public function bulletinBoardView(Request $req,$id,$title){
    $bulletinId = $id;
     $bulletinNotes = BulletinNotes::where('bullitenId',$id)->get();
    return view('user-web.bulletinBoard.view',compact('bulletinNotes','bulletinId','title'));
    }
    
    public function deleteBulletinBoard(Request $req, $id){
        
        $bulletinBoard = BulletinBoard::where('bullitenId',$id)->delete();
        
    return redirect()->back();
    }
    
    public function editBullitenNotes(Request $req,$id){
     $bulletinNotes = BulletinNotes::where('bullitenNoteId',$id)->get();
    return view('user-web.bulletinBoard.edit',compact('bulletinNotes'));
    }
    public function editNotes(Request $req,$id){
     $bulletinNotes = BulletinNotes::where('bullitenNoteId',$id)->update($req->except(['_token']));
   
    return redirect()->back();
    }
}