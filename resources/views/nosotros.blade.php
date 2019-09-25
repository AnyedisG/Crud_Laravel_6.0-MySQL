@extends('layout')
@section('seccion')
		<div>
			<h1 class="p-2">Listado de usuarios</h1>
			@foreach($equipo as $members)
				<a href="{{ route('nosotros', $members) }}" class="h4 text-danger p-1">
					{{ $members }}
				</a>
			@endforeach

			@if(!empty($nombre))

				@switch ($nombre)
					@case($nombre=='user1')
						<h2 class="mb-3 mt-5">
							El nombre es {{ $nombre }}:
						</h2>
						<p>
							{{ $nombre }} Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</p>
					@break
					@case($nombre=='user2')
						<h2 class="mb-3 mt-5">
							El nombre es {{ $nombre }}:
						</h2>
						<p>
							{{ $nombre }} Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</p>
					@break
					@case($nombre=='user3')
						<h2 class="mb-3 mt-5">
							El nombre es {{ $nombre }}:
						</h2>
						<p>
							{{ $nombre }} Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</p>
					@break
				@endswitch
			@endif
		</div>
@endsection
