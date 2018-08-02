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
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br>
                    
                    <table class="table table-responsive">
                        <thead>
                            <tr>
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
                                        <td>{{ $robot->sourceX }},&nbsp;{{ $robot->sourceY }}</td>
                                        <td>{{ $robot->destinationX }},&nbsp;{{ $robot->destinationY }}</td>
                                        <td>{{ $robot->currLocX }},&nbsp;{{ $robot->currLocY }}</td>
                                        <td>
                                            @switch($robot->orientation)
                                                @case(1)
                                                    <code style="font-size: 2em;">&uarr;</code>
                                                    @break
                                            
                                                @case(2)
                                                    <code style="font-size: 2em;">&larr;</code>
                                                    @break

                                                @case(3)
                                                    <code style="font-size: 2em;">&rarr;</code>
                                                    @break

                                                @case(4)
                                                    <code style="font-size: 2em;">&darr;</code>
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
