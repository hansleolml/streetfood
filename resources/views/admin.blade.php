@extends('layouts.admin')
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
			    	<h3 class="panel-title">¡Registra una nueva categoria!</h3>
			  	</div>
			  	<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{url('categoria')}}">
						{{csrf_field()}}
					  	<div class="form-group">
					    	<label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
						    <div class="col-sm-10">
						    	<input type="text" class="form-control" name="categoria" value="{{old('categoria')}}" id="inputEmail3" placeholder="¡Ingresa el nombre de la Categoria!" required>

						    	 @if($errors->has('categoria'))
							    <span style="color:red;">{{$errors -> first('categoria')}}</span>
							    @endif

						    </div>
					  	</div>
				  		<div class="form-group">
					    	<div class="col-sm-offset-2 col-sm-10">
					      		<button type="submit" class="btn btn-primary">Publicar</button>
					    	</div>
				  		</div>
					</form>
			 	</div>
			</div>
		</div>
	</div>
	<!-- publicaciones -->
	@include('partials.flash')	
	<h3>Categorias de las Comidas</h3>	
	@if(isset($categoria))
  <div class="col-md-4">
  	<table class="table table-striped">
		  <tr>
		    <th>ID</th>
		    <th>Nombre</t>
		    <th>Editar</th>
		     <th>Eliminar</th>
		  </tr>
		  @foreach($categoria as $n)
		 <tr>
		    <td>{{$n->id}}</td>
		    <td>{{$n->nombre}}</td>
		    <td><a href="{{'/categoria/'.$n->id.'/edit'}}">Editar</a></td>
		    <td>
		    	<form action="{{url('categoria',$n->id)}}" method="POST">
          		{{csrf_field()}}
	          		<input type="hidden" name="_method" value="DELETE">
	          		<button class="btn btn-button btn-danger">Eliminar</button>
          		</form>
		    </td>
		  </tr>
		    @endforeach
	</table>
  </div>	

	@endif
</div>
@endsection
@section('scriptjquery')
<p>asdadasd</p>

@endsection