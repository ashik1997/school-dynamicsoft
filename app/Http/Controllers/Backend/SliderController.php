<?php

namespace App\Http\Controllers\Backend;
use Auth;
use Image;
use App\Models\Slider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add(Request $request){
    	if ($request->isMethod('post')) {
            $slider = new Slider;
            $this->validate($request, [
                'image' => 'required'
            ]);
                    	
    		if ($request->hasFile('image')) {
    			// image
	        	$extension = strtolower($request->file('image')->getClientOriginalExtension());;
	        	$file_name = time().'1.'.$extension;
	        	$image = Image::make($request->image)->resize(1920, 969);
	        	$image->save(public_path('frontend/images/slider/'.$file_name));
	        	$slider->image = $file_name;
    		}

            $slider->title = $request->title;
            $slider->sub_title = $request->sub_title;
            $slider->description = $request->description;
            $slider->save();
            return redirect(route('slider-add'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `Slider successfully added`
				})
				</script>
				');
            
        }
    	return view('admin.slider.add');
    }
    public function list(){
    	$sliders = Slider::all();
    	return view('admin.slider.list')->with(compact('sliders'));
    }
    public function edit(Request $request, $id){
    	$slider = Slider::find($id);
    	if ($request->isMethod('post')) {
    		if ($request->hasFile('image')) {
    			// image
	        	$extension = strtolower($request->file('image')->getClientOriginalExtension());;
	        	$file_name = time().'1.'.$extension;
	        	$image = Image::make($request->image)->resize(1920, 969);;
	        	$image->save(public_path('frontend/images/slider/'.$file_name));
    			$image_path = public_path('frontend/images/slider/'.$slider->image);
	            if (file_exists($image_path)) {
	        		@unlink($image_path);
	        	}
	        	$slider->image = $file_name;
    		}
    		$slider->title = $request->title;
            $slider->sub_title = $request->sub_title;
            $slider->description = $request->description;
            $slider->save();
            return redirect(route('slider-list'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `Slider successfully updated`
				})
				</script>
				');
            
        }
    	return view('admin.slider.edit')->with(compact('slider'));

    }
    public function destroy($id)
    {
        if (!empty($id)) {
            $data = Slider::findOrFail($id);
            $image = public_path('frontend/images/slider/'.$data->image);
            if (file_exists($image)) {
        		@unlink($image);
        	}
            Slider::find($id)->delete();
            return redirect(route('slider-list'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `Slider successfully deleted`
				})
				</script>
				');
        }
    }
}
