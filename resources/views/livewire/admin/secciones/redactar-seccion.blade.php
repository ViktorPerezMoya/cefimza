<div class="row">
    <div class="col">
        <form wire:submit="save">
            <div class="mb-3">
                <button onclick="window.location.reload()" class="btn btn-info">
                    <i class="fa-solid fa-arrows-rotate"></i>
                    Reload Page
                </button>
            </div>
            <div class="mb-3">
                <div wire:ignore>
                    <textarea wire:model.live="contenido" class="form-control" id="contenido"  rows="10">{{$contenido}}</textarea>
                </div>
            </div>

            <hr>

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
