<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Genre;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::create([
            'id' => '1',
            'nama' => 'Pop',
            'slug' => Str::slug('Pop')
        ]);

        Genre::create([
            'id' => '2',
            'nama' => 'Rock',
            'slug' => Str::slug('Rock')
        ]);

        Genre::create([
            'id' => '3',
            'nama' => 'Jazz',
            'slug' => Str::slug('Jazz')
        ]);

        Genre::create([
            'id' => '4',
            'nama' => 'Classic',
            'slug' => Str::slug('Classic')
        ]);

        Genre::create([
            'id' => '5',
            'nama' => 'Others',
            'slug' => Str::slug('Others')
        ]);

        Genre::create([
            'id' => '6',
            'nama' => 'All Genre',
            'slug' => Str::slug('All Genre')
        ]);
    }
}
