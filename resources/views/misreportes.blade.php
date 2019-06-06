@extends('layouts.marco')
@section('externolink')
<link href="{{asset('tokenfield/dist/css/bootstrap-tokenfield.min.css')}}" rel="stylesheet">
	<link href="{{asset('jquery-ui/jquery-ui.min.css')}}" rel="stylesheet">

	<!-- <link href="estilos/carousel.css" rel="stylesheet"> -->
    <link href="{{asset('css/product.css')}}" rel="stylesheet">
    <link href="{{asset('css/carousel.css')}}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css" rel="stylesheet">
@endsection
@section('externoscript')
	<script	src="{{asset('jquery-ui/jquery-ui.min.js')}}"> </script>
	<script src="{{asset('tokenfield/dist/bootstrap-tokenfield.min.js')}}"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
	<script type="text/javascript" src="{{asset('js/tags.js')}}"></script>

@endsection
@section('content')
<div class="col-md-8">
	@include('partials.flash')
	<div class="row">
		<div class="container-fluid">
			<div class="panel panel-primary">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Consulta las comidas </h3>
			  	</div>
			  	<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{url('reporte/reservas')}}">
						{{csrf_field()}}
					  	<div class="form-group">
					    	<label for="fecha_inicio" class="col-sm-2 control-label">Fecha de inicio: </label>
						    <div class="col-sm-10">
						    	<input type="date" class="form-control" name="fecha_inicio" value="" id="fecha_inicio" required>
						    </div>
					  	</div>
					  	<div class="form-group">
					    	<label for="fecha_fin" class="col-sm-2 control-label">Fecha fin: </label>
						    <div class="col-sm-10">
						    	<input type="date" class="form-control" name="fecha_fin" value="" id="fecha_fin" required>
						    </div>
					  	</div>
				  		<div class="form-group">
					    	<div class="col-sm-offset-2 col-sm-10">
					      		<button type="submit" class="btn btn-primary">Consultar</button>
					    	</div>
				  		</div>
					</form>
			 	</div>
			</div>
		</div>
	</div>
	<div class="row" >
		<div class="col-md-12">
			<div class="form-group pull-left">
				<h4>Mis cupones</h4>
			</div>
			@if(isset($reserva))
			<table id="example" class="display nowrap" style="width:100%">
				<thead>
					<tr>
						<th width="20px">ID</th>
						<th>Plato</th>
						<th>Categoria</th>
						<th>Chef</th>
						<th>Cliente</th>
						<th>Cantidad</th>
						<th>Fecha</th>
					</tr>
				</thead>
				<tbody>
					@foreach($reserva as $reser)
					<tr>
						<td>{{$reser->id}}</td>
						<td>{{$reser->cantidad}}</td>
						<td>{{$reser->cantidad}}</td>
						<td>{{$reser->cantidad}}</td>
						<td>{{$reser->cantidad}}</td>
						<td>{{$reser->cantidad}}</td>
						<td>{{$reser->created_at}}</td>
					</tr>
					@endforeach	
				</tbody>
			</table>
			@endif
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

	if(jobCount == '0') 
		{$('.no-result').show();}
	else {$('.no-result').hide();}
	});
	$('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
});

</script>
@endsection
