<?php

namespace App\Http\Controllers\Backend;

use Auth;
use App\Models\SetPayment;
use App\Models\ManageClass;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SetPaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add(Request $request){
    	if ($request->isMethod('post')) {
            $set_payment = new SetPayment;
            $this->validate($request, [
                'purpose' => 'string|required',
                'year' => 'string|required',
                'amount' => 'required',
            ]);

            $set_payment->purpose = $request->purpose;
            $set_payment->class_id = $request->class_id;
            $set_payment->year = $request->year;
            $set_payment->amount = $request->amount;
            $set_payment->save();

            return redirect(route('set-payment-new'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `সেট পেমেন্ট সফলভাবে যোগ করা হয়েছে`
				})
				</script>
				');
        }
        $classes = ManageClass::get();
    	return view('admin.set_payment.new')->with(compact('classes'));
    }
    public function list(){
        $set_payments = SetPayment::get();
        return view('admin.set_payment.list')->with(compact('set_payments'));
    }
    public function edit(Request $request, $id){
    	$classes = ManageClass::get();
        $set_payment = SetPayment::find($id);
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'purpose' => 'string|required',
                'year' => 'string|required',
                'amount' => 'required',
            ]);

            $set_payment->purpose = $request->purpose;
            $set_payment->class_id = $request->class_id;
            $set_payment->year = $request->year;
            $set_payment->amount = $request->amount;
            $set_payment->save();

            return redirect(route('set-payment-list'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `সেট পেমেন্ট সফলভাবে যোগ করা হয়েছে`
				})
				</script>
				');
        }
        return view('admin.set_payment.edit')->with(compact('set_payment','classes'));
    }
    public function destroy($id)
    {
        if (!empty($id)) {
            SetPayment::find($id)->delete();
            return redirect(route('set-payment-new'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `সেট পেমেন্ট সফলভাবে মোছা হয়েছে`
				})
				</script>
				');
        }
    }
}
