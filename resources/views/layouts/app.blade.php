<!DOCTYPE html>
<html lang="en">
<head>
	{{-- head content --}}
	@include('layouts.headcontent')

	{{-- page specific extra head content --}}
	@yield('pageSpecificHeadContent')
</head>
<body>
	<div id="app">
		{{-- navbar header --}}
	    @include('layouts.navbar')

		{{-- main body content --}}
	    @yield('content')
	</div>

	{{-- required javascript --}}
	@include('layouts.scripts')

	{{-- page specific scripts --}}
	@yield('pageSpecificScripts')
</body>
</html>