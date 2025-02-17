<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $contacts = [
            ['name' => 'KöktenAdal', 'phone_number' => '+90 333 8859342'],
            ['name' => 'HammaAbdurrezak', 'phone_number' => '+90 333 1563682'],
            ['name' => 'GüleycanŞensal', 'phone_number' => '+90 333 2557114'],
            ['name' => 'SuadiyeRatip', 'phone_number' => '+90 333 9163726'],
            ['name' => 'BarikNurşide', 'phone_number' => '+90 333 3323749'],
            ['name' => 'HanifiEmineeylem', 'phone_number' => '+90 333 2763531'],
            ['name' => 'NakiyeOğulkan', 'phone_number' => '+90 333 6168924'],
            ['name' => 'HamsiyeCerit', 'phone_number' => '+90 333 3544579'],
            ['name' => 'MahfiHülâgü', 'phone_number' => '+90 333 8937773'],
            ['name' => 'EsmerayNurihayat', 'phone_number' => '+90 333 1688759'],
            ['name' => 'ŞennurNazifer', 'phone_number' => '+90 333 5326326'],
            ['name' => 'ÇetinokSeden', 'phone_number' => '+90 333 1614182'],
            ['name' => 'VuslatErimşah', 'phone_number' => '+90 333 9551194'],
            ['name' => 'ŞeküreRuhiye', 'phone_number' => '+90 333 8792165'],
            ['name' => 'İmranÜmmehan', 'phone_number' => '+90 333 6971156'],
            ['name' => 'YavuzbayHiçsönmez', 'phone_number' => '+90 333 8839473'],
            ['name' => 'NevzeteAbdulgafur', 'phone_number' => '+90 333 1453851'],
        ];

        // Insert data into the contacts table
        DB::table('contacts')->insert($contacts);
    }
}
