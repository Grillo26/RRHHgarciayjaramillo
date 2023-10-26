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
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title pb-2">Registrar asistencia de:  </h4>
                                            
                                            <form class="needs-validation" novalidate>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="mb-3">
                                                            <label for="validationCustom01" class="form-label">Ingreso Mañana</label>
                                                            <input class="form-control" type="time" value="13:45:00" id="example-time-input">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="mb-3">
                                                            <label for="validationCustom02" class="form-label">Salida Mañana</label>
                                                            <input class="form-control" type="time" value="13:45:00" id="example-time-input">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="mb-3">
                                                            <label for="validationCustom02" class="form-label">Ingreso Tarde</label>
                                                            <input class="form-control" type="time" value="13:45:00" id="example-time-input">
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="mb-3">
                                                            <label for="validationCustom02" class="form-label">Last Salida Tarde</label>
                                                            <input class="form-control" type="time" value="13:45:00" id="example-time-input">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="pt-2 text-center ">
                                                    <button class="btn btn-success" type="submit">Registrar</button>
                                                    <a  class="btn btn-danger " href="{{ route('users.register') }}">Volver</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- end card -->
                                </div> <!-- end col -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master>