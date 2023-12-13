<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Category::truncate();
        Schema::enableForeignKeyConstraints();

        $data = ['Novel', 'Majalah', 'Kamus', 'Komik', 'Manga', 'Ensiklopedia', 'Biografi'];

        foreach ($data as $d) {
            Category::insert([
                'name' => $d
            ]);
        }
    }
}
