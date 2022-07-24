<?php

namespace App\Http\Controllers;

use App\Models\Voter;
use Illuminate\Http\Request;
use Session;

class VoterAuthController extends Controller
{
    private $voter;

    public function voterLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $this->voter = Voter::where('email', $request->email)->first();
        if ($this->voter)
        {
            if (password_verify($request->password, $this->voter->password))
                {
                    if ($this->voter->account_status == 0)
                    {
                        Session::put('voter_id', $this->voter->id);
                        Session::put('voter_name', $this->voter->name);
                        Session::put('voter_image', $this->voter->image);
                        return redirect('/voter-dashboard');
                    }
                    else if ($this->voter->account_status == 1)
                    {
                        return redirect()->back()->with('message', 'Your Account is Pending');
                    }
                    else if ($this->voter->account_status == 2)
                    {
                        return redirect()->back()->with('message', 'Your Account is Blocked');
                    }
                }
            else
                {
                    return redirect()->back()->with('message', 'Invalid Password');
                }

        }
        else
        {
            return redirect()->back()->with('message', 'Invalid Email');
        }
    }

    public function voterLogout()
    {
        Session::forget('voter_id');
        Session::forget('voter_name');
        return redirect('/voter-login-page');
    }
}
