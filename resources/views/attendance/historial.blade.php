<x-master>
<div class="page-content">
    <div class="container-fluid">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Historial</div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body">
                                    <h4 class="card-title">Historial de Registro día</h4>
                                    <p class="card-title-desc">
                                        El registro de la asistencia se realiza al ingresar al sistema con su usuario y contraseña.
                                    </p>
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Fecha</th>
                                                    <th>Ingreso Mañana</th>
                                                    <th>Salida Mañana</th>
                                                    <th>Ingreso Tarde</th>
                                                    <th>Salida Tarde</th>
                                                       
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class=" text-center">
                                                    <th scope="row">{{ $checkInDate }}</th>
                                                    <td>{{  $checkInMorning }}</td>
                                                    <td>{{  $checkOutMorning }}</td>
                                                    <td>Table cell</td>
                                                    <td>Table cell</td>
                                                        
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
        
                                
                                    <div class="card-body text-center">
                                        <a href="/attendance/checkout" class="btn btn-success waves-effect waves-light">Registrar</a>
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

