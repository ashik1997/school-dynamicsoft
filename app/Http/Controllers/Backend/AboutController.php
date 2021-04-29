<?php

namespace App\Http\Controllers\Backend;
use Auth;
use Image;
use App\Models\About;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
    	if ($request->isMethod('post')) {
            $info = About::firstOrFail();
            $this->validate($request, [
                'title' => 'required|string|min:5',
                'image' => 'mimes:jpg,bmp,png'
            ]);
                    	
    		if ($request->hasFile('image')) {
    			// image
	        	$extension = strtolower($request->file('image')->getClientOriginalExtension());;
	        	$file_name = time().'.'.$extension;
	        	$image = Image::make($request->image)->resize(530, 804);
	        	$image->save(public_path('frontend/images/'.$file_name));
	        	$info->image = $file_name;
    		}

            $info->title = $request->title;
            $info->video = $request->video;
            $info->description = $request->description;
            $info->user_id = Auth::user()->id;
            $info->save();
	        return redirect(route('about-info'))->with('flash_success','
	            	<script>
					Toast.fire({
					  icon: `success`,
					  title: `About successfully updated`
					})
					</script>
					');   
        }

    	$about = About::firstOrFail();
    	return view('admin.settings.about')->with(compact('about'));
    }
}
