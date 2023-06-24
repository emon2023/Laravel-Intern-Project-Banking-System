<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;
use Session;


class AgentAuthController extends Controller
{
    private $agent;

    public function index()
    {
        return view('agent.login.index');
    }

    public function login(Request $request)
    {
        $this->agent = Agent::where('email',$request->email)->first();
        if($this->agent)
        {
            if(password_verify($request->password,$this->agent->password))
            {
                Session::put('agent_id',$this->agent->id);
                Session::put('agent_name',$this->agent->name);
                return redirect('/agent/dashboard');
            }
            else
            {
                return back()->with('message','Sorry...password is wrong');
            }
        }
        else
        {
            return back()->with('message','Sorry...email address is wrong');
        }
    }

    public function dashboard()
    {
        return view('agent.dashboard.index');
    }

    public function logout()
    {
        Session::forget('agent_id');
        Session::forget('agent_name');
        return redirect('/agent/login');
    }
}
