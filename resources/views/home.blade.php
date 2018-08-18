@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    All Robots
                </div>

                <div class="panel-body">
                    @if (Session::has('messageFail'))
                    <div class="alert alert-danger">{!! Session::get('messageFail') !!}
                        <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
                    </div>
                    @endif

                    <br>
                    <center>
                        <div class="table-responsive no-padding">
                            <table class="table" id="robots">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Source</th>
                                        <th>Destination</th>
                                        <th>Current Location</th>
                                        <th>Orientation</th>
                                        <th>Path Set</th>
                                        <th>Started</th>
                                        <th>Reached</th>
                                        <th>Traversal</th>
                                        <th>Online</th>
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
                                            @if ($robot->pathSet == 0)
                                                <span class="text-danger"><strong><i class="fa fa-times"></i></strong></span>
                                            @else
                                                <span class="text-success"><strong><i class="fa fa-check"></i></strong></span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($robot->started == 0)
                                                <span class="text-danger"><strong><i class="fa fa-times"></i></strong></span>
                                            @else
                                                <span class="text-success"><strong><i class="fa fa-check"></i></strong></span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($robot->reached == 0)
                                                <span class="text-danger"><strong><i class="fa fa-times"></i></strong></span>
                                            @else
                                                <span class="text-success"><strong><i class="fa fa-check"></i></strong></span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($robot->allowMove == 0)
                                                <strong class="text-danger"><i class="fa fa-stop"></i></strong>
                                            @elseif ($robot->allowMove == 1)
                                                <strong class="text-success"><i class="fa fa-play"></i></strong>
                                            @else
                                                <strong class="text-warning"><i class="fa fa-pause"></i></strong>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($robot->isOnline())
                                                <span class="text-success"><strong><i class="fa fa-user"></i></strong></span>
                                            @else
                                                <span class="text-muted"><strong><i class="fa fa-user-times"></i></strong></span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($robot->started == 0)
                                                <a href="{{ route('pathInputForm', $robot->id) }}" class="btn btn-info btn-xs"><strong><i class="fa fa-map-marker"></i> &nbsp; Set Up Path</strong></a> |
                                            @endif
                                            
                                            <a href="{{ route('viewRobotTraversal', $robot->id) }}" class="btn btn-warning btn-xs"><strong><i class="fa fa-eye"></i> &nbsp; View Traversal</strong></a>
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
                    </center>
                    
                    
                </div>
                <div class="panel-footer">
                    <div class="container-fluid">
                        <div class="row">
                            <a href="{{ route('newRobotTraversal') }}" class="btn btn-primary pull-right btn-lg"><strong><i class="fa fa-user-plus"></i>&nbsp; New Robot Traversal</strong></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('pageScripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/js/jquery.dataTables.min.js" integrity="sha256-qcV1wr+bn4NoBtxYqghmy1WIBvxeoe8vQlCowLG+cng=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/js/dataTables.bootstrap.min.js" integrity="sha256-X/58s5WblGMAw9SpDtqnV8dLRNCawsyGwNqnZD0Je/s=" crossorigin="anonymous"></script>

<script>
    $(function() {
        $('#robots').DataTable({
            'paging' : true,
            'lengthChange' : true,
            'searching' : false,
            'ordering' : false,
            'info' : true,
            'autoWidth' : true
        })
    })
</script>

@endsection