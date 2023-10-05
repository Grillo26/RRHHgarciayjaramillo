<x-master>
<div class="page-content">
    <div class="container-fluid">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Registro de Salida</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('attendance.checkout') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="check_out" class="col-md-4 col-form-label text-md-right text-center">Hora de Salida</label>

                                    <div class="col-md-6">
                                        <input id="check_out" type="text" class="form-control text-center" name="check_out" value="{{ now() }}" readonly>
                                    </div>
                                </div>

                                <div class="form-group row mb-0 mt-3 text-center">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-success">
                                            Registrar Salida
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-master>
