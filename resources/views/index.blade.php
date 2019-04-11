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
			    	<h3 class="panel-title">¡Publica tu plato de comida!</h3>
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
						    	<label for="cantidad" class="col-sm-2 control-label">Cantidad</label>
							    <div class="col-sm-2">
							    	<input type="text" class="form-control" name="cantidad" value="" id="cantidad" placeholder="Nro Platos">		
							    </div>
					  		</div>
					  		<div class="form-group">
						    	<div class="col-sm-offset-2 col-sm-10">
						      		<button type="submit" class="btn btn-primary">Publicar</button>
						    	</div>
					  		</div>
					  	</div>
					</form>
			 	</div>
			</div>
		</div>
	</div>
	<!-- publicaciones -->
	<h3>Tus productos publicados</h3>	
	@if(isset($producto))
  <div class="row">
  @foreach($producto as $n)
    @if($n->id_usuarioFO==strval(auth()->user()->id))
    <div class="col-md-4">
      <div class="thumbnail">
        <img src="http://www.laescapada.mx/wp-content/uploads/2016/10/IMG_1432-1-242x200.jpg" alt="100%x200">
        <div class="caption">
          <p align="right">Publicado el  {{$n->created_at}} Publicación N°.{{$n->id}}</p>
          <p align="right">Publicado Por: 
            <a href="">
            @foreach($user as $k)
              @if($n->id_usuarioFO==$k->id)
              {{$k->name}}
              {{$k->apellidos}}
              @endif
            @endforeach
            </a>
          </p>
          <h3 align="center">{{$n->tituProdu}}</h3> 
          <a href="#">
        <span class="label label-warning">{{$n->localidad}}</span>
      </a>
      <a href="#">
        <span class="label label-default">{{$n->etiket1}}</span>
      </a>
      <a href="#">
        <span class="label label-default">{{$n->etiket2}}</span>
      </a>
      <a href="#">
        <span class="label label-default">{{$n->etiket3}}</span>
      </a>
          <p>{{$n->ingredientes}}</p>
          <p align="right">Precio s./{{$n->precio}}.00</p>
          <p align="right">Nro de platos :  {{$n->cantidad}} </p>
          	<a href="#" class="btn btn-primary" role="button">Editar producto</a>
          	<form action="{{url('producto',$n->id)}}" method="POST">
          		{{csrf_field()}}
          		<input type="hidden" name="_method" value="DELETE">
          		<button class="btn btn-button">borrar</button>
          	</form>
          </p>
        </div>
      </div>
    </div>
    @endif
  @endforeach
  </div>

	@endif
</div>
@endsection