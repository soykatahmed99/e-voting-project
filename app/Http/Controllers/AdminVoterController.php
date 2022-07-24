<?php

namespace App\Http\Controllers;

use App\Models\Voter;
use Illuminate\Http\Request;

class AdminVoterController extends Controller
{
    private $voters;


    public function index()
    {
        $this->voters = Voter::where('account_status', 0)->orderBy('id', 'asc')->get();
        return view('admin.voters.active-voters',['voters' => $this->voters]);
    }

    public function pendingVoters()
    {
        $this->voters = Voter::where('account_status', 1)->orderBy('id', 'asc')->get();
        return view('admin.voters.pending-voters',['voters' => $this->voters]);
    }

    public function blockedVoters()
    {
        $this->voters = Voter::where('account_status', 2)->orderBy('id', 'asc')->get();
        return view('admin.voters.blocked-voters',['voters' => $this->voters]);
    }

    public function unblockVoter($id)
    {
        Voter::unblockVoter($id);
        return redirect()->back()->with('message', 'Voter Unblocked');
    }

    public function approveVoter($id)
    {
        Voter::approveVoter($id);
        return redirect()->back()->with('message', 'Voter Approved');
    }
    public function blockPendingVoter($id)
    {
        Voter::blockPendingVoter($id);
        return redirect()->back()->with('message', 'Voter Blocked');
    }

    public function blockActiveVoter($id)
    {
        Voter::blockActiveVoter($id);
        return redirect()->back()->with('message', 'Voter Blocked');
    }
}
