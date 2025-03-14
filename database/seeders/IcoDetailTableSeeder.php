<?php

namespace Database\Seeders;

use App\Jobs\CheckActiveICO;
use App\Models\IcoDetail;
use DB;
use Illuminate\Database\Seeder;
use Throwable;

class IcoDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @throws Throwable
     */
    public function run(): void
    {
        DB::transaction(function () {
            collect([
                [
                    'name' => 'Public Sale',
                    'start_date' => '2024-11-01',
                    'end_date' => '2024-12-31',
                    'days' => 61,
                    'supply' => 150000000,
                    'price' => 1,
                    'min_buy' => 100,
                    'status' => IcoDetail::STATUS_PENDING,
                ],
            ])->each(function ($detail) {
                IcoDetail::create([
                    'name' => $detail['name'],
                    'start_date' => $detail['start_date'],
                    'end_date' => $detail['end_date'],
                    'days' => $detail['days'],
                    'supply' => $detail['supply'],
                    'price' => $detail['price'],
                    'min_buy' => $detail['min_buy'],
                    'status' => $detail['status'],
                ]);
            });
        });

        CheckActiveICO::dispatch(now());
    }
}
