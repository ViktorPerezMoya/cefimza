
@extends('components.layouts.public')

@section('title_page','CEFIMendoza | '.$informe->titulo)
@section('meta_description', $informe->titulo)
@section('meta_keywords', obtenerPalabrasLargas($informe->titulo))

@section('metaog_title', $informe->titulo)
@section('metaog_description', $informe->resumen)
@section('metaog_image', asset('storage/img/'.$informe->imagen))
@section('metaog_url', URL::current())

@section('content')

<style>
    .nota{
        text-align: justify;
        padding-left: 2rem;
        padding-right: 2rem;
    }
</style>

<section class="page-section showcase" id="reportes">

    <div class="container pt-5">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">{{$informe->titulo}}</h2>
            <h3 class="section-subheading text-muted">{{$informe->resumen}}</h3>

            <div class="mb-4">
                <p>Compartir en:</p>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{URL::current()}}" class="btn btn-link btn-lg btn-social mx-1"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="https://twitter.com/intent/tweet?url={{URL::current()}}" class="btn btn-link btn-lg btn-social mx-1"><i class="fa-brands fa-twitter"></i></a>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{URL::current()}}" class="btn btn-link btn-lg btn-social mx-1"><i class="fa-brands fa-linkedin-in"></i></a>
                <a href="https://api.whatsapp.com/send?text=Te%20invito%20a%20leer%20la%20siguiente%20nota.%20{{URL::current()}}" class="btn btn-link btn-lg btn-social mx-1"><i class="fa-brands fa-whatsapp"></i></a>
            </div>

            <p class="text-muted text-end">Fecha: {{date('d/m/Y',strtotime($informe->fecha))}}. Autor: {{$informe->autor}}</p>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <img class="img-fluid" src="{{asset('storage/img/'.$informe->imagen)}}" alt="">
            </div>
            <div class="col-lg-9 nota">
                <p>{!! str_replace('<img ','<img class="img img-fluid"', $informe->contenido) !!}</p>
            </div>
        </div>
    </div>

</section>

@endsection
