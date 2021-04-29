<?php

namespace App\Http\Controllers\Backend;

use Auth;
use App\Models\Employee;
use App\Models\SalaryPayment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SalaryPaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add(Request $request){
    	if ($request->isMethod('post')) {
            $salary_payment = new SalaryPayment;
            $this->validate($request, [
                'employee_id' => 'required|integer',
                'amount' => 'required|integer',
            ]);

            $salary_payment->employee_id = $request->employee_id;
            $salary_payment->month = $request->month;
            $salary_payment->year = $request->year;
            $salary_payment->date = $request->paid_date;
            $salary_payment->amount = $request->amount;
            $salary_payment->save();

            return redirect(route('salary-payment-new'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `বেতন সফলভাবে যোগ করা হয়েছে`
				})
				</script>
				');
        }
    	return view('admin.salary_payment.new');
    }
    public function edit(Request $request, $id){
        $salary_payment = SalaryPayment::find($id);
        if ($request->isMethod('post')) {
        	$salary_payment = SalaryPayment::find($request->payment_id);
        	$this->validate($request, [
                'employee_id' => 'required|integer',
                'amount' => 'required|integer',
            ]);

            $salary_payment->employee_id = $request->employee_id;
            $salary_payment->month = $request->month;
            $salary_payment->year = $request->year;
            $salary_payment->date = $request->paid_date;
            $salary_payment->amount = $request->amount;
            $salary_payment->save();

            return redirect(route('salary-payment-list'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `বেতন সফলভাবে আপডেট হয়েছে`
				})
				</script>
				');
        }
        return view('admin.salary_payment.edit')->with(compact('salary_payment'));
    }
    public function list(){
        $salary_payments = SalaryPayment::get();
        return view('admin.salary_payment.list')->with(compact('salary_payments'));
    }
    public function destroy($id)
    {
        if (!empty($id)) {
            SalaryPayment::find($id)->delete();
            return redirect(route('salary-payment-add'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `বেতন সফলভাবে মোছা হয়েছে`
				})
				</script>
				');
        }
    }
    public function employee_info(Request $request){
        return Employee::find($request->emp_id);
    }
}
