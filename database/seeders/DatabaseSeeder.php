<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\ImageProduct::factory(20)->create();
        // \App\Models\Product::factory(20)->create();
        // \App\Models\ProductImage::factory(20)->create();

        // \App\Models\Product::factory()->create([
        //     'path' => 'path',
        //     'default_imge' => 'default_imge',
        // ]);
    }
}
