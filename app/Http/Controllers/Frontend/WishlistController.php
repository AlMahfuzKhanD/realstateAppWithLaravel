<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function AddToWishList(Request $request,$property_id){
        if(Auth::check()){
            $check_wishlist = Wishlist::where('user_id',Auth::user()->id)->where('property_id',$property_id)->first();
            if(!$check_wishlist){
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'property_id' => $property_id
                ]);

                return response()->json(['success'=>'Added to wishlist successfully!!']);
            }else{
                return response()->json(['error'=>'This property already in your wishlist!!']);
            }
        }else{
            return response()->json(['error'=>'Please Login first!!']);
        }
    } // end of method

    public function UserWishList(){
        $user_id = Auth::user()->id;
        $profileData = User::find($user_id);
        return view('frontend.dashboard.wishlist',compact('profileData'));
    } // end of method
}
