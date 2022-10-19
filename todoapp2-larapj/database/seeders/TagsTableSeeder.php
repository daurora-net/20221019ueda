<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'title' => '家事'
        ];
        Tag::create($param);
        $param = [
            'title' => '勉強'
        ];
        Tag::create($param);
        $param = [
            'title' => '運動'
        ];
        Tag::create($param);
        $param = [
            'title' => '食事'
        ];
        Tag::create($param);
        $param = [
            'title' => '移動'
        ];
        Tag::create($param);
    }
}