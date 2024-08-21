<div class="card">
    <div class="card-body">

        <h3 class="text-center mt-2 mb-3">Parámetros / Otros links</h3>
        <div class="row text-right">
            <div class="col">
                <a href="parametros/nuevo" class="btn btn-primary mb-2" wire:navigate><i class="fa-solid fa-plus"></i> Nuevo</a>
            </div>
        </div>

        @if (count($parametros) > 0)
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Detalle</th>
                    <th>Tipo</th>
                    <th>Icono</th>
                    <th>Link</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($parametros as $dato)
                <tr>
                    <td>{{$dato->id}}</td>
                    <td>{{$dato->detalle}}</td>
                    <td>{{$dato->tipo}}</td>
                    <td>{!!$dato->icono!!}</td>
                    <td>{{$dato->link}}</td>
                    <td class="text-right">
                        <a href="parametros/editar/{{$dato->id}}" class="btn btn-warning ml-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar" wire:navigate><i class="fa-regular fa-pen-to-square"></i></a>
                        <button class="btn btn-danger ml-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar" wire:click="delete({{$dato->id}})" wire:confirm="¿Usted esta seguro de eliminar el dato?"><i class="fa-regular fa-trash-can"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="alert alert-secondary" role="alert">
            No hay parámetros para esta sección
        </div>
        @endif
    </div>
</div>
