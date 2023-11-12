<?php

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    public function run()
    {
        // Clear existing tags
        Tag::truncate();

        Tag::create([
            'tag_name' => 'liqour',
            'admin_id' => 1, 
        ]);

        Tag::create([
            'tag_name' => 'shopping',
            'admin_id' => 1, 
        ]);

    }
}
