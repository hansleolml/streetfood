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
	@include('partials.flash')
	<div class="row" >
		<div class="col-md-12">
			<div class="form-group pull-left">
				<h4>Mis reservas</h4>
			</div>
			<div class="form-group pull-right">
				<input type="text" class="search form-control" placeholder="Buscar">
			</div>
			<table class="table table-hover table-stripped table-bordered results" style="background-color:white;">
				<thead>
					<tr>
						<th width="20px">ID</th>
						<th>Plato</th>
						<th width="20px">Cantidad</th>
						<th>Cupon</th>
						<th>Pagar</th>
						<th>Fecha</th>
						<th>Chef/Comentar</th>
						<th>Calificación(1 - 5)</th>
						<th>Calificar</th>
						<th>Editar</th>
						<th>Borrar</th>
					</tr>
				</thead>
				<tbody>
					@foreach($reserva as $reser)
					<tr>
						<td>{{$reser->id}}</td>
						@foreach($producto as $produc)
							@if($reser->id_produFO==$produc->id)
							<td>{{$produc->tituProdu}}</td>
							<?php $costo =$produc->precio*$reser->cantidad*($produc->promopide/$produc->promolleva); ?>
							@endif
						@endforeach
						<td>{{$reser->cantidad}}</td>
						<td>{{$reser->cupon}}</td>
						@foreach($cupon as $cup)
							@if($reser->id_produFO==$cup->id_produFO && $reser->cupon==$cup->codigo)
							<?php $costo =($costo*$cup->descuento)/100; ?>
							@endif
						@endforeach
						<td>S./{{$costo}}</td>
						<td>{{$reser->created_at}}</td>
						@foreach($user as $us)
							@if($reser->id_chefFO==$us->id)
							<td><a href="{{'/verperfil/'.$reser->id_chefFO}}">{{$us->name}} {{$us->apellidos}}</a></td>
							@endif
						@endforeach
						<td>
							@if($reser->review==0)
							Sin calificar
							@else
							{{$reser->review}}
							@endif
						</td>
						<td><a href="{{'/reserva/review/'.$reser->id}}">Calificar</a></td>
						<td><a href="{{'/reserva/'.$reser->id.'/edit'}}">Editar</a></td>
						<td>
							<form action="{{url('reserva',$reser->id)}}" method="POST">
			          		{{csrf_field()}}
				          		<input type="hidden" name="_method" value="DELETE">
				          		<button class="btn btn-button btn-danger">Eliminar</button>
			          		</form>
			          	</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>	
</div>
<script type="text/javascript">
	$(document).ready(function() {
  $(".search").keyup(function () {
    var searchTerm = $(".search").val();
    var listItem = $('.results tbody').children('tr');
    var searchSplit = searchTerm.replace(/ /g, "'):containsi('")
    
  $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
        return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
    }
  });
    
  $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
    $(this).attr('visible','false');
  });

  $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
    $(this).attr('visible','true');
  });

  var jobCount = $('.results tbody tr[visible="true"]').length;
    $('.counter').text(jobCount + ' item');

  if(jobCount == '0') {$('.no-result').show();}
    else {$('.no-result').hide();}
		  });
});
</script>
@endsection
