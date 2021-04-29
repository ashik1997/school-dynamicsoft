<?php

namespace App\Http\Controllers\Backend;

use Auth;
use App\Models\Expense;
use App\Models\ManageClass;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add(Request $request){
    	if ($request->isMethod('post')) {
            $expense = new Expense;
            $this->validate($request, [
                'purpose' => 'string|required',
                'date' => 'string|required',
                'amount' => 'required',
            ]);

            $expense->purpose = $request->purpose;
            $expense->date = $request->date;
            $expense->amount = $request->amount;
            $expense->save();

            return redirect(route('expense-new'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `খরচ সফলভাবে যোগ করা হয়েছে`
				})
				</script>
				');
        }
        $classes = ManageClass::get();
    	return view('admin.expense.new')->with(compact('classes'));
    }
    public function list(){
        $expenses = Expense::get();
        return view('admin.expense.list')->with(compact('expenses'));
    }
    public function edit(Request $request, $id){
    	$classes = ManageClass::get();
        $expense = Expense::find($id);
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'purpose' => 'string|required',
                'date' => 'string|required',
                'amount' => 'required',
            ]);

            $expense->purpose = $request->purpose;
            $expense->date = $request->date;
            $expense->amount = $request->amount;
            $expense->save();

            return redirect(route('expense-list'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `খরচ সফলভাবে যোগ করা হয়েছে`
				})
				</script>
				');
        }
        return view('admin.expense.edit')->with(compact('expense','classes'));
    }
    public function destroy($id)
    {
        if (!empty($id)) {
            Expense::find($id)->delete();
            return redirect(route('expense-list'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `খরচ সফলভাবে মোছা হয়েছে`
				})
				</script>
				');
        }
    }
}
