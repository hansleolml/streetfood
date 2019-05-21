<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>StreetFoods</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
	@yield('externolink')
	<script	src="{{asset('js/jquery-3.2.1.min.js')}}"> </script>
	<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
	@yield('externoscript')
	<style type="text/css">
		body { 
			padding-top: 70px; 
			background: #dee1e5; color del body por defecto
		}
		.main{
			background: #dee1e5;
		}
		#navizq { 
			
		    position: fixed;
		}
		@media (max-width: 768px) { /* mobile view */
		  #navizq  {
		    position: relative;
		    /*Para arreglar que no se ponga encima del "holas"*/
		  }
		}
		a:link   
		{   
		 text-decoration:none;   
		}
		.results tr[visible='false'],
		.no-result{
		  display:none;
		}

		.results tr[visible='true']{
		  display:table-row;
		}

		.counter{
		  padding:8px; 
		  color:#ccc;
		}
	</style>
</head>
<body>
	<!-- navbar -->
	<header>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
		    	<div class="navbar-header">
		      		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
		      		</button>
		      		<a class="navbar-brand" href="{{ url('/') }}">StreetFoods</a>
		    	</div>
		    	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      		<ul class="nav navbar-nav">
			        	<li class="active">
			        		<a href="#">
				        		Notificaciones
				        		<span class="sr-only">INICIO</span>
				        		<span class="glyphicon glyphicon-user" aria-hidden="true"></span> 
			        		</a>
			        	</li>
						<!--  Mis preguntas, respuestas y notificaciones-->
			        	<!-- <li class="dropdown">
				          	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
				          		Etiquetas<span class="caret"></span>
				          	</a>
				        	<ul class="dropdown-menu">
					            <li><a href="#">Action</a></li>
					            <li><a href="#">Another action</a></li>
					            <li><a href="#">Something else here</a></li>
					            <li role="separator" class="divider"></li>
					            <li><a href="#">Separated link</a></li>
					            <li role="separator" class="divider"></li>
					            <li><a href="#">One more separated link</a></li>
				          	</ul>
			        	</li> -->
			      	<form class="navbar-form navbar-left">
			        	<div class="form-group">
			          		<input type="text" class="form-control" placeholder="Buscar comidas" required="true" autofocus>
			        	</div>
			        	<button type="submit" class="btn btn-primary"><!-- Buscar -->
							<span class="glyphicon glyphicon-search"></span>
			        	</button>
			      	</form>
			      	<li>
		        		<a href="{{ url('/') }}">
			        		Publicar Comida
		        		</a>
		        	</li>
		        	<li>
		        		<a href="{{ url('/reservar') }}">
			        		Reservar comida
		        		</a>
		        	</li>

			      	</ul>
		      		<ul class="nav navbar-nav navbar-right">
		      			<li>
		        			<a href="{{ url('/miscupones') }}">
		        				Mis Cupones
		        			<span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span> 
		        			</a>
		        		</li>
		      			<li>
		        			<a href="{{ url('/misreservas') }}">
		        				Mis Reservas
		        			<span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span> 
		        			</a>
		        		</li>
		        		<li>
		        			<a href="{{ url('/miperfil') }}">
		        				{{auth()->user()->name}}
		        			<span class="glyphicon glyphicon-user" aria-hidden="true"></span> 
		        			</a>
		        		</li>
		        		<li>
		        			<a href="{{ url('/misnotificaciones') }}">
		        			<span class="glyphicon glyphicon-globe" aria-hidden="true"><span class="badge">1</span></span> 
		        			</a>
		        		</li>
		        		<li class="dropdown">
		          			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
		          				 <span class="caret hidden"></span>
		          				 <span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span> 
		          			</a>
		          			<ul class="dropdown-menu">
					            <li><a href="#">Tus reservas</a></li>
					            <li><a href="#">Ayuda</a></li>
					            <li><a href="#">Configuración</a></li>
					            <li role="separator" class="divider"></li>
					            <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                        Cerrar Sesión
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
				          	</ul>
		        		</li>
		      		</ul>
		    	</div><!-- /.navbar-collapse -->
		  	</div><!-- /.container-fluid -->
		</nav>
	</header>
	<section class="main container-fluid">
		<div class="row">
			<!-- nav izquierda -->
			<div class="col-md-2">
				<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQzXg5j5QuaNjVgLJAVC-g698TQRx3FPTuDtJ3Ik4if6O4XHslnKg">
				<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQzXg5j5QuaNjVgLJAVC-g698TQRx3FPTuDtJ3Ik4if6O4XHslnKg">
				<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQzXg5j5QuaNjVgLJAVC-g698TQRx3FPTuDtJ3Ik4if6O4XHslnKg">
			</div>
			@yield('content')
			<!-- Agrega amigos -->
			<div class="col-md-2">
				<div class="panel panel-primary">
				  <div class="panel-body">
				    Promociones
				  </div>
				  <div class="panel-footer">Promociones 3 x 2. .......</div>
				</div>
			</div>
		</div>
	</section>
	<div class="container-fluid">
	</div>
	<script type="text/javascript">
	$(document).ready(function() {	
	    function changeColor() {
	        $.ajax({
		    url: '{{'/notificacion/'.auth()->user()->id}}', 
		    method: 'GET',
		    dataType: "json",
		    data: "hola",
		    success: function(data){
	            alert("hola");
        		},
		    })
	    }
	   

	    setInterval(changeColor, 3000);
	});
	</script>
</body>
</html>