<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use App\Functions\Helper;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data= ['FRONT END','BACKEND','DESIGN','VUEJS','LARAVEL'];
        foreach ($data as $item) {

            $new_item= new Type();
            $new_item->name=$item;
            $new_item->slug=Helper::generateSlug($new_item->name, new Type());
            $new_item->save();

        }
    }
}
