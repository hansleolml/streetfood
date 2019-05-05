@extends('layouts.marco')
@section('externolink')
<link href="tokenfield/dist/css/bootstrap-tokenfield.min.css" rel="stylesheet">
	<link href="jquery-ui/jquery-ui.min.css" rel="stylesheet">

	<!-- <link href="estilos/carousel.css" rel="stylesheet"> -->
    <link href="{{asset('css/product.css')}}" rel="stylesheet">
    <link href="{{asset('css/carousel.css')}}" rel="stylesheet">
@endsection
@section('externoscript')
<script	src="{{asset('jquery-ui/jquery-ui.min.js')}}"> </script>
	<script src="{{asset('tokenfield/dist/bootstrap-tokenfield.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/tags.js')}}"></script>

@endsection
@section('content')
<div class="col-md-8">
			<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Perfil</h3>
			  	</div>
			  	<!-- perfil -->
			  	<div class="panel-body">
				    <div class="row">
				    	<div class="col-sm-12">
				    		<strong>Nombres:</strong>
				    		<span class="pull-right">{{auth()->user()->name}}</span>
				    	</div>
				   
				    </div>
				    <div class="row">
				    	<div class="col-sm-12">
				    		<strong>Apellidos:</strong>
				    		<span class="pull-right">{{auth()->user()->apellidos}}</span>
				    	</div>
				    
				    </div>
				    <div class="row">
				    	<div class="col-sm-12">
				    		<strong>Sexo:</strong>
				    		<span class="pull-right">{{ $perfil['username'] }}</span>
				    	</div>
				    	
				    </div>
				    <div class="row">
				    	<div class="col-sm-12">
				    		<strong>Fecha de Nacimiento:</strong>
				    		<span class="pull-right">15/08/1997</span>
				    	</div>
				    	
				    </div>
				    <div class="row">
				    	<div class="col-sm-12">
				    		<strong>Estudios:</strong>
				    		<span class="pull-right">Medicina en Universidad Mayor de San Marcos</span>
				    	</div>
				    	
				    </div>
				    <div class="row">
				    	<div class="col-sm-12">
				    		<strong>De:</strong>
				    		<span class="pull-right">Perú, Lima</span>
				    	</div>
				    	
				    </div>
				    <div class="row">
				    	<div class="col-sm-12">
				    		<strong>Email:</strong>
				    		<span class="pull-right">{{auth()->user()->email}}</span>
				    	</div>
				    	
				    </div>	
				    <div class="row">
				    	<div class="col-sm-12">
				    		<a class="btn btn-primary pull-right" href="{{ url('/editperfil') }}"right>
				    		Actualizar
				    		</a>
				    	</div>
				    </div>
			  	</div>
			</div>
		</div>
@endsection
