<?php

namespace App\Http\Controllers\Agent;

use DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Facility;
use App\Models\Property;
use App\Models\Amenities;
use App\Models\MultiImage;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class AgentPropertyController extends Controller
{
    public function AllAgentProperty(){
        $user_id = Auth::user()->id;
        $property = Property::where('agent_id',$user_id)->latest()->get();
        return view('agent.property.all_property',compact('property'));
    } // end of AllAgentProperty
}
