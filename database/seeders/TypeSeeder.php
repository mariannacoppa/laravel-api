<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // array di tipologie
        $types = ['Frontend', 'Backend', 'Database', 'Full Stack', 'Design'];

        foreach($types as $type){
            $new_type = new Type();
            $new_type->name = $type;
            $new_type->slug = Type::generateSlug($type);
            $new_type->save();
        }
    }
}
