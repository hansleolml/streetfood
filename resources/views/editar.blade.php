@extends('layouts.marco')
@section('externolink')
<link href="{{asset('tokenfield/dist/css/bootstrap-tokenfield.min.css')}}" rel="stylesheet">
	<link href="{{asset('jquery-ui/jquery-ui.min.css')}}" rel="stylesheet">

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
			    	<h3 class="panel-title">¡Edita tu plato de comida!</h3>
			  	</div>
			  	<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{'/producto/'.$producto['id']}}">
						{{csrf_field()}}
						<input type="hidden" name="_method" value="PUT">
					  	<div class="form-group">
					    	<label for="inputEmail3" class="col-sm-2 control-label">Nombre del plato</label>
						    <div class="col-sm-10">

						    	<input type="text" class="form-control" name="tituProdu" value="{{ $producto['tituProdu'] }}" id="inputEmail3" placeholder="¡Ingresa el nombre de tu Plato!" required>

						    	 @if($errors->has('tituProdu'))
							    <span style="color:red;">{{$errors -> first('tituProdu')}}</span>
							    @endif

						    </div>
					  	</div>
					  	<div class="" id="hacerquest" hidden="true">
					  		<div class="form-group">
						    	<label for="tokenfield" class="col-sm-2 control-label">Etiquetas</label>
							    <div class="col-sm-10">
							    	<input type="text" class="form-control" name="etikPregu" value="" id="tokenfield"
							    	data-limit="4" placeholder="Etiquetas como criolla, peruana, selvatica ,etc">
							    	@if($errors->has('etikPregu'))
								    <span style="color:red;">{{$errors -> first('etikPregu')}}</span>
								    @endif
							    </div>
					  		</div>
					  		@if(isset($categoria))
					  		<div class="form-group">
						    	<label for="categoria" class="col-sm-2 control-label">Categoria</label>
							    <div class="col-sm-10">
								<select class="form-control" name="categoria" id="categoria" required>
								<option value="">--Seleccionar--</option>
								@foreach($categoria as $n)
								@if($n->nombre==$producto['categoria'])
								<option value="{{$n->nombre}}" selected="true">{{$n->nombre}}</option>
								@else
								<option value="{{$n->nombre}}">{{$n->nombre}}</option>
								@endif
								@endforeach
								</select>
							    </div>
					  		</div>
					  		@endif
					  		<div class="form-group">
						    	<label for="miingredientes" class="col-sm-2 control-label">Ingredientes:</label>
						    	<div class="col-sm-10">
						    		<textarea class="form-control" name="ingredientes" id="miingredientes" placeholder="Describe los ingredientes que usaste en la preparación (opcional)" rows="3">{{ $producto['ingredientes'] }}</textarea>
						    	</div>
					  		</div>
					  		<div class="form-group">
						    	<label for="alter1" class="col-sm-2 control-label">Introduce alguna promoción</label>
							    <div class="col-sm-10" id="alterna">
							    	<div class="row">
							    		<div class="col-sm-2">
									    	<input type="number" class="form-control" name="promopide" value="{{ $producto['promopide'] }}" id="alter1" placeholder="Cant. Pide" min="1">
									    	@if($errors->has('promocion'))
										    <span style="color:red;">{{$errors -> first('promocion')}}</span>
										    @endif
							    		</div>
							    		<div class="col-sm-2">
									    	<input type="number" class="form-control" name="promolleva" value="{{ $producto['promolleva'] }}" id="" placeholder="Cant. Llevar" min="2">
									    	@if($errors->has('promocion'))
										    <span style="color:red;">{{$errors -> first('promocion')}}</span>
										    @endif
							    		</div>
							    		<div class="col-sm-4">
									    	<p class="text-danger">
									    		*Ejemplo : 1 x 2 , pague 1 y lleve 2.<br>
									    		*De estar vacio no se aplicara ninguna promoción.
									    	</p>
							    		</div>	   		
							    	</div>
							    </div>
					  		</div>
					  		<div class="form-group">
						    	<label for="locality" class="col-sm-2 control-label">Localidad</label>
							    <div class="col-sm-10">
							    	<input type="text" class="form-control" name="locality" value="{{ $producto['localidad'] }}" id="locality" placeholder="Ingrese en que distrito esta disponible">
							    	@if($errors->has('locality'))
								    <span style="color:red;">{{$errors -> first('locality')}}</span>
								    @endif
							    </div>
					  		</div>
					  		<div class="form-group">
						    	<label for="precio" class="col-sm-2 control-label">Precio</label>
							    <div class="col-sm-2">
							    	<input type="number" class="form-control" name="precio" value="{{ $producto['precio'] }}" id="precio" placeholder="S/." min="1"
							    	max="100">		
							    </div>
					  		</div>
					  		<div class="form-group">
						    	<label for="cantidad" class="col-sm-2 control-label">Cantidad</label>
							    <div class="col-sm-2">
							    	<input type="number" class="form-control" name="cantidad" value="{{ $producto['cantidad'] }}" id="cantidad" placeholder="Nro Platos" min="1"
							    	max="100">		
							    </div>
					  		</div>
					  		<div class="form-group">
						    	<div class="col-sm-offset-2 col-sm-2">
						      		<button type="submit" class="btn btn-primary">Actualizar</button>
						    	</div>
						    	<div class="col-sm-2">						      		
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