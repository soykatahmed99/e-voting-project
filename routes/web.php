<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VoterController;
use App\Http\Controllers\VoterAuthController;
use App\Http\Controllers\VoterDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\AdminVoterController;

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

Route::get('/', [HomeController::class, 'index'])->name('website.home')->middleware('voter.auth');

Route::get('/voter-registration-page', [VoterController::class, 'index'])->name('voter.register');
//Route::get('/voter-registration-success', [VoterController::class, 'addVoter'])->name('voter.register.success');
Route::post('/voter-registration', [VoterController::class, 'addVoter'])->name('voter.create');


Route::get('/voter-login-page', [HomeController::class, 'voterLoginPage'])->name('voter.login.page')->middleware('voter.auth');
Route::post('/voter-login', [VoterAuthController::class, 'voterLogin'])->name('voter.login');

Route::middleware('voter')->group(function (){
    Route::post('/voter-logout', [VoterAuthController::class, 'voterLogout'])->name('voter.logout');
    Route::get('/voter-dashboard', [VoterDashboardController::class, 'index'])->name('voter.dashboard');
    Route::get('/submit-vote/{id}', [VoterDashboardController::class, 'submitVote'])->name('vote.submit');
    Route::get('/voter-profile/{id}', [VoterDashboardController::class, 'voterProfile'])->name('voter.profile');
    Route::get('/voter-profile-update', [VoterDashboardController::class, 'voterProfileUpdate'])->name('voter.profile.update');
    Route::post('/voter-update', [VoterDashboardController::class, 'updateVoter'])->name('voter.update');
});





Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/add-election', [ElectionController::class, 'index'])->name('election.add');
    Route::post('/create-election', [ElectionController::class, 'createElection'])->name('election.create');
    Route::get('/manage-election', [ElectionController::class, 'manageElection'])->name('election.manage');
    Route::get('/result-page/{id}', [ElectionController::class, 'electionResult'])->name('election.result');
    Route::get('/result-pdf/{id}', [ElectionController::class, 'resultPDF'])->name('result.pdf');
    Route::get('/reset-election/{id}', [ElectionController::class, 'resetElection'])->name('election.reset');
    Route::get('/add-party', [AdminDashboardController::class, 'addParty'])->name('party.add');
    Route::post('/create-party', [PartyController::class, 'createParty'])->name('party.create');
    Route::get('/manage-party', [PartyController::class, 'manage'])->name('party.manage');


    Route::get('/active-voters', [AdminVoterController::class, 'index'])->name('voter.active');
    Route::get('/pending-voters', [AdminVoterController::class, 'pendingVoters'])->name('voter.pending');
    Route::get('/blocked-voters', [AdminVoterController::class, 'blockedVoters'])->name('voter.blocked');
    Route::get('/unblock-voters/{id}', [AdminVoterController::class, 'unblockVoter'])->name('voter.unblock');
    Route::get('/approve-voters/{id}', [AdminVoterController::class, 'approveVoter'])->name('voter.approve');
    Route::get('/block-pending-voters/{id}', [AdminVoterController::class, 'blockPendingVoter'])->name('voter.block.pending');
    Route::get('/block-active-voters/{id}', [AdminVoterController::class, 'blockActiveVoter'])->name('voter.block.active');


});
