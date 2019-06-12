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
	<script src="https://www.amcharts.com/lib/3/pie.js"></script>
	<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
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
			    	<h3 class="panel-title">Consulta de reservas por categoria </h3>
			  	</div>
			  	<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{url('reporte/reservas')}}">
						{{csrf_field()}}
					  	<div class="form-group">
					    	<label for="fecha_inicio" class="col-sm-2 control-label">Fecha de inicio: </label>
					    	<div class="col-sm-10">
						    	<input type="date" class="form-control" name="fecha_inicio" value="{{$fecha_inicio}}" id="fecha_inicio" value="" required>
						    </div>
					  	</div>
					  	<div class="form-group">
					    	<label for="fecha_fin" class="col-sm-2 control-label">Fecha fin: </label>
						    <div class="col-sm-10">
						    	<input type="date" class="form-control" name="fecha_fin" value="{{$fecha_fin}}" id="fecha_fin" required>
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
		<div class="col-md-12" id="tablatoda">
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
							<td>{{$us->name}}{{$us->apellidos}}</td>
							@endif
							@if($us->id==$reser->id_clienteFO)
							<td>{{$us->name}}{{$us->apellidos}}</td>
							@endif
						@endforeach
						<td>{{$reser->cantidad}}</td>
						<td>{{$reser->created_at}}</td>
					</tr>
					@endforeach	
				</tbody>
			</table>
			<img id="imagen" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAANkAAADoCAMAAABVRrFMAAAAwFBMVEX///8AAAAoLzn8/Pz6+vqOjo6ZmZkeISj39/fa2tr09PTb29vw8PDr6+vX19dISEjk5OTPz89YWFiHh4e1tbXIyMgyMjLn5+djY2N0dHS+vr5sbGyCgoJAQEA6OjpeXl4lJSWrq6ugoKCWlpasrKwsLCzCwsIeHh4XFxdxcXFNTU23t7cSEhJ6enofJzITExMZIi4AEiJZXmU/RExLUFdkaG44PUYOGid+gIYAABhHS1QAAAwwNkB9fXxwdHouMjhmh3eSAAAgAElEQVR4nOVdCWPjKpKWWrJX1hX5duz4dpzEsTvp9JXX+9Lz///VQlEgkECCdGZ3dqZmXkeWENTHUVUUBfJO+85H0xulG6dXuqNhZ/+4tUs8vFxIAcPGNPuBt/faKbBII1FSEMqcXgldEke0gCRqTrTzOhY5RU4Fez1Sbq9weCEMyf8D60LS3rTo9eLmRF0rZGHYko1CQa9IksQSGekOYRARVA61l/YK8r+PQOZFcUvTKxT0esk0mVqlDQkRYHHg0uGzXq+Y5i0s2SALAlKlDiVHeS9JcptxFpBuSBssiiIXZFNSdb28pY0tkLHqdKjUMKNk039DUmcB/GudOaU4S9Msa2GoHRnPwBpaUPnbQHR8hSEZxnbJ1YxbGGpFFmiuPuoFEB1hiA1mWXVlsj9DFhiu28ttfSGICDT6P7cCbPNvQRY0/KoR4bGSwvwC6YURgUZwudWdPUONyGr9w5xTQFVDvT+ZXqD9kIj6mnZug2bPELGtzMg0Hd+YUxTqNYPpBWiuKKxXRSM2B4aCButK+5IpJ9ICdTbZA91NkIehTtY3QNNnZUp/NCEzvaG/HYRx4IUWrMaP9N+QinqTDWGuPIfbodEiNled7kkAMi7Ut5rK6vDggYYOzHaiRS5tTwiTdJw5DA98q34raJoQyC+E/hGsqqYBpe11TRzpeATZaC3S9I8JpIjKuoYXpGc3fkEyaLbsHQWLjiHsjdZqqJ6AYgpBglu+UfiTdiuxypCDNojoTI8MjzkbZ4EhmTEnkYbK7kgv5gxlr/wblwKcGaKWKPmX6zMpJ0vzDf9QdRsEBtmhLXvv+7l9Ae4MwRCOShtEFOxk0gfQ8HZzEF5C3/evPG9sy6ozQx6zRSXriqjPOLWaVomcQmqrRyZpbyg79H2/7+WL9uRRnE0Le3+KypCEjE6Fe1ZTYZEVtY9cvD8RSNA73x943vrSmjzJk6SXODIUopSW2ywvpknPzn0B6WFq5eByAqOZ/HsijZZ6id86my+SqRMy8H+RuoYfMjIXl1MI+USB20SfqAhS7Iwg21KA85bkwE/PWoCQIR+V0wcFGXU52SIjJgflszT+urcW/i144YEgI6NsRFuukQrCkC0y6iRSGKogS3IrZLTFwfIQsiO7Am7bKKA+qjVBtiGvwHBrooJwlFshKxkSt2RkRTHNUiv3GLR7AJ4ZTL4g3FKLsJ0CoqoJRVRl+82yP8vSuNFq0zHEWSqRuSg0UkFipLL3Usqtb6cyIOmUWpD+siGZA0Ng3HGG8IVSU0vp2jKiQywU0p5xMPJ9q/4IvZAQ6fVbUGxGbh2MEDBepRk6veDIHAxH8BEqwh7SU4nnP7bxQOgRkBG9eSR/jErNgSGwW1XtwzR1ENds6aZpJ4j6iqyn6WPK766RBUYwJH2SwZj+NZbjwlDdy0znZ10XTw7UTVS3FGl62gTXJg6kpADs1kNkWkXswBCdxMa66fzeO7hMYWHqE2lMYJq+Tzpkz8BBSXNA9uDh0NT0X70nR59bEDL/ef1x13t0cFKBUaafssC9k7/RMyDRyWeASH/R91+TJ0fLUMCWBjSPut48CLTGgyYnav7GQUPJROwNtQ9LSgAYVWdM5tSQmYeUliHj0lvX29rnBP4poyrvz4beoXVWyeQHjMd7DTI3xw8Y5YY5VNczV7I+J0PiYgOaeuZvzKx5osmoDZfD1UEtoFG+65xsRoaa/fq13+bJWMrYjFr646xssiFcKqq61ZFTUwZmhprXYtScmsulPK9A9pvtCmwnsPGZ9Pcr+rWN7BmyXz9rs0z7qJ0u/sac8grQQKuCzFesfavpirUVaL3m2W5y3xJGb0jCO+Z1i9P6G49lk0FyJv2tGC0ZsnzBYp06UPMzZ4Wdqw/9MU2jmuVPQFOCEhnI+6B0p7UWUHJEqe0Fu6iJyKZcasOf6EWH9McsiuvqYe+Xc50NXILKCcQ/dkSmyITapshWkS5xbFXu45kh867Ob2Fa9wSw6QsbZTu43CCrbuEgXmLj+bFCllq63o44hIrBQFcuU9J0/sImBuWU2ilECCLWkuRDkFF/jlWRE7/r0RnuYXCqN0LfL3XZgyoYYzds1D/S6vmxRWbXW3b+nRdFWeytNasSK4aM1nW/vGQUWVYdoykBlnwEMlvhCJ1sHBMK0rq+PjA0V/R6ApfCtxBYVx2jjABLeh8Qd1X520QP/nUAjuBHf6O2Akp8mI/tSuOxzNg+sMtOTdjHXVlBI90MBemi4uJAND55OJUGnJyty7oHXPyRdaUUZ1H0hBvv4ZPaH+8ZHAp3LTeZzJ6zedX0gkvclU3ROzaQPNp8d1JylBkU7ZFdzXT5W7gWbdM7xV3ZeP5KiTckDSTSdxFZOeBybf6NBYSxA0NucVcW0B7K+dmEtBDPYiHGVreUkdr4C0O+1Kmo84QbGWpCZu/5kSj3n7g4Tvz7kLO6ZHjm3PrwR6b8TU4qWA93YMiMzC08qaRVuXDRpQKD5TPhlhVaxb4xMtlQLvW86ZWeIR8jMjOAFmgHfy2ur6hlCKwyZLd8WiYPwVr+WncHhP1Ye9k8hkyXUxP7zcM8YjYvUObfYYjwCq2OwldtYUtOaSREZIzN0N4GZLUnbcFAjY8vYBYzemT6OkAd1kUPMSjshvwrPyOIw2uwwHQMsbirmkuojZpS5OC0R5qhvn5DAbKTlZlN9tAPPerAbbITawgwoszJR9We5krypsYoKpk93OMCZGSdPcQLqoHU7QzRHyhBnG2cph45kpdkxuxHjzXVEo2sbdKyPCpypyEkbaF16hueac3T1uQ2Q4sUL+IbkxZ+lSYP26ZpMeYe2rSX8gZnTFqnhn9sA41o2mmWpalODt8oPu1bwHldg0bo6aZlNTdq8tzX3pD+VfQZ9S302te/yoxyMmXXRlkkwiymlIN8BDt4tamBWxqxBaCeQ4fop0C2v2RkvaJwQdawge7ky7e7tD9GZ6KobyaahjMuBlFWPacgIdkTqLQZnYM7zNoTIN2TkRRTdex7y3O6oxb+/dK/qiMzyckg1O1VaKQ40MbwTHtJMm3b1SUTCx7SMuWfsajtxl+JyZnvD15rwPSRFnTzVtgSnax7TYsso4zmDtseCxo2qO++N2AWJ0w/z6RRVRto58FDd1wvFEwOGtzl4jz2AqkqJGRpTt14Dsii2LjBrSBWRrLWiUM9zdSwOYgEDjDGw0FaS/8qcVdumwObg4dO/sUeF6V7RZDQDa1CLFprWOVvPY7YElpL8NCh5PluNVjcdLrb+XGcJ9MsimLgmvwlnX98HO2G1yc6tzmX8j/CuGs3jlTe3hGdZJM+vz09dHaP/USziKanuPc4lFSbs+enxhG3GxtSWRAtOR9cCVpfrReEZpTW6/WViVYTQavVcrlaXg3Wy/Vgv5x1rt5O8py4jaP6dEU7i2nJKEvyompUBYHbsDIOt+vZ4mG59h+oTpcjKlpmjPVbhh0/xoyK7YIJ7utKkHj2Mcj81cVfzgZvIFcVL3PjLF9zz8kPUnSeJB4qdtXMwKojrvNg4C9w2UYNmnH0zDT4rqo3Dkv/rX/sCtPvrpKizwI87u7P53cjezifVqRTQAaj6tYBEzSzh8fqBTLNv2OtNOJscHdHMhoOqL9qi8g2k9VpsHi4DIed7m47ehz3k34/p1v+i6LI+4LGc5lGB0Lj/rH/2GHZ14BFsW6bhEluNnpSy3dyonA2McLlZiDYhiHTyDOvXG7R0vl+s1qeBuuH65tOh+CdH/v9XjGNawv1AdaQL++JCLqDydmXHSxlcgPZeb+B50Lkg5UqRU+BS6ARWRPdbSZE3s8ebkgj9yByuooMK/PBHphddBIgGZVIuQebGntjdjn8E2QyzYUskpFh1jsHDW6zygRrDEu5ftDWpaYeOhDpmNt+BLK+cCPLyNikAbaIWgKzWRnsY11K2ex5FQp5cihB/hkVokfIASUn/lAxcBsZt1inZutdSjZo79LZMPYT2jH7/gdQLLKRS2R3zspkpMXgake2pVlWgrqxdejsEqUJNWYL/wMo5DlOpPLQwEG/UUw0SC9v2S1kgYzYA8vbSog2thkdCSjIqDsk4txtlo66+k7YNhsRNyI7yFFMobUVE23R6/0xsoS02KRqSuG6Jb2UQo44T/7KEdiGu46poOIt36mXt+XIpr3kz5HBOLpfqvkwtyiEj+HYBidDOY2+rTsWG+j+zkd56K+FspR7CVZfzpHRkLI/Rgbc3p7VfNja7J5eohkJt4XddefaHSe8uW+Em1wW+lgIzrGjHvWMtm1IbUXG20SWRGxATSBv1o/u4P77Rcgdv9jxIISNVF7Ibp35T/Bz/jEyXDrPZCFLBvSqk0sgaWg0pZX/pzTkF28SD2whR6wSf5DUR2SJnNN4Lnx3KI8xnq9bZfT9JC/3Yi/fVxD9oaZGd/XIkBN2wAfllx0NLvvO9VL75GbfkQtDoTKv4mmE1hoPUoaoaHNCU59HMw6MODanm934hv86d7hvOT3cqgkv9cUZOVBLdVG9wyKmSzwZja/G+jobcpIMYkpHGYvgdXdE7cNvdZUdmfIc4U0WwtP+aNftdLf4msZh3ADNdHZSCPtBg5LXvsQKo2L0JlZWJg/7x3waljJk0kl4pZTGBJoSt0LtY24FV9STcmUn7q43quqQzS0JmwnZ3OjhQddz6qv8YU75271fpyd2c7UHDiPGWckt0+QrsdwjuEpZqzxIN8OM1GyY9nel5+hpttMsqJigbfXI6LYuj62i8qEjRZBG3dUAFpmD7E0Gdl6+jVfLndA0MAjRJApSnDWIWFW5J4GI7RpYVSXuZLC+sfFoH7TI2FlIbNcjn3WJQO3Ay8pmwB43KvLeNJbKKXazlPqNTyC909GaiPGs0oRE5Y762Ahj2W8alfcpoY6bLdan9aJzqB1JqYMWQptVn7C9tyIcm/f2x/J5mRZNRdUzOO0qHt45HY4L3HsmYgSLLesNayYlF0Nxfy3f90SvMW+q0MgRPK1GmYFDg8XSUXbCGpxKiTixwHtl42ofDTK+I34LPzJEhtVVSMu6gAkTF6fKfY9PfZs22FegAfPVs5NwJ6ey/5YzIZ15JF6Y1etzwTljEwRmf1FjiboBsO9HivwpXVKBMkdgC73oPTh7TVQioPEIdKv/Y2UtBlBVzh4ULvurek6Sg6KGjNT6uH84le29F6MM0qxFyj1/F7rAQMSOAG9JrfBGaPTkVbpYKs5Owvv0lA2IVpBJuG6kPSGI/USFlTrlUMzi1ZDXPk0/vmFlsQwTEcbJa4Ypz556fyw3YCs0zdlJDDA74LP6lrASJqVc4rGmy+vBSvZUl4syd+ttht6EXKq8ADdC0j7I56qM7QCEFdWcXJmsy8L3XgtB/iyYiXKpRCexw150sUCiEjeZmtP66ma5OMvIoJE6QTaFUcYUPfNapzSciU709tg0XmlvQQZdUQvc5+gXWYiKpSEgpmSIxuSijJDtRjx5qPpCdjxI0BQBH3g3l6uVL68uUJ/aqZyCMGaZAqABJ/QYYYaWbVXjHZ3OJZioWMr37ztJjKPR5liVkIVpsZLl864COBtYSdsfTpibtDRbpSKydHi39GVkPX+mrA7dS8MIjkLq4a5+HrqD2vJa1MJBevF6PSgiFM3tcVN49gD2uXKdOoSzQ9SuGDJpAJqk9ADzfhGkcXrZ+AqySuzcWGoGdhRSzt2iqJ7QwKCT8vr97/4iibFjNu9+DNixzdIxIRiTyiKBaudgPsqM5QIaDGa6zyyOJufGYh/K9CKaiQlAbqyh5HsK8f4J7zNP8dVrziVSs68KokdozI+QfhAhHQV4QE91jDG7hk8rp8IPM6QhG3Eah9yrZECGy/I4A8JoJjZu+IyOMx7jfS4C2aC7Ovf5PL0xjJgdY68c78FiCyAWHiJLFGzovhFhmJGY2w9pv6NiTruiLAgbJMDi6bl1GTqiuJAJ0BqJmcgv/R9YjVNU1HcNwPAML7YJgyOgyEI4EwVjgWQJ0leZ8CRvwB4tvWUtidffn56UQcQ6GM8XO7UYmazVz0H1PtZZiPf1806kKAzKE2ukaFs67oLyEKwS2q7eICJKDEUbWlciIKy/kPvfbdnBgkqmIsclMr6rdDp2f8PbfaViUWdoIPsidUYLp2iEYSjvyxBvoYWgyFsxxU3kn6LDnuXfaMseFU4WyDGnCb5wXbnP2qzLkZ3Eg+zYXSyfJJOEyXp5jMF6JpmhhdUDaHiPxAZSnUl8mjGRwQuliK8w+TAWHUzKfqU2QcT5PlU6HYy/pXDECIMYTRKcH1DedYc50eikXaAJaWWcDJSOx1nhEnJXL0eoJ4ZMLNkgsP5w1feeVGQwlqml/aQiA5E4CAUy0WZoDa05MtPZSbQ3ms5C4sgqR5kIvUbf2vIaxZyV9aAZgoBn6Z4qdb4isfHS8bYzvNkTC+Me+i6/TzrbzcOMusVWMItHZKIqcDyi6U+1lfYAcdpmnnHrE86TqlEY3Pcur03zdlGEDut4A/nBgK+1CP/pAqUP/uQ9YjJEwYXIRGNiRkzJgqHoaQ/a7nrG0OvSVqx4bfnaJu0guJgAY4li63CgHp+UYE8d8Xc4Iv98e7relnIX725ub5frm1E54cPBes+PzdiX1QouAFNAf2N0Eu931WMW+eJdULojqUKj0FgHZoILzQu2BoumxIxvP1ZPFgrFtuRR9T5fkI9UdzyDDoc5OSPzytlTpV25wZOUSRiWgDXnhtVuwsFIMPfcqwISAIXwfEbG8qBei/MF6XS8sKnHoN2J/gI5GAP6m5GJaOBKf8RBQhXVwpdLYgIE7QhExgxq3PjeE6O0QGgZ3DgrIU9QFXDjHPBegbuUx0qqhl1OLatMwlBUo84X5U0+FmEQQ/3ecgMpkR+h7V72Lmwcvm5Q8K6PimvM7wcYd/AoczTiwMzUgiwV3rNr2d2H9UsHF2eIXme0p5THZ/Da7pav0KrmHqChkijzBtixWQZcTE157TI+mVvl2A6sdWUwKx2Aw1Je7csuweOHr1lrLOT5DJfstBHLluet4S+gMdm4m1E9jtU4i8v7a6F7TgLYjHWKloDw1jXPUHIfLrt9tqWCIWNLyfx5b+Hf7qHMgBfMh9T5CE22RBEv1gf9YRIyq2oZB2m0Le/3xP2yvxPs1MZcYC5tke4WcVfjZbn0T8Nerk6kP20uc1SPeIaVf9UVaxGBx5RP7Et0U6quG+k27ZtPWy+lh28o94kyPIMBxwfmzcq/vcAKOdi5LcCsznRJ+gc5Mpp0h5HU52BArHayWyfgR10JQ2w2Vxg5yvvQFkciuQmy+v2gLMA/X2/7wmEQxe1briyQhfk0KY6H/WW2Xi9uduPqyeD7xbZyiwDDBo13i/ViP65bP/nuer2evXUfczoNTtNM3L+U95FuZsNH1R0RW5x8b4EsglOzXT5aVzaaFcVpmtqdqCXI4jAnC2QxfKitLcxJocD+KCSA5YgLlh/aktggK6ZZltVZDaf9x13n8rBYDygtFteXYXc7mo/zIrNnNYpi5qPUvWGozsCUXiaHL7vJ7OTbRSWMo0bnp6XN5yrEmYE6Ke7fdvqGuWMrtHd82a3YsYk9jb9H83azqcfG3e4sx1pQuxB0B0Kxskm2Ib1Mrl92i7fLzdthXKDYLWNtwzid5v3jaLe/ucwGp2HutXeYpsKAmB59MiX6E+uq8m5xqRyvXkabe7rvqDpDU19Ap6uCzCZgAqhlJ4L6E6wl5cwSRPZIeYo0RxX/GbRUQkbVXubwUTyns22Zw0YZPWgZ7qiXVnt8pSs05QWcdG7oNSuglp3ZemzyFlReQk+GIvDQVfXGPBJtnFqR9ILsHjZ+VsxUgMP+M3ShKukR7QAO8wu0PiTHXexywVueO6766Q+dMOTvsGeQh4XIjYa1escONnI5i7yBRHq0/R/Aug9D0wnW+vwdzk4SIb6dQnQM4X4JiNh3OxK0gXjhV3wUw1m2ZltRW6P6vbnaWpiWWnjJlSfMMG7XRDiafEjZvDPsGD55k2+Hw53uo0K0/KLPvbRzMnOIm4920TzR7qc25FAwj8T9UJpSrE7n8/XEP+imFeG4M8A56211UXR6uFb9Ieqb83JTw+xcWHw6rt42uj3w5qrp7/a7vpLm+vZmtprpAmzG6mZdGVraVU5Aqe4EzBf0kBTRPzpwPoPb2UmB9qsqdgMeU41uFxTBoGqVj6unt5Qre9Gw8kh11BbUpToTIbiTFT2ozXCkXBWNfFk5YcgaGM8pnfizwZVqmQTMLbROOzL7PDxyTI3n+UF+dC+9DP4c6AKwZDC59vee/ji5OkfKXznSxQkYpWl/d3N6uBucaND6Q6e7JdRZL7IYGixTTpzgC1Fben1dLnUAlRKGBdHBJXWirAbrWWH7UTz4InfKDyxRopOczs5NOht/5l+tlsoBJ09UvAAwyPdBehRTJzyTd9TrIaMW+/Ygr41YdJk8+Kez9XEV3jRPyq+oK5raQSMdbu8fRrvxbn+5cJfd3entAHKCDX64lDddHEmvYpqDrWFIwZt8cYwZ2GgKEEl8e+23f/9NQobhTzVkQeyldu2+u+oUMJ7KSJVyuxhz5+NkR2KfjJfg+swwUqLtyT3QzMxmzYgMpf7ish4srD4bhERPfyp0yNTzopoo9uDzVRAMhMyVcv9a5o92THEYpZc9SfFnVES+oSMTND9WErAQevPJYLIg/d3K5YDIekmhRUYPf7RChp9mYmYcD7LkD9UYHXqJE4IZFXwUCSoAqi3muBwBSpKZ3HTJkIYKHO7f1rcz04ebDMikw5zqstECG8Ji2pPbQNzgQiOZGU10nC3RUywiI7B5accM1mU9sBchComaahd/+XZ9r9nQbybq4UvTWptZOk6g4CgoQzD4MhEfDx2pT4EwGWUcGa4csRLpwtkDjyehyJZlNiT/6WAAG2FH7z3MSVhXto4ThiyUNMSV6GxAbFV2wxK+7R+LcvddIdfBvkOX34cCGbY1fHAljMnMbzbAtnc9OolHJ3WohHM5dDNi4fwiETYSNySYoStHWuAk4YEzLy++40pczn0RJ49FM3sjpgonFgzVk6B1FdYdGMacMBhIicnlq0BsZGFUnwbZkA9J+btk2GYZX5Gawze/SGVfMTX51sKQgWMWnaR7z5RTyKApbgG+7jqXf8nhiAUHNBK9UdTMhY/KA288Jpt4plxNNkPTn22r14SGnODzrVVfDkruvYKz3qg5534oFTDgfRDnPDGGj/LVe7Es1wRN+2zvzas7KhpSwwF9bG4rfWzhjY8jeA91rzQf23Ks2Btx2wGUMEGseIL7kPKSH0cJDzkoc6ltzmpmlUYBGkxpTXr2ITVSobu1dAS28oUKsewupjV8kfZUDaGCTR48MRuLt6Tdx/JRe1Lcy8hfDsfWbQC90dTOul1ddJzNoZ6l2JdcGVpXct+Ectmdbbm4m4pnOW/OnLd7mB+lybj8BRMQTXX72OxvbLA4NZIlDOT9IIy4rmZ1ca20YCDW4dMyYbmXgRleF6HNriCPrUAmbxlh2qX6xcX3+Ijrr9Gtn8jMXrrNhUaosCUCKNjoginYhrcMJ6b8EqmjQpHCnyA7vZhQUeOJG5S4y1oM+8GGumKB33FkNA2Xajv+BjMNQaLwiShfG2DWCbVe+soTcfyeUgyrFzmq+Y/OTqp6fvIShSAUGgFLhcLxjAYAkw3M9catZ14maxuq4vkUFRuJh88oi4ILKSeJo3ciqx0aynr7SUnDkHHlzP06aD6AZJywt0PeFkwnxKJxRbsvpZf8yglsLJinHOHN2tsmHiTNsmzKOxBTy+pXbhgyHp0tttZB/ReiWSjxzV63wBXI92vGIcfCZAaf9CkB9WUoOeBqsbisoibIFJwfoRKq3YmVca+iFc44KseulE4lDiGiAVUwtqjaDjzJYwLCj3srlbhKHMFHOJz3I6KTonxaIsPcFVWBYl2Y8OnkgippndOmuJLcrCJQzt+BX46Fv9NoIyEPL6mQQqqMR8t6T0MtPiQ6KcqLXsEPhxlrkGF1C3sq7V/K0G5/oGogsTub0PkGeykErpQncKzFpmpZufAaJPojDrVLdc7IevR8qUxhTEHGouVKRZMl+YKZSOfZqBaswv3iq450Si84BEuX8mBXMLWpfBUCa5DadR8TnRTRbWM5Ituy3JWX3ipgs16S9bvd3chwiHj/0N0e1cWlGLpXfNwNO7t5QrnGricnQoUDS6Dt3dFGNmZpHHMnK7aZUpdMYJcr82lBycHdTE8UqEkE1jllVS2WjlFxNpNrdBJaQRspAavKi+EFCwq06dmIlhfXUDEsPG36KrlGJ/GFBmn6xUxgzRTRcrkqqF8Bgb54ku6tKiPhzzR1ULnmAbSl0ErNxdlAU9IrLzDRf6j8ljXBn5xMGdR+4fSrPPkB+gic4BtEuhcaqfEbPJBzubbGZ6SSxfV+i1jj09pVGo2J4j494iF2cIKZHitNeCvLXD4Olsb0Kjl9eZveEVYhTh8HrC+GhnjsRmi6h/K9XGqjlC/bbM3pFXKITsKMxNI4VOaBa5jI8PHbhg6jfyLfFbl7fb5Kt7HLxSk6CSkUa+u33T6I5ktIl0sjQ3SSMSOb+wfq2u/mh9Lyqi86GT08hjPKzFWdyl9G2Vzm1BoI4VshTtFJlm2Zd5QPsei+m6Yv9j1fdvMeWRWursWxErAl0WjwtI2nlmfxeMhM5NXeEMCry6xbPTuptViWYJqUHx0hnTBq/mRNvYDmEjRxjMRkazCCNdl1K2cnmdIZE0RwcEVr8FDQ9LOxAKv0GnWji7uyMB3KokKYUbRHbDjaJoFj+gqCQPvtEStzj5ccxrCSZrFy72xPuqavvFD7Xox1CCmkg7WZdwUPfXz6ygvSOjU7v8N+WhXAl+nD2qKTkdKkKKaZ/SetQsLO1OVzSmzehgjkL07lvV7P5VtaePKN9RsZPUbYvFhUoxjOgHHZahRK2/yVb2lRH5V9wbCYZhtCQqFC1sUAAAPBSURBVCnt0eAhB2TAkAuySP9ltywpeoVtwSEuprl8mDAlTVD07HtX3JOcZlYUSRvflDbrFVPLzkIQQXSS/T4zjyKjTjAXZJLTzI4iw5fdSA3ZIWPRSS7tRSmFgWyPTHGa2VAAHybEH/KX3Yrp1HJXIjvlDIargyxl0tdBNk6zNDKZ2boClD+aaFsLpRuDGnP87tp79ZntC5X0mgjp9pzA/o0cqsIx/3e9IKen15rv5rblxL8BqGZkX+577EDH9F5gsPXNOUGgCx2mlaOK3MptSk+Hbuqyz0yfIDDMz8yuAtzuUJWKLSU7zM/Y594dJ3T66CSnL7sZjypqLNllTg37zBxn+UZvgaEEzU08qshxC52Td8Ro15ih6R80+K40L9BTHo0WsKmZja2jTQxHuDo5wQy33fyNcACdkyOn0d+oGd90J6xb3Znyd/URN5oEOlbNqevpw9CLGo023fgzpXWMTmozFa3VR/15yELKm+extRUOcwHu0UnNVFOYtunZ7KG+I7uaPjD/Uslh/czdKHKqCohHs5ig23LkHJ3UXrLjCyxZQJ1gdrMiS0vZYgU+sMhGfYHOSO03fEFC2FNsvefAJhGek9pI+N1lWwqKnFIUOLwTB3Acsi1FUWtab+/9Vzv9+GGRSKbv39zSD1arb/81s0//j6//aE/kffon0OfPjunp/x3faaV/CrJ/CfrPQPb1q7h8/lu6/1ym+PHP58iBPnPSPRTIPv/8a3T4i6b6+XfmP/5+fv75+RP57+fPv/Kvn58JuuefX8bdn88fPR7eTy/D36/fX4Yvr78/v7z8+vby8vWF/MebhyN7fu3vdsWYptruvUPaf+n0X790xl+P89/e8et29/y8HX8/dl52ry//V0iq9PI6fO28dgjPPwikX+T/38lf3q04sq/e9+F2PIwP2+fwNXgtRr/D79734He277xE3d2089dw+tqfb6OXX/86PVLujdCV5P7EkX0ust12+yU+7H5GP2K///17MA5ec/8QjX9mf3e6/93ZPf7lz73dl/91/hvJPDbEOPv7h7c9PMfb0X8Hf3uf+rvv6d+v33tfvn4pXrPfP59/hYfx5/1xFH771xlnpD++fKeDi3TEl28v3769fKX/4TNE9vkl8kb77ufkVxb2v8z7L+n3vjd+Of6VeMmnTvTpUzr+VBDor7/zZ2M5//v06+uPXz9+/f3t61dy8RXoB5fqojd++fKTCMAv9O+nnz8/f/n88wsRjJ++fPny6Zn0wC/08vn5M7n1/4T+MzT1vxf9+yL7H4PP8RxQTTX8AAAAAElFTkSuQmCC"  height="100" width="100">
		  	<input type="button" value="Export to PDF" onclick="exportReport();" />
			<h2 id="titulo">Reporte de Reservas por categorias del dia {{$fecha_inicio}} al {{$fecha_fin}} </h2>
			<p id="diahoy" hidden>Reporte obtenido el dia: {{ $hoy = date("d/m/Y")}}</p>
			<div id="chartdiv" class="chartdiv wide">
			</div>	
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
        buttons: ['excel']
    } );
    $("#chartdiv").click(function() {
    	$('html,body').animate({
        scrollTop: $("#tablatoda").offset().top},
        'slow');
	});
});
var hola = 0;
var ndesa= 0;
var ncena= 0;
var nalmuer= 0;
$('#example tr td').each(function() {
   if(hola%7==2){ //desayuno
   	var customerId = $(this).text();
   	if (customerId=="desayuno") {
   		ndesa = ndesa +1 ;
   	}  
   	else if (customerId=="Cena") {
   		ncena = ncena +1 ;
   	} 
   	else if (customerId=="almuerzos") {
   		nalmuer = nalmuer +1 ;
   	}   
   }
   hola = hola + 1;
});

