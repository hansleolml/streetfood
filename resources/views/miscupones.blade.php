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
				<h4>Mis cupones</h4>
			</div>
			<div class="form-group pull-right">
				<input type="text" class="search form-control" placeholder="Buscar">
			</div>
			<table class="table table-hover table-stripped table-bordered results" style="background-color:white;">
				<thead>
					<tr>
						<th width="20px">ID</th>
						<th>Plato</th>
						<th>Descuento</th>
						<th>Cantidad</th>
						<th>Codigo</th>
						<th>Fecha</th>
						<th>Editar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
					@foreach($cupon as $cup)
					<tr>
						<td>{{$cup->id}}</td>
						@foreach($producto as $produc)
							@if($cup->id_produFO==$produc->id)
							<td>{{$produc->tituProdu}}</td>
							@endif
						@endforeach
						<td>{{$cup->descuento}}%</td>
						<td>{{$cup->cantidad}}</td>
						<td>{{$cup->codigo}}</td>
						<td>{{$cup->created_at}}</td>
						<td><a href="{{'/cupon/'.$cup->id.'/edit'}}">Editar</a></td>
						<td>
							<form action="{{url('cupon',$cup->id)}}" method="POST">
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
