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
	@include('partials.flash')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">				
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Comentarios</h3>
			  	</div>
			  	<!-- perfil -->
			  	<div class="panel-body">
					@foreach($comentario as $comen)
				    <div class="media">
						<div class="media-left">
							<a href="#">
								<img class="media-object" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCA2NCA2NCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PCEtLQpTb3VyY2UgVVJMOiBob2xkZXIuanMvNjR4NjQKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNmE5NDMxY2QxMyB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE2YTk0MzFjZDEzIj48cmVjdCB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSIxMy4xNzk2ODc1IiB5PSIzNi41Ij42NHg2NDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" alt="...">
							</a>
						</div>
						<div class="media-body">
							@foreach($usuarios as $us)
								@if($us->id==$comen->id_clienteFO)
								<?php $nombrecoment=$us->name." ".$us->apellidos; ?>
								@endif
							@endforeach
							<h4 class="media-heading">{{$nombrecoment}}</h4>
							<div class="row">
								<div class="col-md-10">
								{{$comen->comentario}}							
								</div>
								@if(auth()->user()->id==$comen->id_clienteFO)
								<div class="col-md-2">
									<!-- <a href="{{'/categoria/'.$comen->id.'/edit'}}">x</a> -->
									<form action="{{url('comentario',$comen->id)}}" method="POST">
				          			{{csrf_field()}}
					          			<input type="hidden" name="_method" value="DELETE">
					          			<button class="btn btn-button btn-danger pull-right">X</button>
				          			</form>
								</div>
								@endif
							</div>
						</div>
					</div>
					@endforeach
					<hr>
					<div class="media">
						<div class="media-left">
							<a href="#">
								<img class="media-object" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCA2NCA2NCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PCEtLQpTb3VyY2UgVVJMOiBob2xkZXIuanMvNjR4NjQKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNmE5NDMxY2QxMyB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE2YTk0MzFjZDEzIj48cmVjdCB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSIxMy4xNzk2ODc1IiB5PSIzNi41Ij42NHg2NDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" alt="...">
							</a>
						</div>
						<div class="media-body">
							<h4 class="media-heading"> {{auth()->user()->name}} {{auth()->user()->apellidos}}</h4>
							<form class="form-horizontal" role="form" method="POST" action="{{url('comentario')}}">
								{{csrf_field()}}
							  	<div class="form-group">
							  		<div class="col-sm-12">
							    		<input type="text" class="form-control" name="comentario" value="" id="inputEmail3" placeholder="¡Ingresa un comentario para este chef!" required>
							    		<input type="hidden" name="id_reservaFO" value="1">
							    		<input type="hidden" name="id_chefFO" value="{{$user['id']}}">
							    		<div class="hidden">
							    			<button type="submit" class="btn btn-primary" hidden="true">Publicar</button>
							    		</div>
							    	</div>	
							  	</div>
							</form>
						</div>
					</div>
			  	</div>
			</div>

		</div>
	</div>		
	@endif
</div>
@endsection
