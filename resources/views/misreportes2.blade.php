@extends('layouts.admin')
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
	<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
	<script src="https://www.amcharts.com/lib/3/serial.js"></script>
	<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
	<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
	<script type="text/javascript" src="{{asset('js/tags.js')}}"></script>
	<style>
	#chartdiv {
	  width: 100%;
	  height: 500px;
	}

	.amcharts-export-menu-top-right {
	  top: 10px;
	  right: 0;
	}
	</style>

@endsection
@section('content')
<div class="col-md-8">
	@include('partials.flash')
	<div class="row">
		<div class="container-fluid">
			<div class="panel panel-primary">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Top de los 10 clientes con más pedidos </h3>
			  	</div>
			  	<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{url('reporte/clientes')}}">
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
				<h4>Reservas</h4>
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
						@foreach($producto as $pro)
							@if($pro->id==$reser->id_produFO)
							<td>{{$pro->tituProdu}}</td>
							<td>{{$pro->categoria}}</td>
							@endif
						@endforeach
						@foreach($user as $us)
							@if($us->id==$reser->id_chefFO)
							<td>{{$us->name}} {{$us->apellidos}}</td>
							@endif
							@if($us->id==$reser->id_clienteFO)
							<td>{{$us->name}} {{$us->apellidos}}</td>
							@endif
						@endforeach
						<td>{{$reser->cantidad}}</td>
						<td>{{$reser->created_at}}</td>
					</tr>
					@endforeach	
				</tbody>
			</table>
			<div id="chartdiv"></div>	
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
var hola = 0;
var ndesa= 0;
var ncena= 0;
var nalmuer= 0;
$('#example tr td').each(function() {
   if(hola%7==4){ //desayuno
   	var customerId = $(this).text();
   	if (customerId=="jose palomino") {
   		ndesa = ndesa +1 ;
   	}  
   	else if (customerId=="alex cordova") {
   		ncena = ncena +1 ;
   	} 
   	else if (customerId=="almuerzo") {
   		nalmuer = nalmuer +1 ;
   	}   
   }
   hola = hola + 1;
});
var chart = AmCharts.makeChart("chartdiv", {
  "type": "serial",
  "theme": "none",
  "marginRight": 70,
  "dataProvider": [
  {
    "categoria": "Jose Palomino",
    "pedido": ndesa,
    "color": "#FF0F00"
  },
   {
    "categoria": "Alex Cordova",
    "pedido": ncena,
    "color": "#FF6600"
  },
  ],
  "valueAxes": [{
    "axisAlpha": 0,
    "position": "left",
    "title": "Cantidad de reservas"
  }],
  "startDuration": 1,
  "graphs": [{
    "balloonText": "<b>[[category]]: [[value]]</b>",
    "fillColorsField": "color",
    "fillAlphas": 0.9,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "pedido"
  }],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "categoria",
  "categoryAxis": {
    "gridPosition": "start",
    "labelRotation": 45
  },
  "export": {
    "enabled": true
  }

});

function exportReport() {

  // So that we know export was started
  console.log("Starting export...");

  // Define IDs of the charts we want to include in the report
  // var ids = ["chartdiv1", "chartdiv"];
var ids = ["chartdiv"];
  // Collect actual chart objects out of the AmCharts.charts array
  var charts = {},
    charts_remaining = ids.length;
  for (var i = 0; i < ids.length; i++) {
    for (var x = 0; x < AmCharts.charts.length; x++) {
      if (AmCharts.charts[x].div.id == ids[i])
        charts[ids[i]] = AmCharts.charts[x];
    }
  }

  // Trigger export of each chart
  for (var x in charts) {
    if (charts.hasOwnProperty(x)) {
      var chart = charts[x];
      chart["export"].capture({}, function() {
        this.toJPG({}, function(data) {

          // Save chart data into chart object itself
          this.setup.chart.exportedImage = data;

          // Reduce the remaining counter
          charts_remaining--;

          // Check if we got all of the charts
          if (charts_remaining == 0) {
            // Yup, we got all of them
            // Let's proceed to putting PDF together
            generatePDF();
          }

        });
      });
    }
  }

  function generatePDF() {

    // Log
    console.log("Generating PDF...");

    // Initiliaze a PDF layout
    var layout = {
      "content": []
    };

    layout.content.push({
      "columns": [{
        "width": "25%",
        "image": document.getElementById("imagen").src,
        "fit": [100, 100]
      }, {
        "width": "*",
        "stack": [
          document.getElementById("titulo").innerHTML,
          "\n\n",
          document.getElementById("diahoy").innerHTML,
        ],
        "fontSize": 17
      }],
      "columnGap": 10
    });

    // Let's add a custom title
 	// layout.content.push({
  //     "image": document.getElementById("imagen").src ,
  //     "fit": [100, 100]
  //   });
    // layout.content.push({
    //   "text": document.getElementById("titulo").innerHTML,
    //   "fontSize": 20
    // });
  layout.content.push({
      "stack": ["\n"]
    });
    // Now let's grab actual content from our <p> intro ta
    // Add bigger chart
    layout.content.push({
      "image": charts["chartdiv"].exportedImage,
      "fit": [523, 300]
    });
  	layout.content.push({
      "stack": ["\n"]
    });
    // Let's add a table
    // layout.content.push({
    //   "table": {
    //     // headers are automatically repeated if the table spans over multiple pages
    //     // you can declare how many rows should be treated as headers
    //     "headerRows": 1,
    //     "widths": ["16%", "16%", "16%", "16%", "16%", "*"],
    //     "body": [
    //       ["USA", "UK", "Canada", "Japan", "France", "Brazil"],
    //       ["5000", "4500", "5100", "1500", "9600", "2500"],
    //       ["5000", "4500", "5100", "1500", "9600", "2500"],
    //       ["5000", "4500", "5100", "1500", "9600", "2500"]
    //     ]
    //   }
    // });
    layout.content.push({
      "stack": ["\n"]
    });
    
    // Add chart and text next to each other
    // layout.content.push({
    //   "columns": [{
    //     "width": "25%",
    //     "image": charts["chartdiv"].exportedImage,
    //     "fit": [125, 300]
    //   }, {
    //     "width": "*",
    //     "stack": [
    //       document.getElementById("note1").innerHTML,
    //       "\n\n",
    //       document.getElementById("note2").innerHTML
    //     ]
    //   }],
    //   "columnGap": 10
    // });

    // Trigger the generation and download of the PDF
    // We will use the first chart as a base to execute Export on
    chart["export"].toPDF(layout, function(data) {
      this.download(data, "application/pdf", "amCharts.pdf");
    });

  }
}
</script>
@endsection
