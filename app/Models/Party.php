<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Sodium\increment;
use Session;

class Party extends Model
{
    private static $party;
    private static $vote;
    private static $allvotes;
    private static $voter;
    private static $election;

    use HasFactory;

    public static function createParty($request)
    {
        self::$party = new Party();
        self::$election = Election::where('election_status', 0)->first();
        self::$party->party_name = $request->party_name;
        self::$party->person_name = $request->person_name;
        self::$party->voter_id = $request->voter_id;
        self::$party->mobile = $request->mobile;
        self::$party->password = $request->mobile;
        self::$party->email = $request->email;
        self::$party->image = saveImage($request->file('image'),'party-image/');
        self::$party->election_id = self::$election->id;
        self::$party->status = $request->status = 0;
        self::$party->account_status = $request->account_status = 0;
        self::$party->save();
    }

    public static function submitVote($id)
    {
        self::$vote = Party::find($id);
        self::$voter = Voter::where('id', Session::get('voter_id'))->first();
        if (self::$voter->voting_status == 0)
        {
            self::$voter->voting_status = 1;
        }
        else
        {
            self::$voter->voting_status = 0;
        }
        self::$allvotes = self::$vote->votes;
        self::$vote->votes = self::$allvotes+1;
        self::$vote->save();
        self::$voter->save();
    }
}
