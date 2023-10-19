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
                                        Solamente usted puede realizar el registro de Asistencia de los usuarios.
                                    </p>
                                        <form method="post" action="{{ route('users.register') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="form-group col-9">
                                                    <label for="user_id">Usuario:</label>
                                                    <select name="user_id" id="user_id" class="form-control">
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-3">
                                                    <label for="check_in_morning">Fecha:</label>
                                                    <input class="form-control" type="date" value="{{ now()->toDateString() }}" disabled id="example-date-input">
                                                </div>

                                            </div>
                                            
                                            <div class="row pt-3">
                                                <div class="form-group col">
                                                    <label for="check_in_morning">Ingreso Mañana:</label>
                                                    <input type="time" name="check_in_morning" id="check_in_morning" class="form-control" value="{{ old('check_in_morning') }}">
                                                </div>
                                                <div class="form-group col">
                                                    <label for="check_out_morning">Salida Mañana:</label>
                                                    <input type="time" name="check_out_morning" id="check_out_morning" class="form-control">
                                                </div>
                                                <div class="form-group col">
                                                    <label for="check_out_morning">Ingreso Tarde:</label>
                                                    <input type="time" name="check_out_morning" id="check_out_morning" class="form-control">
                                                </div>
                                                <div class="form-group col">
                                                    <label for="check_out_morning">Salida Tarde:</label>
                                                    <input type="time" name="check_out_morning" id="check_out_morning" class="form-control">
                                                </div>

                                            </div>
                                            
                                            <!-- Agrega más campos según tus necesidades -->
                                            <div class="card-body text-center">
                                                <button type="submit" class="btn btn-success waves-effect waves-light">Registrar</button>
                                            </div>
                                        </form>
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

