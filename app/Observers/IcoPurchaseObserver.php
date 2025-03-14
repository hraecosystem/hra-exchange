<?php

namespace App\Observers;

use App\Models\IcoDetail;
use App\Models\IcoPurchase;
use App\Models\Member;
use Carbon\Carbon;

class IcoPurchaseObserver
{
    /**
     * Handle the member "created" event.
     *
     * @return void
     */
    public function created(IcoPurchase $icoPurchase)
    {
        $icoDetail = IcoDetail::where('id', $icoPurchase->ico_detail_id)->first();
        if ($icoDetail) {
            $icoDetail->increment('total_purchase', $icoPurchase->amount);
            $icoDetail->refresh();

            if ($icoDetail->total_purchase >= $icoDetail->supply) {
                $icoDetail->status = IcoDetail::STATUS_EXPIRED;
                $icoDetail->save();
                $nextIcoDetail = IcoDetail::where('id', $icoDetail->id + 1)->first();
                if ($nextIcoDetail) {
                    $nextIcoDetail->status = IcoDetail::STATUS_ACTIVE;
                    $nextIcoDetail->start_date = now();
                    $nextIcoDetail->end_date = Carbon::parse(now())->addDays($nextIcoDetail->days);
                    $nextIcoDetail->save();
                }
            }
        }

    }

    public function updated(IcoPurchase $icoPurchase)
    {
        //
    }
}
