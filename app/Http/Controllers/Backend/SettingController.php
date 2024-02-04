<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use App\Models\SmtpSetting;
use Illuminate\Http\Request;
use DB;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class SettingController extends Controller
{
    public function SmptSetting(){
        $smtpData = SmtpSetting::find(1);
        return view('backend.setting.update_smptp_setting',compact('smtpData'));
    }

    public function UpdateSmptSetting(Request $request){
        $smtp_id = $request->id;

        DB::beginTransaction();
        try {

            SmtpSetting::findOrFail($smtp_id)->update([
                'mailer' => $request->mailer,
                'host' => $request->host,
                'port' => $request->port,
                'user_name' => $request->user_name,
                'password' => $request->password,
                'encryption' => $request->encryption,
                'from_address' => $request->from_address
            ]);
            
            $notification = array(
                'message' => 'Updated successfully!!',
                'alert-type' => 'success'
            );
            DB::commit();
            return redirect()->back()->with($notification);

        } catch (\Exception $e) {

            DB::rollback();
            $message = $e->getMessage();
            $notification = array(
                'message' => $message,
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function SiteSetting(){
        $data = SiteSetting::find(1);
        return view('backend.setting.update_site_setting',compact('data'));
    }

    public function UpdateSiteSetting(Request $request){

        $settings_id = $request->id;
        $notification = array(
            'message' => 'Something Went Wrong!!',
            'alert-type' => 'warning'
        );

        DB::beginTransaction();
        try {

            if($request->file('logo')){

                $selected_image = $request->file('logo');
                $manager = new ImageManager(new Driver());
                $name_gen = hexdec(uniqid()).'.'.$selected_image->getClientOriginalExtension();
                $img = $manager->read($selected_image);
                $img = $img->resize(1500,386);
                $img->toJpeg(80)->save(base_path('public/upload/logo/'.$name_gen));
                $save_url = 'upload/logo/'.$name_gen;

                SiteSetting::findOrFail($settings_id)->update([
                    'support_phone' => $request->support_phone,
                    'company_address' => $request->company_address,
                    'email' => $request->email,
                    'twitter' => $request->twitter,
                    'copyright' => $request->copyright,
                    'facebook' => $request->facebook,
                    'logo' => $save_url
                ]);
            }else{
                SiteSetting::findOrFail($settings_id)->update([
                    'support_phone' => $request->support_phone,
                    'company_address' => $request->company_address,
                    'email' => $request->email,
                    'twitter' => $request->twitter,
                    'copyright' => $request->copyright,
                    'facebook' => $request->facebook
                ]);
            }

            $notification = array(
                'message' => 'State Settings Updated successfully!!',
                'alert-type' => 'success'
            );
            DB::commit();
            return redirect()->back()->with($notification);

        } catch (\Exception $e) {

            DB::rollback();
            $message = $e->getMessage();
            $notification = array(
                'message' => $message,
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
