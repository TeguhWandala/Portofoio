<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // category
         $data = [
            'Mobile',
            'Laptop',
            'Tablet',
            'Smartwatch',
            'Headphone',
            'Speaker',
            'Printer',
            'Monitor',
            'TV',
            'Accessories',
            'Jeruk Lokal',
            'Jeruk Impor',
        ];
        
        foreach($data as $category) {
            Category::create([
                'name' => $category,
            ]);
        }
    }
}