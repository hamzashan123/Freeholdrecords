<?php
use App\Http\Controllers\Backend\AdminAuthController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\LinkController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Backend\SupervisorController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\StateController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\UserAddressController;
use App\Http\Controllers\Backend\ShippingCompanyController;
use App\Http\Controllers\Backend\PaymentMethodController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\ConsultantController;
use App\Http\Controllers\Backend\FormController;
use App\Http\Controllers\Backend\Form360Controller;
use App\Http\Controllers\Backend\EmployerFormController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AdminAuthController::class, 'login'])->name('login');
    Route::get('/register', [AdminAuthController::class, 'login'])->name('register');
    Route::get('/forgot-password', [AdminAuthController::class, 'forgotPassword'])->name('forgot_password');
});

// Route::get('/pdf', [AdminAuthController::class, 'pdf'])->name('pdf');

Route::group(['middleware' => ['roles']], function () {
    Route::get('/', [BackendController::class, 'index'])->name('index');
    Route::get('/account-settings', [AdminAuthController::class, 'accountSetting'])->name('account_setting');
    Route::patch('/account-settings', [AdminAuthController::class, 'updateAccount'])->name('account_setting.update');
    Route::get('/categories/{category}/remove-image', [CategoryController::class, 'removeImage'])->name('categories.remove_image');
    Route::resource('categories', CategoryController::class);
    Route::post('/products/remove-image', [ProductController::class, 'removeImage'])->name('products.remove_image');
    Route::resource('products', ProductController::class);
    Route::resource('tags', TagController::class);
    Route::resource('coupons', CouponController::class);
    Route::resource('reviews', ReviewController::class);
    Route::get('/supervisors/{supervisor}/remove-image', [SupervisorController::class, 'removeImage'])->name('supervisors.remove_image');
    Route::resource('consultants', SupervisorController::class);
    Route::resource('supervisors', SupervisorController::class);
    Route::resource('countries', CountryController::class);
    Route::get('/states/get-states', [StateController::class, 'get_states'])->name('states.get_states');
    Route::resource('states', StateController::class);
    Route::get('/cities/get-cities', [CityController::class, 'get_cities'])->name('cities.get_cities');
    Route::resource('cities', CityController::class);
    Route::get('get-allusers', [UserController::class, 'get_users'])->name('users.allusers');
    Route::get('get-clients', [UserController::class, 'get_clients'])->name('users.clients');
    Route::get('get-consultants', [UserController::class, 'get_users'])->name('users.consultants');
    Route::resource('users', UserController::class);
    Route::resource('user_addresses', UserAddressController::class);
    Route::resource('shipping_companies', ShippingCompanyController::class);
    Route::resource('payment_methods', PaymentMethodController::class);
    Route::resource('orders', OrderController::class)->except('create', 'edit');
    Route::resource('settings', SettingController::class)->only('index', 'update');
    Route::resource('contacts', ContactController::class)->except('create', 'edit', 'update');
    Route::resource('links', LinkController::class)->except('show');
    Route::resource('pages', PageController::class);
    Route::get('/consultant', [ConsultantController::class, 'index'])->name('consultant.index');
    Route::post('/consultant', [ConsultantController::class, 'assignUserToConsultant'])->name('consultant.user.create');
    Route::get('/viewuser/{id}', [ConsultantController::class, 'viewUsers'])->name('consultant.user.list');
    Route::get('/deleteuser/{userid}/{consultantid}', [ConsultantController::class, 'deleteConsultantUser'])->name('consultant.user.delete');

    Route::get('/getformdetails/{userid}/{form_id}', [FormController::class, 'getFormDetails'])->name('userform.details');
    
    Route::get('/forms', [FormController::class, 'index'])->name('forms.index');
    Route::get('/form360', [Form360Controller::class, 'index'])->name('form360.index');
    Route::post('/form360', [Form360Controller::class, 'save'])->name('form360.save');
    Route::get('/employerform', [EmployerFormController::class, 'index'])->name('employerform.index');
    Route::post('/employerform', [EmployerFormController::class, 'save'])->name('employerform.save');
    Route::get('/form3', [FormController::class, 'form3'])->name('form3.index');
    Route::get('/formslist/{id}', [FormController::class, 'getUserForms'])->name('user.formslist');
    Route::post('/assignforms', [FormController::class, 'assignFormsToUser'])->name('userform.create');
    Route::get('/deleteform/{userid}/{form_id}', [FormController::class, 'deleteUserForm'])->name('userform.delete');
    Route::post('/correction-email', [Form360Controller::class, 'correctFieldsEmail'])->name('correctionemail');

    //new routes here..us
});

