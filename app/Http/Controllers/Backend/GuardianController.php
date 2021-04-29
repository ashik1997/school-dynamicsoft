<?php

namespace App\Http\Controllers\Backend;

use Auth;
use App\Models\Guardian;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuardianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function list(){
    	$guardians = Guardian::orderBy('id', 'DESC')->get();
    	return view('admin.guardian.list')->with(compact('guardians'));
    }
    public function edit(Request $request, $id){
    	$guardian = Guardian::find($id);
    	if ($request->isMethod('post')) {
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
            return redirect(route('guardian-list'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `অভিভাবক সফলভাবে আপডেট হয়েছে`
				})
				</script>
				');
        }
    	return view('admin.guardian.edit')->with(compact('guardian'));
    }
}
