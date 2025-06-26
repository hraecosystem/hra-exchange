<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Member;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use SWeb3\Accounts;

class MembersTableSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            $user = User::create([
                'name' => "HRA $i",
                'email' => "hra$i@gmail.com",
                'password' => Hash::make('chainclave@123'),
                'mobile' => "999999999$i",
                // 'country_id' => Country::first()->id,
            ]);

            $member = Member::create([
                'user_id' => $user->id,
                'euro_wallet_balance' => 0,
                'coin_wallet_balance' => 0,
                'code' => (string) mt_rand(111111, 999999),
                'status' => Member::STATUS_FREE_MEMBER,
            ]);

            Auth::shouldUse('member');
            $user->assignRole('member');

            $account = Accounts::create();

            $member->userWallet()->create([
                'public_key' => $account->address,
                'private_key' => $account->privateKey,
            ]);
        }
    }
}
