<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class AgentController extends Controller
{
    public function AgentDashboard(){
        return view('agent.agent_dashboard');
    } // End of AdminDashboard

    public function AgentLogin(){
        return view('agent.agent_login');
    } // End of AgentLogin

    public function AgentRegister(Request $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => 'agent',
            'status' => 'inactive',
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::AGENT);
    } // End of AgentLogin
}
