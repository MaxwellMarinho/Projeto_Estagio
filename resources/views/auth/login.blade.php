@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>SCTI</title>

		<!-- Fonts -->
		<link rel="dns-prefetch" href="//fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

		<!-- Styles-->
		<link href="{{ asset('css/sb-admin.css')}}" rel="stylesheet" type="text/css">
		<link href="{{ asset('css/scti-login.css')}}" rel="stylesheet" type="text/css">
		<link href="{{ asset('css/all.min.css')}}" rel="stylesheet" type="text/css">		
		<!-- Scripts-->
		<script src="{{ asset('js/jquery.min.js') }}" defer></script>
		<script src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script>
		<script src="{{ asset('js/jquery.easing.min.js') }}" defer></script>
	</head>
<body>
<main>
	<div class="container">
				
				<div class="card card-login mx-auto mt-5">
					
					<div class="card-header">Login</div>
					<div class="card-body">

					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<ul>
							@foreach($errors->all() as $error)
								<li>E-mail ou Senha incorreta.</li>
							@endforeach
							</ul>
						</div>
					@endif
						
						<form method="POST" action="{{ route('login') }}">
                            {{ @csrf_field() }}
                            
							<div class="form-group">
								
								<div class="form-label-group">
									
									<input type="email" name="email" id="inputEmail" class="form-control" placeholder="E-mail" required>
									<label for="inputEmail">E-mail</label>

								</div>

							</div>
							<div class="form-group">
								
								<div class="form-label-group">
									
									<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Senha" required>
									<label for="inputPassword">Senha</label>

								</div>

							</div>
							<button type="submit" class="btn btn-outline-primary btn-block">Entrar</button>
							<div class="text-right">
								
								<a class="d-block small mt-5" href="{{ route('password.request') }}">Esqueceu sua senha?</a>

							</div>

						</form>

					</div>

				</div>

		</div>
		
</main>
</body>
</html>
@endsection