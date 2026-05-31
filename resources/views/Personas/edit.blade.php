@extends("layouts.app")

@section("content_admin")

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                    <div class="card-header bg-success text-white d-flex">
                        <button type="button" class="btn btn-outline text-white" onclick="history.back()">&larr;</button>
                        <h4 class="mb-0" style="padding-left: 28%;">{{$persona->nom}} {{$persona->ap}} {{$persona->am}}</h4>
                    </div>
                    
                    <h4 style="padding-top: 2%; text-align: center;">Actualizar Datos</h4>
                    
                    <div class="card-body py-2 p-4">
                        <form id="validaActualiza" action="{{route("personas.update",$persona)}}" method="post">
                            @csrf
                            @method("PUT")
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="nom" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nom" name="nom" value="{{$persona->nom}}" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="ap" class="form-label">Apellido Paterno</label>
                                    <input type="text" class="form-control" id="ap" name="ap" value="{{$persona->ap}}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="am" class="form-label">Apellido Materno</label>
                                    <input type="text" class="form-control" id="am" name="am" value="{{$persona->am}}" required>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="fecha_nac" class="form-label">Fecha de nacimiento</label>
                                <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" value="{{$persona->fecha_nac}}" max="2026-12-31" min="1950-12-31" required>
                            </div>

                            <div class="d-flex justify-content-between">
                                <button type="reset" class="btn btn-outline-dark">
                                    Borrar Datos
                                </button>

                                <button type="submit" class="btn btn-success px-4">
                                    Guardar
                                </button>
                            </div>

                        </form>
                    </div>

                </div>
        </div>
    </div>
</div>
  
<link rel="stylesheet" href="{{ asset('/css/mensajes.css') }}">
  
<script type="text/javascript">

    $(document).ready(function () {
        $('#validaActualiza').validate({
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
                    required: "Por favor ingresa el nuevo nombre",
                    lettersonly:"No pueden ingresarse números",
                    minlength: "El nombre debe tener al menos 3 caracteres",
                    maxlength: "El nombre no puede tener mas de 20 caracteres"
                },
                ap: {
                    required: "Por favor ingresa el nuevo Apellido Paterno",
                    lettersonly:"No pueden ingresarse números",
                    minlength: "El Apellido Paterno debe tener al menos 3 caracteres",
                    maxlength: "El Apellido Paterno no puede tener mas de 20 caracteres"
                },
                am: {
                    required: "Por favor ingresa el nuevo Apellido Materno",
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
                    title: "Datos Actualizados!",
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