<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('settings')->delete();

        Setting::create([
            'current_session' => '2021-2022',
            'school_title' => 'MS',
            'school_name' => 'Mora Soft International Schools',
            'end_first_term' => '01/12/2021',
            'end_second_term' => '01/03/2022',
            'phone' => '0123456789',
            'address' => 'القاهرة',
            'school_email' => 'info@morasoft.com',
            'logo' => '1.jpg',
        ]);
    }
}
