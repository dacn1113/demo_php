<?php
class ProductModel
{
    public function getProduct()
    {
        return [
            'Sản phẩm 1',
            'Sản phẩm 2'
        ];
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