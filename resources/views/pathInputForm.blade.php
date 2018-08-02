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

						<div class="form-group{{ $errors->has('pathStream') ? ' has-error' : '' }}">
							<label for="pathStream" class="col-md-4 control-label">Path Stream</label>

							<div class="col-md-6">
								<input id="pathStream" type="pathStream" class="form-control" name="pathStream" value="{{ old('pathStream') }}" required autofocus>
								<a href="" class="btn btn-danger pull-right" onclick="
								event.preventDefault();
								document.getElementById('pathStream').value = '';
								"><strong>&#8617;</strong></a>
								@if ($errors->has('pathStream'))
								<span class="help-block">
									<strong>{{ $errors->first('pathStream') }}</strong>
								</span>
								@endif
							</div>
						</div>
						
						<div class="col-md-8">
							<table border="1">
									<tr>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
									</tr>
									<tr>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
									</tr>
									<tr>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
									</tr>
									<tr>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
									</tr>
									<tr>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
									</tr>
									<tr>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
									</tr>
									<tr>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
									</tr>
									<tr>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
									</tr>
									<tr>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
									</tr>
									<tr>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
									</tr>
									<tr>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
									</tr>
									<tr>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
									</tr>
									<tr>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
									</tr>
									<tr>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
									</tr>
									<tr>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
										<td style="color: #ffffff;">___</td>
									</tr>
								</table>	
						</div>



						<div class="col-md-4">
							<table class="table-responsive">
								<tr>
									<td></td>
									<td>
										<a href="" class="btn btn-primary btn-block" onclick="addF()"><code style="font-size: 2em;">&uarr;</code></a>
									</td>
									<td></td>
								</tr>
								<tr>
									<td>
										<a href="" class="btn btn-primary btn-block" onclick="addL()"><code style="font-size: 2em;">&larr;</code></a>
									</td>
									<td></td>
									<td>
										<a href="" class="btn btn-primary btn-block" onclick="addR()"><code style="font-size: 2em;">&rarr;</code></a>
									</td>
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
	function addF() {
		event.preventDefault();

		document.getElementById('pathStream').value = document.getElementById('pathStream').value + 'F';
	}

	function addL() {
		event.preventDefault();

		document.getElementById('pathStream').value = document.getElementById('pathStream').value + 'L';
	}

	function addR() {
		event.preventDefault();

		document.getElementById('pathStream').value = document.getElementById('pathStream').value + 'R';
	}
</script>

@endsection