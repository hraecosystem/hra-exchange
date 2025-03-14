<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ListBuilders\Admin\IcoPurchaseBonusListBuilder;
use App\ListBuilders\Admin\IcoPurchaseListBuilder;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class ReportController extends Controller
{
    /**
     * @throws Exception
     */
    public function IcoPurchase(): Renderable|JsonResponse|RedirectResponse
    {
        return IcoPurchaseListBuilder::render();
    }

    public function IcoPurchaseBonus(): Renderable|JsonResponse|RedirectResponse
    {
        return IcoPurchaseBonusListBuilder::render();
    }
}
