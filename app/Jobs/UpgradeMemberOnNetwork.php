<?php

namespace App\Jobs;

use App\Models\Member;
use DB;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Throwable;

class UpgradeMemberOnNetwork implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public Member $member;

    public function __construct(Member $member)
    {
        $this->member = $member;
    }

    /**
     * Execute the job.
     *
     * @throws Throwable
     */
    public function handle(): void
    {
        DB::transaction(function () {
            $separatedParents = $this->member->getSeparatedParents();

            $leftParentIds = collect(
                $separatedParents['left']
            )->pluck('id');

            $rightParentIds = collect(
                $separatedParents['right']
            )->pluck('id');

            if (count($leftParentIds)) {
                Member::where('status', '!=', Member::STATUS_BLOCKED)
                    ->whereIn('id', $leftParentIds)
                    ->whereNotNull('package_id')
                    ->increment('left_pv', $this->member->package->pv);
                Member::where('status', '!=', Member::STATUS_BLOCKED)
                    ->whereIn('id', $leftParentIds)
                    ->whereNotNull('package_id')
                    ->increment('left_power', $this->member->package->pv);
            }
            if (count($rightParentIds)) {
                Member::where('status', '!=', Member::STATUS_BLOCKED)
                    ->whereIn('id', $rightParentIds)
                    ->whereNotNull('package_id')
                    ->increment('right_pv', $this->member->package->pv);
                Member::where('status', '!=', Member::STATUS_BLOCKED)
                    ->whereIn('id', $rightParentIds)
                    ->whereNotNull('package_id')
                    ->increment('right_power', $this->member->package->pv);
            }

            //            MatchBinaryOnNetworks::dispatch(
            //                $leftParentIds->merge($rightParentIds)->unique()
            //            );
        });
    }
}
