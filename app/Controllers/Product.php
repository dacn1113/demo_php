<?php
class Product extends Controller
{
    public function index()
    {
        // return $this->view('frontend.products.index');
        echo 'Danh sách sản phẩm';
    }

    public function list_product()
    {
        $product = $this->model('ProductModel');
        $data =  $product->getProduct();
        print_r($data);
    }
}
