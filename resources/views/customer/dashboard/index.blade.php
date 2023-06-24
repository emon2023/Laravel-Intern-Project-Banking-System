@extends('customer.master')


@section('title')
    Home Index
@endsection



@section('body')



    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Customer Dashboard</h4>

            </div>
        </div>
    </div>




    <div class="row">
        <div class="col-xl-4">
            <div class="card overflow-hidden">
                <div class="bg-soft-primary">
                    <div class="row">
                        <div class="col-7">
                            <div class="text-primary p-3">
                                <h5 class=" text-center">Amount</h5>
                            </div>
                        </div>
                        <div class="col-5 align-self-end">
                            {{--                            <img src="{{asset('/')}}admin/assets/images/profile-img.png" alt="" class="img-fluid">--}}
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title  text-center">10000 TK</h4>
                        <div class="row">

                        </div>
                    </div>

                </div>
                <!-- end row -->



@endsection
