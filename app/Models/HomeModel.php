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
        return '*';
    }

    public function getList()
    {
        //Lấy data bằng cách gửi câu truy vấn từ ngoài vào
        $data = $this->getData("SELECT * FROM category");
        //Lấy data nhanh từ phương thức đã khai báo 
        // $data = $this->all();
        return $data;
    }
    //Sử dụng QueryBuilder
    public function getDataQueryBuilder()
    {
        $sql = $this->db->table('category')
            ->where('cate_id', '>', 3)->where('cate_id', '<', 5)
            ->select('cate_id , cate_name')->get();
        return $sql;
    }
}
