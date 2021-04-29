<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/adminn', function () {
//     return view('admin.dashboard');
// });

/*
|--------------------------------------------------------------------------
| Frontend Route
|--------------------------------------------------------------------------
*/
Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\Frontend\AboutController::class, 'index'])->name('about');
Route::get('/pricing', [App\Http\Controllers\Frontend\PricingController::class, 'index'])->name('pricing');
Route::get('/gallery', [App\Http\Controllers\Frontend\GalleryController::class, 'gallery'])->name('gallery');
Route::get('/employee', [App\Http\Controllers\Frontend\employeeController::class, 'employee'])->name('employee');
Route::get('/contact', [App\Http\Controllers\Frontend\ContactController::class, 'index'])->name('contact');
Route::post('/contact', [App\Http\Controllers\Frontend\ContactController::class, 'index'])->name('contact-send-message');
Route::get('/services', [App\Http\Controllers\Frontend\ServicesController::class, 'index'])->name('services');

Route::get('/blog', [App\Http\Controllers\Frontend\BlogController::class, 'index'])->name('blog');
Route::get('/single-blog/{id}', [App\Http\Controllers\Frontend\BlogController::class, 'single_blog'])->name('single-blog');

Route::get('/portfolio', [App\Http\Controllers\Frontend\PortfolioController::class, 'index'])->name('portfolio');
Route::get('/portfolio/{id}', [App\Http\Controllers\Frontend\PortfolioController::class, 'portfolio_details'])->name('portfolio-details');

/*
|--------------------------------------------------------------------------
| Backend Route
|--------------------------------------------------------------------------
*/

