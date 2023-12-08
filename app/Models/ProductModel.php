<?php
class ProductModel
{
    public function getProduct()
    {
        $data =  [
            'Sản phẩm 1',
            'Sản phẩm 2'
        ];
        return $data;
    }
    public function getIdProduct($id)
    {
        $data = [
            'Sản phẩm 1',
            'Sản phẩm 2',
            'Sản phẩm 3',
            'Sản phẩm 4'
        ];
        if (!empty($data[$id])) {
            return $data[$id];
        } else {
            return 'không tồn tại';
        }
    }
}
// class ProductModel extends BaseModel
// {
//     const TABLE = 'products';

//     public function getAll()
//     {
//         return $this->all(self::TABLE);
//     }

//     public function finById()
//     {
//         return __METHOD__;
//     }

//     public function delete()
//     {
//         return __METHOD__;
//     }
// }