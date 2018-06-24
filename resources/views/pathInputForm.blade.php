@extends('layouts.app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<form action="{{ route('pathInputForm-store') }}" class="form-horizontal" method="post">
				
			</form>
		</div>
	</div>
</div>

@endsection