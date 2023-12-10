<?php
class HomeModel extends Model
{
    protected $_table = 'products';

    //Nếu lớp kế thừa có __construct() thì phải gọi __construct() cho lớp cha
    // function __construct()
    // {
    //     parent::__construct();
    // }
    public function tableFill()
    {
        return 'category';
    }

    public function fieldFill()
    {
        return 'cate_name';
    }
    public function getList()
    {
        //Thử lấy data 
        // $data = $this->getData("SELECT * FROM category");
        $data = $this->get();

        return $data;
    }
}
