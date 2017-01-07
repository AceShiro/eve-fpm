@extends('layouts.backend')


@section('content')
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Contract #{{ $contract->id }}</h1>
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
                	<div class="row">
                		<div class="col-lg-4">
                			<img src="{{ $contract->avatar }}" style="border-radius: 3px; -webkit-box-shadow: 0px 3px 8px 0px rgba(0,0,0,0.2);">
                		</div>

                		<div class="col-lg-4">
                			<h5><strong>Character Name</strong></h5>
                			<p>{{ $contract->character_name }}</p>
                			<hr>
                			<h5><strong>Commanded Item</strong></h5>
                			<p>{{ $contract->item }}</p>
                		</div>

                		<div class="col-lg-4">
                			<h5><strong>Quantity</strong></h5>
                			<p>{{ $contract->quantity }}</p>
                			<hr>
                			<h5><strong>Actual Status</strong></h5>
                			<p>{{ $contract->status }}</p>
                		</div>
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
                    {!! Form::open(['url' => 'contracts/' . $contract->id]) !!}
                        {{ csrf_field() }}
                        <div class="form-group">
	                        {{ Form::hidden('_method', 'PUT') }}

	                        {{ Form::label('status', 'Status:') }}
	                        {{ Form::select('status', ['Waiting' => 'Waiting', 'On Going' => 'On Going', 'Ready' => 'Ready', 'Delivered' => 'Delivered'], $contract->status, array('class' => 'form-control')) }}
	                        <hr>
	                        {{ Form::submit('Submit', array('class' => 'btn btn-success btn-lg btn-block')) }}
	                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>

@endsection