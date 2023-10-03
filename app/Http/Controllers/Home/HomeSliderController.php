<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeSlider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class HomeSliderController extends Controller
{
    public function homeSlider(){
        $homeSlider = HomeSlider::find(1);
        return view('Backend.admin.home.home_slider',compact('homeSlider'));
    }

    public function homeSliderUpdate(Request $request){
        $slider_id = $request->id;

        if($request->file('slider_image')){
            $image = $request->file('slider_image');
            $image_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(636,852)->save('upload/slider_image/'.$image_name);
            $save_url = 'upload/slider_image/'.$image_name;

            HomeSlider::findOrFail($slider_id)->update([
                'title'=>$request->title,
                'shor_description'=>$request->shor_description,
                'video_url'=>$request->video_url,
                'slider_image'=>$save_url,
            ]);
            $notification = array(
                'message' => 'Slider update with image',
                'alert_type' => 'info',
            );
            return redirect()->back()->with($notification);
        }else{
            HomeSlider::findOrFail($slider_id)->update([
                'title'=>$request->title,
                'shor_description'=>$request->shor_description,
                'video_url'=>$request->video_url,
            ]);
            $notification = array(
                'message' => 'Slider update without image',
                'alert_type' => 'info',
            );
            return redirect()->back()->with($notification);
        }
    }
}

