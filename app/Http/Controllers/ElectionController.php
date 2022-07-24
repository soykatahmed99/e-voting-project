<?php

namespace App\Http\Controllers;

use App\Models\Election;
use App\Models\Party;
use App\Models\Voter;
use Illuminate\Http\Request;
use PDF;

class ElectionController extends Controller
{
    private $election;
    private $parties;
    private $result;
    private $electionName;
    public function index()
    {
        return view('admin.election.add');
    }
    public function createElection(Request $request)
    {
        $this->election = Election::createElection($request);
        return redirect()->back()->with('message', 'Election Created Successfully');
    }
    public function manageElection()
    {
        $this->election = Election::orderBy('id', 'desc')->get();
        return view('admin.election.manage', ['elections'=>$this->election]);
    }
    public function resetElection($id)
    {
        $this->election = Election::resetElection($id);
        return redirect()->back()->with('message', 'Election Stopped Successfully');
    }
    public function electionResult($id)
    {
        $this->election = Election::find($id);
        $this->parties = Party::where('election_id', $this->election->id)->orderBy('votes', 'desc')->get();
        return view('admin.election.result', ['election'=>$this->election, 'parties'=>$this->parties]);

    }
    public function resultPDF($id)
    {
        $this->election = Election::find($id);
        $this->parties = Party::where('election_id', $this->election->id)->orderBy('votes', 'desc')->get();
//        return view('admin.election.download-result', ['election'=>$this->election, 'parties'=>$this->parties]);
        $this->result = PDF::LoadView('admin.election.download-result', ['election'=>$this->election, 'parties'=>$this->parties]);
        $this->electionName = $this->election->election_name;
        return $this->result->stream("Result Of  $this->electionName.pdf");
    }

}
