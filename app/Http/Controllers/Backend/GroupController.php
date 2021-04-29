<?php

namespace App\Http\Controllers\Backend;

use Auth;
use App\Models\Group;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add(Request $request){
    	if ($request->isMethod('post')) {
            $group = new Group;
            if ($request->group_id > 0) {
                $group = Group::find($request->group_id);
            }
            $this->validate($request, [
                'group_name' => 'string'
            ]);
            $group->name = $request->group_name;
            $group->save();

            return redirect(route('group-add'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `গ্রুপ সফলভাবে যোগ করা হয়েছে`
				})
				</script>
				');
        }
        $groups = Group::get();
    	return view('admin.group.add')->with(compact('groups'));
    }
    public function edit($id){
        return Group::find($id);
    }
    public function destroy($id)
    {
        if (!empty($id)) {
            Group::find($id)->delete();
            return redirect(route('group-add'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `গ্রুপ সফলভাবে মোছা হয়েছে`
				})
				</script>
				');
        }
    }
}
