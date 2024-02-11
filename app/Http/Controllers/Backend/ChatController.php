<?php

namespace App\Http\Controllers\Backend;

use DB;
use Carbon\Carbon;
use App\Models\ChatMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function sendMessage(Request $request){
        
        $request->validate([
            'msg' => 'required'
        ]);

        $message = 'Something Went Wrong!!';
            
        DB::beginTransaction();
        try {
            ChatMessage::create([
                'sender_id' => Auth::user()->id,
                'receiver_id' => $request->receiver_id,
                'message' => $request->msg,
                'created_at' => Carbon::now()
            ]);
            $message = 'Comment Replied successfully!!';
            DB::commit();
            return response()->json(['message' => $message]);
         
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            $message = $e->getMessage();
            return response()->json(['message' => $message]);
            // something went wrong
        }
    }

    public function getAllUser(){
         $chats = ChatMessage::orderBy('id','desc')
         ->where('sender_id',auth()->id())
         ->orWhere('receiver_id',auth()->id())
         ->get();

         $users = $chats->flatMap(function($chat){
            if($chat->sender_id === auth()->id()){
                return [$chat->sender, $chat->receiver];
            }
            return [$chat->receiver, $chat->sender];
         })->unique();
         return $users;
    } // end of method

    public function getAllUserMessage($userId){
        $user = User::find($userId);

        if($user){
            $message = ChatMessage::where(function($q) use($userId){
                $q->where('sender_id',auth()->id());
                $q->where('receiver_id',$userId);
            })->orWhere(function($q) use($userId){
                $q->where('sender_id',$userId);
                $q->where('receiver_id',auth()->id());
            })->with('user')->get();

            return response()->json([
                'user' => $user,
                'message' =>$message
            ]);
        }else{
            abort(404);
        }
    } // end of method

    public function agentLiveChat(){
        return view('agent.message.live_chat');
    }
}
