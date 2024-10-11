<?php

namespace Database\Seeders;

use App\Models\Document;
use App\Models\Link;
use App\Models\NameFolder;
use App\Models\Painel;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Phone;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Phone::factory(10)->create();
        Link::factory(6)->create();
        NameFolder::factory(6)->create();
        if (!User::where('email', 'Admin@admin.com')->exists()) {
            User::factory()->admin()->create();
        }
        // Document::factory(6)->create();
        // Painel::factory(6)->create();
    }
}