<x-master>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.store.profile') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <h4 class="card-title text-center">Edit Profile</h4>
                                <div class="mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Name</label>
                                   <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{ $profileEdit->name }}" name="name">
                                   </div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="col-sm-2 col-form-label">User Name</label>
                                   <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{ $profileEdit->username }}" name="username">
                                   </div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" value="{{ $profileEdit->email }}" name="email">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" id="image" class="form-control" name="p_image">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="col-sm-10">
                                        <img class="card-img-top img-fluid img-thumbnail rounded" id="showImage" src="{{ asset('upload/admin_image') }}/{{ $profileEdit->p_image }}" alt="Card image cap" style="width: 12rem">
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-success">Submit</button>
                              </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
    
</x-master>
