<?php

namespace App\Http\Controllers\Home;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    public function index(){
        $aboutPage = About::find(1);
        return view('Backend.admin.about.about',compact('aboutPage'));
    }

    public function aboutPageUpdate(Request $request){
        $about_id = $request->id;

        if($request->file('about_image')){
            $image = $request->file('about_image');
            $image_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(636,852)->save('upload/about_image/'.$image_name);
            $save_url = 'upload/about_image/'.$image_name;

            About::findOrFail($about_id)->update([
                'title'=>$request->title,
                'short_title'=>$request->short_title,
                'short_disc'=>$request->short_disc,
                'long_disc'=>$request->long_disc,
                'about_image'=>$save_url,
            ]);
            $notification = array(
                'message' => 'Slider update with image',
                'alert_type' => 'info',
            );
            return redirect()->back()->with($notification);
        }else{
            About::findOrFail($about_id)->update([
                'title'=>$request->title,
                'short_title'=>$request->short_title,
                'short_disc'=>$request->short_disc,
                'long_disc'=>$request->long_disc,
            ]);
            $notification = array(
                'message' => 'Slider update without image',
                'alert_type' => 'info',
            );
            return redirect()->back()->with($notification);
        }
    }
}
