<?php
class Home extends Controller
{
    protected $model_home;
    public $data;

    public function __construct()
    {
        $this->model_home = $this->model('HomeModel');
    }
    public function index()
    {
        $data = $this->model_home->getList();
        $this->data['sub_content']['menu'] = $data;
        $this->data['content'] = 'home/index';
        //Render view
        $this->render('layout/client_layout', $this->data);
    }
}
