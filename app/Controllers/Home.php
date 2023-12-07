<?php
class Home extends BaseController
{
    public function index()
    {
        echo 'Trang chu';
        // return $this->view('frontend.products.index');
    }

    public function show($name = '', $age = '')
    {
        echo 'Name: ' . $name . '<br>';
        echo 'Age: ' . $age;
    }
}
