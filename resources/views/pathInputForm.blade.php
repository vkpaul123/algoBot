@extends('layouts.app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					New Traversal Form
					
					<div class="pull-right">
						<a href="" class="btn btn-danger btn-xs"><strong><i class="fa fa-undo"></i></strong></a> &nbsp; | &nbsp; 
						<a href="{{ route('home') }}" class="btn btn-info btn-xs"><strong><i class="fa fa-angle-left"></i> &nbsp; Back</a></strong>
					</div>
				</div>

				<div class="panel-body">
					@if ($errors->any())
					    <div class="alert alert-danger alert-dismissible">
					    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif

					<form action="{{ route('pathInputForm-store') }}" class="form-horizontal" method="post">
						{{ csrf_field() }}

						<div class="form-group{{ $errors->has('robot_id') ? ' has-error' : '' }}">
							<label for="robot_id" class="col-md-4 control-label">Robot ID</label>

							<div class="col-md-6">
								<input id="robot_id" type="robot_id" class="form-control" name="robot_id" value="{{ $robot->id }}" required>

								@if ($errors->has('robot_id'))
								<span class="help-block">
									<strong>{{ $errors->first('robot_id') }}</strong>
								</span>
								@endif
							</div>
						</div>
						
						<input type="hidden" id="pathStreamSend" name="pathStreamSend" value="">

						<div class="form-group{{ $errors->has('pathStream') ? ' has-error' : '' }}">
							<label for="pathStream" class="col-md-4 control-label">Path Stream</label>

							<div class="col-md-6">
								<input id="pathStream" type="pathStream" class="form-control" name="pathStream" value="{{ old('pathStream') }}" required autofocus disabled>
								
								@if ($errors->has('pathStream'))
								<span class="help-block">
									<strong>{{ $errors->first('pathStream') }}</strong>
								</span>
								@endif
							</div>
						</div>
						<hr>
						
						{{-- load grid View --}}
						@include('layouts.robotGrid')

						<div class="col-md-4">
							<table class="table-responsive">
								<tr>
									<td></td>
									<td>
										<a href="" id="btnMoveRobot" class="btn btn-primary btn-block" onclick="moveRobot(1);"><code style="font-size: 2em;">&uarr;</code></a>
									</td>
									<td></td>
								</tr>
								<tr>
									<td>
										<a href="" id="btnRotateRobot" class="btn btn-primary btn-block" onclick="moveRobot(3);"><code style="font-size: 2em;">&larr;</code></a>
									</td>
									<td></td>
									<td>
										<a href="" id="btnRotateRobot" class="btn btn-primary btn-block" onclick="moveRobot(2);"><code style="font-size: 2em;">&rarr;</code></a>
									</td>
								</tr>
							</table>
							<br><br>
						</div>

						<input type="hidden" id="source" name="source" value="node-{{ $robot->sourceX }}-{{ $robot->sourceY }}">
						<input type="hidden" id="destination" name="destination" value="node-{{ $robot->destinationX }}-{{ $robot->destinationY }}">
						<input type="hidden" id="currLoc" name="currLoc" value="node-{{ $robot->currLocX }}-{{ $robot->currLocY }}">
						<input type="hidden" id="orientation_robot" name="orientation_robot" value="{{ $robot->orientation }}">

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<input type="submit" class="btn btn-success btn-block">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('pageScripts')

<script>
	var gridSizeX = 8, gridSizeY = 8;
	var srcX = parseInt(($('#source').val()).charAt(5)), srcY = parseInt(($('#source').val()).charAt(7));
	var currLocX = parseInt(($('#currLoc').val()).charAt(5)), currLocY = parseInt(($('#currLoc').val()).charAt(7));
	var destinationX = parseInt(($('#destination').val()).charAt(5)), destinationY = parseInt(($('#destination').val()).charAt(7));
	var orientation = parseInt($('#orientation_robot').val());
	
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

	function moveRobot(m) {
		event.preventDefault();

		if(currLocX!=destinationX || currLocY!=destinationY) {
			switch(m) {
				case 1:
					if(moveForward())
						addF();

					break;

				case 2:
					rotateRight();
					addR();
					break;

				case 3:
					rotateLeft();
					addL();
					break;
			}
		} else {
			console.log('hi')

		}
	}

	function putRobotIcon() {
		var nodeStr = '#node-' + currLocX.toString() + '-' + currLocY.toString();
		switch(orientation) {
			case 1:
				$(nodeStr).html('<center><code><i class="fa fa-arrow-up"></code></center>');
				break;
			case 4:
				$(nodeStr).html('<center><code><i class="fa fa-arrow-left"></code></center>');
				break;
			case 2:
				$(nodeStr).html('<center><code><i class="fa fa-arrow-right"></code></center>');
				break;
			case 3:
				$(nodeStr).html('<center><code><i class="fa fa-arrow-down"></code></center>');
				break;
		}
		$('#' + $('#destination').val()).css('background-color', 'aqua');
		$('#' + $('#source').val()).css('background-color', 'darkcyan');
	}

	function paintCell() {
		var nodeStr = '#node-' + currLocX.toString() + '-' + currLocY.toString();
		$(nodeStr).css('background-color', 'blue');

		putRobotIcon();
	}

	function rotateRight() {
		orientation++;

		if(orientation > 4)
			orientation = 1;

		putRobotIcon();
	}

	function rotateLeft() {
		orientation--;

		if(orientation < 1)
			orientation = 4;

		putRobotIcon();
	}

	function moveForward() {
		var movePossible = false;
		var nodeStr = '#node-' + currLocX.toString() + '-' + currLocY.toString();

		switch(orientation) {
			case 1:
				//	North
				if((currLocY+1) <= 7) {
					movePossible = true;
					$(nodeStr).css('background-color', 'lightblue').html('');
					var subNodeStr = '#sub_node-' + currLocX.toString() + '-' + (currLocY+0.5).toString();
					$(subNodeStr.replace('.5','_5')).css('background-color', 'lightblue');
					currLocY += 1;
					paintCell();
				}
				break;

			case 4:
				//	West
				if((currLocX-1) >= 0) {
					movePossible = true;
					$(nodeStr).css('background-color', 'lightblue').html('');
					var subNodeStr = '#sub_node-' + (currLocX-0.5).toString() + '-' + currLocY.toString();
					$(subNodeStr.replace('.5','_5')).css('background-color', 'lightblue');
					currLocX -= 1;
					paintCell();
				}
				break;

			case 2:
				//	East
				if((currLocX+1) <= 7) {
					movePossible = true;
					$(nodeStr).css('background-color', 'lightblue').html('');
					var subNodeStr = '#sub_node-' + (currLocX+0.5).toString() + '-' + currLocY.toString();
					$(subNodeStr.replace('.5','_5')).css('background-color', 'lightblue');
					currLocX += 1;
					paintCell();
				}
				break;

			case 3:
				//	South
				if((currLocY-1) >= 0) {
					movePossible = true;
					$(nodeStr).css('background-color', 'lightblue').html('');
					var subNodeStr = '#sub_node-' + currLocX.toString() + '-' + (currLocY-0.5).toString();
					$(subNodeStr.replace('.5','_5')).css('background-color', 'lightblue');
					currLocY -= 1;
					paintCell();
				}
				break;
		}	

		return movePossible;	
	}

	function addF() {
		$('#pathStream').val($('#pathStream').val() + 'F');
		$('#pathStreamSend').val($('#pathStreamSend').val() + 'F');
		if($('#gridPanel').hasClass('panel-info') && (currLocX==destinationX && currLocY==destinationY)){
			$('#gridPanel').removeClass('panel-info').addClass('panel-primary');
			$('#reachedResult').html('<strong>&nbsp; <i>Reached Destination!</i></strong>')
		}
	}

	function addL() {
		$('#pathStream').val($('#pathStream').val() + 'L');
		$('#pathStreamSend').val($('#pathStreamSend').val() + 'L');
	}

	function addR() {
		$('#pathStream').val($('#pathStream').val() + 'R');
		$('#pathStreamSend').val($('#pathStreamSend').val() + 'R');
	}
</script>

@endsection