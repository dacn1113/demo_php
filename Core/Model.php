<?php
//Base Model
abstract class Model extends Database
{
    private $db;

    function __construct()
    {
        $this->db = new Database();
    }

    abstract function tableFill();
    abstract function fieldFill();

    protected function get()
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
    protected function getData($sql)
    {
        $result = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $result = json_encode($result);
        return $result;
    }
}
