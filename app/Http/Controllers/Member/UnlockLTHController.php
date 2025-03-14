<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\IcoBonus;
use App\Models\IcoPurchase;
use Brick\Math\Exception\MathException;
use Brick\Math\Exception\RoundingNecessaryException;

class UnlockLTHController extends Controller
{
    /**
     * @throws MathException
     * @throws RoundingNecessaryException
     */
    public function index()
    {
        $totalPurchaseCoin = toHumanReadable(IcoPurchase::where('member_id', $this->member->id)->sum('amount'));
        $totalIcoBonus = toHumanReadable(IcoBonus::where('member_id', $this->member->id)->sum('amount'));

        return view('member.unlock-lth.index',
            [
                'totalPurchaseCoin' => $totalPurchaseCoin,
                'totalIcoBonus' => $totalIcoBonus,
            ]);
    }
}
