<?php
class Home extends Controller
{
    protected $model_home;

    public function __construct()
    {
        $this->model_home = $this->model('HomeModel');
    }
    public function index()
    {
        $data = $this->model_home->getList();
        echo 'Trang Home' . '<br>';
        print_r($data);
    }
}
