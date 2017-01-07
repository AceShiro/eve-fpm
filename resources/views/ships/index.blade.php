@extends('layouts.main')

@section('content')

	
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Prices</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">

        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                        Hull Only
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">

                            <thead>
                                <tr>
                                    <th>Icon</th>
                                    <th>Ship</th>
                                    <th>Class</th>
                                    <th>Price</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($ships as $key => $value)
                                    @if($value->available == 'Yes')
                                        @include('includes.item')
                                    @endif        
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                        Cart
                </div>

                <div class="panel-body">
                    <p>

                        <div class="simpleCart_items"></div>

                        <br>

                        You have <span class="simpleCart_quantity"></span> items in your Cart.
                        Cart total: <div class="simpleCart_total"></div>

                        <hr>

                        Warning : The website can actually handle one type of item at the same time in the Cart

                        <hr>

                        <a href="javascript:;" class="simpleCart_checkout"><button type="button" class="btn btn-success btn-md">Command</button></a>
                        <a href="javascript:;" class="simpleCart_empty"><button type="button" class="btn btn-danger btn-md">Clear Cart</button></a>

                    </p>
                </div>
            </div>
        </div>

    </div>

@endsection