<?php

namespace App\Http\Controllers\Backend;

use Auth;
use App\Models\Exam;
use App\Models\ManageClass;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add(Request $request){
    	if ($request->isMethod('post')) {
            $exam = new Exam;
            if ($request->exam_id > 0) {
                $exam = Exam::find($request->exam_id);
            }
            $this->validate($request, [
                'exam_name' => 'string'
            ]);

            $exam->name = $request->exam_name;
            $exam->class_id = $request->class_id;
            $exam->save();

            return redirect(route('exam-add'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `পরীক্ষা সফলভাবে যোগ করা হয়েছে`
				})
				</script>
				');
        }
        $exams = Exam::with('cls')->get();
        $classes = ManageClass::get();
    	return view('admin.exam.add')->with(compact('exams','classes'));
    }
    public function edit($id){
        return Exam::find($id);
    }
    public function destroy($id)
    {
        if (!empty($id)) {
            Exam::find($id)->delete();
            return redirect(route('exam-add'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `পরীক্ষা সফলভাবে মোছা হয়েছে`
				})
				</script>
				');
        }
    }
    public function class_exam(Request $request){
        return $exams = Exam::where('class_id', $request->class_id)->get();
    }
}
