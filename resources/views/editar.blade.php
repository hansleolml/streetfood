@extends('layouts.marco')
@section('externolink')
<link href="tokenfield/dist/css/bootstrap-tokenfield.min.css" rel="stylesheet">
	<link href="jquery-ui/jquery-ui.min.css" rel="stylesheet">

	<!-- <link href="estilos/carousel.css" rel="stylesheet"> -->
    <link href="{{asset('css/product.css')}}" rel="stylesheet">
    <link href="{{asset('css/carousel.css')}}" rel="stylesheet">
@endsection
@section('externoscript')
<script	src="jquery-ui/jquery-ui.min.js"> </script>
	<script src="tokenfield/dist/bootstrap-tokenfield.min.js"></script>
	<script type="text/javascript" src="js/tags.js"></script>

@endsection
@section('content')
<div class="col-md-8">
	<!-- cada row es un post -->
	<!-- Post para publicar -->
	<div class="row">
		<div class="container-fluid">
			<div class="panel panel-primary">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">¡Edita tu plato de comida!</h3>
			  	</div>
			  	<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{url('producto')}}">
						{{csrf_field()}}
					  	<div class="form-group">
					    	<label for="inputEmail3" class="col-sm-2 control-label">Nombre del plato</label>
						    <div class="col-sm-10">
						    	<input type="text" class="form-control" name="tituProdu" value="{{old('tituProdu')}}" id="inputEmail3" placeholder="¡Ingresa el nombre de tu Plato!" required>

						    	 @if($errors->has('tituProdu'))
							    <span style="color:red;">{{$errors -> first('tituProdu')}}</span>
							    @endif

						    </div>
					  	</div>
					  	<div class="" id="hacerquest" hidden="true">
					  		<div class="form-group">
						    	<label for="tokenfield" class="col-sm-2 control-label">Etiquetas</label>
							    <div class="col-sm-10">
							    	<input type="text" class="form-control" name="etikPregu" value="{{old('etikPregu')}}" id="tokenfield"
							    	data-limit="4" placeholder="Etiquetas como criolla, peruana, selvatica ,etc">
							    	@if($errors->has('etikPregu'))
								    <span style="color:red;">{{$errors -> first('etikPregu')}}</span>
								    @endif
							    </div>
					  		</div>
					  		<div class="form-group">
						    	<label for="miingredientes" class="col-sm-2 control-label">Ingredientes:</label>
						    	<div class="col-sm-10">
						    		<textarea class="form-control" name="ingredientes" id="miingredientes" placeholder="Describe los ingredientes que usaste en la preparación (opcional)" rows="3">{{old('ingredientes')}}</textarea>
						    	</div>
					  		</div>
					  		<div class="form-group">
						    	<label for="alter1" class="col-sm-2 control-label">Introduce alguna promoción</label>
							    <div class="col-sm-10" id="alterna">
							    	<div class="row">
							    		<div class="col-sm-3">
									    	<input type="text" class="form-control" name="promocion" value="{{old('promocion')}}" id="alter1" placeholder="Agrega promociones" required>
									    	@if($errors->has('promocion'))
										    <span style="color:red;">{{$errors -> first('promocion')}}</span>
										    @endif
							    		</div>
							    		<button type="button" class="btn btn-success btn-sm" id="alternativas">
							    			<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
							    		</button>			    		
							    	</div>
							    </div>
					  		</div>
					  		<div class="form-group">
						    	<label for="locality" class="col-sm-2 control-label">Localidad</label>
							    <div class="col-sm-10">
							    	<input type="text" class="form-control" name="locality" value="{{old('locality')}}" id="locality" placeholder="Ingrese en que distrito esta disponible">
							    	@if($errors->has('locality'))
								    <span style="color:red;">{{$errors -> first('locality')}}</span>
								    @endif
							    </div>
					  		</div>
					  		<div class="form-group">
						    	<label for="precio" class="col-sm-2 control-label">Precio</label>
							    <div class="col-sm-2">
							    	<input type="text" class="form-control" name="precio" value="" id="precio" placeholder="S/.">		
							    </div>
					  		</div>
					  		<div class="form-group">
						    	<div class="col-sm-offset-2 col-sm-1">
						      		<button type="submit" class="btn btn-primary">Editar</button>
						    	</div>
						    	<div class="col-sm-1">						      		
						      		<a href="{{url('')}}" class="btn btn-primary">Cancelar</a>
						    	</div>
					  		</div>
					  	</div>
					</form>
			 	</div>
			</div>
		</div>
	</div>
</div>
@endsection