<x-master>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-xl-5">
                    <h1 class="text-center">My Profile</h1>
                    <div class="card">
                        <center>
                            <img class="card-img-top img-fluid img-thumbnail rounded"  src="{{ asset('upload/admin_image') }}/{{ $adminData->p_image }}" alt="Card image cap" style="width: 250px; height: 250px; padding:2rem;">
                        </center>
                        <div class="card-body">
                            <h4 class="card-title">Name : {{ $adminData->name }}</h4>
                            <hr>
                            <h4 class="card-title">Email : {{ $adminData->email }}</h4>
                            <hr>
                            <a href="{{ route('admin.edit.profile') }}" class="btn btn-primary waves-effect waves-light">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master>
