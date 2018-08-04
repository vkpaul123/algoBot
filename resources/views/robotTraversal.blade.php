@extends('layouts.app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					New Robot Traversal Form &nbsp;<strong>[8 X 8] Matrix</strong>

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
					<form action="{{ route('saveNewRobotTraversal') }}" class="form-horizontal" method="post">
						{{ csrf_field() }}
						
						<div class="form-group{{ $errors->has('sourceX') ? ' has-error' : '' }} {{ $errors->has('sourceY') ? ' has-error' : '' }}">
							<label for="sourceX" class="col-md-4 control-label">Source</label>

							<div class="col-md-3">
								<input id="sourceX" type="sourceX" class="form-control" name="sourceX" value="{{ old('sourceX') }}" required placeholder="X">

								@if ($errors->has('sourceX'))
								<span class="help-block">
									<strong>{{ $errors->first('sourceX') }}</strong>
								</span>
								@endif
							</div>
							<div class="col-md-3">
								<input id="sourceY" type="sourceY" class="form-control" name="sourceY" value="{{ old('sourceY') }}" required placeholder="Y">

								@if ($errors->has('sourceY'))
								<span class="help-block">
									<strong>{{ $errors->first('sourceY') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('destinationX') ? ' has-error' : '' }} {{ $errors->has('destinationY') ? ' has-error' : '' }}">
							<label for="destinationX" class="col-md-4 control-label">Destination</label>

							<div class="col-md-3">
								<input id="destinationX" type="destinationX" class="form-control" name="destinationX" value="{{ old('destinationX') }}" required placeholder="X">

								@if ($errors->has('destinationX'))
								<span class="help-block">
									<strong>{{ $errors->first('destinationX') }}</strong>
								</span>
								@endif
							</div>
							<div class="col-md-3">
								<input id="destinationY" type="destinationY" class="form-control" name="destinationY" value="{{ old('destinationY') }}" required placeholder="Y">

								@if ($errors->has('destinationY'))
								<span class="help-block">
									<strong>{{ $errors->first('destinationY') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<hr>
						
						<div class="form-group{{ $errors->has('currLocX') ? ' has-error' : '' }} {{ $errors->has('currLocY') ? ' has-error' : '' }}">
							<label for="currLocX" class="col-md-4 control-label">Current Location</label>

							<div class="col-md-3">
								<input id="currLocX" type="currLocX" class="form-control" name="currLocX" value="{{ old('currLocX') }}" required placeholder="X">

								@if ($errors->has('currLocX'))
								<span class="help-block">
									<strong>{{ $errors->first('currLocX') }}</strong>
								</span>
								@endif
							</div>
							<div class="col-md-3">
								<input id="currLocY" type="currLocY" class="form-control" name="currLocY" value="{{ old('currLocY') }}" required placeholder="Y">

								@if ($errors->has('currLocY'))
								<span class="help-block">
									<strong>{{ $errors->first('currLocY') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('orientation') ? ' has-error' : '' }}">
							<label for="orientation" class="col-md-4 control-label">Orientation</label>

							<div class="col-md-6">
								<input id="orientation" type="number" class="form-control" name="orientation" value="{{ old('orientation') }}" required autofocus>
								<a href="" class="btn btn-danger pull-right" onclick="
								event.preventDefault();
								document.getElementById('orientation').value = '';
								"><strong>&#8617;</strong></a>
								@if ($errors->has('orientation'))
								<span class="help-block">
									<strong>{{ $errors->first('orientation') }}</strong>
								</span>
								@endif
							</div>
						</div>
						
						<div class="col-md-offset-6 col-md-4">
							<table class="table-responsive">
								<tr>
									<td></td>
									<td>
										<a href="" class="btn btn-primary btn-block" onclick="orientNorth()"><code style="font-size: 2em;">&uarr;</code></a>
									</td>
									<td></td>
								</tr>
								<tr>
									<td>
										<a href="" class="btn btn-primary btn-block" onclick="orientWest()"><code style="font-size: 2em;">&larr;</code></a>
									</td>
									<td></td>
									<td>
										<a href="" class="btn btn-primary btn-block" onclick="orientEast()"><code style="font-size: 2em;">&rarr;</code></a>
									</td>
								</tr>
								<tr>
									<td></td>
									<td>
										<a href="" class="btn btn-primary btn-block" onclick="orientSouth()"><code style="font-size: 2em;">&darr;</code></a>
									</td>
									<td></td>
								</tr>
							</table>
							<br><br>
						</div>

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

<script>
	function orientNorth() {
		event.preventDefault();

		document.getElementById('orientation').value = 1;
	}

	function orientWest() {
		event.preventDefault();

		document.getElementById('orientation').value = 4;
	}

	function orientEast() {
		event.preventDefault();

		document.getElementById('orientation').value = 2;
	}

	function orientSouth() {
		event.preventDefault();

		document.getElementById('orientation').value = 3;
	}
</script>

@endsection