<?php

namespace Database\Seeders;

use App\Models\Commentary;
use Illuminate\Database\Seeder;

class CommentarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Commentary::factory(1000)->create();
    }
}
