<?php

namespace App\Http\Controllers\Backend;
use Auth;
use Image;
use App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function add(Request $request){
    	if ($request->isMethod('post')) {
            $blog = new Blog;
            $this->validate($request, [
                'title' => 'required|string|min:10',
                'image' => 'required'
            ]);
                    	
    		if ($request->hasFile('image')) {
    			// image
	        	$extension = strtolower($request->file('image')->getClientOriginalExtension());;
	        	$file_name = time().'.'.$extension;
	        	$image = Image::make($request->image)->resize(849, 450);
	        	$image->save(public_path('frontend/images/blog/'.$file_name));
	        	$blog->image = $file_name;
    		}

            $blog->title = $request->title;
            $blog->sub_title = $request->sub_title;
            $blog->description = $request->description;
            $blog->user_id = Auth::user()->id;
            $blog->save();
            return redirect(route('blog-add'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `Blog successfully added`
				})
				</script>
				');
        }
    	return view('admin.blog.new');
    }
    public function list(){
    	$blogs = Blog::with('user')->get();
    	return view('admin.blog.list')->with(compact('blogs'));
    }
    public function edit(Request $request, $id){
    	$blog = Blog::find($id);
    	if ($request->isMethod('post')) {
            $this->validate($request, [
                'title' => 'required|string|min:10'
            ]);
                    	
    		if ($request->hasFile('image')) {
    			// image
	        	$extension = strtolower($request->file('image')->getClientOriginalExtension());;
	        	$file_name = time().'1.'.$extension;
	        	$image = Image::make($request->image)->resize(849, 450);
	        	$image->save(public_path('frontend/images/blog/'.$file_name));
    			$image_path = public_path('frontend/images/blog/'.$blog->image);
	            if (file_exists($image_path)) {
	        		@unlink($image_path);
	        	}
	        	$blog->image = $file_name;
    		}

            $blog->title = $request->title;
            $blog->sub_title = $request->sub_title;
            $blog->description = $request->description;
            $blog->user_id = Auth::user()->id;
            $blog->save();
            return redirect(route('blog-list'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `Blog successfully updated`
				})
				</script>
				');
        }
    	return view('admin.blog.edit')->with(compact('blog'));
    }
    public function destroy($id)
    {
        if (!empty($id)) {
            $data = Blog::FindOrFail($id);
            $image = public_path('frontend/images/blog/'.$data->image);
            if (file_exists($image)) {
        		@unlink($image);
        	}
            Blog::find($id)->delete();
            return redirect(route('blog-list'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `Blog successfully deleted`
				})
				</script>
				');
        }
    }
}
