@extends('layouts.backend')


@section('content')
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Rights Granting</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>


    
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                        Authorized Producers
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">

                            <thead>
                                <tr>
                                    <th>Character Name</th>
                                    <th>Character ID</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($producers as $key => $value)
                                    <tr>
                                        <td>{{ $value->character_name }}</td>
                                        <td>{{ $value->character_id }}</td>
                                        <td>
                                            {{ Form::open(array('url' => 'producers/' . $value->id)) }}
                                                {{ csrf_field() }}
                                                {{ Form::hidden('_method', 'DELETE') }}
                                                {{ Form::submit('Delete', array('class' => 'btn btn-danger btn-sm')) }}
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


        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                        New Producer
                </div>

                <div class="panel-body">
                    <div>
                        {!! Form::open(['route' => 'producers.store']) !!}
                            {{ csrf_field() }}
                            <div class="form-group">
                                {{ Form::label('character_name', 'Character Name*') }}
                                {{ Form::text('character_name', null, array('class' => 'form-control')) }}
                                <p class="help-block">Example: Shiro Artemia</p>

                                {{ Form::label('character_id', 'Character ID*') }}
                                {{ Form::text('character_id', null, array('class' => 'form-control')) }}
                                <p class="help-block">Example: 93224768</p>

                                <br>
                                {{ Form::submit('Submit', array('class' => 'btn btn-success btn-lg btn-block')) }}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            
        </div>
        <!-- /.col-lg-6 -->
    </div>

@endsection