
@extends('components.layouts.public')

@section('meta_description', $meta_description)
@section('meta_keywords', obtenerPalabrasLargas($meta_description))

@section('metaog_title', 'CEFIMendoza')
@section('metaog_description', $meta_description)
@section('metaog_image', asset('img/portada_redes.png'))
@section('metaog_url', URL::current())

@section('content')
<!-- Masthead-->
<header class="masthead">
    <div class="container">
        <img class="img img-fluid" src="{{asset('img/portada.png')}}" alt="CEFIMendoza" />
    </div>
</header>

@foreach ($secciones as $index => $seccion)
    @switch($seccion->tipo)
        @case('datos')
            <!-- estadistics -->
            <section class="page-section" id="estadistics">
                <div class="container">
                    <div class="row justify-content-around text-center">
                        @foreach ($seccion->datos as $item)
                            <div class="col">
                                <span class="fa-stack fa-4x text-primary">
                                    {!!$item->icono!!}
                                </span>
                                <h5>{{$item->valor}}</h5>
                                <h6 class="my-3">{{$item->detalle}}</h6>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            @break
        @case('tarjetas')
            @if (strtolower($seccion->titulo) == "servicios")
            <!-- Services-->
            <section class="page-section" id="services">
                <div class="container">
                    <div class="text-center">
                        <h2 class="section-heading text-uppercase">{{$seccion->titulo}}</h2>
                        <h3 class="section-subheading text-muted">{{$seccion->detalle}}</h3>
                    </div>
                    <div class="row text-center">
                        @foreach ($seccion->tarjetas as $item)
                        <div class="col-md-4 mb-2 {{$is_mobile ? 'ps-5 pe-5' : 'ps-3 pe-3'}}">
                            <div class="service-item">
                                <div class="service-image">
                                    <img class="img-fluid" src="{{asset('storage/img/'.$item->imagen)}}" alt="{{$item->titulo}}" />
                                </div>
                                <h4 class="my-3">{{$item->titulo}}</h4>
                                <p class="text-muted">{{$item->detalle}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
            @else
            <section class="page-section bg-light" id="reportes">
                <div class="container">
                    <div class="text-center">
                        <h2 class="section-heading text-uppercase">{{$seccion->titulo}}</h2>
                        <h3 class="section-subheading text-muted">{{$seccion->subtitulo}}</h3>
                    </div>
                    <div class="row">
                        @foreach ($seccion->tarjetas as $item)
                        <div class="col-lg-4 col-sm-6 mb-4 {{$is_mobile ? 'ps-5 pe-5' : 'ps-3 pe-3'}}">
                            <!-- Reporte item 1-->
                            <div class="reportes-item">
                                <a class="reportes-link" href="#">
                                    <img class="img-fluid" src="{{asset('storage/img/'.$item->imagen)}}" alt="{{$item->titulo}}" />
                                </a>
                                <div class="reportes-caption">
                                    <div class="reportes-caption-heading">{{$item->titulo}}</div>
                                    <div class="reportes-caption-subheading text-muted">{{$item->detalle}}</div>
                                </div>
                                @if (!empty($item->label_link))
                                    <a href="{{$item->link}}" class="btn btn-primary float-start">{{$item->label_link}}</a>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
            @endif
            @break
        @default
            <section class="page-section bg-light ps-4 pe-4" id="about">
                <div class="container">
                    <div class="text-center">
                        <h2 class="section-heading text-uppercase">{{$seccion->titulo}}</h2>
                        <h3 class="section-subheading text-muted">{{$seccion->subtitulo}}</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <img class="img-fluid" src="{{asset('storage/img/'.$seccion->imagen)}}" alt="">
                        </div>
                        <div class="col-lg-9 text-center">
                            <p>{!!$seccion->contenido!!}</p>
                        </div>
                    </div>
                </div>
            </section>

    @endswitch
@endforeach
<!-- Team-->
<section class="page-section ps-4 pe-4" id="team">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Nuestro Equipo</h2>
            <h3 class="section-subheading text-muted">CEFI está conformado por un equipo de profesionales con sólida formación académica en las áreas de economía y finanzas.</h3>
        </div>
        <div class="row">
            @foreach ($equipo as $integrante)
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="{{asset('storage/img/'.$integrante->imagen)}}" alt="{{$integrante->nombre}}" />
                    <h4>{{$integrante->nombre}}</h4>
                    <p class="text-muted">{{$integrante->puesto}}</p>
                    <a class="btn btn-dark btn-social mx-2" href="{{$integrante->twitter}}" aria-label="{{$integrante->nombre}} Twitter Profile"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="{{$integrante->facebook}}" aria-label="{{$integrante->nombre}} Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="{{$integrante->linkedin}}" aria-label="{{$integrante->nombre}} LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Contact-->
<section class="page-section" id="contact">
    @livewire('contact-form')
</section>
<!-- Ubicacion-->
<div id="map"></div>
@endsection
