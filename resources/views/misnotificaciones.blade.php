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
	@include('partials.flash')
	<div class="row" >
		<div class="col-md-12">
			<div class="form-group pull-left">
				<h4>Mis Notificaciones</h4>
			</div>
			<div class="form-group pull-right">
				<input type="text" class="search form-control" placeholder="Buscar">
			</div>
			<table class="table table-hover table-stripped table-bordered results" style="background-color:white;">
				<thead>
					<tr>
						<th width="20px">ID</th>
						<th>Mensaje</th>
						<th>Fecha</th>
						<th>Visto</th>
						<th>Marcar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
					@foreach($notificacion as $noti)
					<tr>
						<td>{{$noti->id}}</td>
						<td>{{$noti->mensaje}}</td>
						<td>{{$noti->created_at}}</td>
						@if($noti->visto==0)
	          			<?php $vistos ="No";?>
	          			@else
	          			<?php $vistos ="Si"; ?>
	          			@endif	
						<td>{{$vistos}}</td>
						<td>
							<form class="form-horizontal" role="form" method="post" action="{{'/notificacion/'.$noti->id}}">
			          		{{csrf_field()}}
			          			<input type="hidden" name="_method" value="PUT">
			          			@if($noti->visto==0)
			          			<?php $visto=1;?>
			          			@else
			          			<?php $visto=0; ?>
			          			@endif	
			          			<input type="hidden" name="visto" value="{{$visto}}">			        
				          		<button type="submit" class="btn btn-primary">Actualizar</button>
			          		</form>
						</td>
						<td>
							<form action="{{url('notificacion',$noti->id)}}" method="POST">
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
