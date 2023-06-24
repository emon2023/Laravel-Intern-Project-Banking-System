@extends('admin.master')


@section('title')
    Edit Customer
@endsection



@section('body')


    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <h3 class="mb-4 text-center text-success display-6">Edit Customer Form</h3>
                <h4 class="text-center text-success">{{session('message')}}</h4>
                <form action="{{route('customer.update',['id'=>$customer->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">First name</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control" id="horizontal-firstname-input" value="{{$customer->name}}">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-amount-input" class="col-sm-3 col-form-label">Amount</label>
                        <div class="col-sm-9">
                            <input type="text" name="amount" class="form-control" id="horizontal-firstname-input" value="{{$customer->amount}}">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" name="email" class="form-control" id="horizontal-email-input" value="{{$customer->email}}">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-password-input" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" name="password" class="form-control" id="horizontal-password-input">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-sm-3 col-form-label">Mobile Number</label>
                        <div class="col-sm-9">
                            <input type="number" name="mobile" class="form-control" value="{{$customer->mobile}}" />
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-sm-3 col-form-label">Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="image" class="form-control" />
                            <img src="{{asset($customer->image)}}" alt="" width="120" height="120">
                        </div>
                    </div>


                    <div class="form-group row justify-content-end">
                        <div class="col-sm-9">

                            <div>
                                <button type="submit" class="btn btn-primary w-md">Update Customer Info</button>
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

