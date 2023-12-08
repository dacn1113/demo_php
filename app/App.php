<?php

class App
{
    private $__controller, $__action, $__param, $__routers;

    function __construct()
    {
        global $routers;

        $this->__routers = new Router();

        if (!empty($routers['default_controller'])) {
            $this->__controller = $routers['default_controller'];
        }

        $this->__action = 'index';
        $this->__param = [];

        $this->handleUrl();
    }
    //Lấy url
    function getUrl()
    {
        if (!empty($_SERVER['PATH_INFO'])) {
            $url = $_SERVER['PATH_INFO'];
        } else {
            $url = '/';
        }
        return $url;
    }

    public function handleUrl()
    {

        $url  = $this->getUrl();

        //Xử lý chuyển đổi cho router ảo
        $url = $this->__routers->handleRouter($url);

        $urlArr = array_filter(explode('/', $url));
        $urlArr = array_values($urlArr);
        // echo '<pre>';
        // print_r($urlArr);
        // echo '</pre>';


        //Kiểm tra khi controller là file thì thực hiên chuyển đổi 
        $urlCheck = '';
        if (!empty($urlArr)) {

            foreach ($urlArr as $key => $item) {

                $urlCheck .= $item . '/';

                //Bỏ dấu gạch cuối 
                $fileCheck = rtrim($urlCheck, '/');
                $fileArr = explode('/', $fileCheck);
                // echo '<pre>';
                // print_r($fileArr);
                // echo '</pre>';
                $fileArr[count($fileArr) - 1] = ucfirst($fileArr[count($fileArr) - 1]);

                $fileCheck = implode('/', $fileArr);

                //Xóa tên vị trí [0]
                if (!empty($urlArr[$key - 1])) {
                    unset($urlArr[$key - 1]);
                }

                //Kiểm tra file_abc/file_controller_abc có tồn tại
                if (file_exists('app/controllers/' . ($fileCheck) . '.php')) {
                    $urlCheck = $fileCheck;
                    break;
                }
            }
            $urlArr = array_values($urlArr);
        }

        // echo '<pre>';
        // print_r($urlArr);
        // echo '</pre>';


        // echo '<pre>';
        // print_r($urlArr);
        // echo '</pre>';

        //Xử lý controller
        if (!empty($urlArr[0])) {
            $this->__controller = ucfirst($urlArr[0]);
        } else {
            $this->__controller = ucfirst($this->__controller);
        }
        // echo $this->__controller;
        if (file_exists('app/controllers/' . $urlCheck . '.php')) {
            require_once 'controllers/' . $urlCheck . '.php';

            //Kiểm tra class $this->__controller tồn tại
            if (class_exists($this->__controller)) {
                $this->__controller = new $this->__controller();
            } else {
                $this->loadError();
            }

            unset($urlArr[0]);
        } else {
            $this->loadError();
        }

        //Xử lý action
        if (!empty($urlArr[1])) {
            $this->__action = $urlArr[1];
            unset($urlArr[1]);
        }

        //Xử lý param 
        $this->__param = array_values($urlArr);

        //Kiểm tra method tồn tại
        if (method_exists($this->__controller, $this->__action)) {
            call_user_func_array([$this->__controller, $this->__action], $this->__param);
        } else {
            $this->loadError();
        }
    }
    public function loadError($name = '404')
    {
        require_once 'errors/' . $name . '.php';
    }
}