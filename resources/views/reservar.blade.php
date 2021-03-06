@extends('layouts.marco')
@section('externolink')
<link href="tokenfield/dist/css/bootstrap-tokenfield.min.css" rel="stylesheet">
  <link href="jquery-ui/jquery-ui.min.css" rel="stylesheet">

  <!-- <link href="estilos/carousel.css" rel="stylesheet"> -->
    <link href="{{asset('css/product.css')}}" rel="stylesheet">
    <link href="{{asset('css/carousel.css')}}" rel="stylesheet">
@endsection
@section('externoscript')
<script src="jquery-ui/jquery-ui.min.js"> </script>
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
            <h3 class="panel-title">¡Busca un plato de comida!</h3>
          </div>
          <div class="panel-body">
          <form class="form-inline">
            {{csrf_field()}}
              <div class="form-group">
                  <label for="inputEmail3">Nombre del plato</label>
                  <input type="text" class="form-control" name="tituPregu" value="{{old('tituPregu')}}" id="inputEmail3" placeholder="Ingresa el nombre del plato" required>
                   @if($errors->has('tituPregu'))
                  <span style="color:red;">{{$errors -> first('tituPregu')}}</span>
                  @endif
              </div>
              <a class="btn btn-primary">Buscar</a>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- publicaciones -->
  @include('partials.flash')
  @if(isset($producto))
  <div class="row">
  @foreach($producto as $n)
    @if($n->id_usuarioFO!=strval(auth()->user()->id))
    <div class="col-md-4">
      <div class="thumbnail">
        <img src="http://www.laescapada.mx/wp-content/uploads/2016/10/IMG_1432-1-242x200.jpg" alt="100%x200">
        <div class="caption">
          <p align="right">Publicado el  {{$n->created_at}} Publicación N°.{{$n->id}}</p>
          <p align="right">Publicado Por: 
            <a href="">
            @foreach($user as $k)
              @if($n->id_usuarioFO==$k->id)
              <a href="{{'/verperfil/'.$k->id}}">{{$k->name}}
              {{$k->apellidos}}</a>
              @endif
            @endforeach
            </a>
          </p>
          <h3 align="center">{{$n->tituProdu}}</h3> 
          <a href="#">
        <span class="label label-warning">{{$n->localidad}}</span>
      </a>
      <a href="#">
        <span class="label label-default">{{$n->etiket1}}</span>
      </a>
      <a href="#">
        <span class="label label-default">{{$n->etiket2}}</span>
      </a>
      <a href="#">
        <span class="label label-default">{{$n->etiket3}}</span>
      </a>
          <p>{{$n->ingredientes}}</p>
          <p align="right">Precio s./{{$n->precio}}.00</p>
          <p align="right">Nro de platos :  {{$n->cantidad}} </p>
            <?php $sumrese=0; ?>
          @if(isset($reserva) && isset($reserva))
          @foreach($reserva as $reser)
            @if($reser->id_produFO==$n->id)
            <?php $sumrese=$reser->cantidad+$sumrese; ?>
            @endif
          @endforeach
          <p align="right">Nro de reservas :  {{$sumrese}} </p>
          @endif
          <p class="text-warning">Promoción pague {{$n->promopide}} y lleve {{$n->promolleva}}</p>
          <?php $dispo= $n->cantidad-$sumrese; 
          $dispoprom=($dispo* $n->promopide)/$n->promolleva;
          ?>
          @if($dispo!=0)
          <form class="form-horizontal" method="POST" action="{{url('reserva')}}">
            {{csrf_field()}}
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-4 control-label">Pide: </label>
              <div class="col-md-8">
                <input type="number" name="pide" class="pide form-control" placeholder="Pide" min="1" max="{{$dispoprom}}" required="true" id="pide" value="1">
                <input type="hidden" id="promolleva" class="promolleva" value="{{$n->promolleva}}">
                <input type="hidden" id="promopide" class="promopide"   value="{{$n->promopide}}">
                <input type="hidden" name="review" value="0">
                <input type="hidden" name="id_chefFO" value="{{$n->id_usuarioFO}}">
                <input type="hidden" name="id_produ" value="{{$n->id}}">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-4 control-label">LLeva: </label>
              <div class="col-md-8">
              <input type="number" name="cantidad" class="lleva form-control" placeholder="Lleva" min="1" max="{{$dispo}}" required="true" id="lleva" readonly="readonly">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-4 control-label">Cupon: </label>
              <div class="col-md-8">
              <p>¿Tienes un cupon?</p>
              <input type="text" name="cupon" class="form-control" placeholder="Ingrece cupon">
              </div>
            </div>
            <div class="form-group" align="right">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary" align="right">Reserva</button>
              </div>
            </div>
          </form>

          @else
          <div class="center"><p align="center" class="text-danger"><STRONG>No hay platos disponibles</STRONG></p></div>
          @endif
        </div>
      </div>
    </div>
    @endif
  @endforeach
  </div>
  
  @endif
</div>
<script>
$(document).ready(function(){

  $(".pide").each(function() {
    var pide = $(this).val();
    var promolleva=$(this).siblings('.promolleva').val();
    var promopide=$(this).siblings('.promopide').val();
    var llevara = pide * promolleva/promopide;
    var llevara = Math.floor(llevara);
    $(this).parent().parent().next().children('.col-md-8').children('.lleva').val(llevara);
    //$(this).parent().css({"color": "red", "border": "2px solid red"});

    //alert( $(this).parent().parent().next().children('.col-md-8').children('.lleva').val());
  });
  // var llevara = pide * promolleva/promopide;
  // var llevara = Math.floor(llevara);
  // $('.lleva').val(llevara);
  $('.pide').on('input', function() {
    //$('#lleva').text($('#pide').val());
    var pide = $(this).val();
    var promolleva=$(this).siblings('.promolleva').val();
    var promopide=$(this).siblings('.promopide').val();
    var llevara = pide * promolleva/promopide;
    var llevara = Math.floor(llevara);
    $(this).parent().parent().next().children('.col-md-8').children('.lleva').val(llevara);
  });
});
</script>
@endsection