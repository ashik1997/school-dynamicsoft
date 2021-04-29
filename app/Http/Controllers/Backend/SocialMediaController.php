<?php

namespace App\Http\Controllers\Backend;
use Auth;
use Image;
use App\Models\SocialMedia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add(Request $request){
    	if ($request->isMethod('post')) {
            $social_media = new SocialMedia;
            $social_media->name = $request->name;
            $social_media->url = $request->url;
            $social_media->icon = $request->icon;
            $social_media->save();
            return redirect(route('social-media-add'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `Social media successfully added`
				})
				</script>
				');
        }
    	return view('admin.social_media.new');
    }
    public function list(){
    	$social_medias = SocialMedia::all();
    	return view('admin.social_media.list')->with(compact('social_medias'));
    }
    public function edit(Request $request, $id){
    	$social_media = SocialMedia::find($id);
    	if ($request->isMethod('post')) {
            $social_media->name = $request->name;
            $social_media->url = $request->url;
            $social_media->icon = $request->icon;
            $social_media->save();
            return redirect(route('social-media-list'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `Social media successfully updated`
				})
				</script>
				');
        }
    	return view('admin.social_media.edit')->with(compact('social_media'));
    }
    public function destroy($id)
    {
        if (!empty($id)) {
            SocialMedia::find($id)->delete();
            return redirect(route('social-media-list'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `Social media successfully deleted`
				})
				</script>
				');
        }
    }
}
