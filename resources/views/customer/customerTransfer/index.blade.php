@extends('customer.master')

@section('title')

    Customer To Customer Transfer

@endsection



@section('body')

    <div class="col">
        <div class="card">
            <div class="card-body">
                <h3 class="mb-4 text-center text-success display-6">Customer To Customer Transfer</h3>
                <h4 class="text-center text-success">{{session('message')}}</h4>
                <form action="{{route('customerTransfer.create')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row mb-4">
                        <label for="horizontal-mobile-input" class="col-sm-3 col-form-label">Mobile Number</label>
                        <div class="col-sm-9">
                            <input type="text" name="mobile" class="form-control" id="horizontal-firstname-input">
                            <span class="text-danger">{{$errors->has('mobile') ? $errors->first('mobile'):''}}</span>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="horizontal-amount-input" class="col-sm-3 col-form-label">Amount</label>
                        <div class="col-sm-9">
                            <input type="text" name="amount" class="form-control" id="horizontal-firstname-input">
                            <span class="text-danger">{{$errors->has('amount') ? $errors->first('amount'):''}}</span>
                        </div>
                    </div>

                    <div class="form-group row justify-content-end">
                        <div class="col-sm-9">

                            <div>
                                <button type="submit" class="btn btn-primary w-md">Send Money</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- end row -->

@endsection
