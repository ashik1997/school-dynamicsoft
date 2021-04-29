<?php

namespace App\Http\Controllers\Backend;
use Auth;
use Image;
use App\Models\Gallery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function add(Request $request){
    	if ($request->isMethod('post')) {
            $gallery = new Gallery;
            $this->validate($request, [
                'image' => 'mimes:jpg,bmp,png'
            ]);
                    	
    		if ($request->hasFile('image')) {
    			// image
	        	$extension = strtolower($request->file('image')->getClientOriginalExtension());;
	        	$file_name = time().'.'.$extension;
	        	$image = Image::make($request->image)->resize(570, 500);
	        	$image->save(public_path('frontend/images/gallery/'.$file_name));
	        	$gallery->image = $file_name;
    		}

            $gallery->caption = $request->caption;
            $gallery->user_id = Auth::user()->id;
            $gallery->save();
            return redirect(route('gallery-add'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `Gallery successfully added`
				})
				</script>
				');
        }
    	return view('admin.gallery.new');
    }
    public function list(){
    	$galleries = Gallery::all();
    	return view('admin.gallery.list')->with(compact('galleries'));
    }
    public function edit(Request $request, $id){
    	$gallery = Gallery::find($id);
    	if ($request->isMethod('post')) {
    		if ($request->hasFile('gallery')) {
    			// gallery
	        	$extension = strtolower($request->file('gallery')->getClientOriginalExtension());;
	        	$file_name = time().'.'.$extension;
	        	$gallery = Image::make($request->gallery)->resize(570, 500);
	        	$gallery->save(public_path('frontend/images/gallery/'.$file_name));
    			$image_path = public_path('frontend/images/gallery/'.$gallery->gallery);
	            if (file_exists($image_path)) {
	        		@unlink($image_path);
	        	}
	        	$gallery->gallery = $file_name;
    		}

            $gallery->caption = $request->caption;
            $gallery->user_id = Auth::user()->id;
            $gallery->save();
            return redirect(route('gallery-list'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `Gallery successfully updated`
				})
				</script>
				');
        }
    	return view('admin.gallery.edit')->with(compact('gallery'));
    }
    public function destroy($id)
    {
        if (!empty($id)) {
            $data = Gallery::FindOrFail($id);
            $image = public_path('frontend/images/gallery/'.$data->image);
            if (file_exists($image)) {
        		@unlink($image);
        	}
            Gallery::find($id)->delete();
            return redirect(route('gallery-list'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `Gallery successfully deleted`
				})
				</script>
				');
        }
    }
}
