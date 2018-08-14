@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>View Robot Traversal</strong>

                    <a href="{{ route('home') }}" class="btn btn-info pull-right">Back</a>
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
        $('#' + $('#destination').val()).css('background-color', 'aqua');

        var src_orient = $('#orientation_robot').val();

        if(src_orient == '1')
            $('#' + $('#currLoc').val()).css('background-color', 'blue').html('<center><code><i class="fa fa-arrow-up"></code></center>');
        else if(src_orient == '4')
            $('#' + $('#currLoc').val()).css('background-color', 'blue').html('<center><code><i class="fa fa-arrow-left"></code></center>');
        else if(src_orient == '2')
            $('#' + $('#currLoc').val()).css('background-color', 'blue').html('<center><code><i class="fa fa-arrow-right"></code></center>');
        else if(src_orient == '3')
            $('#' + $('#currLoc').val()).css('background-color', 'blue').html('<center><code><i class="fa fa-arrow-down"></code></center>');
    });
</script>

@endsection