Auth::routes();
Route::prefix('admin')->group(function(){
	Route::group(['middleware' => ['admin']], function () {
		Route::get('/', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('dashboard');

		// ---site info----------------------------
		Route::get('/site-info', [App\Http\Controllers\Backend\SiteInfoController::class, 'index'])->name('site-info');
		Route::post('/site-info', [App\Http\Controllers\Backend\SiteInfoController::class, 'index'])->name('site-info-update');

		// --- social media---------------------------------
		Route::get('/social-media/new', [App\Http\Controllers\Backend\SocialMediaController::class, 'add'])->name('social-media-new');
		Route::post('/social-media/new', [App\Http\Controllers\Backend\SocialMediaController::class, 'add'])->name('social-media-add');
		Route::get('/social-media/list', [App\Http\Controllers\Backend\SocialMediaController::class, 'list'])->name('social-media-list');
		Route::get('/social-media/edit/{id}', [App\Http\Controllers\Backend\SocialMediaController::class, 'edit'])->name('social-media-edit');
		Route::post('/social-media/edit/{id}', [App\Http\Controllers\Backend\SocialMediaController::class, 'edit'])->name('social-media-update');
		Route::get('/social-media/delete/{id}', [App\Http\Controllers\Backend\SocialMediaController::class, 'destroy'])->name('social-media-delete');
		
		// --- slider---------------------------------
		Route::get('/slider/new', [App\Http\Controllers\Backend\SliderController::class, 'add'])->name('slider-new');
		Route::post('/slider/new', [App\Http\Controllers\Backend\SliderController::class, 'add'])->name('slider-add');
		Route::get('/slider/list', [App\Http\Controllers\Backend\SliderController::class, 'list'])->name('slider-list');
		Route::get('/slider/edit/{id}', [App\Http\Controllers\Backend\SliderController::class, 'edit'])->name('slider-edit');
		Route::post('/slider/edit/{id}', [App\Http\Controllers\Backend\SliderController::class, 'edit'])->name('slider-update');
		Route::get('/slider/delete/{id}', [App\Http\Controllers\Backend\SliderController::class, 'destroy'])->name('slider-delete');

		// --- contact--------------------------------------
		Route::get('/contact/list', [App\Http\Controllers\Backend\ContactController::class, 'list'])->name('contact-list');
		Route::get('/contact/delete/{id}', [App\Http\Controllers\Backend\ContactController::class, 'destroy'])->name('contact-delete');

		// ---about----------------------------
		Route::get('/about-info', [App\Http\Controllers\Backend\AboutController::class, 'index'])->name('about-info');
		Route::post('/about-info', [App\Http\Controllers\Backend\AboutController::class, 'index'])->name('about-update');

		// --- gallery---------------------------------
		Route::get('/gallery/new', [App\Http\Controllers\Backend\GalleryController::class, 'add'])->name('gallery-new');
		Route::post('/gallery/new', [App\Http\Controllers\Backend\GalleryController::class, 'add'])->name('gallery-add');
		Route::get('/gallery/list', [App\Http\Controllers\Backend\GalleryController::class, 'list'])->name('gallery-list');
		Route::get('/gallery/edit/{id}', [App\Http\Controllers\Backend\GalleryController::class, 'edit'])->name('gallery-edit');
		Route::post('/gallery/edit/{id}', [App\Http\Controllers\Backend\GalleryController::class, 'edit'])->name('gallery-update');
		Route::get('/gallery/delete/{id}', [App\Http\Controllers\Backend\GalleryController::class, 'destroy'])->name('gallery-delete');


		// --- blog---------------------------------
		Route::get('/blog/new', [App\Http\Controllers\Backend\BlogController::class, 'add'])->name('blog-new');
		Route::post('/blog/new', [App\Http\Controllers\Backend\BlogController::class, 'add'])->name('blog-add');
		Route::get('/blog/list', [App\Http\Controllers\Backend\BlogController::class, 'list'])->name('blog-list');
		Route::get('/blog/edit/{id}', [App\Http\Controllers\Backend\BlogController::class, 'edit'])->name('blog-edit');
		Route::post('/blog/edit/{id}', [App\Http\Controllers\Backend\BlogController::class, 'edit'])->name('blog-update');
		Route::get('/blog/delete/{id}', [App\Http\Controllers\Backend\BlogController::class, 'destroy'])->name('blog-delete');


		// --- student---------------------------------
		Route::get('/student/new', [App\Http\Controllers\Backend\StudentController::class, 'add'])->name('student-new');
		Route::post('/student/new', [App\Http\Controllers\Backend\StudentController::class, 'add'])->name('student-add');
		Route::get('/student/list', [App\Http\Controllers\Backend\StudentController::class, 'list'])->name('student-list');
		Route::get('/student/edit/{id}', [App\Http\Controllers\Backend\StudentController::class, 'edit'])->name('student-edit');
		Route::post('/student/edit/{id}', [App\Http\Controllers\Backend\StudentController::class, 'edit'])->name('student-update');
		Route::get('/student/delete/{id}', [App\Http\Controllers\Backend\StudentController::class, 'destroy'])->name('student-delete');
		// id card
		Route::get('/student/id-card/{id}', [App\Http\Controllers\Backend\StudentController::class, 'student_id_card'])->name('student-id-card');

		Route::get('/class-section', [App\Http\Controllers\Backend\StudentController::class, 'getClassSection'])->name('class-section');

		// ---- guardian ----------------------------------
		Route::get('/guardian/list', [App\Http\Controllers\Backend\GuardianController::class, 'list'])->name('guardian-list');
		Route::get('/guardian/edit/{id}', [App\Http\Controllers\Backend\GuardianController::class, 'edit'])->name('guardian-edit');
		Route::post('/guardian/edit/{id}', [App\Http\Controllers\Backend\GuardianController::class, 'edit'])->name('guardian-update');

		// --- class --------------------------------------
		Route::get('/class/add', [App\Http\Controllers\Backend\ClassController::class, 'add'])->name('class-add');
		Route::post('/class/add', [App\Http\Controllers\Backend\ClassController::class, 'add'])->name('class-add');
		Route::get('/class/edit/{id}', [App\Http\Controllers\Backend\ClassController::class, 'edit'])->name('class-edit');
		Route::get('/class/delete/{id}', [App\Http\Controllers\Backend\ClassController::class, 'destroy'])->name('class-delete');
		Route::get('/class/list', [App\Http\Controllers\Backend\ClassController::class, 'list'])->name('class-list');

		// --- exam ---------------------------------
		Route::get('/exam/add', [App\Http\Controllers\Backend\ExamController::class, 'add'])->name('exam-add');
		Route::post('/exam/add', [App\Http\Controllers\Backend\ExamController::class, 'add'])->name('exam-add');
		Route::get('/exam/edit/{id}', [App\Http\Controllers\Backend\ExamController::class, 'edit'])->name('exam-edit');
		Route::get('/exam/delete/{id}', [App\Http\Controllers\Backend\ExamController::class, 'destroy'])->name('exam-delete');
		// class wise subject 
		Route::get('/exam/class-exam', [App\Http\Controllers\Backend\ExamController::class, 'class_exam'])->name('class-exam');

		// --- subject ---------------------------------
		Route::get('/subject/add', [App\Http\Controllers\Backend\SubjectController::class, 'add'])->name('subject-add');
		Route::post('/subject/add', [App\Http\Controllers\Backend\SubjectController::class, 'add'])->name('subject-add');
		Route::get('/subject/edit/{id}', [App\Http\Controllers\Backend\SubjectController::class, 'edit'])->name('subject-edit');
		Route::get('/subject/delete/{id}', [App\Http\Controllers\Backend\SubjectController::class, 'destroy'])->name('subject-delete');
		// class wise subject 
		Route::get('/subject/class-subject', [App\Http\Controllers\Backend\SubjectController::class, 'class_subject'])->name('class-subject');
		
		// --- section ---------------------------------
		Route::get('/section/add', [App\Http\Controllers\Backend\SectionController::class, 'add'])->name('section-add');
		Route::post('/section/add', [App\Http\Controllers\Backend\SectionController::class, 'add'])->name('section-add');
		Route::get('/section/edit/{id}', [App\Http\Controllers\Backend\SectionController::class, 'edit'])->name('section-edit');
		Route::get('/section/delete/{id}', [App\Http\Controllers\Backend\SectionController::class, 'destroy'])->name('section-delete');

		// --- group ---------------------------------
		Route::get('/group/add', [App\Http\Controllers\Backend\GroupController::class, 'add'])->name('group-add');
		Route::post('/group/add', [App\Http\Controllers\Backend\GroupController::class, 'add'])->name('group-add');
		Route::get('/group/edit/{id}', [App\Http\Controllers\Backend\GroupController::class, 'edit'])->name('group-edit');
		Route::get('/group/delete/{id}', [App\Http\Controllers\Backend\GroupController::class, 'destroy'])->name('group-delete');

		// --- employee---------------------------------
		Route::get('/employee/new', [App\Http\Controllers\Backend\EmployeeController::class, 'add'])->name('employee-new');
		Route::post('/employee/new', [App\Http\Controllers\Backend\EmployeeController::class, 'add'])->name('employee-add');
		Route::get('/employee/list', [App\Http\Controllers\Backend\EmployeeController::class, 'employee_list'])->name('employee-list');
		Route::get('/teacher/list', [App\Http\Controllers\Backend\EmployeeController::class, 'teacher_list'])->name('teacher-list');
		Route::get('/employee/edit/{id}', [App\Http\Controllers\Backend\EmployeeController::class, 'edit'])->name('employee-edit');
		Route::post('/employee/edit/{id}', [App\Http\Controllers\Backend\EmployeeController::class, 'edit'])->name('employee-update');
		Route::get('/employee/delete/{id}', [App\Http\Controllers\Backend\EmployeeController::class, 'destroy'])->name('employee-delete');

		// --- salary payment employee---------------------------------
		Route::get('/salary-payment/new', [App\Http\Controllers\Backend\SalaryPaymentController::class, 'add'])->name('salary-payment-new');
		Route::post('/salary-payment/new', [App\Http\Controllers\Backend\SalaryPaymentController::class, 'add'])->name('salary-payment-new');
		Route::get('/salary-payment/list', [App\Http\Controllers\Backend\SalaryPaymentController::class, 'list'])->name('salary-payment-list');
		Route::get('/salary-payment/delete/{id}', [App\Http\Controllers\Backend\SalaryPaymentController::class, 'destroy'])->name('salary-payment-delete');
		Route::get('/salary-payment/edit/{id}', [App\Http\Controllers\Backend\SalaryPaymentController::class, 'edit'])->name('salary-payment-edit');
		Route::post('/salary-payment/edit/{id}', [App\Http\Controllers\Backend\SalaryPaymentController::class, 'edit'])->name('salary-payment-edit');
		// ---when press employee id auto show employee info---
		Route::get('/salary-payment/employee-info', [App\Http\Controllers\Backend\SalaryPaymentController::class, 'employee_info'])->name('salary-payment-employee-info');

		// --- set payment ---------------------------------------
		Route::get('/set-payment/new', [App\Http\Controllers\Backend\SetPaymentController::class, 'add'])->name('set-payment-new');
		Route::post('/set-payment/new', [App\Http\Controllers\Backend\SetPaymentController::class, 'add'])->name('set-payment-add');
		Route::get('/set-payment/list', [App\Http\Controllers\Backend\SetPaymentController::class, 'list'])->name('set-payment-list');
		Route::get('/set-payment/edit/{id}', [App\Http\Controllers\Backend\SetPaymentController::class, 'edit'])->name('set-payment-edit');
		Route::post('/set-payment/edit/{id}', [App\Http\Controllers\Backend\SetPaymentController::class, 'edit'])->name('set-payment-update');
		Route::get('/set-payment/delete/{id}', [App\Http\Controllers\Backend\SetPaymentController::class, 'destroy'])->name('set-payment-delete');

		// --- get payment student---------------------------------
		Route::get('/get-payment/new', [App\Http\Controllers\Backend\GetPaymentController::class, 'add'])->name('get-payment-new');
		Route::post('/get-payment/new', [App\Http\Controllers\Backend\GetPaymentController::class, 'add'])->name('get-payment-new');
		Route::get('/get-payment/list', [App\Http\Controllers\Backend\GetPaymentController::class, 'list'])->name('get-payment-list');
		Route::get('/get-payment/delete/{id}', [App\Http\Controllers\Backend\GetPaymentController::class, 'destroy'])->name('get-payment-delete');
		Route::get('/get-payment/edit/{id}', [App\Http\Controllers\Backend\GetPaymentController::class, 'edit'])->name('get-payment-edit');
		Route::post('/get-payment/edit/{id}', [App\Http\Controllers\Backend\GetPaymentController::class, 'edit'])->name('get-payment-edit');
		// ---when press student id auto show student info----------
		Route::get('/get-payment/student-info', [App\Http\Controllers\Backend\GetPaymentController::class, 'student_info'])->name('get-payment-student-info');
		// ---when select class & year auto show fees info----------
		Route::get('/get-payment/set-payment-info', [App\Http\Controllers\Backend\GetPaymentController::class, 'set_payment_info'])->name('set-payment-info');
		
		// --- expense ---------------------------------------
		Route::get('/expense/new', [App\Http\Controllers\Backend\ExpenseController::class, 'add'])->name('expense-new');
		Route::post('/expense/new', [App\Http\Controllers\Backend\ExpenseController::class, 'add'])->name('expense-add');
		Route::get('/expense/list', [App\Http\Controllers\Backend\ExpenseController::class, 'list'])->name('expense-list');
		Route::get('/expense/edit/{id}', [App\Http\Controllers\Backend\ExpenseController::class, 'edit'])->name('expense-edit');
		Route::post('/expense/edit/{id}', [App\Http\Controllers\Backend\ExpenseController::class, 'edit'])->name('expense-update');
		Route::get('/expense/delete/{id}', [App\Http\Controllers\Backend\ExpenseController::class, 'destroy'])->name('expense-delete');

		// --- mark_distribution ---------------------------------------
		Route::get('/mark-distribution/new', [App\Http\Controllers\Backend\MarkDistributionController::class, 'add'])->name('mark-distribution-add');
		Route::post('/mark-distribution/new', [App\Http\Controllers\Backend\MarkDistributionController::class, 'add'])->name('mark-distribution-add');
		Route::get('/mark-distribution/list', [App\Http\Controllers\Backend\MarkDistributionController::class, 'list'])->name('mark-distribution-list');

		Route::get('/mark-distribution/edit/{id}', [App\Http\Controllers\Backend\MarkDistributionController::class, 'edit'])->name('mark-distribution-edit');
		Route::post('/mark-distribution/edit/{id}', [App\Http\Controllers\Backend\MarkDistributionController::class, 'edit'])->name('mark-distribution-edit');
		Route::get('/mark-distribution/delete/{id}', [App\Http\Controllers\Backend\MarkDistributionController::class, 'destroy'])->name('mark-distribution-delete');

	});
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
