<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\payout;
use App\Models\wallet;
class PayoutController extends Controller
{
    public function store(Request $request) {
        $payout = payout::create([
            'user_id' => $request->user_id,
            'phone' => $request->phone,
            'note' => $request->note,
            'amount' => $request->amount
        ]);

        $wallet = wallet::where('user_id',$request->user_id)->value('amount');
        $newWalletAmount = $wallet - $request->amount;

        wallet::where('user_id',$request->user_id)->update([
            'amount' => $newWalletAmount
        ]);

        return response()->json($payout);
    }
}
