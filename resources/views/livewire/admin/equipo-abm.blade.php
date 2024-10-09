@push('styles')
    <style>
        .btn-social {
            height: 2.5rem;
            width: 2.5rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            border-radius: 100%;
        }
    </style>
@endpush

<div class="card">
    <div class="card-body">
      <h3 class="text-center mt-2 mb-3">Equipo / Integrantes</h3>
      <div class="row text-right">
          <div class="col">
              <a href="equipo/integrante/nuevo" class="btn btn-primary mb-2" wire:navigate><i class="fa-solid fa-plus"></i> Nuevo</a>
          </div>
      </div>
      <div class="row">
        @if (count($integrantes) > 0)
            @foreach ($integrantes as $integrante)
            <div class="col">
                <div class="card" style="width: 15rem;">
                    <img src="{{asset('storage/img/'.$integrante->imagen)}}" id="imageorig"  class="card-img-top" alt="{{$integrante->imagen}}">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{$integrante->nombre}}</h5>
                        <p class="card-text">{{$integrante->puesto}}</p>
                        <div class="mb-4">
                            <a href="{{trim($integrante->twitter) ? $integrante->twitter : '#' }}" target="_blank" class="btn btn-dark btn-social mx-2"><i class="fa-brands fa-x-twitter"></i></a>
                            <a href="{{trim($integrante->facebook) ? $integrante->facebook : '#' }}" target="_blank" class="btn btn-dark btn-social mx-2"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="{{trim($integrante->linkedin) ? $integrante->linkedin : '#' }}" target="_blank" class="btn btn-dark btn-social mx-2"><i class="fa-brands fa-linkedin-in"></i></a>
                        </div>
                        <a href="equipo/integrante/editar/{{$integrante->id}}" class="btn btn-warning ml-1" wire:navigate><i class="fa-regular fa-pen-to-square"></i> Editar</a>
                        <button class="btn btn-danger ml-1" wire:click="delete({{$integrante->id}})" wire:confirm="¿Usted esta seguro de eliminar la secion?"><i class="fa-regular fa-trash-can"></i> Borrar</button>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="col">
                <div class="alert alert-secondary" role="alert">
                    No hay integrantes para esta sección
                </div>
            </div>
        @endif
      </div>
    </div>
</div>
