<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private $customer, $customers;

    public  function index()
    {
        return view('admin.customer.index');
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

        Customer::newCustomer($request);
        return back()->with('message','Create Customer Info Successfully');
    }


    public  function manage()
    {
        $this->customers = Customer::all();
        return view('admin.customer.manage',['customers'=>$this->customers]);
    }

    public  function edit($id)
    {
        $this->customer = Customer::find($id);
        return view('admin.customer.edit',['customer'=>$this->customer]);
    }

    public  function update(Request $request,$id)
    {
        Customer::updatedCustomer($request, $id);
        return redirect('/customer/manage')->with('message','Update Customer Info Successfully');
    }

    public  function delete($id)
    {
        Customer::deleteCustomer($id);
        return back()->with('message','Delete Customer Info Successfully');
    }
}
