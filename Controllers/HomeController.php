<?php
class HomeController extends BaseController
{
    public function index()
    {
        return $this->view('frontend.products.index');
    }

    public function show()
    {
        echo __METHOD__;
    }
}
