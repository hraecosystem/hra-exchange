<?php

namespace App\Presenters;

use App\Models\KYC;
use App\Models\Member;
use App\Models\User;
use Laracasts\Presenter\Presenter;

/**
 * Class MemberPresenter
 */
class MemberPresenter extends Presenter
{
    /**
     * @return string
     */
    public function profileImage()
    {
        if (! $image = $this->entity->getFirstMediaUrl(Member::MC_PROFILE_IMAGE)) {
            if ($this->entity->user->gender == User::GENDER_FEMALE) {
                $image = asset('images/female.png');
            } else {
                $image = asset('images/user.png');
            }
        }

        return $image;
    }

    public function kycStatus(): string
    {
        if ($this->entity->kyc) {
            return KYC::STATUSES[$this->entity->kyc->status];
        } else {
            return 'N/A';
        }
    }

    /**
     * @return string
     */
    public function status()
    {
        if ($this->entity->isFree()) {
            return 'Free';
        } elseif ($this->entity->isBlocked()) {
            return 'Blocked';
        } else {
            return 'Active';
        }
    }

    public function walletBalance(): string
    {
        return env('APP_CURRENCY').round($this->entity->euro_wallet_balance, 2);
    }
}
