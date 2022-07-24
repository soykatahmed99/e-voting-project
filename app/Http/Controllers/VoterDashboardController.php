<?php

namespace App\Http\Controllers;

use App\Models\Election;
use App\Models\Party;
use App\Models\Voter;
use Illuminate\Http\Request;
use Session;

class VoterDashboardController extends Controller
{
    private $voter;
    private $vote;
    private $parties;
    private $election;

    public function index()
    {
        $this->voter = Voter::where('id', Session::get('voter_id'))->first();
        $this->parties = Party::orderBy ('id', 'desc')->get();
        $this->election = Election::orderBy('id', 'desc')->first();
        return view('website.voter.dashboard.home', ['parties' => $this->parties, 'voter'=>$this->voter, 'election'=>$this->election]);
    }
    public function voterProfile($id)
    {
        $this->voter = Voter::find($id);
        return view('website.voter.dashboard.my-profile', ['voter' => $this->voter]);
    }
    public function submitVote($id)
    {
        $this->vote = Party::submitVote($id);
        return redirect()->back()->with('message', 'Voted Successfully');

    }
    public function voterProfileUpdate()
    {
        $this->voter = Voter::where('id', Session::get('voter_id'))->first();
        return view('website.voter.dashboard.update-profile', ['voter' => $this->voter]);
    }
    public function updateVoter(Request $request)
    {
        Voter::voterUpdate($request);
        return redirect()->back()->with('message', 'Update Successfully');
    }
}
