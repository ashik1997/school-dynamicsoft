<?php

namespace App\Http\Controllers\Backend;

use Auth;
use App\Models\Section;
use App\Models\ManageClass;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add(Request $request){
    	if ($request->isMethod('post')) {
            $section = new Section;
            if ($request->section_id > 0) {
                $section = Section::find($request->section_id);
            }
            $this->validate($request, [
                'section_name' => 'string|required',
                'year' => 'required',
            ]);

            $section->name = $request->section_name;
            $section->year = $request->year;
            $section->class_id = $request->class_id;
            $section->save();

            return redirect(route('section-add'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `শাখা সফলভাবে যোগ করা হয়েছে`
				})
				</script>
				');
        }
        $classes = ManageClass::with('sections')->get();
    	return view('admin.section.add')->with(compact('classes'));
    }
    public function edit($id){
        return Section::find($id);
    }
    public function destroy($id)
    {
        if (!empty($id)) {
            Section::find($id)->delete();
            return redirect(route('section-add'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `শাখা সফলভাবে মোছা হয়েছে`
				})
				</script>
				');
        }
    }
}
