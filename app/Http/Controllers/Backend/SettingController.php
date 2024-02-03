<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SmtpSetting;
use Illuminate\Http\Request;
use DB;

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
}
