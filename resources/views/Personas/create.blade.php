@extends("layouts.app")

@section("content_admin")

<div class="row justify-content-center">
    <div class="col-md-6">

        <div class="card">
            <div class="card-header bg-success text-white d-flex">
                <button type="button" class="btn btn-outline text-white" onclick="history.back()">&larr;</button>
                <h4 class="mb-0" style="padding-left: 35%;">Agregar Persona</h4>
            </div>
            <div class="card-body p-4">
                <form id="validaForm" action="{{url("personas")}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="nom" class="form-label">Nombre(s)</label>
                            <input type="text" class="form-control" id="nom" name="nom" placeholder="John Doe" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="ap" class="form-label">Apellido Paterno</label>
                            <input type="text" class="form-control" id="ap" name="ap" placeholder="Smith" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="am" class="form-label">Apellido Materno</label>
                            <input type="text" class="form-control" id="am" name="am" placeholder="Mustermann" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="fecha_nac" class="form-label">Fecha de nacimiento</label>
                        <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" max="2026-12-31" min="1950-12-31" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="reset" class="btn btn-outline-dark">Borrar Datos</button>

                        <button type="submit" class="btn btn-primary px-4">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    label.error {
        color: red;
        font-size: 0.9em;
        display: block;
        margin-top: 5px;
    }
    input.error {
        border: 1px solid red;
    }
</style>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>   
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/additional-methods.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">

    $(document).ready(function () {
        $('#validaForm').validate({
            rules: {
                nom: {
                    required: true,
                    lettersonly:true,
                    minlength: 3,
                    maxlength: 20
                },
                ap: {
                    required: true,
                    lettersonly:true,
                    minlength: 3,
                    maxlength: 20
                },
                am: {
                    required: true,
                    lettersonly:true,
                    minlength: 3,
                    maxlength: 20
                },
                fecha_nac: {
                    required: true,
                },
            },
            messages: {
                nom: {
                    required: "Por favor ingresa un nombre",
                    lettersonly:"No pueden ingresarse números",
                    minlength: "El nombre debe tener al menos 3 caracteres",
                    maxlength: "El nombre no puede tener mas de 20 caracteres"
                },
                ap: {
                    required: "Por favor ingresa un Apellido Paterno",
                    lettersonly:"No pueden ingresarse números",
                    minlength: "El Apellido Paterno debe tener al menos 3 caracteres",
                    maxlength: "El Apellido Paterno no puede tener mas de 20 caracteres"
                },
                am: {
                    required: "Por favor ingresa un Apellido Materno",
                    lettersonly:"No pueden ingresarse números",
                    minlength: "El Apellido Materno debe tener al menos 3 caracteres",
                    maxlength: "El Apellido Materno no puede tener mas de 20 caracteres"
                },
                fecha_nac: {
                    required: "Por favor seleccione una fecha",
                },
            },
            submitHandler: function(form) {
                let timerInterval;
                    Swal.fire({
                    title: "Registro Exitoso!",
                    timer: 1500,
                    icon: "success",
                    didOpen: () => {
                        Swal.showLoading();
                        const timer = Swal.getPopup().querySelector("b");
                        timerInterval = setInterval(() => {
                        timer.textContent = `${Swal.getTimerLeft()}`;
                        }, 100);
                    },
                    willClose: () => {
                        clearInterval(timerInterval);
                        form.submit();
                    }
                    }).then((result) => {
                });
                
            }
        });
    });
</script>

@endsection