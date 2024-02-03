<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SmtpSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function SmptSetting(){
        $smtpData = SmtpSetting::find(1);
        return view('backend.setting.update_smptp_setting',compact('smtpData'));
    }
}
