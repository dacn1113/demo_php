<?php

$routers['default_controller'] = 'home';
/*
* Đường dẫn ảo => Đường dẫn thật
*
*/
$routers['san-pham'] = 'product/index';
$routers['trang-chu'] = 'home';
$routers['tin-tuc/.+-(\d+).html'] = 'news/category/$1';
