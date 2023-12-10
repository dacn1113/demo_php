<?php

trait QueryBuilder
{
    public $tableName = '';
    public $where = '';
    public $operator = '';
    public $selectField = '*';

    public function table($tableName)
    {
        $this->tableName = $tableName;
        return $this;
    }

    public function where($field, $compare, $value)
    {
        //Nếu Where tồn tại thì chuyển sang AND
        if (!empty($this->where)) {
            $this->operator = ' AND';
        }
        $this->where .= "$this->operator $field $compare '$value'";

        return $this;
    }

    public function select($field = '*')
    {
        $this->selectField = $field;
        return $this;
    }

    public function get()
    {
        $sqlQuery = "SELECT $this->selectField FROM $this->tableName WHERE $this->where";
        $query = $this->query($sqlQuery);

        //Đặt lại giá trị sau khi thực hiện xong truy vấn 
        $this->tableName = '';
        $this->where = '';
        $this->operator = '';
        $this->selectField = '*';

        if (!empty($query)) {
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }
}
