<?php

namespace App\Http\Controllers\Backend;

use Auth;
use App\Models\ManageClass;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add(Request $request){
    	if ($request->isMethod('post')) {
            $class = new ManageClass;
            if ($request->class_id > 0) {
                $class = ManageClass::find($request->class_id);
            }
            $this->validate($request, [
                'class_name' => 'string|max:30'
            ]);

            $class->name = $request->class_name;
            $class->save();

            return redirect(route('class-add'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `ক্লাস সফলভাবে যোগ করা হয়েছে`
				})
				</script>
				');
        }
        $classes = ManageClass::get();
    	return view('admin.class.add')->with(compact('classes'));
    }
    public function edit($id){
        return ManageClass::find($id);
    }
    public function destroy($id)
    {
        if (!empty($id)) {
            ManageClass::find($id)->delete();
            return redirect(route('class-add'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `ক্লাস সফলভাবে মোছা হয়েছে`
				})
				</script>
				');
        }
    }
    public function list(){
        return ManageClass::get();
    }
}
