<div class="card">
    <div class="card-body">

        <h3 class="text-center mt-2 mb-3">Tarjetas</h3>
        <h5 class="text-center text-muted">({{$seccion->titulo}})</h5>
        <div class="row text-right">
            <div class="col">
                <a href="nueva/{{$seccion->id}}" class="btn btn-primary mb-2" wire:navigate><i class="fa-solid fa-plus"></i> Nuevo</a>
            </div>
        </div>

        @if (count($tarjetas) > 0)
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Titulo</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tarjetas as $tarjeta)
                <tr>
                    <td>{{$tarjeta->id}}</td>
                    <td>{{$tarjeta->titulo}}</td>
                    <td class="text-right">
                        <a href="editar/{{$tarjeta->id}}" class="btn btn-warning ml-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar" wire:navigate><i class="fa-regular fa-pen-to-square"></i></a>
                        <button class="btn btn-danger ml-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar" wire:click="delete({{$tarjeta->id}})" wire:confirm="¿Usted esta seguro de eliminar la tarjeta?"><i class="fa-regular fa-trash-can"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="alert alert-secondary" role="alert">
            No hay tarjetas para esta sección
        </div>
        @endif
    </div>
</div>
