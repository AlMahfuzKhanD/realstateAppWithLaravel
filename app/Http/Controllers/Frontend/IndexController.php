<?php

namespace App\Http\Controllers\Frontend;

use DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\State;
use App\Models\Facility;
use App\Models\Property;
use App\Models\Schedule;
use App\Models\MultiImage;
use App\Models\PropertyType;
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
            $userData = User::findOrFail($user_id);
        }
       
        $property = Property::where('id',$id)->first(); 
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
        $states = State::latest()->get();
        $p_type = PropertyType::latest()->get();
        $property_data = Property::get();
        $property = Property::where('status',1)->where('property_status','rent')->paginate(2);
        $rent_count = $property_data->where('property_status','rent')->count();
        $buy_count = $property_data->where('property_status','buy')->count();
        return view('frontend.property.rent_property',compact('property','rent_count','buy_count','states','p_type'));
    }

    public function BuyProperty(){
        $states = State::latest()->get();
        $p_type = PropertyType::latest()->get();
        $property_data = Property::get();
        
        $property = $property_data->where('status',1)->where('property_status','buy')->all();
        $rent_count = $property_data->where('property_status','rent')->count();
        $buy_count = $property_data->where('property_status','buy')->count();
        return view('frontend.property.buy_property',compact('property','rent_count','buy_count','states','p_type'));
    }

    public function PropertyType($id){
        $property_data = Property::get();
        $property = $property_data->where('status',1)->where('ptype_id',$id)->all();
        $rent_count = $property_data->where('property_status','rent')->count();
        $buy_count = $property_data->where('property_status','buy')->count();
        return view('frontend.property.property_type',compact('property','rent_count','buy_count'));
    }

    public function StateDetails($id){
        $property = Property::where('status',1)->where('state',$id)->get();
        $state_data = State::where('id',$id)->first();
        return view('frontend.property.state_property',compact('property','state_data'));
    }

    public function BuyPropertySearch(Request $request){
        $request->validate(['search' => 'required']);
        $item = $request->search;
        $sstate = $request->state;
        $stype = $request->ptype_id;

        $property = Property::where('property_name','like','%' . $item . '%')
        ->where('property_status','buy')
        ->with('type','pstate')
        ->whereHas('pstate', function($q) use($sstate){
            $q->where('state_name','like','%' . $sstate . '%');
        })
        ->whereHas('type', function($q) use($stype){
            $q->where('type_name','like','%' . $stype . '%');
        })->get();

        return view('frontend.property.property_search',compact('property'));
    }

    public function RentPropertySearch(Request $request){
        $request->validate(['search' => 'required']);
        $item = $request->search;
        $sstate = $request->state;
        $stype = $request->ptype_id;

        $property = Property::where('property_name','like','%' . $item . '%')
        ->where('property_status','rent')
        ->with('type','pstate')
        ->whereHas('pstate', function($q) use($sstate){
            $q->where('state_name','like','%' . $sstate . '%');
        })
        ->whereHas('type', function($q) use($stype){
            $q->where('type_name','like','%' . $stype . '%');
        })->get();

        return view('frontend.property.property_search',compact('property'));
    }

    public function AllPropertySearch(Request $request){

        $property_status = $request->property_status;
        $bedrooms = $request->bedrooms;
        $bathrooms = $request->bathrooms;
        $sstate = $request->state;
        $stype = $request->ptype_id;

        $property = Property::where('status',1)
        ->where('bedrooms',$bedrooms)
        ->where('bathrooms',$bathrooms)
        ->where('property_status',$property_status)
        ->with('type','pstate')
        ->whereHas('pstate', function($q) use($sstate){
            $q->where('state_name','like','%' . $sstate . '%');
        })
        ->whereHas('type', function($q) use($stype){
            $q->where('type_name','like','%' . $stype . '%');
        })->get();

        return view('frontend.property.property_search',compact('property'));
    }

    public function StoreSchedule(Request $request){

        $agent_id = $request->agent_id;
        $property_id = $request->property_id;

        $notification = array(
            'message' => 'Something Went Wrong!!',
            'alert-type' => 'warning'
        );

        DB::beginTransaction();

        try {

            if(Auth::check()){
                Schedule::insert([
                    'user_id' => Auth::user()->id,
                    'property_id' => $property_id,
                    'agent_id' => $agent_id,
                    'tour_date' => $request->tour_date,
                    'tour_time' => $request->tour_time,
                    'message' => $request->message,
                    'created_at' => Carbon::now()
                ]);

                $notification = array(
                'message' => 'Tour Scheduled successfully!!',
                'alert-type' => 'success'
            ); 
            }else{
                $notification = array(
                    'message' => 'Login First!!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
           
            DB::commit();
            return redirect()->back()->with($notification);

            // all good
        } catch (\Exception $e) {
            
            DB::rollback();
            $message = $e->getMessage();
            $notification = array(
                'message' => $message,
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
            // something went wrong
        }
    }
}
