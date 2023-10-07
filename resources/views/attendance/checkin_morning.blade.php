<x-master>
<div class="page-content">
    <div class="container-fluid">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Registro de Entrada</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('checkinMorning') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="checkInMorning" class="col-md-4 col-form-label text-center text-md-right">Hora de Entrada</label>

                                    <div class="col-md-6">
                                        <input id="checkInMorning" type="text" class="form-control text-center" name="checkInMorning" value="{{ now() }}" readonly>
                                    </div>
                                </div>

                                <div class="form-group row mb-0  text-center mt-3">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-success">
                                            Registrar Entrada
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

