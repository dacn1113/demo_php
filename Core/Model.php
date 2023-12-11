<?php
//Base Model
abstract class Model extends Database
{
    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    abstract function tableFill();
    abstract function fieldFill();
    abstract function primaryKey();

    //Lấy dữ liệu sử dụng câu truy vấn thường
    protected function all()
    {
        $tableName = $this->tableFill();
        $fieldSelect = $this->fieldFill();

        $sql = "SELECT $fieldSelect FROM $tableName";

        $query = $this->db->query($sql);

        if (!empty($query)) {
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }

    //Lấy 1 bản ghi
    protected function find($id)
    {
        $tableName = $this->tableFill();
        $fieldSelect = $this->fieldFill();
        $primaryKey = $this->primaryKey();

        $sql = "SELECT $fieldSelect FROM $tableName WHERE $primaryKey = $id";

        $query = $this->db->query($sql);

        if (!empty($query)) {
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }

    //Lấy dữ liệu sử dụng câu truy vấn thường được truyền từ bên ngoài
    protected function getData($sql)
    {
        $result = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $result = json_encode($result);
        return $result;
    }
}
