@extends('layouts.app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					New Traversal Form

					<a href="{{ route('home') }}" class="pull-right">Back</a>
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
						<div class="col-md-8">
							<div class="panel panel-info" id="gridPanel">
								<div class="panel-heading">
									GRID &nbsp;<span id="reachedResult"></span>

									<a href="" class="btn btn-danger pull-right"><strong>&#8617;</strong></a>
								</div>
								<div class="panel-body">
									<center>
										<table border="1">
											<tr>
												<td style="background-color: dimgray;"><span style="color: dimgray;">_<span style="color: white">7</span>_</span></td>
												<td id="node-0-7"></td>
												<td id="sub_node-0_5-7"></td>
												<td id="node-1-7"></td>
												<td id="sub_node-1_5-7"></td>
												<td id="node-2-7"></td>
												<td id="sub_node-2_5-7"></td>
												<td id="node-3-7"></td>
												<td id="sub_node-3_5-7"></td>
												<td id="node-4-7"></td>
												<td id="sub_node-4_5-7"></td>
												<td id="node-5-7"></td>
												<td id="sub_node-5_5-7"></td>
												<td id="node-6-7"></td>
												<td id="sub_node-6_5-7"></td>
												<td id="node-7-7"></td>
											</tr>
											<tr>
												<td style="background-color: dimgray; color: dimgray;">___</td>
												<td id="sub_node-0-6_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-1-6_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-2-6_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-3-6_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-4-6_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-5-6_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-6-6_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-7-6_5"></td>
											</tr>
											<tr>
												<td style="background-color: dimgray;"><span style="color: dimgray;">_<span style="color: white">6</span>_</span></td>
												<td id="node-0-6"></td>
												<td id="sub_node-0_5-6"></td>
												<td id="node-1-6"></td>
												<td id="sub_node-1_5-6"></td>
												<td id="node-2-6"></td>
												<td id="sub_node-2_5-6"></td>
												<td id="node-3-6"></td>
												<td id="sub_node-3_5-6"></td>
												<td id="node-4-6"></td>
												<td id="sub_node-4_5-6"></td>
												<td id="node-5-6"></td>
												<td id="sub_node-5_5-6"></td>
												<td id="node-6-6"></td>
												<td id="sub_node-6_5-6"></td>
												<td id="node-7-6"></td>
											</tr>
											<tr>
												<td style="background-color: dimgray; color: dimgray;">___</td>
												<td id="sub_node-0-5_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-1-5_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-2-5_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-3-5_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-4-5_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-5-5_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-6-5_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-7-5_5"></td>
											</tr>
											<tr>
												<td style="background-color: dimgray;"><span style="color: dimgray;">_<span style="color: white">5</span>_</span></td>
												<td id="node-0-5"></td>
												<td id="sub_node-0_5-5"></td>
												<td id="node-1-5"></td>
												<td id="sub_node-1_5-5"></td>
												<td id="node-2-5"></td>
												<td id="sub_node-2_5-5"></td>
												<td id="node-3-5"></td>
												<td id="sub_node-3_5-5"></td>
												<td id="node-4-5"></td>
												<td id="sub_node-4_5-5"></td>
												<td id="node-5-5"></td>
												<td id="sub_node-5_5-5"></td>
												<td id="node-6-5"></td>
												<td id="sub_node-6_5-5"></td>
												<td id="node-7-5"></td>
											</tr>
											<tr>
												<td style="background-color: dimgray; color: dimgray;">___</td>
												<td id="sub_node-0-4_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-1-4_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-2-4_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-3-4_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-4-4_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-5-4_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-6-4_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-7-4_5"></td>
											</tr>
											<tr>
												<td style="background-color: dimgray;"><span style="color: dimgray;">_<span style="color: white">4</span>_</span></td>
												<td id="node-0-4"></td>
												<td id="sub_node-0_5-4"></td>
												<td id="node-1-4"></td>
												<td id="sub_node-1_5-4"></td>
												<td id="node-2-4"></td>
												<td id="sub_node-2_5-4"></td>
												<td id="node-3-4"></td>
												<td id="sub_node-3_5-4"></td>
												<td id="node-4-4"></td>
												<td id="sub_node-4_5-4"></td>
												<td id="node-5-4"></td>
												<td id="sub_node-5_5-4"></td>
												<td id="node-6-4"></td>
												<td id="sub_node-6_5-4"></td>
												<td id="node-7-4"></td>
											</tr>
											<tr>
												<td style="background-color: dimgray; color: dimgray;">___</td>
												<td id="sub_node-0-3_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-1-3_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-2-3_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-3-3_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-4-3_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-5-3_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-6-3_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-7-3_5"></td>
											</tr>
											<tr>
												<td style="background-color: dimgray;"><span style="color: dimgray;">_<span style="color: white">3</span>_</span></td>
												<td id="node-0-3"></td>
												<td id="sub_node-0_5-3"></td>
												<td id="node-1-3"></td>
												<td id="sub_node-1_5-3"></td>
												<td id="node-2-3"></td>
												<td id="sub_node-2_5-3"></td>
												<td id="node-3-3"></td>
												<td id="sub_node-3_5-3"></td>
												<td id="node-4-3"></td>
												<td id="sub_node-4_5-3"></td>
												<td id="node-5-3"></td>
												<td id="sub_node-5_5-3"></td>
												<td id="node-6-3"></td>
												<td id="sub_node-6_5-3"></td>
												<td id="node-7-3"></td>
											</tr>
											<tr>
												<td style="background-color: dimgray; color: dimgray;">___</td>
												<td id="sub_node-0-2_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-1-2_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-2-2_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-3-2_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-4-2_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-5-2_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-6-2_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-7-2_5"></td>
											</tr>
											<tr>
												<td style="background-color: dimgray;"><span style="color: dimgray;">_<span style="color: white">2</span>_</span></td>
												<td id="node-0-2"></td>
												<td id="sub_node-0_5-2"></td>
												<td id="node-1-2"></td>
												<td id="sub_node-1_5-2"></td>
												<td id="node-2-2"></td>
												<td id="sub_node-2_5-2"></td>
												<td id="node-3-2"></td>
												<td id="sub_node-3_5-2"></td>
												<td id="node-4-2"></td>
												<td id="sub_node-4_5-2"></td>
												<td id="node-5-2"></td>
												<td id="sub_node-5_5-2"></td>
												<td id="node-6-2"></td>
												<td id="sub_node-6_5-2"></td>
												<td id="node-7-2"></td>
											</tr>
											<tr>
												<td style="background-color: dimgray; color: dimgray;">___</td>
												<td id="sub_node-0-1_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-1-1_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-2-1_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-3-1_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-4-1_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-5-1_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-6-1_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-7-1_5"></td>
											</tr>
											<tr>
												<td style="background-color: dimgray;"><span style="color: dimgray;">_<span style="color: white">1</span>_</span></td>
												<td id="node-0-1"></td>
												<td id="sub_node-0_5-1"></td>
												<td id="node-1-1"></td>
												<td id="sub_node-1_5-1"></td>
												<td id="node-2-1"></td>
												<td id="sub_node-2_5-1"></td>
												<td id="node-3-1"></td>
												<td id="sub_node-3_5-1"></td>
												<td id="node-4-1"></td>
												<td id="sub_node-4_5-1"></td>
												<td id="node-5-1"></td>
												<td id="sub_node-5_5-1"></td>
												<td id="node-6-1"></td>
												<td id="sub_node-6_5-1"></td>
												<td id="node-7-1"></td>
											</tr>
											<tr>
												<td style="background-color: dimgray; color: dimgray;">___</td>
												<td id="sub_node-0-0_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-1-0_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-2-0_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-3-0_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-4-0_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-5-0_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-6-0_5"></td>
												<td style="background-color: dimgray;"></td>
												<td id="sub_node-7-0_5"></td>
											</tr>
											<tr>
												<td style="background-color: dimgray;"><span style="color: dimgray;">_<span style="color: white">0</span>_</span></td>
												<td id="node-0-0"></td>
												<td id="sub_node-0_5-0"></td>
												<td id="node-1-0"></td>
												<td id="sub_node-1_5-0"></td>
												<td id="node-2-0"></td>
												<td id="sub_node-2_5-0"></td>
												<td id="node-3-0"></td>
												<td id="sub_node-3_5-0"></td>
												<td id="node-4-0"></td>
												<td id="sub_node-4_5-0"></td>
												<td id="node-5-0"></td>
												<td id="sub_node-5_5-0"></td>
												<td id="node-6-0"></td>
												<td id="sub_node-6_5-0"></td>
												<td id="node-7-0"></td>
											</tr>
											<tr>
												<td style="background-color: dimgray;"><span style="color: dimgray;">___</span></td>
												<td style="background-color: dimgray"><span style="color: dimgray;">_<span style="color: white;">0</span>_</span></td>
												<td style="background-color: dimgray;"><span style="color: dimgray;">___</span></td>
												<td style="background-color: dimgray"><span style="color: dimgray;">_<span style="color: white;">1</span>_</span></td>
												<td style="background-color: dimgray;"><span style="color: dimgray;">___</span></td>
												<td style="background-color: dimgray"><span style="color: dimgray;">_<span style="color: white;">2</span>_</span></td>
												<td style="background-color: dimgray;"><span style="color: dimgray;">___</span></td>
												<td style="background-color: dimgray"><span style="color: dimgray;">_<span style="color: white;">3</span>_</span></td>
												<td style="background-color: dimgray;"><span style="color: dimgray;">___</span></td>
												<td style="background-color: dimgray"><span style="color: dimgray;">_<span style="color: white;">4</span>_</span></td>
												<td style="background-color: dimgray;"><span style="color: dimgray;">___</span></td>
												<td style="background-color: dimgray"><span style="color: dimgray;">_<span style="color: white;">5</span>_</span></td>
												<td style="background-color: dimgray;"><span style="color: dimgray;">___</span></td>
												<td style="background-color: dimgray"><span style="color: dimgray;">_<span style="color: white;">6</span>_</span></td>
												<td style="background-color: dimgray;"><span style="color: dimgray;">___</span></td>
												<td style="background-color: dimgray"><span style="color: dimgray;">_<span style="color: white;">7</span>_</span></td>
											</tr>
										</table>
									</center>	
									
								</div>
							</div>
						</div>

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