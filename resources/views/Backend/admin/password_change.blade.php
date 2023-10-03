<x-master>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('password_update') }}" method="POST">
                                @csrf
                                <h4 class="card-title text-center">Change Password</h4><br><br>

                                @if (count($errors))
                                    @foreach ($errors->all() as $error )
                                        <p class="alert alert-danger">{{ $error }}</p>
                                    @endforeach
                                    
                                @endif

                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Old Password</label>
                                   <div class="col-sm-10">
                                        <input type="password" class="form-control" name="old_password" placeholder="Old Password">
                                   </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">New Password</label>
                                   <div class="col-sm-10">
                                        <input type="password" class="form-control" name="new_password" placeholder="New Password">
                                   </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Confirm Password</label>
                                   <div class="col-sm-10">
                                        <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
                                   </div>
                                </div>
                                
                                <button type="submit" class="btn btn-success">Update Password</button>
                              </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
</x-master>
