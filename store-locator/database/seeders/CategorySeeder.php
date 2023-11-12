<?php
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Clear existing categories
        Category::truncate();

        Category::create([
            'category_name' => 'Retail',
            'admin_id' => 1,
        ]);

        Category::create([
            'category_name' => 'Supermarket',
            'admin_id' => 1, 
        ]);

        Category::create([
            'category_name' => 'Liqour',
            'admin_id' => 1, 
        ]);

        Category::create([
            'category_name' => 'Inside-Mall',
            'admin_id' => 1, 
        ]);

        Category::create([
            'category_name' => 'Stationery',
            'admin_id' => 1, 
        ]);


    }
}
