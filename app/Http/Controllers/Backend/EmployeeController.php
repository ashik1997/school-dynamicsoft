<?php

namespace App\Http\Controllers\Backend;

use Auth;
use Image;
use App\Models\Employee;
use App\Models\EducationalExperience;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add(Request $request){
    	if ($request->isMethod('post')) {
            $employee = new Employee;
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
	        	$image->save('frontend/images/employees/'.$file_name);
	        	$employee->photo = $file_name;
    		}

            $employee->name = $request->name;
            $employee->phone = $request->phone;
            $employee->email = $request->email;
            $employee->address = $request->address;
            $employee->dob = $request->dob;
            $employee->gender = $request->gender;
            $employee->blood_group = $request->blood_group;
            $employee->nid = $request->nid;
            $employee->details = $request->details;
            $employee->employee_type = $request->employee_type;
            $employee->position = $request->position;
            $employee->join_date = $request->join_date;
            $employee->resign_date = $request->resign_date;
            $employee->salary = $request->salary;
            $employee->save();

            $size = count(collect($request)->get('exam_name'));
             
            for ($i = 0; $i < $size; $i++)
            {
                $e_experience = new EducationalExperience;
                $e_experience->employee_id = $employee->id;
                $e_experience->exam_name = $request->get('exam_name')[$i];
                $e_experience->group_subject = $request->get('group_subject')[$i];
                $e_experience->institute = $request->get('institute')[$i];
                $e_experience->result = $request->get('result')[$i];
                $e_experience->pass_year = $request->get('pass_year')[$i];
                $e_experience->duration = $request->get('duration')[$i];
                $e_experience->save();
            }

            return redirect(route('employee-add'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `কর্মচারী সফলভাবে যোগ করা হয়েছে`
				})
				</script>
				');
        }
    	return view('admin.employee.new');
    }
    public function employee_list(){
    	$employees = Employee::with('edu_exp')->where('employee_type', 'employee')->orderBy('id', 'DESC')->get();
    	return view('admin.employee.employee_list')->with(compact('employees'));
    }
    public function teacher_list(){
        $employees = Employee::with('edu_exp')->where('employee_type', 'teacher')->orderBy('id', 'DESC')->get();
        return view('admin.employee.teacher_list')->with(compact('employees'));
    }
    public function edit(Request $request, $id){
    	$employee = Employee::with('edu_exp')->find($id);
    	if ($request->isMethod('post')) {
    		if ($request->hasFile('image')) {
    			// image
	        	$extension = strtolower($request->file('image')->getClientOriginalExtension());;
	        	$file_name = time().'.'.$extension;
	        	$image = Image::make($request->image)->resize(450, 600);
	        	$image->save('frontend/images/employees/'.$file_name);
    			$image_path = 'frontend/images/employees/'.$employee->photo;
	            if (file_exists($image_path)) {
	        		@unlink($image_path);
	        	}
	        	$employee->photo = $file_name;
    		}

            $employee->name = $request->name;
            $employee->phone = $request->phone;
            $employee->email = $request->email;
            $employee->address = $request->address;
            $employee->dob = $request->dob;
            $employee->gender = $request->gender;
            $employee->blood_group = $request->blood_group;
            $employee->nid = $request->nid;
            $employee->details = $request->details;
            $employee->employee_type = $request->employee_type;
            $employee->position = $request->position;
            $employee->join_date = $request->join_date;
            $employee->resign_date = $request->resign_date;
            $employee->salary = $request->salary;
            $employee->save();

            $size = count(collect($request)->get('exam_name'));

            EducationalExperience::where('employee_id', $id)->delete();
            for ($i = 0; $i < $size; $i++)
            {
                $e_experience = new EducationalExperience;
                $e_experience->employee_id = $employee->id;
                $e_experience->exam_name = $request->get('exam_name')[$i];
                $e_experience->group_subject = $request->get('group_subject')[$i];
                $e_experience->institute = $request->get('institute')[$i];
                $e_experience->result = $request->get('result')[$i];
                $e_experience->pass_year = $request->get('pass_year')[$i];
                $e_experience->duration = $request->get('duration')[$i];
                $e_experience->save();
            }
            return back()->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `কর্মচারী সফলভাবে আপডেট হয়েছে`
				})
				</script>
				');
        }
    	return view('admin.employee.edit')->with(compact('employee'));
    }
    public function destroy($id)
    {
        if (!empty($id)) {
            $data = Employee::FindOrFail($id);
            $image = 'frontend/images/employees/'.$data->image;
            if (file_exists($image)) {
        		@unlink($image);
        	}
            Employee::find($id)->delete();
            EducationalExperience::where('employee_id', $id)->delete();
            return back()->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `শিক্ষার্থী সফলভাবে মোছা হয়েছে`
				})
				</script>
				');
        }
    }

}
