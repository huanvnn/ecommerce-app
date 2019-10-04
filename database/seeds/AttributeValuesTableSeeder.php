<?php

use App\Models\AttributeValue;
use Illuminate\Database\Seeder;

class AttributeValuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes = ['small', 'medium', 'large'];
        $colors = ['black', 'blue', 'red', 'orange'];

        foreach ($sizes as $size => $value) {
            AttributeValue::create([
                'attribute_id' => 1,
                'value'        => $size,
                'price'        => null,
            ]);
        }
        foreach ($colors as $color => $value) {
            AttributeValue::create([
                'attribute_id' => 2,
                'value'        => $color,
                'price'        => null,
            ]);
        }
    }
}
