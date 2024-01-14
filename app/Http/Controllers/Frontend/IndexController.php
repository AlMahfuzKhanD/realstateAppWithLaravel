<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Facility;
use App\Models\Property;
use App\Models\MultiImage;
use Illuminate\Http\Request;
use App\Models\PropertyMessage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function PropertyDetails($id,$slug){
        $userData = '';
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $userData = User::findOrFail($id);
        }
       
        $property = Property::findOrFail($id)->first();
        $amenities = $property->amenities_id;
        $amenities = explode(',',$amenities);
        $property_images = MultiImage::where('property_id',$id)->get();
        $facilities = Facility::where('property_id',$id)->get();
        $type_id = $property->ptype_id;
        $similer_property = Property::where('ptype_id',$type_id)->where('id','!=',$id)->orderBy('id','DESC')->limit(3)->get();
        return view('frontend.property.property_details',compact('property','property_images','amenities','facilities','similer_property','userData'));
    } // end method

    public function PropertyMessage(Request $request){
        $property_id = $request->property_id;
        $agent_id = $request->agent_id;
        
        if(Auth::check()){
            PropertyMessage::insert([
                'user_id' => Auth::user()->id,
                'agent_id' => $agent_id,
                'property_id' => $property_id,
                'msg_name' => $request->msg_name,
                'msg_email' => $request->msg_email,
                'msg_phone' => $request->msg_phone,
                'message' => $request->message,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Message sent!!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Please Login First!!',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
    } //end of PropertyMessage

    public function AgentDetails($id){
        $agent = User::findOrfail($id);
        $property_data = Property::get();
        $property = $property_data->where('agent_id',$id)->all();
        $featured = $property_data->where('agent_id',$id)->where('featured',1)->take(3)->all();
        $rent_count = $property_data->where('property_status','rent')->count();
        $buy_count = $property_data->where('property_status','buy')->count();
        return view('frontend.agent.agent_details',compact('agent','property','featured','rent_count','buy_count'));
    }

    public function RentProperty(){
        $property_data = Property::get();
        $property = $property_data->where('status',1)->where('property_status','rent')->all();
        $rent_count = $property_data->where('property_status','rent')->count();
        $buy_count = $property_data->where('property_status','buy')->count();
        return view('frontend.property.rent_property',compact('property','rent_count','buy_count'));
    }

    public function BuyProperty(){
        $property_data = Property::get();
        
        $property = $property_data->where('status',1)->where('property_status','buy')->all();
        $rent_count = $property_data->where('property_status','rent')->count();
        $buy_count = $property_data->where('property_status','buy')->count();
        return view('frontend.property.buy_property',compact('property','rent_count','buy_count'));
    }

    public function PropertyType($id){
        $property_data = Property::get();
        $property = $property_data->where('status',1)->where('ptype_id',$id)->all();
        $rent_count = $property_data->where('property_status','rent')->count();
        $buy_count = $property_data->where('property_status','buy')->count();
        return view('frontend.property.property_type',compact('property','rent_count','buy_count'));
    }
}
