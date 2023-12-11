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

    public function primaryKey()
    {
        return 'cate_id';
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
        $id = $this->primaryKey();
        $sql = $this->db->table('category')
            // ->where('cate_id', '>', 0)->where('cate_id', '<', 10)
            ->where('cate_id', '>', 0)
            ->select('cate_id , cate_name')->orderBy($id, 'DESC')->get();
        // $sql = $this->db->table('category as c')->join('category_v2 as c_v2', 'c.cate_id=c_v2.cate_id')->select('name, cate_name')->where('c.cate_id', '=', '1')->get();

        return $sql;
    }
    public function insertDataQueryBuilder($data)
    {
        $sql = $this->db->table('category')->insert($data);
        return $sql;
    }
    public function updateDataQueryBuilder($data, $id)
    {
        $sql = $this->db->table('category')->where('cate_id', '=', $id)->update($data);
        return $sql;
    }
    public function deleteDataQueryBuilder($id)
    {
        $sql = $this->db->table('category')->where('cate_id', '=', $id)->delete();
        return $sql;
    }
    public function lastInsertIdDataQueryBuilder($data)
    {
        $this->db->table('category')->insert($data);
        return $this->db->lastId();
    }
}
