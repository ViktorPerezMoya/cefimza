@push('styles')
    <style>
        /* Estilos específicos del componente */
    .label {
      cursor: pointer;
    }

    .progress {
      display: none;
      margin-bottom: 1rem;
    }

    .alert {
      display: none;
    }

    .img-container img {
      max-width: 100%;
    }
    </style>
@endpush
<div class="card">
    <div class="card-body">
        <h3 class="text-center mt-2 mb-3">{{$id > 0 ? 'Editar' : 'Nueva'}} Nota</h3>
        <div class="row">
            <div class="col-12">
                <form wire:submit="save">
                    <div class="mb-3">
                      <label for="titulo" class="form-label">Titulo</label>
                      <input type="text" class="form-control" wire:model="titulo" id="titulo">
                      @error('titulo')<div class="text-danger text-small fw-light"><small>{{ $message }}</small></div>@enderror
                    </div>
                    <div class="mb-3">
                      <label for="autor" class="form-label">Autor</label>
                      <input type="text" class="form-control" wire:model="autor" id="autor">
                      @error('autor')<div class="text-danger text-small fw-light"><small>{{ $message }}</small></div>@enderror
                    </div>
                    <div class="mb-3">
                      <label for="fecha" class="form-label">Fecha</label>
                      <input type="date" class="form-control" wire:model="fecha" id="fecha">
                      @error('fecha')<div class="text-danger text-small fw-light"><small>{{ $message }}</small></div>@enderror
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
                    <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input" wire:model="visible" id="inhome">
                      <label class="form-check-label" for="inhome">Visible en la web</label>
                    </div>
                    <div class="mb-3" x-data="{resumen: $wire.resumen, limiteresumen: $wire.limiteresumen}">
                      <label for="resumen" class="form-label">Resumen</label>
                      <textarea class="form-control" wire:model="resumen" x-model="resumen" x-bind:maxlength="limiteresumen" id="resumen" rows="4"></textarea>
                      <div class="text-muted text-sm text-right" x-text="resumen.length+'/'+limiteresumen"></div>
                      @error('resumen')<div class="text-danger text-small fw-light"><small>{{ $message }}</small></div>@enderror
                    </div>

                    <hr>

                    <div class="mb-3">
                        <div wire:ignore>
                            <label for="contenido" class="form-label">Contenido</label>
                            <textarea wire:model.live="contenido" class="form-control" id="contenido"  rows="10">{{$contenido}}</textarea>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <span wire:loading class="col-md-3 offset-md-5 text-primary">Procesando...</span>
                    </div>

                    <div class="d-grid gap-2 col-6 mx-auto text-center">
                        <a class="btn btn-danger btn-lg" href="/admin/notas/{{$seccion_id}}" wire:navigate>Cancelar</a>
                        <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
                    </div>
                  </form>
            </div>
        </div>
    </div>

</div>


@push('scripts')
<script src="https://cdn.tiny.cloud/1/9658pcnrxud5xis67dkqzce21atyl79kualg4msqhhohwbwj/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#contenido',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount linkchecker code',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | code link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        forced_root_block: false,
        setup: function (editor) {
            editor.on('init change', function () {
                editor.save();
            });
            editor.on('change', function (e) {
                @this.set('contenido', editor.getContent());
            });
        }
    });
</script>
@endpush

