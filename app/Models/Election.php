<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    private static $election;
    private static $voters;
    private static $parties;
    private static $resetElection;
    use HasFactory;

    public static function createElection($request)
    {
        self::$election = new Election();
        self::$election->election_name = $request->election_name;
        self::$election->election_description = $request->election_description;
        self::$election->save();
    }

    public static function resetElection($id)
    {
        self::$election = Election::find($id);
        self::$election->election_status = 1;
        self::$election->save();


        self::$voters = Voter::all();
        foreach (self::$voters as $voter){
            if ($voter->voting_status == 1)
            {
                $voter->voting_status = 0;
            }
            else
            {
                $voter->voting_status = 0;
            }
            $voter->save();
        }

        self::$parties = Party::all();
        foreach (self::$parties as $party)
        {
            if ($party->account_status == 0)
            {
                $party->account_status = 1;
            }
            else
            {
                $party->account_status = 1;
            }
            $party->save();
        }
    }

}
