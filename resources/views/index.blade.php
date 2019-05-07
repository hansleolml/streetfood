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
						    	<label for="categoria" class="col-sm-2 control-label">Categoria</label>
							    <div class="col-sm-10">
								@if(isset($categoria))
								<select class="form-control" name="categoria" id="categoria" required>
								<option value="">--Seleccionar--</option>
								@foreach($categoria as $n)
								<option value="{{$n->nombre}}">{{$n->nombre}}</option>
								@endforeach
								</select>
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
							    		<div class="col-sm-2">
									    	<input type="number" class="form-control" name="promopide" value="1" id="alter1" placeholder="Cant. Pide" min="1">
									    	@if($errors->has('promocion'))
										    <span style="color:red;">{{$errors -> first('promocion')}}</span>
										    @endif
							    		</div>
							    		<div class="col-sm-2">
									    	<input type="number" class="form-control" name="promolleva" value="1" id="" placeholder="Cant. Llevar" min="1">
									    	@if($errors->has('promocion'))
										    <span style="color:red;">{{$errors -> first('promocion')}}</span>
										    @endif
							    		</div>
							    		<div class="col-sm-4">
									    	<p class="text-danger">
									    		*Ejemplo : 1 x 2 , pague 1 y lleve 2.<br>
									    		*De estar 1 x 1 no se aplicará ninguna promoción.
									    	</p>
							    		</div>	   		
							    	</div>
							    </div>
					  		</div>
					  		<div class="form-group">
						    	<label for="locality" class="col-sm-2 control-label">Localidad</label>
							    <div class="col-sm-10">
							    	<input type="text" class="form-control" name="locality" value="{{old('locality')}}" id="locality" placeholder="Ingrese en que distrito esta disponible" required="true">
							    	@if($errors->has('locality'))
								    <span style="color:red;">{{$errors -> first('locality')}}</span>
								    @endif
							    </div>
					  		</div>
					  		<div class="form-group">
						    	<label for="precio" class="col-sm-2 control-label">Precio</label>
							    <div class="col-sm-2">
							    	<input type="number" class="form-control" name="precio" value="" id="precio" placeholder="S/." min="1" max="100" required="true"> 	
							    </div>
					  		</div>
					  		<div class="form-group">
						    	<label for="cantidad" class="col-sm-2 control-label">Cantidad</label>
							    <div class="col-sm-2">
							    	<input type="number" class="form-control" name="cantidad" value="" id="cantidad" placeholder="Nro Platos" min="1" max="100" required="true">		
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
	 @include('partials.flash')	
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
              <a href="{{'/verperfil/'.$k->id}}">{{$k->name}}
              {{$k->apellidos}}</a>
              @endif
            @endforeach
            </a>
          </p>
          <h3 align="center">{{$n->tituProdu}}</h3> 
          <a href="#">
        <span class="label label-warning">{{$n->localidad}}</span>
        <span class="label label-success">{{$n->categoria}}</span>
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
          <p class="text-warning">Promoción pague {{$n->promopide}} y lleve {{$n->promolleva}}</p>
          	<a href="{{'/producto/'.$n->id.'/edit'}}" class="btn btn-primary" role="button" >Editar producto</a>
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