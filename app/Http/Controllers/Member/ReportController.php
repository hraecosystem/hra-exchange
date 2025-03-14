<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\ListBuilders\Member\IcoPurchaseBonusListBuilder;
use App\ListBuilders\Member\IcoPurchaseListBuilder;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * @throws Exception
     */
    public function IcoPurchase(Request $request): RedirectResponse|Renderable|JsonResponse
    {
        return IcoPurchaseListBuilder::render([
            'member_id' => $this->member->id,
        ]);
    }

    /**
     * @throws Exception
     */
    public function IcoPurchaseBonus(Request $request): RedirectResponse|Renderable|JsonResponse
    {
        return IcoPurchaseBonusListBuilder::render([
            'member_id' => $this->member->id,
        ]);
    }
}
