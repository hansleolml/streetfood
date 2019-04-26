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
		        	<li>
		        		<a href="{{ url('/') }}">
			        		Categorias de Comida
		        		</a>
		        	</li>

			      	</ul>
		      		<ul class="nav navbar-nav navbar-right">
		        		<li>
		        			<a href="{{ url('/miperfil') }}">
		        				{{auth()->user()->name}}
		        			<span class="glyphicon glyphicon-user" aria-hidden="true"></span> 
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
				
			</div>
			@yield('content')
			<!-- Agrega amigos -->
			<div class="col-md-2">
				
			</div>
		</div>
	</section>
	<div class="container-fluid">
	</div>
</body>
</html>