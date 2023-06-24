<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    private $agent, $agents;

    public  function index()
    {
        return view('admin.agent.index');
    }

    public  function create(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'amount' => 'required',
            'email' => 'required',
            'password' => 'required',
            'mobile' => 'required',
            'image' => 'required|image',
        ]);

        Agent::newAgent($request);
        return back()->with('message','Create Agent Info Successfully');
    }


    public  function manage()
    {
        $this->agents = Agent::all();
        return view('admin.agent.manage',['agents'=>$this->agents]);
    }

    public  function edit($id)
    {
        $this->agent = Agent::find($id);
        return view('admin.agent.edit',['agent'=>$this->agent]);
    }

    public  function update(Request $request,$id)
    {
        Agent::updatedAgent($request, $id);
        return redirect('/agent/manage')->with('message','Update Agent Info Successfully');
    }

    public  function delete($id)
    {
        Agent::deleteAgent($id);
        return back()->with('message','Delete Agent Info Successfully');
    }
}
