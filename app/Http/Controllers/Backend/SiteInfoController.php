<?php

namespace App\Http\Controllers\Backend;
use Auth;
use Image;
use App\Models\SiteInfo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteInfoController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
    	if ($request->isMethod('post')) {
            $info = SiteInfo::firstOrFail();
            $this->validate($request, [
                'site_name' => 'string|max:50'
            ]);
                    	
    		if ($request->hasFile('header_logo')) {
    			// image
	        	$extension = strtolower($request->file('header_logo')->getClientOriginalExtension());;
	        	$file_name = time().'1.'.$extension;
	        	$image = Image::make($request->header_logo)->resize(180, 56);
	        	$image->save(public_path('frontend/images/logo/'.$file_name));
    			$image_path = public_path('frontend/images/logo/'.$info->header_logo);
	            if (file_exists($image_path)) {
	        		@unlink($image_path);
	        	}
	        	$info->header_logo = $file_name;
    		}
    		if ($request->hasFile('footer_logo')) {
    			// image
	        	$extension = strtolower($request->file('footer_logo')->getClientOriginalExtension());;
	        	$file_name = time().'2.'.$extension;
	        	$image = Image::make($request->footer_logo)->resize(180, 56);
	        	$image->save(public_path('frontend/images/logo/'.$file_name));
    			$image_path = public_path('frontend/images/logo/'.$info->footer_logo);
	            if (file_exists($image_path)) {
	        		@unlink($image_path);
	        	}
	        	$info->footer_logo = $file_name;
    		}

            $info->site_name = $request->site_name;
            $info->map_embed = $request->map_embed;
            $info->phone = $request->phone;
            $info->email = $request->email;
            $info->address = $request->address;
            
            $info->short_about = $request->short_about;
            $info->user_id = Auth::user()->id;
            $info->save();
	        return redirect(route('site-info'))->with('flash_success','
	            	<script>
					Toast.fire({
					  icon: `success`,
					  title: `Site information successfully updated`
					})
					</script>
					');   
        }
    	$site_info = SiteInfo::firstOrFail();


    	return view('admin.settings.site_info')->with(compact('site_info'));
    }
}
