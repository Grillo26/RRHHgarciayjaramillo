<x-master>
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Personal</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Usuarios</a></li>
                            <li class="breadcrumb-item active">Lista de Usuarios</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($users as $user)
            <div class="col-lg-4">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            @if ($user->p_image)
                                <img class="d-flex me-3 rounded-circle img-thumbnail avatar-lg" src="{{ asset('upload/admin_image/' . $user->p_image) }}" alt="No imagen">
                            @else
                                No hay imagen
                            @endif      
                            <div class="flex-grow-1">
                                <h5 class="mt-0 font-size-18 mb-1">{{ $user->name}}</h5>
                                <p class="text-muted font-size-14">{{ $user->username}}</p>

                                <ul class="social-links list-inline mb-0">
                                    <li class="list-inline-item"><a role="button" class="text-reset" title="Facebook" data-bs-placement="top" data-bs-toggle="tooltip" class="tooltips" href=""><i class="fab fa-facebook-f"></i></a>

                                    </li>
                                    <li class="list-inline-item">
                                        <a role="button" class="text-reset" title="Twitter" data-bs-placement="top" data-bs-toggle="tooltip" class="tooltips" href=""><i class=" fab fa-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a role="button" class="text-reset" title="1234567890" data-bs-placement="top" data-bs-toggle="tooltip" class="tooltips" href=""><i class="fas fa-phone-alt"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a role="button" class="text-reset" title="@skypename" data-bs-placement="top" data-bs-toggle="tooltip" class="tooltips" href=""><i class="fab fa-skype"></i></a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div> 
</div>
</x-master>
