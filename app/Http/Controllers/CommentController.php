<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function res_com_page(){
        $comments = Comment::orderBy("created_at", "desc")->get();
        $patients = User::all()->keyBy("id");
        return view('financial_panel.resComments', ['comments'=>$comments, 'patients' => $patients]);
    }

    public function res_com($id){
        $comment = Comment::find($id);
        return view('financial_panel.commentSingle', ['comment'=>$comment, 'id'=>$id]);
        dd($comment);
    }
    
    public function responder(Request $request, $id){
        $comment = Comment::find($id);

        $data = $request->validate([
            'answer' => 'required|string'
        ]);

        Answer::create([
            'comment_id' => $comment['id'],
            'answer' => $data['answer']
        ]);

        $comment->update(['status'=>'respondido']);

        return redirect()->route('comentarios');
    }

    public function comment(Request $request){
        $data = $request->validate([
            'comment' => 'required|string'
        ]);

        $comment = Comment::create([
            'comment' => $data['comment'],
            'patient_id' => auth()->user()->id,
            'status'  => 'aguardando'
        ]);

        return redirect()->back();
    }
}
