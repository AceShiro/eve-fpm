@extends('layouts.main')



@section('content')

    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    @include('includes.resume')

    <hr>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                        My Contracts
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">

                            <thead>
                                <tr>
                                    <th>Order</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Progress</th>
                                    <th>Issued</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($contracts as $key => $value)

                                    @if($value->user_id == $request->session()->get('user_id'))
                                        @if ($value->status != 'Delivered')
                                            @include('includes.contract')
                                        @endif               
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- /.col-lg-12 -->
    </div>
    
    

    @if($contracts->where('user_id', '=', $request->session()->get('user_id'))->count() == 0)
        <p>You don't have any contract yet. Time to order don't you think ?</p>
    @endif

@endsection