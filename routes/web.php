<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\testEmailController;
use App\Http\Controllers\Task\TaskController;
use App\Http\Controllers\User\TeamController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/send-email', [testEmailController::class, 'sendTestEmail'])->name('send.test.email');

// tengkuerlangga2802@gmail.com

Route::get('/preview-email', function () {
    $data = ['name' => 'Tengku'];
    return view('emails.test', compact('data'));
});


Route::post('/login', [AuthController::class, 'loginStore'])->name('auth.login.store');


Route::post('/verify-email', [AuthController::class, 'verifyEmail'])->name('verifyEmail');
Route::get('/verify', [AuthController::class, 'verify'])->name('auth.verify');

Route::get('/register', [AuthController::class, 'register'])->name('auth.register');

Route::get('/login', [AuthController::class, 'login'])->name('auth.login');

Route::post('/register', [AuthController::class, 'registerStore'])->name('auth.register.store');

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::middleware('auth')->group(function () {

    Route::get('/app/inbox', [UserController::class, 'inbox'])->name('themes.default.inbox');
    Route::get('/app/today', [UserController::class, 'today'])->name('themes.default.today');



    Route::get('/onboard', [AuthController::class, 'profile'])->name('auth.createProfile');
    Route::post('/onboard', [AuthController::class, 'profileStore'])->name('auth.createProfile.store');

    Route::get('/onboard/use-case', [AuthController::class, 'plan'])->name('auth.plan');
    Route::post('/onboard/use-case', [AuthController::class, 'planStore'])->name('auth.plan.store');

    // Route::get('/app', [UserController::class, 'main'])->name('layouts.main');





    Route::post('/update-task-order', [TaskController::class, 'updateOrder'])->name('update.task.order');

    Route::post('/task/done/{id}', [TaskController::class, 'taskDone'])->name('task.done.store');

    Route::get('/app/upcoming', [UserController::class, 'upcoming'])->name('themes.default.upcoming');
    Route::get('/app/completed', [UserController::class, 'completed'])->name('themes.default.completed');
    Route::get('/app/project/{id}', [UserController::class, 'project'])->name('themes.default.project');

    Route::get('/get-activities', [TaskController::class, 'getActivities']);

    Route::put('/task/{id}/update', [TaskController::class, 'update'])->name('task.update');
    Route::get('/task/{id}/edit', [TaskController::class, 'edit'])->name('task.edit');
    Route::post('/app/inbox/store', [UserController::class, 'taskStore'])->name('inbox.task.store');


    Route::post('/app/inbox/completed/{id}', [UserController::class, 'taskStoreOne'])->name('task.complete');



    Route::delete('/app/inbox/delete/{id}', [UserController::class, 'taskDelete'])->name('task.delete');
    Route::delete('/app/inbox/project/delete/{id}', [UserController::class, 'projectDelete'])->name('project.delete');
    Route::delete('/app/inbox/comment/delete/{id}', [UserController::class, 'commentDelete'])->name('comment.delete');

    Route::post('/app/inbox/{id}/comment', [UserController::class, 'commentStore'])->name('inbox.comment.store');


    
    Route::post('/app/inbox', [UserController::class, 'projectStore'])->name('inbox.store.project');
    Route::get('/project/{id}/edit', [TaskController::class, 'editProject'])->name('inbox.edit.project');
    Route::put('/project/{id}/update', [TaskController::class, 'updateProject'])->name('inbox.update.project');


    Route::put('/app/inbox/{id}/favorit', [TaskController::class, 'updateFavorit'])->name('inbox.update.favorit');

    Route::put('/app/{id}/duplicate', [TaskController::class, 'duplicate'])->name('inbox.store.duplicate');



    Route::put('/category/{categoryId}/add-above', [TaskController::class, 'addAbove']);
    Route::put('/category/{categoryId}/add-below', [TaskController::class, 'addBelow']);


    Route::get('app/comment/{id}/detail', [UserController::class, 'detailComment'])->name('inbox.comment.detail');

    Route::get('app/inbox/account', [UserController::class, 'account'])->name('inbox.themes.default.settings.account');
    Route::get('app/inbox/theme', [UserController::class, 'theme'])->name('inbox.themes.default.settings.theme');

    
    Route::get('app/inbox/account/email', [UserController::class, 'email'])->name('inbox.themes.default.settings.email');
    Route::get('app/inbox/account/password', [UserController::class, 'password'])->name('inbox.themes.default.settings.password');


    Route::post('/user/photo/update', [UserController::class, 'updatePhoto'])->name('user.update.photo');
    Route::delete('/user/photo/remove', [UserController::class, 'removePhoto'])->name('user.remove.photo');
    Route::delete('/user/delete', [UserController::class, 'deleteUser'])->name('user.remove');
    

    Route::post('app/inbox/account/email/update', [UserController::class, 'updateEmail'])->name('profile.updateEmail');
    Route::post('app/inbox/account/password/update', [UserController::class, 'updatePassword'])->name('profile.updatePassword');


    Route::post('/update-theme', [UserController::class, 'updateTheme'])->name('update.theme');

    Route::get('app/inbox/theme', [UserController::class, 'theme'])->name('inbox.themes.default.settings.theme');

    // dark moed
    Route::get('app/inbox/theme/dark', [UserController::class, 'theme'])->name('inbox.themes.dark-mode.settings.theme');
    Route::get('app/inbox/account/dark', [UserController::class, 'account'])
    ->name('inbox.themes.dark-mode.settings.account');
    Route::get('app/inbox/account/email/dark', [UserController::class, 'email'])->name('inbox.themes.dark-mode.settings.email');
    Route::get('app/inbox/account/password/dark', [UserController::class, 'password'])->name('inbox.themes.dark-mode.settings.password');

    Route::get('/app/inbox/dark', [UserController::class, 'inbox'])->name('themes.dark-mode.inbox');
    Route::get('/app/today/dark', [UserController::class, 'today'])->name('themes.dark-mode.today');
    Route::get('/app/upcoming/dark', [UserController::class, 'upcoming'])->name('themes.dark-mode.upcoming');
    Route::get('/app/completed/dark', [UserController::class, 'completed'])->name('themes.dark-mode.completed');
    Route::get('/app/project/{id}/dark', [UserController::class, 'project'])->name('themes.dark-mode.project');



    // Route::post('/teams', [TeamController::class, 'store']);
    // Route::post('/teams/{team}/members', [TeamController::class, 'addMember']);
    // Route::put('/teams/{team}/members/{user}', [TeamController::class, 'updateMemberRole']);
    // Route::delete('/teams/{team}/members/{user}', [TeamController::class, 'removeMember']);
    // Route::get('/my-teams', [TeamController::class, 'getUserTeams']);
    // Route::get('/teams/{team}/members', [TeamController::class, 'getTeamMembers']);



    Route::post('app/inbox/team', [TeamController::class, 'invite'])->name('teams.invite');


    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/register');
    })->name('logout');
});
