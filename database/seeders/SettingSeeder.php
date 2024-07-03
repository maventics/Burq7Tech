<?php

namespace Database\Seeders;

use App\Models\SettingModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SettingModel::create([
            'key'=>"brand_name",
            'value'=>'Burq7Tech',
        ]);
        SettingModel::create([
            'key'=>"brand_logo",
            'value'=>'/images/logo.png',
        ]);
        SettingModel::create([
            'key'=>"default_currency",
            'value'=>'PKR',
        ]);

    }
}
