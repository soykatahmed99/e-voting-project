<?php

namespace App\Http\Controllers;

use App\Models\Election;
use App\Models\Party;
use Illuminate\Http\Request;

class PartyController extends Controller
{
    private $parties;
    private $election;
    private $electionInfo;
    private $electionId;

    public function createParty(Request $request)
    {
        Party::createParty($request);
        return redirect()->back()->with('message', 'A Party Has Been Added');
    }
    public function manage()
    {
        $this->election = Election::orderBy('id', 'desc')->first();
        if ($this->election->election_status == 0)
        {
            $this->electionId = $this->election->id;
        }
        else
        {
            $this->electionId = null;
        }
        $this->parties =  Party::where('election_id', $this->electionId)->orderBy('votes', 'desc')->get();
        return view('admin.party.manage', ['parties' => $this->parties, 'election'=>$this->election]);
    }
}
