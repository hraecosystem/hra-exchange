<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Member;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use SWeb3\Accounts;
use Throwable;

class DatabaseSeeder extends Seeder
{
    /**
     * @throws Throwable
     */
    public function run(): void
    {
        DB::transaction(function () {
            if (User::count() == 0) {
                $this->call(CountryTableSeeder::class);
                $this->call(StatesCitiesTableSeeder::class);
                $this->call(RolesTableSeeder::class);
                $this->call(PermissionsTableSeeder::class);
                $this->call(SettingsTableSeeder::class);
                $this->call(IcoDetailTableSeeder::class);

                $user = Admin::create([
                    'name' => 'Rachad nait mbarek',
                    'email' => 'Rachad@mail.com',
                    'mobile' => '051234567',
                    'password' => Hash::make('Rachad@123'),
                    'is_super' => true,
                ]);

                Auth::shouldUse('admin');
                $user->assignRole('admin');

                $user = User::create([
                    'name' => 'Rachad member',
                    'email' => 'member-hra@mail.com',
                    'mobile' => '123456789',
                    'address' => 'test address',
                    'pincode' => '111111',
                    'password' => Hash::make('rachad@123'),
                ]);

                Auth::shouldUse('member');
                $user->assignRole('member');

                $member = Member::create([
                    'user_id' => $user->id,
                    'status' => Member::STATUS_FREE_MEMBER,
                ]);

                $account = Accounts::create();
                $member->userWallet()->create([
                    'public_key' => $account->address,
                    'private_key' => $account->privateKey,
                ]);
            }

            if (env('APP_ENV') != 'production') {
                $this->call(MembersTableSeeder::class);
                $this->call(FaqsTableSeeder::class);
                $this->call(MemberLoginLogTableSeeder::class);
            }
        });
    }
}
