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
    protected function find()
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

    //Lấy dữ liệu sử dụng câu truy vấn thường được truyền từ bên ngoài
    protected function getData($sql)
    {
        $result = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $result = json_encode($result);
        return $result;
    }
}
