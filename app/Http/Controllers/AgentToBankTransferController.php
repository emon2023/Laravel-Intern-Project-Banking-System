<?php

namespace App\Http\Controllers;

use App\Models\AgentToBankTransfer;
use Illuminate\Http\Request;

class AgentToBankTransferController extends Controller
{
    public  function index()
    {
        return view('agent.agentTransfer.index');
    }


    public  function create(Request $request)
    {
        $this->validate($request,[
            'mobile'         => 'required',
            'amount'   => 'required',
        ]);

        AgentToBankTransfer::newAgent($request);
        return back()->with('message','Customer To Agent Transfer Successfully');
    }
}
