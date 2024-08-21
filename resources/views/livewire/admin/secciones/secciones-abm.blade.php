<div class="card">
    <div class="card-body">
      <h3 class="text-center mt-2 mb-3">Secciones</h3>
      <div class="row text-right">
          <div class="col">
              <a href="nueva-seccion" class="btn btn-primary mb-2" wire:navigate><i class="fa-solid fa-plus"></i> Nuevo</a>
          </div>
      </div>
      <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Titulo</th>
                <th>Orden Home</th>
                <th>Orden Menu</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($secciones as $seccion)
            <tr>
                <td>{{$seccion->id}}</td>
                <td>{{$seccion->titulo}}</td>
                <td>{{$seccion->orden_home}}°</td>
                <td>{{$seccion->orden_menu}}°</td>
                <td class="text-right">
                    @if ($seccion->tipo && $seccion->tipo != 'texto')
                    <a href="{{$seccion->tipo}}/{{$seccion->id}}" class="btn btn-primary ml-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Administrar {{$seccion->tipo}}" wire:navigate><i class="fa-solid fa-gears"></i> {{ ucfirst($seccion->tipo)}}</a>
                    @else
                    <a href="redactar-seccion/{{$seccion->id}}" class="btn btn-info ml-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Redactar" wire:navigate><i class="fa-solid fa-file-pen"></i></a>
                    @endif
                    <a href="editar-seccion/{{$seccion->id}}" class="btn btn-warning ml-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar" wire:navigate><i class="fa-regular fa-pen-to-square"></i></a>
                    <button class="btn btn-danger ml-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar" wire:click="delete({{$seccion->id}})" wire:confirm="¿Usted esta seguro de eliminar la secion?"><i class="fa-regular fa-trash-can"></i></button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
