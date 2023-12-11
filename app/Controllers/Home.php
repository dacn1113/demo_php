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
        // $data = $this->model_home->getList();

        //Sử dụng QueryBuilder bên ngoài không thông qua Model
        $data = $this->db->table('category')->get();

        // $data = $this->model_home->getDataQueryBuilder();

        $this->data['sub_content']['menu'] = $data;
        $this->data['content'] = 'home/index';
        //Render view
        $this->render('layout/client_layout', $this->data);
    }
    public function insert()
    {
        // $data = $this->model_home->getList();
        $dt = ['cate_name' => 'newdatatest'];
        $data = $this->model_home->insertDataQueryBuilder($dt);

        $this->data['sub_content']['menu'] = $data;
        $this->data['content'] = 'home/index';
        //Render view
        $this->render('layout/client_layout', $this->data);
    }

    public function update()
    {
        $cate_name =  $_GET['cate_name'];
        $id =  $_GET['id'];
        $dt = ['cate_name' => $cate_name];
        $sql = $this->model_home->updateDataQueryBuilder($dt, $id);

        if ($sql) {
            $data = 'Thanh cong';
        } else {
            $data = 'Khong thanh cong';
        }
        $this->data['sub_content']['menu'] = $data;
        $this->data['content'] = 'home/index';
        //Render view
        $this->render('layout/client_layout', $this->data);
    }
    public function delete($id)
    {
        $sql = $this->model_home->deleteDataQueryBuilder($id);

        if ($sql) {
            $data = 'Thanh cong';
        } else {
            $data = 'Khong thanh cong';
        }
        $this->data['sub_content']['menu'] = $data;
        $this->data['content'] = 'home/index';
        //Render view
        $this->render('layout/client_layout', $this->data);
    }
    public function lastId($a)
    {
        $dt = ['cate_name' => $a];
        $data = $this->model_home->lastInsertIdDataQueryBuilder($dt);


        $this->data['sub_content']['menu'] = $data;
        $this->data['content'] = 'home/index';
        //Render view
        $this->render('layout/client_layout', $this->data);
    }
}
