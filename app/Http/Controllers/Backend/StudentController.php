<?php

namespace App\Http\Controllers\Backend;

use Auth;
use Image;
use App\Models\Student;
use App\Models\Group;
use App\Models\ManageClass;
use App\Models\Section;
use App\Models\Guardian;
use App\Models\Registration;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add(Request $request){
    	if ($request->isMethod('post')) {
            $student = new Student;
            $this->validate($request, [
                'image' => 'mimes:jpg,bmp,png',
                'phone' => 'string|max:18',
                'email' => 'email',
            ]);
                    	
    		if ($request->hasFile('image')) {
    			// image
	        	$extension = strtolower($request->file('image')->getClientOriginalExtension());;
	        	$file_name = time().'.'.$extension;
	        	$image = Image::make($request->image)->resize(450, 600);
	        	$image->save('frontend/images/students/'.$file_name);
	        	$student->image = $file_name;
    		}

            $student->name = $request->name;
            $student->phone = $request->phone;
            $student->email = $request->email;
            $student->address = $request->address;
            $student->dob = $request->dob;
            $student->gender = $request->gender;
            $student->blood_group = $request->blood_group;
            $student->save();

            $guardian = new Guardian;
            $guardian->student_id = $student->id;
            $guardian->father_name = $request->f_name;
            $guardian->father_phone = $request->f_phone;
            $guardian->father_email = $request->f_email;
            $guardian->father_occupation = $request->f_occupation;
            $guardian->father_address = $request->f_address;
            $guardian->mother_name = $request->m_name;
            $guardian->mother_phone = $request->m_phone;
            $guardian->mother_email = $request->m_email;
            $guardian->mother_occupation = $request->m_occupation;
            $guardian->mother_address = $request->m_address;
            $guardian->save();

            $registration = new Registration;
            $registration->student_id = $student->id;
            $registration->year = $request->year;
            $registration->class_id = $request->class_id;
            $registration->section_id = $request->section_id;
            $registration->group_id = $request->group_id;
            $registration->class_roll = $request->class_roll;
            $registration->board_roll = $request->board_roll;
            $registration->board_reg_no = $request->board_reg_no;
            $registration->save();

            return redirect(route('student-add'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `ছাত্র সফলভাবে যোগ করা হয়েছে`
				})
				</script>
				');
        }
        $groups = Group::get();
        $classes = ManageClass::get();
    	return view('admin.student.new')->with(compact('groups','classes'));
    }
    public function list(){
    	$students = Student::with('guardian','registration')->orderBy('id', 'DESC')->get();
    	return view('admin.student.list')->with(compact('students'));
    }
    public function edit(Request $request, $id){
    	$student = Student::with('guardian','registration')->find($id);
    	if ($request->isMethod('post')) {
    		if ($request->hasFile('image')) {
    			// image
	        	$extension = strtolower($request->file('image')->getClientOriginalExtension());;
	        	$file_name = time().'.'.$extension;
	        	$image = Image::make($request->image)->resize(450, 600);
	        	$image->save('frontend/images/students/'.$file_name);
    			$image_path = 'frontend/images/students/'.$student->image;
	            if (file_exists($image_path)) {
	        		@unlink($image_path);
	        	}
	        	$student->image = $file_name;
    		}

            $student->name = $request->name;
            $student->phone = $request->phone;
            $student->email = $request->email;
            $student->address = $request->address;
            $student->dob = $request->dob;
            $student->gender = $request->gender;
            $student->blood_group = $request->blood_group;
            $student->save();

            $guardian = Guardian::firstWhere('student_id', $student->id);
            $guardian->father_name = $request->f_name;
            $guardian->father_phone = $request->f_phone;
            $guardian->father_email = $request->f_email;
            $guardian->father_occupation = $request->f_occupation;
            $guardian->father_address = $request->f_address;
            $guardian->mother_name = $request->m_name;
            $guardian->mother_phone = $request->m_phone;
            $guardian->mother_email = $request->m_email;
            $guardian->mother_occupation = $request->m_occupation;
            $guardian->mother_address = $request->m_address;
            $guardian->save();

            $registration = Registration::firstWhere('id', $request->registration_id);
            $registration->student_id = $student->id;
            $registration->year = $request->year;
            $registration->class_id = $request->class_id;
            $registration->section_id = $request->section_id;
            $registration->group_id = $request->group_id;
            $registration->class_roll = $request->class_roll;
            $registration->board_roll = $request->board_roll;
            $registration->board_reg_no = $request->board_reg_no;
            $registration->save();
            return redirect(route('student-list'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `ছাত্র সফলভাবে আপডেট হয়েছে`
				})
				</script>
				');
        }
        $groups = Group::get();
        $classes = ManageClass::get();
    	return view('admin.student.edit')->with(compact('student','groups','classes'));
    }
    public function destroy($id)
    {
        if (!empty($id)) {
            $data = Student::FindOrFail($id);
            $image = 'frontend/images/students/'.$data->image;
            if (file_exists($image)) {
        		@unlink($image);
        	}
            Student::find($id)->delete();
            return redirect(route('student-list'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `শিক্ষার্থী সফলভাবে মোছা হয়েছে`
				})
				</script>
				');
        }
    }
    public function getClassSection(Request $request){
        $id = $request->class_id;
        $year = $request->year;
        return $sections = Section::where('class_id', $id)->where('year', $year)->get();

    }
    public function student_id_card($id){
        $student = Student::find($id);
        return view('admin.student.id_card')->with(compact('student'));
    }
}
