<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['name' => 'cricket'],
            ['name' => 'kabaddi'],
        ];

        Type::truncate();

        foreach ($items as $item) {

            $type = new Type();

            $type->name = $item['name'];
            $type->save();
        }
    }
}