var clientearray=[];
	var countarray = 0;
	var cellVal_cant= 0;
	var cellVal_cant2= 0;
	var cellVal_cant3= 0;
    var oTable = document.getElementById('example');

    //gets rows of table
    var rowLength = oTable.rows.length;

    //loops through rows    
    for (i = 0; i < rowLength; i++){

      //gets cells of current row  
       var oCells = oTable.rows.item(i).cells;

       //gets amount of cells of current row
       var cellLength = oCells.length;

       //loops through each cell in current row
       for(var j = 0; j < cellLength; j++){

              // get your cell info here

              var cellVal = oCells.item(j).innerHTML;
              if (j==2 && i!=0) {
	              //alert(cellVal);
	              //clientearray[countarray]=cellVal;
	              // countarray=countarray+1;
	              // var cellVal_cant = oCells.item(5).innerHTML;
	              // var a = { cellVal : 1 };
	              // clientearray.push(a);
	              if (cellVal=="desayuno") {
	              	var cellVal_cant = cellVal_cant + parseFloat(oCells.item(5).innerHTML);
	              }
	              else if (cellVal=="almuerzos") {
	              	var cellVal_cant2 = cellVal_cant2 + parseFloat(oCells.item(5).innerHTML);
	              }
	              else if (cellVal=="Cena") {
	              	var cellVal_cant3 = cellVal_cant3 + parseFloat(oCells.item(5).innerHTML);
	              }
              }
           }
    }
var chart = AmCharts.makeChart("chartdiv", {
  "type": "serial",
  "theme": "none",
  "marginRight": 70,
  "dataProvider": [
  {
    "categoria": "desayuno",
    "pedido": ndesa,
    "color": "#FF0F00"
  },
   {
    "categoria": "Almuerzo",
    "pedido": nalmuer,
    "color": "#FF6600"
  }
  , {
    "categoria": "Cena",
    "pedido": ncena,
    "color": "#CD0D74"
  }],
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
    layout.content.push({
      "table": {
        // headers are automatically repeated if the table spans over multiple pages
        // you can declare how many rows should be treated as headers
        "headerRows": 1,
        "widths": ["16%", "16%", "16%", "16%", "16%", "*"],
        "body": [
          ["Categoria", "Reservas", "Total Platos"],
          ["Desayuno", ndesa, cellVal_cant],
          ["Almuerzo", nalmuer, cellVal_cant2],
          ["Cena", ncena, cellVal_cant3]
        ]
      }
    });
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
      this.download(data, "application/pdf", "ReporteCategoria.pdf");
    });

  }
}
</script>
@endsection
