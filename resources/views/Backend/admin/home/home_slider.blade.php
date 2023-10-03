<x-master>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('home.slider.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <h4 class="card-title text-center">Home Slider</h4>
                                <input type="hidden" name="id" value="{{  $homeSlider->id  }}">
                                <div class="mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Title</label>
                                   <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{ $homeSlider->title }}" name="title">
                                   </div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Short Description</label>
                                   <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{ $homeSlider->shor_description }}" name="shor_description">
                                   </div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Video URL</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{ $homeSlider->video_url }}" name="video_url">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Slider Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" id="image" class="form-control" name="slider_image">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="col-sm-10">
                                        <img class="card-img-top img-fluid img-thumbnail rounded" id="showImage" 
                                        src="{{!empty($homeSlider->slider_image) ? url($homeSlider->slider_image) : url('upload/nophoto.jpg')}}" 
                                        alt="Card image cap" style="width: 12rem">
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
