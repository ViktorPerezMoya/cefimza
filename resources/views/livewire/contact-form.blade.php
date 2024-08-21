<div class="container">
    <div class="text-center">
        <h2 class="section-heading text-uppercase">Contacto</h2>
        <h3 class="section-subheading text-muted">Dejanos un mensaje y a la brevedad estaremos contactandote.</h3>
    </div>
    <!-- * * * * * * * * * * * * * * *-->
    <!-- * * SB Forms Contact Form * *-->
    <!-- * * * * * * * * * * * * * * *-->
    <!-- This form is pre-integrated with SB Forms.-->
    <!-- To make this form functional, sign up at-->
    <!-- https://startbootstrap.com/solution/contact-forms-->
    <!-- to get an API token!-->
    <form id="contactForm"  wire:submit="enviar">
        <div class="row align-items-stretch mb-5">
            <div class="col-md-6">
                <div class="form-group">
                    <!-- Name input-->
                    <input class="form-control" id="nombre" type="text" placeholder="Tu Nombre *" wire:model="nombre" />
                    @if ($errors->has('nombre'))
                        <div class="text-danger">{{ $errors->first('nombre') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <!-- Email address input-->
                    <input class="form-control" id="email" type="email" placeholder="Tu Email *" wire:model="email" />
                    @if ($errors->has('email'))
                        <div class="text-danger">{{ $errors->first('email') }}</div>
                    @endif
                </div>
                <div class="form-group mb-md-0">
                    <!-- Phone number input-->
                    <input class="form-control" id="telefono" type="tel" placeholder="Tu Numero de Teléfono *" wire:model="telefono" />
                    @if ($errors->has('telefono'))
                        <div class="text-danger">{{ $errors->first('telefono') }}</div>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-group-textarea mb-md-0">
                    <!-- Message input-->
                    <textarea class="form-control" id="mensaje" placeholder="Tu Mensaje *" wire:model="mensaje"></textarea>
                    @if ($errors->has('mensaje'))
                        <div class="text-danger">{{ $errors->first('mensaje') }}</div>
                    @endif
                </div>
            </div>
        </div>
        <!-- Submit success message-->
        <div x-show="$wire.succesMessage.length > 0">
            <div class="text-center text-white mb-3">
                <div class="fw-bolder">{{$succesMessage}}</div>
            </div>
        </div>
        <!-- Submit error message-->
        <div x-show="$wire.errorMessage.length > 0"><div class="text-center text-danger mb-3">{{$errorMessage}}</div></div>
        <!-- Submit Button-->
        <div wire:loading><div class="text-center text-secondary mb-3">Enviando.....</div></div>
        <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit">Enviar Mensaje</button></div>
    </form>
</div>
