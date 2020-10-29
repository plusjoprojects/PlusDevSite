<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\approves;
use Carbon\Carbon;
use App\Models\wallet;
use App\Models\payout;
use App\Models\templates;
class DashboardController extends Controller
{
    public function index($user_id) {
        $approves_today = approves::where('user_id',$user_id)->whereDate('created_at',Carbon::today())->get();
        $wallet = wallet::where('user_id',$user_id)->first();
        $approves = approves::where('user_id',$user_id)->count();

        return response()->json([
            'approves_today' => $approves_today,
            'wallet' => $wallet,
            'approves' => $approves
        ]);
    }

    public function charts($user_id) {
        $approves_00 = approves::where('user_id',$user_id)->whereDate('created_at',Carbon::today())->count();
        $approves_01 =
        approves::where('user_id',$user_id)->whereDate('created_at',Carbon::today()->addDay(-1))->count();
        $approves_02 =
        approves::where('user_id',$user_id)->whereDate('created_at',Carbon::today()->addDay(-2))->count();
        $approves_03 =
        approves::where('user_id',$user_id)->whereDate('created_at',Carbon::today()->addDay(-3))->count();
        $approves_04 =
        approves::where('user_id',$user_id)->whereDate('created_at',Carbon::today()->addDay(-4))->count();
        $approves_05 =
        approves::where('user_id',$user_id)->whereDate('created_at',Carbon::today()->addDay(-5))->count();
        $approves_06 =
        approves::where('user_id',$user_id)->whereDate('created_at',Carbon::today()->addDay(-6))->count();
    

        $approves_00_date = Carbon::today()->format('M-d');
        $approves_01_date = Carbon::today()->addDay(-1)->format('M-d');
        $approves_02_date = Carbon::today()->addDay(-2)->format('M-d');
        $approves_03_date = Carbon::today()->addDay(-3)->format('M-d');
        $approves_04_date = Carbon::today()->addDay(-4)->format('M-d');
        $approves_05_date = Carbon::today()->addDay(-5)->format('M-d');
        $approves_06_date = Carbon::today()->addDay(-6)->format('M-d');

        return response()->json([
            'approves_00' => $approves_00,
            'approves_01' => $approves_01,
            'approves_02' => $approves_02,
            'approves_03' => $approves_03,
            'approves_04' => $approves_04,
            'approves_05' => $approves_05,
            'approves_06' => $approves_06,
            'approves_00_date' => $approves_00_date,
            'approves_01_date' => $approves_01_date,
            'approves_02_date' => $approves_02_date,
            'approves_03_date' => $approves_03_date,
            'approves_04_date' => $approves_04_date,
            'approves_05_date' => $approves_05_date,
            'approves_06_date' => $approves_06_date,

        ]);
    }

    public function indexWallet($id) {
        $wallet = wallet::where('user_id',$id)->first();
        $approves = approves::where('user_id',$id)->get();
        $payout = payout::where('user_id',$id)->get();

        return response()->json([
            'wallet' => $wallet,
            'approves' => $approves,
            'payout' => $payout,
        ]);
    }

    public function indexPayout($id) {
        $wallet = wallet::where('user_id',$id)->first();

        return response()->json([
            'wallet' => $wallet
        ]);
    }

    public function indexSended($id) {
        $approve_approved = approves::where('user_id',$id)->where('approve',1)->get();
        $approve_not_approved = approves::where('user_id',$id)->where('approve',0)->get();
        $approves = approves::where('user_id',$id)->get();

        return response()->json([
            'approve_approved' => $approve_approved,
            'approve_not_approved' => $approve_not_approved,
            'approves' => $approves
        ]);
    }

    public function indexFile($categories_id,$countries_id) {
        $template = templates::where('countries_id',$countries_id)->where('categories_id',$categories_id)->first();
    }
}
