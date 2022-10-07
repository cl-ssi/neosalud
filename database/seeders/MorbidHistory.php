<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Samu\MorbidHistory as MorbidHistoryModel;

class MorbidHistory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MorbidHistoryModel::Create([
            'name' => 'D.M.'
        ]);

        MorbidHistoryModel::Create([
            'name' => 'H.T.A.'
        ]);
    }
}
