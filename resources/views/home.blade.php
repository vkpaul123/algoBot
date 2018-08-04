@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Dashboard

                    <a href="{{ route('newRobotTraversal') }}" class="btn btn-info pull-right">New Robot Traversal</a>
                </div>

                <div class="panel-body">
                    @if (Session::has('messageFail'))
                        <div class="alert alert-danger">{!! Session::get('messageFail') !!}
                            <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
                        </div>
                    @endif

                    <br>
                    
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Source</th>
                                <th>Destination</th>
                                <th>Current Location</th>
                                <th>Orientation</th>
                                <th>Reached</th>
                                <th>Options</th>
                            </tr>
                        </thead>

                        <tbody>
                            @isset ($robots)
                                @foreach ($robots as $robot)
                                    <tr>
                                        <td>{{ $robot->id }}</td>
                                        <td>{{ $robot->sourceX }},&nbsp;{{ $robot->sourceY }}</td>
                                        <td>{{ $robot->destinationX }},&nbsp;{{ $robot->destinationY }}</td>
                                        <td>{{ $robot->currLocX }},&nbsp;{{ $robot->currLocY }}</td>
                                        <td>
                                            @switch($robot->orientation)
                                                @case(1)
                                                    <code><i class="fa fa-arrow-up"></i></code>
                                                    @break
                                            
                                                @case(2)
                                                    <code><i class="fa fa-arrow-right"></i></code>
                                                    @break

                                                @case(3)
                                                    <code><i class="fa fa-arrow-down"></i></code>
                                                    @break

                                                @case(4)
                                                    <code><i class="fa fa-arrow-left"></i></code>
                                                    @break
                                            @endswitch

                                        </td>
                                        <td>
                                            @if ($robot->reached == 0)
                                                <span class="text-danger"><strong>NO</strong></span>
                                            @else
                                                <span class="text-success"><strong>YES</strong></span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('pathInputForm', $robot->id) }}" class="btn btn-primary">Set Up Path</a> | <a href="" class="btn btn-warning">View Traversal</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5">No Records</td>
                                </tr>
                            @endisset
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
