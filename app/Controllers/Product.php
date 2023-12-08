<?php
class Product extends Controller
{
    public $data = [];
    public function __construct()
    {
        //Khởi tạo menu sau này
        $this->data['sub_content']['header'] = 'Chứa menu';

        //Khởi tạo cho phần thông tin
        $this->data['sub_content']['footer'] = 'Chứa thông tin web ';
    }
    public function index()
    {
        // return $this->view('frontend.products.index');
        $this->data['content'] = '';
        echo '<h1>Trang index của product</h1>';
        $this->render('layout/client_layout', $this->data);
    }

    public function list_product()
    {
        $product = $this->model('ProductModel');
        $dataProduct =  $product->getProduct();

        //Chuyển data vào layout
        $this->data['sub_content']['product_Data'] = $dataProduct;
        $this->data['sub_content']['title'] = 'Danh sách sản phẩm';
        $this->data['content'] = 'products/list';

        //Render view
        $this->render('layout/client_layout', $this->data);
    }
    public function list_product_id($id = 0)
    {
        $product = $this->model('ProductModel');
        $dataId =  $product->getIdProduct($id);
        $this->data['sub_content']['productIdData'] = $dataId;
        $this->data['content'] = 'products/detail';
        //Render view
        $this->render('layout/client_layout', $this->data);
    }
}
