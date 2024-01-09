<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Wishlist;
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
    }
}
