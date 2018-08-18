@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>View Robot Traversal</strong>
                    
                    <div class="pull-right">
                        <strong id="robotOnlineStatus">
                            {{-- Load Online Status Here --}}
                        </strong> &nbsp; &nbsp;
                        <a href="{{ route('home') }}" class="btn btn-info">Back</a>
                    </div>
                </div>

                <div class="panel-body">
                    @if (Session::has('messageFail'))
                    <div class="alert alert-danger">{!! Session::get('messageFail') !!}
                        <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
                    </div>
                    <br>
                    @endif

                    @include('layouts.robotGrid')

                    <div class="col-md-3 col-md-offset-1">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="panel panel-warning">
                                    <div class="panel-heading">
                                        Controls
                                    </div>

                                    <div class="panel-body">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <a href="" class="btn btn-lg btn-block btn-success"><strong><i class="fa fa-play"></i>&nbsp; Start</strong></a>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <a href="" class="btn btn-block btn-warning"><strong><i class="fa fa-pause"></i>&nbsp; Pause</strong></a>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <a href="" class="btn btn-block btn-danger"><strong><i class="fa fa-stop"></i>&nbsp; Abort</strong></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hidden">
                        <input type="hidden" id="source" name="source" value="node-{{ $robot->sourceX }}-{{ $robot->sourceY }}">
                        <input type="hidden" id="destination" name="destination" value="node-{{ $robot->destinationX }}-{{ $robot->destinationY }}">
                        <input type="hidden" id="currLoc" name="currLoc" value="node-{{ $robot->currLocX }}-{{ $robot->currLocY }}">
                        <input type="hidden" id="orientation_robot" name="orientation_robot" value="{{ $robot->orientation }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('pageScripts')

<script>
    $(document).ready(function() {
        $('#' + $('#source').val()).css('background-color', 'blue');
        $('#' + $('#destination').val()).css('background-color', 'aqua');

        paintRobot();

        updateAjaxRobotTraversal();
    });

    function paintRobot(traversalArray) {
        var src_orient = $('#orientation_robot').val();

        if(src_orient == '1')
            $('#' + $('#currLoc').val()).html('<center><code><i class="fa fa-arrow-up"></code></center>');
        else if(src_orient == '4')
            $('#' + $('#currLoc').val()).html('<center><code><i class="fa fa-arrow-left"></code></center>');
        else if(src_orient == '2')
            $('#' + $('#currLoc').val()).html('<center><code><i class="fa fa-arrow-right"></code></center>');
        else if(src_orient == '3')
            $('#' + $('#currLoc').val()).html('<center><code><i class="fa fa-arrow-down"></code></center>');

        // alert(traversalArray);
        removePreviousLocation(traversalArray);
    }

    function removePreviousLocation(traversalArray) {
        var src_orient = $('#orientation_robot').val();

        var src = $('#source').val();
        var destin = $('#destination').val();
        var currLoc = $('#currLoc').val();

        // alert(traversalArray);

        if(src != currLoc && traversalArray!=null) {
            if(traversalArray['command'] == 'F') {
                if(traversalArray['nodeType'] == 'node') {
                    switch(traversalArray['orientation']) {
                        case 1:
                            $('#sub_node-' + (traversalArray['currLocX']).toString() + '-' + ((traversalArray['currLocY'] - 0.5).toString()).replace('.5', '_5')).html('');
                            break;

                        case 2:
                            $('#sub_node-' + ((traversalArray['currLocX'] - 0.5).toString()).replace('.5', '_5') + '-' + (traversalArray['currLocY']).toString()).html('');
                            break;

                        case 3:
                            $('#sub_node-' + (traversalArray['currLocX']).toString() + '-' + ((traversalArray['currLocY'] + 0.5).toString()).replace('.5', '_5')).html('');
                            break;

                        case 4:
                            $('#sub_node-' + ((traversalArray['currLocX'] + 0.5).toString()).replace('.5', '_5') + '-' + (traversalArray['currLocY']).toString()).html('');
                    } 
                } else if(traversalArray['nodeType'] == 'sub-node') {
                    switch(traversalArray['orientation']) {
                        case 1:
                            $('#node-' + (traversalArray['currLocX']).toString() + '-' + ((traversalArray['currLocY'] - 0.5).toString()).replace('.5', '_5')).html('');
                            break;

                        case 2:
                            $('#node-' + ((traversalArray['currLocX'] - 0.5).toString()).replace('.5', '_5') + '-' + (traversalArray['currLocY']).toString()).html('');
                            break;

                        case 3:
                            $('#node-' + (traversalArray['currLocX']).toString() + '-' + ((traversalArray['currLocY'] + 0.5).toString()).replace('.5', '_5')).html('');
                            break;

                        case 4:
                            $('#node-' + ((traversalArray['currLocX'] + 0.5).toString()).replace('.5', '_5') + '-' + (traversalArray['currLocY']).toString()).html('');
                    }
                }
            }
        }
        
        if(currLoc == destin) {
        console.log('hi');
            $('#gridPanel').removeClass('panel-info').addClass('panel-primary');
            $('#reachedResult').html('<strong>&nbsp; <i>Reached Destination!</i></strong>');
            $('#' + destin).css('background-color', 'aqua');
        }
    }

    function updateAjaxRobotTraversal() {

        $.ajax({
            url: '{{ route('loadTraversalThrough', $robot->id) }}',
            type: 'GET',
            dataType: 'json',
            data: {},
        })
        .done(function(data) {
            console.log("success");
            console.log(data);

            if(data['isOnline'])
                $('#robotOnlineStatus').html('<span class="text-success"><i class="fa fa-user"></i> ONLINE</span>');
            else
                $('#robotOnlineStatus').html('<span class="text-muted"><i class="fa fa-user-times"></i> OFFLINE</span>');


            var traversalArray = data['traversal'];

            for (var i=0; i<traversalArray.length; i++) {
                var nodeAddrStr = traversalArray[i]['currLocX'].toString() + '-' + traversalArray[i]['currLocY'].toString();

                $('#orientation_robot').val(traversalArray[i]['orientation']);

                if (traversalArray[i]['nodeType'] == 'node')
                    var nodeStr = 'node-' + nodeAddrStr;
                else if (traversalArray[i]['nodeType'] == 'sub-node')
                    var nodeStr = 'sub_node-' + nodeAddrStr.replace('.5', '_5');

                $('#' + nodeStr).css('background-color', 'lightblue');
                $('#currLoc').val(nodeStr);

                paintRobot(traversalArray[i]);
            }
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });

        setTimeout(updateAjaxRobotTraversal, 1000);
    }
    
</script>

@endsection
