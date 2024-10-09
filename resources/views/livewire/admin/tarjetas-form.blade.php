<div class="card">
    <div class="card-body">
        <h3 class="text-center mt-2 mb-3">{{$id > 0 ? 'Editar' : 'Nueva'}} Tarjeta</h3>
        <div class="row">
            <div class="col-12">
                <form wire:submit="save">
                    <div class="mb-3">
                      <label for="titulo" class="form-label">Titulo</label>
                      <input type="text" class="form-control" wire:model="titulo" id="titulo">
                      @error('titulo')<div class="text-danger text-small fw-light"><small>{{ $message }}</small></div>@enderror
                    </div>
                    <div class="mb-3" x-data="{detalle: $wire.detalle, limiteDetalle: $wire.limiteDetalle}">
                      <label for="detalle" class="form-label">Detalle</label>
                      <textarea class="form-control" wire:model="detalle" x-model="detalle" x-bind:maxlength="limiteDetalle" id="detalle" rows="4"></textarea>
                      <div class="text-muted text-sm text-right" x-text="detalle.length+'/'+limiteDetalle"></div>
                      @error('detalle')<div class="text-danger text-small fw-light"><small>{{ $message }}</small></div>@enderror
                    </div>
                    <div class="mb-3">
                      <label for="imagen" class="form-label">Imagen<br>
                        @if (($id == 0 && $imagen) || $changedImage)
                        <img src="{{ $imagen->temporaryUrl() }}" id="imageorig" height="100">
                        @else
                        <img src="{{asset('storage/img/'.$imagen)}}" id="imageorig" height="100">
                        @endif
                      </label>
                      <input type="file" class="form-control" wire:model="imagen" wire:change="changeImage" id="imagen" accept=".png, .jpg, .jpeg">
                      @error('imagen')<div class="text-danger text-small fw-light"><small>{{ $message }}</small></div>@enderror
                    </div>
                    <div class="mb-3">
                      <label for="link" class="form-label">Link</label>
                      <input type="text" class="form-control" wire:model="link" id="link">
                      @error('link')<div class="text-danger text-small fw-light"><small>{{ $message }}</small></div>@enderror
                    </div>
                    <div class="mb-3">
                      <label for="label_link" class="form-label">Label Link</label>
                      <input type="text" class="form-control" wire:model="label_link" id="label_link" placeholder="Nombre que llevara el link para ser mostrado. Ej: Leer mas...">
                      @error('label_link')<div class="text-danger text-small fw-light"><small>{{ $message }}</small></div>@enderror
                    </div>

                    <div class="mb-3 row">
                        <span wire:loading class="col-md-3 offset-md-5 text-primary">Procesando...</span>
                    </div>

                    <div class="d-grid gap-2 col-6 mx-auto text-center">
                        <a class="btn btn-danger btn-lg" href="/admin/tarjetas/{{$seccion_id}}" wire:navigate>Cancelar</a>
                        <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
                    </div>
                  </form>
            </div>
        </div>
    </div>
</div>
