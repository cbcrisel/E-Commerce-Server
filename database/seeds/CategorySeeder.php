<?php

use Illuminate\Database\Seeder;
use App\Category;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryNames=[
            'Guitarras',
            'Bajos',
            'Baterias'
        ];
        foreach($categoryNames as $categoryName){
            $category=new Category();
            $category->name=$categoryName;
            $category->created_at=Carbon::now();
            $category->save();
        }
    }
}
