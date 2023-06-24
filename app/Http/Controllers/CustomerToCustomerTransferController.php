<?php

namespace App\Http\Controllers;

use App\Models\CustomerToCustomerTransferModel;
use Illuminate\Http\Request;

class CustomerToCustomerTransferController extends Controller
{


    public  function index()
    {
        return view('customer.customerTransfer.index');
    }


    public  function create(Request $request)
    {
        $this->validate($request,[
            'mobile'         => 'required',
            'amount'   => 'required',
        ]);

        CustomerToCustomerTransferModel::newCustomer($request);
        return back()->with('message','Customer To Customer Transfer Successfully');
    }
}
