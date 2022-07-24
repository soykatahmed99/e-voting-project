<?php

namespace App\Http\Controllers;

use App\Models\Voter;
use Illuminate\Http\Request;

class VoterController extends Controller
{
    private $voters;

    public function index()
    {
        return view('website.voter.voter-register-form');
    }


    public function addVoter(Request $request)
    {
        Voter::createVoters($request);
        return view('website.voter.voter-register-success', ['message']);
    }

    public function resetElection()
    {
        {
            $this->voters  = Voter::voterReset();
            return redirect()->back()->with('message', 'Election Stopped Successfully');
        }
    }
}
