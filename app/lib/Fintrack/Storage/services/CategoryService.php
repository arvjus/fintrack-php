<?php namespace Fintrack\Storage\Services;

use Category;

class CategoryService
{
    public function all() {
        return Category::all();
    }

    public function allAsArray() {
        $array = array();
        foreach (Category::all() as $category) {
            $array[] = array(
                'category_id' => $category->category_id,
                'name' => $category->name,
                'name_short' => $category->name_short,
                'descr' => $category->descr);
        }
        return $array;
    }

    public function find($id) {
        return Category::find($id);
    }
}