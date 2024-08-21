<div class="card">
    <div class="card-body">

        <h3 class="text-center mt-2 mb-3">Usuarios</h3>
        <div class="row text-right">
            <div class="col">
                <a href="usuarios/nuevo" class="btn btn-primary mb-2" wire:navigate><i class="fa-solid fa-plus"></i> Nuevo</a>
            </div>
        </div>

        @if (count($usuarios) > 0)
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Usuario</th>
                    <th>E-mail</th>
                    <th>Alta</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{$usuario->id}}</td>
                    <td>{{$usuario->username}}</td>
                    <td>{{$usuario->email}}</td>
                    <td>{{date('d/m/Y H:i:s', strtotime($usuario->created_at))}}</td>
                    <td class="text-right">
                        <a href="usuarios/editar/{{$usuario->id}}" class="btn btn-warning ml-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar" wire:navigate><i class="fa-regular fa-pen-to-square"></i></a>
                        <button class="btn btn-danger ml-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar" wire:click="delete({{$usuario->id}})" wire:confirm="¿Usted esta seguro de eliminar el usuario?"><i class="fa-regular fa-trash-can"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="alert alert-secondary" role="alert">
            No hay usuarios para esta sección
        </div>
        @endif
    </div>
</div>
