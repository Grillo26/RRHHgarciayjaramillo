<x-master>
<div class="page-content">
    <div class="container-fluid">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Registro de Asistencia</div>

                        <!-- end row -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body">
                                    <h4 class="card-title">Registro de Asistencia del personal</h4>
                                    <p class="card-title-desc">
                                        Solamente usted puede realizar el registro de Asistencia de los usuarios.
                                    </p>

                                    <div class="table-responsive">
                                        <table class="table mb-0">
        
                                            <thead class="table-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombre</th>
                                                    <th>Ingreso Mañana</th>
                                                    <th>Salida Mañana</th>
                                                    <th>Ingreso Tarde</th>
                                                    <th>Salida Tarde</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($users as $user)
                                                <tr class="align-middle">
                                                    <th scope="row">{{ $user -> id}}</th>
                                                    <th>{{ $user -> name }}</th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>

                                                    
                                                    <td>
                                                        <a href="{{ route('asistencia.registrar', $user->id ) }}"><button class="btn btn-success waves-effect waves-light"><i class="ri-time-line"></i></button></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <!-- end row -->
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-master>

