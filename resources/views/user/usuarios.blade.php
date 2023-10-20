<x-master>
	<div class="page-content">
		<div class="container-fluid">
			<!-- start page title -->
			<div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Usuarios</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Usuarios</a></li>
                                            <li class="breadcrumb-item active">Lista de Usuarios</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

			<!-- Connection Cards -->
			
			<div class="row g-4">
			@foreach ($users as $user)
				<div class="col-xl-4 col-lg-6 col-md-6">
					<div class="card">
						<div class="card-body text-center">
							<div class="mx-auto mb-3 text d-flex justify-content-center align-items-center">
								@if ($user->p_image)
									<img class="rounded-circle img-thumbnail"  width="150" height="150" src="{{ asset('upload/admin_image/' . $user->p_image) }}" alt="No imagen">
								@else
									No hay imagen
								@endif
							</div>

							<h5 class="mb-1 card-title">{{$user->name}}</h5>
							<span>{{$user->username}}</span>

							<div class="d-flex align-items-center justify-content-around my-4 py-2">
								<div>
									<h4 class="mb-1">120</h4>
									<span>Días Trabajados</span>
								</div>
								<div>
									<h4 class="mb-1">1</h4>
									<span>Faltas</span>
								</div>
								<div>
									<h4 class="mb-1">11</h4>
									<span>Permisos</span>
								</div>
							</div>
							<div class="d-flex align-items-center justify-content-center">
								<a href="javascript:;" class="btn btn-success d-flex align-items-center me-3"><i class="bx bx-user-check me-1"></i>Connected</a>
							</div>
						</div>
					</div>
				</div>
				@endforeach

			</div>
			<!--/ Connection Cards -->
			
		</div>
	</div>
</x-master>