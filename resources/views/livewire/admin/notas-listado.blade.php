<div class="card">
    <div class="card-body">

        <h3 class="text-center mt-2 mb-3">Notas / Informes</h3>
        <h5 class="text-center text-muted">({{$seccion->titulo}})</h5>
        <div class="row text-right">
            <div class="col">
                <a href="nueva/{{$seccion->id}}" class="btn btn-primary mb-2" wire:navigate><i class="fa-solid fa-plus"></i> Nuevo</a>
            </div>
        </div>

        @if (count($notas) > 0)
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>Fecha</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notas as $nota)
                <tr>
                    <td>{{$nota->id}}</td>
                    <td>{{$nota->titulo}}</td>
                    <td>{{$nota->autor}}</td>
                    <td>{{$nota->fecha}}</td>
                    <td class="text-right">
                        <a href="editar/{{$nota->id}}" class="btn btn-warning ml-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar" wire:navigate><i class="fa-regular fa-pen-to-square"></i></a>
                        <button class="btn btn-danger ml-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar" wire:click="delete({{$nota->id}})" wire:confirm="¿Usted esta seguro de eliminar la nota?"><i class="fa-regular fa-trash-can"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="alert alert-secondary" role="alert">
            No hay notas o informes para esta sección
        </div>
        @endif
    </div>
</div>
