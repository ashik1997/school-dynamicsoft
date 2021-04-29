<?php

namespace App\Http\Controllers\Backend;

use Auth;
use App\Models\Subject;
use App\Models\ManageClass;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add(Request $request){
    	if ($request->isMethod('post')) {
            $subject = new Subject;
            if ($request->subject_id > 0) {
                $subject = Subject::find($request->subject_id);
            }
            $this->validate($request, [
                'subject_name' => 'string'
            ]);

            $subject->name = $request->subject_name;
            $subject->class_id = $request->class_id;
            $subject->save();

            return redirect(route('subject-add'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `সাবজেক্ট সফলভাবে যোগ করা হয়েছে`
				})
				</script>
				');
        }
        $subjects = Subject::with('cls')->get();
        $classes = ManageClass::get();
    	return view('admin.subject.add')->with(compact('subjects','classes'));
    }
    public function edit($id){
        return Subject::find($id);
    }
    public function destroy($id)
    {
        if (!empty($id)) {
            Subject::find($id)->delete();
            return redirect(route('subject-add'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `সাবজেক্ট সফলভাবে মোছা হয়েছে`
				})
				</script>
				');
        }
    }
    public function class_subject(Request $request){
        return $subjects = Subject::where('class_id', $request->class_id)->get();
    }
}
