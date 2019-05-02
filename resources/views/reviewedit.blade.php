@extends('layouts.admin')
@section('externolink')
<link href="{{asset('tokenfield/dist/css/bootstrap-tokenfield.min.css')}}" rel="stylesheet">
	<link href="{{asset('jquery-ui/jquery-ui.min.css')}}" rel="stylesheet">

	<!-- <link href="estilos/carousel.css" rel="stylesheet"> -->
    <link href="{{asset('css/product.css')}}" rel="stylesheet">
    <link href="{{asset('css/carousel.css')}}" rel="stylesheet">
@endsection
@section('externoscript')
<script	src="jquery-ui/jquery-ui.min.js"> </script>
	<script src="{{asset('tokenfield/dist/bootstrap-tokenfield.min.js')}}"></script>
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
			    	<h3 class="panel-title">¡Califica este Plato!</h3>
			  	</div>
			  	<div class="panel-body">
					<form class="form-horizontal" role="form" method="post" action="{{'/reserva/'.$reserva['id']}}">
						{{csrf_field()}}
						<input type="hidden" name="_method" value="PUT">
					  	<div class="form-group">
					    	<label for="inputEmail3" class="col-sm-2 control-label">Cantidad</label>
						    <div class="col-sm-10">
						    	<input type="number" class="form-control" name="review" value="" id="inputEmail3" placeholder="¡La calificación esta entre 1 a 5!" required min="1" max="5">
						    	@if($errors->has('reserva'))
							    <span style="color:red;">{{$errors -> first('reserva')}}</span>
							    @endif

						    </div>
					  	</div>
				  		<div class="form-group">
					    	<div class="col-sm-offset-2 col-sm-10">
					      		<button type="submit" class="btn btn-primary">Calificar</button>
					    	</div>
				  		</div>
					</form>
			 	</div>
			</div>
		</div>
	</div>
</div>
@endsection