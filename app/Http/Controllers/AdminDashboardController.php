<?php

namespace App\Http\Controllers;

use App\Models\Election;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    private $election;
    public function index()
    {
        return view('admin.dashboard.home');
    }

    public function addParty()
    {
        $this->election = Election::orderBy('id', 'desc')->first();
        return view('admin.party.register',['election'=>$this->election]);
    }
}
