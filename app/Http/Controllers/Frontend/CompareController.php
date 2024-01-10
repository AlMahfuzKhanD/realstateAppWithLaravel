<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Compare;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CompareController extends Controller
{
    public function AddToCompare(Request $request,$property_id){
        if(Auth::check()){
            $check_compare = Compare::where('user_id',Auth::user()->id)->where('property_id',$property_id)->first();
            if(!$check_compare){
                Compare::insert([
                    'user_id' => Auth::id(),
                    'property_id' => $property_id
                ]);

                return response()->json(['success'=>'Added to Compare successfully!!']);
            }else{
                return response()->json(['error'=>'This property already in your Compare!!']);
            }
        }else{
            return response()->json(['error'=>'Please Login first!!']);
        }
    } // end of method
}
