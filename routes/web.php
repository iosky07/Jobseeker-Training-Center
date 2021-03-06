<?php

use App\Http\Controllers\ForumController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\InterviewScoreController;
use App\Http\Controllers\InterviewVerificationController;
use App\Http\Controllers\JobInfoController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentVerificationController;
use App\Http\Controllers\QuestionDetailController;
use App\Http\Controllers\QuestionScoreController;
use App\Http\Controllers\QuestionTestController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserHrdController;
use App\Http\Controllers\UserPremiumController;
use App\Http\Controllers\UserRegularController;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Http\Controllers\CurrentTeamController;
use Laravel\Jetstream\Http\Controllers\Livewire\ApiTokenController;
use Laravel\Jetstream\Http\Controllers\Livewire\TeamController;
use Laravel\Jetstream\Http\Controllers\Livewire\UserProfileController;
use Laravel\Jetstream\Jetstream;

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

Route::get('/dashboard', function () {
    return redirect(route('admin.dashboard'));
});

Route::get('/', function () {
    return view('welcome');
});
//[ 'middleware' => [],'prefix'=>'admin' ]
//Route::name('admin.')->middleware(['auth:sanctum', 'verified'])->prefix('admin/')->group(function() {
Route::name('admin.')->prefix('admin')->middleware(['auth:sanctum','web', 'verified'])->group(function() {

    Route::group(['middleware' => config('jetstream.middleware', ['web'])], function () {
        Route::group(['middleware' => ['auth', 'verified']], function () {
            // User & Profile...
            Route::get('/user/profile', [UserProfileController::class, 'show'])
                ->name('profile.show');

            // API...
            if (Jetstream::hasApiFeatures()) {
                Route::get('/user/api-tokens', [ApiTokenController::class, 'index'])->name('api-tokens.index');
            }

            // Teams...
            if (Jetstream::hasTeamFeatures()) {
                Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
                Route::get('/teams/{team}', [TeamController::class, 'show'])->name('teams.show');
                Route::put('/current-team', [CurrentTeamController::class, 'update'])->name('current-team.update');
            }
        });
    });

    Route::view('/dashboard', "dashboard")->name('dashboard');
//    Route::middleware(['checkRole:1']){}
//    Route::get('/user', [ UserController::class, "index" ])->name('user');
//    Route::view('/user/new', "pages.user.create")->name('user.new');
//    Route::view('/user/edit/{userId}', "pages.user.edit")->name('user.edit');

    Route::middleware(['checkRole:1'])->group(function (){
        Route::resources(
            [
                'payment-verification'=> PaymentVerificationController::class,
                'interview-choosen'=> InterviewVerificationController::class,
            ]
        );
        Route::get('/test/{id}/create-question',[TestController::class,'createQuestion'])->name('test.create-question');
        Route::get('/test/{id}/edit-question',[TestController::class,'editQuestion'])->name('test.edit-question');
        Route::get('/test/{id}/delete-question',[TestController::class,'deleteQuestion'])->name('test.delete-question');
    });

    Route::middleware(['checkRole:1,2'])->group(function (){
        Route::resources(
            [
                'user-hrd'=> UserHrdController::class,
            ]
        );
    });

    Route::middleware(['checkRole:1,2,3'])->group(function (){
        Route::resources(
            [
                'interview-score'=> InterviewScoreController::class,
            ]
        );
    });

    Route::middleware(['checkRole:1,3'])->group(function (){
        Route::resources(
            [
                'user-premium'=> UserPremiumController::class,
            ]
        );
    });

    Route::middleware(['checkRole:1,4'])->group(function (){
        Route::resources(
            [
                'payment'=>PaymentController::class,
                'user-regular'=> UserRegularController::class,
            ]
        );
    });

    Route::middleware(['checkRole:1,2,3,4'])->group(function (){
        Route::resources(
            [
                'user'=>UserController::class,
                'forum'=>ForumController::class,
            ]
        );
    });

    Route::middleware(['checkRole:1,2,3'])->group(function (){
        Route::get('/interview/choosen',[InterviewController::class,'showChoosen'])->name('interview-choosen.index');
        Route::resources(
            [
                'interview'=>InterviewController::class,
            ]
        );
    });
    Route::middleware(['checkRole:1,3,4'])->group(function (){
        Route::resources(
            [
                'job-info'=> JobInfoController::class,
                'test'=>TestController::class,
                'question-detail'=>QuestionDetailController::class,
            ]
        );
    });
    Route::middleware(['checkRole:1,3,4'])->group(function (){
        Route::get('/question-score/{id}/show-score/{point}',[QuestionScoreController::class,'showScore'])->name('question-score.show-score');
        Route::get('/question-test/{id}/show-question/{no}',[QuestionTestController::class,'showDetailMission'])->name('question-test.show-question');
        Route::post('/question-test/{id}/value-result/{no}',[QuestionTestController::class,'storeDetailMission'])->name('question-test.value-result');
        Route::resources(
            [
                'question-test'=> QuestionTestController::class,
                'question-score' => QuestionScoreController::class
            ]
        );

    });
});
