<?php
// class CategoryController extends BaseController
// {
//     private $categoryModel;


//     public function __construct()
//     {
//         $this->loadModel('CategoryModel');
//         $this->categoryModel = new CategoryModel;
//     }

//     public function index()
//     {
//         $categories = $this->categoryModel->getAll();

//         return $this->view('frontend.categories.index', [
//             'categories' => $categories,
//         ]);
//     }

//     public function show()
//     {
//         return $this->view('frontend.categories.index');
//     }
// }