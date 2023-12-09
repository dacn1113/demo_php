<?php
//Base Model
class Model extends Database
{
    private $db;

    function __construct()
    {
        $this->db = new Database();
    }

    protected function getData($sql)
    {
        $result = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $result = json_encode($result);
        return $result;
    }
}
