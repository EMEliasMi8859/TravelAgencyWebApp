<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\bCategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\accountController;
use App\Models\Category;
use App\Models\Post;
use App\Models\EntryIncome;
use App\Models\Expense;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\RegisterCustomerController;
use App\Http\Controllers\profileUpdate;
use App\Models\RegisterCustomer;
use App\Models\StatisticsUmrah;
use App\Models\StatisticsVisa;
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


Route::get('/', function () {
        
    $customers = RegisterCustomer::all();
    $posts=Post::orderBy('id','desc')->limit(3)->get();
    $categories=Category::orderBy('id','desc')->limit(6)->get();
    return view('home', compact("customers","posts","categories"));
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/Contact', function(){
    return view('Contact');
})->name('contact');

Route::middleware('auth')->group(function () {
    // Routes accessible only for authenticated users
    
    Route::get('/category/all', [CategoryController::class, 'AllCat'])->name('all.category');
    Route::post('/category/add', [CategoryController::class, 'AddCat'])->name('store.category');
    Route::get('/category/edit/{id}', [CategoryController::class, 'Edit']);
    Route::post('/category/update/{id}', [CategoryController::class, 'Update']);
    Route::get('/softdelete/category/{id}', [CategoryController::class, 'SoftDelete']);
    Route::get('/category/restore/{id}', [CategoryController::class, 'Restore']);
    Route::get('pDelete/category/{id}', [CategoryController::class, 'PDelete']);


    Route::get('/post/all', [PostController::class, 'AllPosts'])->name('all.post');
    Route::post('/post/add', [PostController::class, 'AddPost'])->name('store.post');
    Route::get('post/detail/{id}', [PostController::class, 'PostDetail'])->name('post.detail');
    Route::get('/post/edit/{id}', [PostController::class, 'Edit']);
    Route::post('/post/update/{id}', [PostController::class, 'Update'])->name('post.update');
    Route::get('/post/delete/{id}', [PostController::class, 'SoftDelete']);
    Route::get('post/pDelete/{id}', [PostController::class, 'PDelete']);
    Route::get('post/restore/{id}', [PostController::class, 'Restore']);


    Route::get('blog/show/all', [BlogController::class, 'ShowBlogs'])->name('blog.show');
    Route::get('blogs/all', [BlogController::class, 'AllBlogs'])->name('all.blogs');
    Route::post('BlogPost/add', [BlogController::class, 'AddBPost'])->name('store.bPost');
    Route::get('blog/detail/{id}', [BlogController::class, 'ShowBlogDetail'])->name('blog.detail');
    Route::get('/bDelete/category/{id}', [BlogController::class, 'SoftDelete']);

    // Route::get('bCategory/blog', [bCategoryController::class, 'BlogCategory']);
    Route::get('bCategory/all', [bCategoryController::class, 'AllBCategory'])->name('all.bCategory');
    Route::post('bCategory/add', [bCategoryController::class, 'AddBCategory'])->name('add.bCategory');

    Route::post('/comment/add/{id}', [CommentController::class, 'AddComment']);


    //acount section

    Route::get('incomeEntry/all', [accountController::class, 'AllEntry'])->name('all.incomeEntry');
    Route::post('incomEntry/add', [accountController::class, 'AddEntry'])->name('store.entry');
    Route::get('expenseEntry/all', [accountController::class, 'AllExpense'])->name('all.expense');
    Route::post('expenseEntries/store', [accountController::class, 'AddExpense'])->name('store.expense');
    Route::get('monthlyIncome/{month}', [accountController::class, 'MonthlyIncome'])->name('all.monthlyIncome');
    Route::get('yearlyIncome/all', [accountController::class, 'YearlyIncome'])->name('all.yearlyIncome');
    Route::get('downloadPdf/{month}', [accountController::class, 'DownloadPdf'])->name('downloadPdf.all');
    Route::get('monthlyGraph', [accountController::class, 'totalGraph']);
    
    //post and registrations
    Route::get('/registrations/umrah', [RegistrationController::class, 'regUmrah'])->name('registrations.umrah.get');
    Route::get('/registrations/visa', [RegistrationController::class, 'regVisa'])->name('registrations.visa.get');
    Route::post('/registrations/umrah', [RegistrationController::class, 'storeUmrah'])->name('registrations.umrah.store');
    Route::post('/registratiosns/visa', [RegistrationController::class, 'storeVisa'])->name('registrations.visa.store');
    Route::get('/registrations/umrahID', [RegistrationController::class, 'returnUmrahID'])->name('registrations.umrah.id');
    Route::get('/registrations/VisaID', [RegistrationController::class, 'returnVisaID'])->name('registrations.Visa.id');


    Route::get('/dashboard', function () {
        
        $countIncome = EntryIncome::count();
        $countExpense = Expense::count();
        $Umrah = \App\Models\StatisticsUmrah::all();
        $Visa = \App\Models\StatisticsVisa::all();
        $UmrahCount = StatisticsUmrah::count();
        $VisaCount = StatisticsVisa::count();
        $UmraSales = StatisticsUmrah::sum('Amount');
        $VisaSales = StatisticsVisa::sum('Amount');
        $UmraExpenses = StatisticsUmrah::sum('VisaPrice') +  StatisticsUmrah::sum('TiketPrice') +  StatisticsUmrah::sum('OtherExpenses');
        $VisaExpenses = StatisticsVisa::sum('VisaPrice') +  StatisticsVisa::sum('TiketPrice') +  StatisticsVisa::sum('OtherExpenses');
        return view('dashboard', compact("countIncome", "countExpense" , "Umrah", "Visa","UmrahCount", "VisaCount","UmraSales","VisaSales","UmraExpenses","VisaExpenses"));
    })->name('dashboard');

    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/login');
    })->name('logout');
    
    Route::get('/RegisterCustomer', [RegisterCustomerController::class, 'RegCusGet'])->name('RegisterCustomer');
    Route::post('/RegisterCustomer', [RegisterCustomerController::class, 'StoreCustomer'])->name('RegisterCustomer');
    // Route::get('/Customer/{id}/Update', [RegisterCustomerController::class, 'UpdateCus'])->name('Cusotmer.Update');
    // Route::post('/Customer/{id}/Update', [RegisterCustomerController::class, 'UpdateCusPost'])->name('Cusotmer.Update.post');
    // Route::get('/Customer/{id}/Delete', [RegisterCustomerController::class, 'DeleteCus'])->name('Customer.Delete');
    Route::get('/Customer/Update', [RegisterCustomerController::class, 'UpdateCus'])->name('Cusotmer.Update');
    Route::post('/Customer/Update/Post', [RegisterCustomerController::class, 'UpdateCusPost'])->name('Cusotmer.Update.post');
    Route::get('/Customer/Delete', [RegisterCustomerController::class, 'DeleteCus'])->name('Customer.Delete');
    

    // Route::put("/profile.update", [profileUpdate::class, 'update'])->name('profile.update');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     $countIncome = EntryIncome::count();
//     $countExpense = Expense::count();
//     return view('dashboard', compact("countIncome", "countExpense"));
// })->name('dashboard');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
