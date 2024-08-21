<div class="card">
    <div class="card-body">
        <h3 class="text-center mt-2 mb-3">Configuracion</h3>
        <div class="row">
            <div class="col-12">
                <form wire:submit="save">
                    <div class="mb-3 row">
                        <label for="username" class="col-md-4 col-form-label text-md-end text-start">Usuario</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" wire:model="username" disabled>
                            @if ($errors->has('username'))
                                <span class="text-danger">{{ $errors->first('username') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-md-4 col-form-label text-md-end text-start">Email Address</label>
                        <div class="col-md-6">
                          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" wire:model="email">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-md-4 col-form-label text-md-end text-start">Password</label>
                        <div class="col-md-6">
                          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" wire:model="password">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password_confirmation" class="col-md-4 col-form-label text-md-end text-start">Confirm Password</label>
                        <div class="col-md-6">
                          <input type="password" class="form-control" id="password_confirmation" wire:model="password_confirmation">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <span wire:loading class="col-md-3 offset-md-5 text-primary">Procesando...</span>
                    </div>

                    <div class="d-grid gap-2 col-6 mx-auto text-center">
                        <a class="btn btn-danger btn-lg" href="/admin/usuarios" wire:navigate>Cancelar</a>
                        <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
                    </div>
                  </form>
            </div>
        </div>
    </div>
</div>
