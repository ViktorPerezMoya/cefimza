<div class="card">
    <div class="card-body">
        <h3 class="text-center mt-2 mb-3">{{$id > 0 ? 'Editar' : 'Nuevo'}} Dato</h3>
        <div class="row">
            <div class="col-12">
                <form wire:submit="save">
                    <div class="mb-3">
                      <label for="detalle" class="form-label">Detalle</label>
                      <input type="text" class="form-control" wire:model="detalle" id="valor">
                      @error('detalle')<div class="text-danger text-small fw-light"><small>{{ $message }}</small></div>@enderror
                    </div>
                    <div class="mb-3">
                      <label for="valor" class="form-label">Valor</label>
                      <input type="text" class="form-control" wire:model="valor" id="valor">
                      @error('valor')<div class="text-danger text-small fw-light"><small>{{ $message }}</small></div>@enderror
                    </div>
                    <div class="mb-3">
                      <label for="link" class="form-label">Link</label>
                      <input type="text" class="form-control" wire:model="link" id="link">
                      @error('link')<div class="text-danger text-small fw-light"><small>{{ $message }}</small></div>@enderror
                    </div>
                    <div class="mb-3">
                      <label for="icono" class="form-label">Icono</label>
                      <input type="text" class="form-control" wire:model="icono" id="icono" placeholder="<i class='fa-solid fa-arrow-trend-up'></i>">
                      <div class="text-muted text-sm text-left" style="font-size: 12px">Consultar iconos en <a class="link-primary" href="https://fontawesome.com/icons" target="_blank">Font Awesome.com</a></div>
                      @error('icono')<div class="text-danger text-small fw-light"><small>{{ $message }}</small></div>@enderror
                    </div>

                    <div class="mb-3 row">
                        <span wire:loading class="col-md-3 offset-md-5 text-primary">Procesando...</span>
                    </div>

                    <div class="d-grid gap-2 col-6 mx-auto text-center">
                        <a class="btn btn-danger btn-lg" href="/admin/datos/{{$seccion_id}}" wire:navigate>Cancelar</a>
                        <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
                    </div>
                  </form>
            </div>
        </div>
    </div>
</div>
