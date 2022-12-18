<?php

namespace Database\Seeders;

use App\Models\Orphan;
use App\Models\Orphanage;
use Illuminate\Database\Seeder;

class OrphanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Orphanage::all() as $orphanage) {
            Orphan::factory()->count(random_int(10, 100))->create([
                'orphanage_id' => $orphanage->id,
            ]);
        }
    }
}
