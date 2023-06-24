@extends('admin.master')


@section('title')
    Manage Agent
@endsection



@section('body')


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title text-center text-danger">All Agent Info</h4>
                    <h4 class="text-center text-success">{{session('message')}}</h4>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead class="text-center">
                        <tr>
                            <th>SO NO</th>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Image</th>
                            <th >Action</th>
                        </tr>
                        </thead>


                        <tbody class="text-center">
                        @foreach($agents as $agent)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$agent->name}}</td>
                                <td>{{$agent->amount}}</td>
                                <td>{{$agent->email}}</td>
                                <td>{{$agent->mobile}}</td>
                                <td>
                                    <img src="{{asset($agent->image)}}" alt="" width="120" height="120">
                                </td>
                                <td class="d-flex ">
                                    <a href="{{route('agent.edit',['id'=>$agent->id])}}" class="btn btn-sm btn-success  mr-1">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form action="{{route('agent.delete',['id'=>$agent->id])}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you to delete this')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->



@endsection
