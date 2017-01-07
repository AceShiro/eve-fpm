@extends('layouts.backend')



@section('content')
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Back-End Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>


    @include('includes.resume')

    <hr/>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                        All Contracts
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Issuer</th>
                                    <th>Order</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Progress</th>
                                    <th>Issued</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($contracts as $key => $value)
                                    @if ($value->status != 'Delivered')
                                        @include('backend.contract')
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

@endsection