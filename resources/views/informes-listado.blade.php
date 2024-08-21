
@extends('components.layouts.public')

@section('meta_description', "Informes del CEFI Mendoza")
@section('meta_keywords', obtenerPalabrasLargas(implode(",",arrayPluck($notas->toArray()['data'],'titulo'))))

@section('content')

<section class="page-section showcase" id="reportes">
    <div class="container p-0">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">{{$seccion->titulo}}</h2>
            <h3 class="section-subheading text-muted">{{$seccion->subtitulo}}</h3>
        </div>
        <div class="bg-light">
            @foreach ($notas as $index => $item)
            <div class="row g-0">
                <div class="col-lg-6 {{$index % 2 ? 'order-lg-2' : ''}} text-white showcase-img" style="background-image: url('{{asset('img/'.$item->imagen)}}')"></div>
                <div class="col-lg-6 {{$index % 2 ? 'order-lg-1' : ''}} my-auto showcase-text">
                    <a class="text-decoration-none titulo-nota-link" href="informe/{{$item->url}}">
                        <h2>{{$item->titulo}}</h2>
                        <p class="lead mb-0">{{$item->resumen}}</p>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<div class="container mb-4">
    <div class="row">

        {{ $notas->links() }}

    </div>
</div>

@endsection
