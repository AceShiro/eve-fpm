@extends('layouts.backend')

@section('content')

	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit {{ $ship->name }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>


    
    <div class="row">

        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                        Resume
                </div>

                <div class="panel-body">
                	<div class="table-responsive">
		                        <table class="table table-striped table-hover">

		                            <thead>
		                                <tr>
		                                    <th>Icon</th>
		                                    <th>Ship</th>
		                                    <th>Class</th>
		                                    <th>Faction</th>
		                                    <th>Price</th>
		                                    <th>Available</th>
		                                </tr>
		                            </thead>

		                            <tbody>
		                                <tr>
											<td>
												<img src="{{ $ship->icon }}" alt="Main Logo" style="width: 60px; height: 60px; border-radius: 3px; -webkit-box-shadow: 0px 3px 8px 0px rgba(0,0,0,0.2); margin-bottom: 20px;">
											</td>
											<td>{{ $ship->name }}</td>
											<td>{{ $ship->category }}</td>
											<td>{{ $ship->faction }}</td>
											<td>{{ number_format($ship->price, 2, ',', ' ') }} ISK</td>
											<td>{{ $ship->available }}</td>
		                                </tr>
		                            </tbody>
		                        </table>
		                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                        Edit
                </div>

                <div class="panel-body">
                    {!! Form::open(['url' => 'ships/' . $ship->id]) !!}
                        {{ csrf_field() }}
                        <div class="form-group">
	                        {{ Form::hidden('_method', 'PUT') }}

	                        {{ Form::label('price', 'Price*') }}
	                        {{ Form::text('price', $ship->price, array('class' => 'form-control')) }}

	                        <br>

	                        {{ Form::label('available', 'Available*') }}
	                        {{ Form::select('available', ['Yes' => 'Yes', 'No' => 'No'], $ship->available, array('class' => 'form-control')) }}
	                        <hr>
	                        {{ Form::submit('Submit', array('class' => 'btn btn-success btn-lg btn-block')) }}
	                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>


@endsection