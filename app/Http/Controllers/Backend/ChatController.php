<?php

namespace App\Http\Controllers\Backend;

use DB;
use Carbon\Carbon;
use App\Models\ChatMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
}
