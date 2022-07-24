<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Symfony\Component\HttpFoundation\Session\Storage\save;
use Session;

class Voter extends Model
{
    private static $voters;
    private static $voter;
    use HasFactory;

    public static function createVoters($request)
    {
        self::$voters = new Voter();
        self::$voters->name = $request->name;
        self::$voters->voter_id = $request->voter_id;
        self::$voters->mobile = $request->mobile;
        self::$voters->email = $request->email;
        self::$voters->password = bcrypt($request->password);
        self::$voters->image = saveImage($request->file('image'), 'voter-image/');
        self::$voters->voting_status = $request->voting_status = 0;
        self::$voters->account_status = $request->account_status = 1;
        self::$voters->save();
    }
    public static function voterUpdate($request)
    {
        self::$voter = Voter::where('id', Session::get('voter_id'))->first();
        self::$voter->name = $request->name;
        self::$voter->voter_id = $request->voter_id;
        self::$voter->mobile = $request->mobile;
        self::$voter->image = saveImage($request->file('image'), 'voter-image/', self::$voter->image);
        self::$voter->save();
    }
    public static function unblockVoter($id)
    {
        self::$voter = Voter::find($id)->where('account_status', '2')->first();
        self::$voter->account_status = 0;
        self::$voter->save();
    }
    public static function approveVoter($id)
    {
        self::$voter = Voter::find($id)->where('account_status', '1')->first();
        self::$voter->account_status = 0;
        self::$voter->save();
    }
    public static function blockPendingVoter($id)
    {
        self::$voter = Voter::find($id)->where('account_status', '1')->first();
        self::$voter->account_status = 2;
        self::$voter->save();
    }
    public static function blockActiveVoter($id)
    {
        self::$voter = Voter::find($id)->where('account_status', '0')->first();
        self::$voter->account_status = 2;
        self::$voter->save();
    }


}
