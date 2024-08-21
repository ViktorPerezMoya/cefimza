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
        <h3 class="text-center mt-2 mb-3">{{$id > 0 ? 'Editar' : 'Nueva'}} Sección</h3>
        <div class="row">
            <div class="col-12">
                <form wire:submit="save" x-data="{in_menu: false,in_home: false}">
                    <div class="mb-3">
                      <label for="titulo" class="form-label">Titulo</label>
                      <input type="text" class="form-control" wire:model="titulo" id="titulo">
                      @error('titulo')<div class="text-danger text-small fw-light"><small>{{ $message }}</small></div>@enderror
                    </div>
                    <div class="mb-3">
                      <label for="subtitulo" class="form-label">Subtitulo</label>
                      <input type="text" class="form-control" wire:model="subtitulo" id="subtitulo">
                      @error('subtitulo')<div class="text-danger text-small fw-light"><small>{{ $message }}</small></div>@enderror
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
                      <label for="link" class="form-label">Link</label>
                      <input type="text" class="form-control" wire:model="link" id="link">
                      @error('link')<div class="text-danger text-small fw-light"><small>{{ $message }}</small></div>@enderror
                    </div>
                    <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input" wire:model="in_menu" x-model="in_menu" id="inmenu">
                      <label class="form-check-label" for="inmenu">Estara en el menu</label>
                    </div>
                    <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input" wire:model="in_home" x-model="in_home" id="inhome">
                      <label class="form-check-label" for="inhome">Estara en la página principal</label>
                    </div>
                    <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input" wire:model="visible" id="inhome">
                      <label class="form-check-label" for="inhome">Visible en la web</label>
                    </div>
                    <div class="mb-3">
                        <label for="tipo" class="form-label">Tipo de contenido</label>
                        <select class="form-select" aria-label="Seleccione tipo de contendio" wire:model="tipo" id="tipo">
                            <option selected>Seleccione...</option>
                            <option value="datos">Datos</option>
                            <option value="notas">Notas</option>
                            <option value="tarjetas">Tarjetas</option>
                            <option value="texto">Texto</option>
                        </select>
                        @error('tipo')<div class="text-danger text-small fw-light"><small>{{ $message }}</small></div>@enderror
                    </div>
                    <div class="mb-3" x-show="in_home">
                        <label for="ordenhome" class="form-label">Numero de posicion de sección en la pagina principal</label>
                        <select class="form-select" aria-label="Seleccione posicion" wire:model="orden_home" id="ordenhome">
                            @for ($i = 0; $i <= (intval($maxOrdenHome)+1); $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                        @error('orden_home')<div class="text-danger text-small fw-light"><small>{{ $message }}</small></div>@enderror
                    </div>
                    <div class="mb-3" x-show="in_menu">
                        <label for="ordenmenu" class="form-label">Numero de posicion de sección en el menu</label>
                        <select class="form-select" aria-label="Seleccione posicion" wire:model="orden_menu" id="ordenmenu">
                            @for ($i = 0; $i <= (intval($maxOrdenMenu)+1); $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                        @error('orden_menu')<div class="text-danger text-small fw-light"><small>{{ $message }}</small></div>@enderror
                    </div>

                    <hr>

                    <div class="mb-3">
                        <div wire:ignore>
                            <textarea wire:model.live="contenido" class="form-control" id="contenido"  rows="10">{{$contenido}}</textarea>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <span wire:loading class="col-md-3 offset-md-5 text-primary">Procesando...</span>
                    </div>

                    <div class="d-grid gap-2 col-6 mx-auto text-center">
                        <a class="btn btn-danger btn-lg" href="/admin/secciones" wire:navigate>Cancelar</a>
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
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount linkchecker',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
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

