<?php

namespace App\Providers;

use Config;
use App\Models\SmtpSetting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if(Schema::hasTable('smtp_settings')){
            $smtp_setting = SmtpSetting::first();
            if($smtp_setting){
                $data = [
                    'driver' => $smtp_setting->mailer,
                    'host' => $smtp_setting->host,
                    'port' => $smtp_setting->port,
                    'username' => $smtp_setting->user_name,
                    'password' => $smtp_setting->password,
                    'encryption' => $smtp_setting->encryption,
                    'from' => [
                        'address' => $smtp_setting->from_address,
                        'name' => 'Al Mahfuz',
                    ],
                ];
                Config::set('mail',$data);
            }
        }
    }
}
