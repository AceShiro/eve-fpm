@extends('layouts.backend')



@section('content')
	
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Prices Lists</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <hr/>
    
    <div class="row">
        <div class="col-lg-12">
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
                                    <th>Faction</th>
                                    <th>Price</th>
                                    <th>Available</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($ships as $key => $value)
                                	<tr>
										<td>
											<img src="{{ $value->icon }}" alt="Main Logo" style="width: 60px; height: 60px; border-radius: 3px; -webkit-box-shadow: 0px 3px 8px 0px rgba(0,0,0,0.2); margin-bottom: 20px;">
										</td>
										<td>{{ $value->name }}</td>
										<td>{{ $value->category }}</td>
										<td>{{ $value->faction }}</td>
										<td>{{ number_format($value->price, 2, ',', ' ') }} ISK</td>
										<td>{{ $value->available }}</td>
										<td>
											{{ Form::open(array('url' => 'ships/' . $value->id . '/edit', 'class' => 'pull-right')) }}
									            {{ csrf_field() }}
									            {{ Form::hidden('_method', 'GET') }}
									            {{ Form::submit('Edit Item', array('class' => 'btn btn-default')) }}
									        {{ Form::close() }}
										</td>
                                	</tr>
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