<?php

use Fintrack\Storage\Services\CategoryService as Category;

class HomeController extends BaseController
{
    public function __construct(Category $category) {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        return $this->category->all();
    }
}