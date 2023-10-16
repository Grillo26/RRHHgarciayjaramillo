<x-master>
<div class="page-content">
    <div class="container-fluid">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Registro de Asistencia</div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body">
                                    <h4 class="card-title">Registro de Asistencia del personal</h4>
                                    <p class="card-title-desc">
                                        El registro de la asistencia se realiza al ingresar al sistema con su usuario y contraseña.
                                    </p>
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead>
                                                <tr class="text-center">
                                                    <!--Tabla Normal-->
                                                    <th class="d-none d-md-table-cell">Nombre</th>
                                                    <th class="d-none d-md-table-cell">Ingreso Mañana</th>
                                                    <th class="d-none d-md-table-cell">Salida Mañana</th>
                                                    <th class="d-none d-md-table-cell">Ingreso Tarde</th>
                                                    <th class="d-none d-md-table-cell">Salida Tarde</th>

                                                    <!--Tabla responsiva-->
                                                    <th class="d-md-none">Fecha</th>
                                                       
                                                </tr>
                                            </thead>
                                            <tbody>

                                            @foreach ($attendanceData as $userData)
                                                @foreach ($userData['formattedHistorial'] as $date => $formattedAsistencia)
                                                    <!-- Tabla normal-->
                                                    <tr class=" text-center">
                                                        <th scope="row" class="d-none d-md-table-cell">{{ $userData['user']->name }}</th>
                                                        <th scope="row" class="d-none d-md-table-cell">{{ $formattedAsistencia['check_in_morning'] }}</th>
                                                        <th scope="row" class="d-none d-md-table-cell">{{ $formattedAsistencia['check_out_morning'] }}</th>
                                                        <th scope="row" class="d-none d-md-table-cell">{{ $formattedAsistencia['check_in_afternoon'] }}</th>
                                                        <th scope="row" class="d-none d-md-table-cell">{{ $formattedAsistencia['check_out_afternoon'] }}</th>
                                                    </tr>

                                                    <!-- Tabla normal Responsiva-->
                                                    <tr class=" text-center">
                                                        <th class="d-md-none">Ingreso Mañana</th>
                                                    </tr>
                                                    <tr class=" text-center">
                                                        <th class="d-md-none">Salida Mañana</th>
                                                    </tr>
                                                    <tr class=" text-center">
                                                        <th class="d-md-none">Ingreso Tarde</th>
                                                    </tr>
                                                    <tr class=" text-center">
                                                        <th class="d-md-none">Salida Tarde</th>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                            </tbody>
                                        </table>


                                    <div class="card-body text-center">
                                        <a href="/checkin-morning" class="btn btn-success waves-effect waves-light">Registrar</a>
                                    </div>
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

