
@extends('components.layouts.public')

@section('meta_description', $informe->titulo)
@section('meta_keywords', obtenerPalabrasLargas($informe->titulo))

@section('content')

<section class="page-section showcase" id="reportes">

    <div class="container pt-5">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">{{$informe->titulo}}</h2>
            <h3 class="section-subheading text-muted">{{$informe->subtitulo}}</h3>
            <p class="text-muted text-end">Fecha: {{date('d/m/Y',strtotime($informe->fecha))}}. Autor: {{$informe->autor}}</p>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <img class="img-fluid" src="{{asset('img/'.$informe->imagen)}}" alt="">
            </div>
            <div class="col-lg-9">
                <p>{!!$informe->contenido!!}</p>
            </div>
        </div>
    </div>

</section>

@endsection
