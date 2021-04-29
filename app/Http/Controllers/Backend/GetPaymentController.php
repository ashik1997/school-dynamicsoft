<?php

namespace App\Http\Controllers\Backend;
use DB;
use Auth;
use App\Models\Student;
use App\Models\GetPayment;
use App\Models\SetPayment;
use App\Models\ManageClass;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetPaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add(Request $request){
    	if ($request->isMethod('post')) {
            $get_payment = new GetPayment;
            $this->validate($request, [
                'student_id' => 'required|integer',
                'paid_amount' => 'required',
            ]);

            $get_payment->student_id = $request->student_id;
            $get_payment->set_payment_id = $request->set_payment_id;
            $get_payment->paid_amount = $request->paid_amount;
            $get_payment->waiver_amount = $request->waiver_amount;
            $get_payment->note = $request->note;
            $get_payment->get_date = $request->get_date;
            $get_payment->save();

            return redirect(route('salary-payment-new'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `গেট পায়মেন্ত সফলভাবে যোগ করা হয়েছে`
				})
				</script>
				');
        }
        $classes = ManageClass::get();
    	return view('admin.get_payment.new')->with(compact('classes'));
    }
    public function edit(Request $request, $id){
        $get_payment = GetPayment::with('set_payment')->find($id);
        if ($request->isMethod('post')) {
        	// $get_payment = GetPayment::find($request->payment_id);
        	$this->validate($request, [
                'student_id' => 'required|integer',
                'paid_amount' => 'required',
            ]);

            $get_payment->student_id = $request->student_id;
            $get_payment->set_payment_id = $request->set_payment_id;
            $get_payment->paid_amount = $request->paid_amount;
            $get_payment->waiver_amount = $request->waiver_amount;
            $get_payment->note = $request->note;
            $get_payment->get_date = $request->get_date;
            $get_payment->save();

            return redirect(route('get-payment-list'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `গেট পায়মেন্ত সফলভাবে আপডেট হয়েছে`
				})
				</script>
				');
        }
        $classes = ManageClass::get();
        return view('admin.get_payment.edit')->with(compact('get_payment','classes'));
    }
    public function list(){
        $get_payments = DB::table('get_payments')
                ->join('set_payments','get_payments.set_payment_id', '=', 'set_payments.id')
                ->join('manage_classes', 'set_payments.class_id', '=', 'manage_classes.id')
                ->select('get_payments.id','get_payments.student_id','get_payments.get_date','get_payments.waiver_amount', 'get_payments.paid_amount'
                    , 'get_payments.note'
                    , 'set_payments.purpose as set_payment_purpose', 'set_payments.amount as set_payment_amount', 'manage_classes.name as class_name')
                ->get();

        // $get_payments = GetPayment::with('class','set_payment')->get();
        return view('admin.get_payment.list')->with(compact('get_payments'));
    }
    public function destroy($id)
    {
        if (!empty($id)) {
            GetPayment::find($id)->delete();
            return redirect(route('get-payment-add'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `গেট পায়মেন্ত সফলভাবে মোছা হয়েছে`
				})
				</script>
				');
        }
    }
    public function student_info(Request $request){
        return Student::find($request->stu_id);
    }
    public function set_payment_info(Request $request){
        return SetPayment::where('class_id',$request->class_id)->where('year',$request->year)->get();
    }
}
