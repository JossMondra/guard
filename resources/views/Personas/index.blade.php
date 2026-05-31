@extends('layouts.app')

@section('content_admin')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                    <div class="card shadow-lg border-0">
                        <div class="card-header bg-success text-white text-center">
                            <h4 class="mb-0">Personas</h4>
                        </div>
                        <nav class="navbar navbar-light bg-light">
                            <div class="container-fluid">
                                <a class="navbar-brand"></a>
                                <form class="d-flex">
                                    <a  class="btn btn-outline-success" href="{{url('personas/create')}}">Registrar</a>
                                </form>
                            </div>
                        </nav>
                        <div class="card-body py-2">
                            <div class="table-responsive">
                                <table class="table table-striped align-middle text-center">
                                    <thead class="table-dark">
                                    <tr>
                                        <th>Num</th>
                                        <th>Nombre</th>
                                        <th>Apellido Paterno</th>
                                        <th>Apellido Materno</th>
                                        <th>Fecha</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($personas as $persona)
                                            <tr>
                                                <td class="fw-bold">{{$loop->index+1}}</td>
                                                <td>{{$persona->nom}}</td>
                                                <td>{{$persona->ap}}</td>
                                                <td>{{$persona->am}}</td>
                                                <td>{{date('d-m-Y', strtotime($persona->fecha_nac))}}</td>
                                                <td>
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <a  class="btn btn-outline-primary" href="{{route("personas.edit",$persona)}}">Editar</a>
                                                                    </div>
                                                                    <div class="col">
                                                                        <form action="{{route("personas.destroy",$persona)}}" class="elimina" method="post">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="btn btn-outline-danger">
                                                                                Eliminar
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function () {

        $('.elimina').click(function(e){
            
                event.preventDefault();

                Swal.fire({
                    title: '¿Estás seguro de que deseas eliminar el registro?',
                    text: "¡Esta accion no se podra revertir!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                });
        });

    });

</script>

@endsection