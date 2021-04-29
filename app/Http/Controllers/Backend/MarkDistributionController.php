<?php

namespace App\Http\Controllers\Backend;
use Auth;
use App\Models\MarkDistribution;
use App\Models\ManageClass;
use App\Models\Subject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MarkDistributionController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function add(Request $request){
    	if ($request->isMethod('post')) {
            $this->validate($request, [
            ]);

            $size = count(collect($request)->get('name'));
             
            for ($i = 0; $i < $size; $i++)
            {
            	$mark_distribution = new MarkDistribution;
                $mark_distribution->subject_id = $request->subject_id;
                $mark_distribution->name = $request->get('name')[$i];
                $mark_distribution->mark = $request->get('mark')[$i];
                $mark_distribution->save();
            }

            return redirect(route('mark-distribution-add'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `মার্ক ডিস্ট্রিবিউশন সফলভাবে যোগ করা হয়েছে`
				})
				</script>
				');
        }
    	return view('admin.mark_distribution.new');
    }
    public function list(){
    	$subjects = Subject::with('mark_distributions','cls')->get();
    	return view('admin.mark_distribution.list')->with(compact('subjects'));
    }

    public function edit(Request $request, $id){
    	$subjects = Subject::with('mark_distributions','cls')->find($id);
    	if ($request->isMethod('post')) {
            $this->validate($request, [
            ]);

            $size = count(collect($request)->get('name'));
             
            for ($i = 0; $i < $size; $i++)
            {
            	if (!empty($request->get('md_id')[$i])) {
            		$mark_distribution = MarkDistribution::find($request->get('md_id')[$i]);
            	}else{
            		$mark_distribution = new MarkDistribution;
            	}
                $mark_distribution->subject_id = $request->subject_id;
                $mark_distribution->name = $request->get('name')[$i];
                $mark_distribution->mark = $request->get('mark')[$i];
                $mark_distribution->save();
            }

            return redirect(route('mark-distribution-list'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `মার্ক ডিস্ট্রিবিউশন সফলভাবে সম্পাদনা করা হয়েছে`
				})
				</script>
				');
        }
    	return view('admin.mark_distribution.edit')->with(compact('subjects'));
    }
    public function destroy($id)
    {
        if (!empty($id)) {
            MarkDistribution::where('subject_id',$id)->delete();
            return redirect(route('mark-distribution-list'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `মার্ক ডিস্ট্রিবিউশন সফলভাবে মোছা হয়েছে`
				})
				</script>
				');
        }
    }
}
