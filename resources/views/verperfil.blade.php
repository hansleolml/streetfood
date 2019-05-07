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
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Perfil</h3>
			  	</div>
			  	<!-- perfil -->
			  	<div class="panel-body">
				    <div class="row">
				    	<div class="col-sm-12">
				    		<strong>Nombres:</strong>
				    		<span class="pull-right">{{$user['name']}}</span>
				    	</div>
				   
				    </div>
				    <div class="row">
				    	<div class="col-sm-12">
				    		<strong>Apellidos:</strong>
				    		<span class="pull-right">{{$user['apellidos']}}</span>
				    	</div>
				    
				    </div>
				    <div class="row">
				    	<div class="col-sm-12">
				    		<strong>Email:</strong>
				    		<span class="pull-right">{{$user['email']}}</span>
				    	</div>
				    	
				    </div>
				    <div class="row">
				    	<div class="col-sm-12">
				    		<strong>Nombre de usuario:</strong>
				    		<span class="pull-right">{{ $perfil['username'] }}</span>
				    	</div>
				    </div>
				    <div class="row">
				    	<div class="col-sm-12">
				    		<strong>Sexo:</strong>
				    		<span class="pull-right">{{ $perfil['sexo'] }}</span>
				    	</div>
				    </div>
				    <div class="row">
				    	<div class="col-sm-12">
				    		<strong>Fecha de Nacimiento:</strong>
				    		<span class="pull-right">{{ $perfil['fechaNac'] }}</span>
				    	</div>
				    	
				    </div>
				    <div class="row">
				    	<div class="col-sm-12">
				    		<strong>Estudios:</strong>
				    		<span class="pull-right">{{ $perfil['estudios'] }}</span>
				    	</div>
				    	
				    </div>
				    <div class="row">
				    	<div class="col-sm-12">
				    		<strong>Experiencia:</strong>
				    		<span class="pull-right">{{ $perfil['experiencia'] }}</span>
				    	</div>
				    	
				    </div>
			  	</div>
			</div>

		</div>
	</div>
	@if(count($reviews)!=0)
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Reviews</h3>
			  	</div>
			  	<!-- perfil -->
			  	<div class="panel-body">
				    <div class="row">
				    	<div class="col-sm-12">
				    		<?php 
				    		$cont = 0;
				    		$tore=0;
				    		 ?>
				    		@foreach($reviews as $re)
				    		<?php 
				    		$tore=$re->review+$tore;
				    		$cont = 1 + $cont;
				    		?>
				    		@endforeach
				    		<?php  $promre=$tore/$cont; ?>
				    		<strong>Total de Reviews:</strong>
				    		<span class="pull-right">{{$cont}}</span>
				    	</div>
				   
				    </div>
				    <div class="row">
				    	<div class="col-sm-12">
				    		<strong>Promedio:</strong>
				    		<?php $redon=round($promre,2);?>
				    		<span class="pull-right">{{$redon}}</span>
				    	</div>
				    
				    </div>
				    <div class="row">
				    	<div class="col-sm-12">
				    		<strong>Calificación:</strong>
				    		@if($promre>=0 && $promre<=2)
				    		<span class="pull-right text-danger">Calificación BAJA</p>
							@elseif($promre>2 && $promre<4)
							<span class="pull-right text-warning">Calificación MEDIA</p>
							@elseif($promre>=4 && $promre<=5)
							<span class="pull-right text-success">Calificación ALTA</p>
							@endif

				    	</div>
				    	
				    </div>
			  	</div>
			</div>

		</div>
	</div>		
	@endif
	@if(count($reserva)!=0)
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Comentarios</h3>
			  	</div>
			  	<!-- perfil -->
			  	<div class="panel-body">
				    <p>comentar</p>
			  	</div>
			</div>

		</div>
	</div>		
	@endif
</div>
@endsection
