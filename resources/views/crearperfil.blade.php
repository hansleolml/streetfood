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
	<!-- cada row es un post -->
	<!-- Post para publicar -->
	<div class="row">
		<div class="container-fluid">
			<div class="panel panel-primary">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">¡Edita tu perfil!</h3>
			  	</div>
			  	<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{url('miperfil')}}">
						{{csrf_field()}}
					  	<div class="form-group">
					    	<label for="nombre" class="col-sm-2 control-label">Nombre </label>
						    <div class="col-sm-10">
						    	<input type="text" class="form-control" name="nombre" value="{{auth()->user()->name}}" id="nombre" placeholder="¡Ingresa tu nombre!" required>
						    </div>
					  	</div>
					  	<div class="form-group">
					    	<label for="apellido" class="col-sm-2 control-label">apellido </label>
						    <div class="col-sm-10">
						    	<input type="text" class="form-control" name="apellido" value="{{auth()->user()->apellidos}}" id="apellido" placeholder="¡Ingresa tu apellido!" required>
						    </div>
					  	</div>
					  	<div class="form-group">
					    	<label for="username" class="col-sm-2 control-label">Nombre de usuario: </label>
						    <div class="col-sm-10">
						    	<input type="text" class="form-control" name="username" value="" id="username" placeholder="¡Ingresa tu nombre de usuario!">
						    </div>
					  	</div>
					  	<div class="form-group">
					    	<label for="sexo" class="col-sm-2 control-label">Genero: </label>
						    <div class="col-sm-10">
						    	<select name="sexo" id="sexo" class="form-control">
						    		<option value="" selected="true">--Seleccionar--</option>
						    		<option value="Hombre">Hombre</option>
						    		<option value="Mujer">Mujer</option>
						    	</select>
						    </div>
					  	</div>
					  	<div class="form-group">
					    	<label for="fechaNac" class="col-sm-2 control-label">Fecha de Nacimiento: </label>
						    <div class="col-sm-10">
						    	<input type="date" class="form-control" name="fechaNac" value="" id="fechaNac" placeholder="¡Ingresa tu fecha de nacimiento!">
						    </div>
					  	</div>
					  	<div class="form-group">
					    	<label for="estudios" class="col-sm-2 control-label">Estudios: </label>
						    <div class="col-sm-10">
						    	<textarea name="estudios" id="estudios" class="form-control" rows="3">
						    	</textarea>
						    </div>
					  	</div>
					  	<div class="form-group">
					    	<label for="experiencia" class="col-sm-2 control-label">Experiencia: </label>
						    <div class="col-sm-10">
						    	<textarea name="experiencia" id="experiencia" class="form-control" rows="3">
						    	</textarea>
						    </div>
					  	</div>
				  		<div class="form-group">
					    	<div class="col-sm-offset-2 col-sm-10">
					      		<button type="submit" class="btn btn-primary">Actualizar</button>
					    	</div>
				  		</div>
					</form>
			 	</div>
			</div>
		</div>
	</div>
</div>
@endsection