<?php

namespace App\Http\Controllers;

use App\Models\CustomerToAgentTransfer;
use Illuminate\Http\Request;

class CustomerToAgentTransferController extends Controller
{

    public  function index()
    {
        return view('customer.customerAgentTransfer.index');
    }


    public  function create(Request $request)
    {
        $this->validate($request,[
            'mobile'         => 'required',
            'amount'   => 'required',
        ]);

        CustomerToAgentTransfer::newCustomer($request);
        return back()->with('message','Customer To Agent Transfer Successfully');
    }
}
