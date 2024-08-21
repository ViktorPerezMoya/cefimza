<div class="card">
    <div class="card-body">
        <h3 class="text-center mt-2 mb-3">{{$id > 0 ? 'Editar' : 'Nuevo'}} Integrante</h3>
        <div class="row">
            <div class="col-12">
                <form wire:submit="save">
                    <div class="mb-3">
                      <label for="nombre" class="form-label">Nombre</label>
                      <input type="text" class="form-control" wire:model="nombre" id="nombre">
                      @error('nombre')<div class="text-danger text-small fw-light"><small>{{ $message }}</small></div>@enderror
                    </div>
                    <div class="mb-3">
                      <label for="puesto" class="form-label">Puesto</label>
                      <input type="text" class="form-control" wire:model="puesto" id="puesto">
                      @error('puesto')<div class="text-danger text-small fw-light"><small>{{ $message }}</small></div>@enderror
                    </div>
                    <div class="mb-3">
                      <label for="imagen" class="form-label">Imagen<br>
                        @if (($id == 0 && $imagen) || $changedImage)
                        <img src="{{ $imagen->temporaryUrl() }}" id="imageorig" height="100">
                        @else
                        <img src="{{asset('img/'.$imagen)}}" id="imageorig" height="100">
                        @endif
                      </label>
                      <input type="file" class="form-control" wire:model="imagen" wire:change="changeImage" id="imagen" accept=".png, .jpg, .jpeg">
                      @error('imagen')<div class="text-danger text-small fw-light"><small>{{ $message }}</small></div>@enderror
                    </div>
                    <div class="mb-3">
                      <label for="twitter" class="form-label">Twitter</label>
                      <input type="text" class="form-control" wire:model="twitter" id="twitter">
                      @error('twitter')<div class="text-danger text-small fw-light"><small>{{ $message }}</small></div>@enderror
                    </div>
                    <div class="mb-3">
                      <label for="facebook" class="form-label">Facebook</label>
                      <input type="text" class="form-control" wire:model="facebook" id="facebook">
                      @error('facebook')<div class="text-danger text-small fw-light"><small>{{ $message }}</small></div>@enderror
                    </div>
                    <div class="mb-3">
                      <label for="linkedin" class="form-label">Linkedin</label>
                      <input type="text" class="form-control" wire:model="linkedin" id="linkedin">
                      @error('linkedin')<div class="text-danger text-small fw-light"><small>{{ $message }}</small></div>@enderror
                    </div>

                    <div class="mb-3 row">
                        <span wire:loading class="col-md-3 offset-md-5 text-primary">Procesando...</span>
                    </div>

                    <div class="d-grid gap-2 col-6 mx-auto text-center">
                        <a class="btn btn-danger btn-lg" href="/admin/equipo" wire:navigate>Cancelar</a>
                        <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
                    </div>
                  </form>
            </div>
        </div>
    </div>
</div>
