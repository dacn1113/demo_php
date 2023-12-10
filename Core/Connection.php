<?php

class Connection
{
    private static $instances = null, $conn = null;

    private function __construct($config)
    {
        try {
            //Cấu hình dsn
            $dsn = 'mysql:dbname=' . $config['db'] . ';host=' . $config['host'];

            //Cấu hình $options
            /**
             * -Cấu hình utf8
             * -Cấu hình ngoại lệ khi truy vấn bị lỗi
             */
            $options = [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];
            //Thay thế nếu không có pass
            $pass = '';
            if (!empty($config['pass'])) {
                $pass = $config['pass'];
            }
            //Câu lệnh kết nối
            $con = new PDO($dsn, $config['user'], $pass, $options);

            self::$conn = $con;
        } catch (Exception $exception) {
            $mess = $exception->getMessage();
            App::$app->loadError('database', ['message' => $mess]);
            // if (preg_match('/Access denfine for user/', $mess)) {
            //     die('Lỗi kết nối cơ sở dữ liệu');
            // }
            // if (preg_match('/Unknown database/', $mess)) {
            //     die('Không tìm thấy cơ sỡ dữ liệu');
            // }
            die();
        }
    }
    public static function getInstance($config)
    {
        if (self::$instances == null) {
            $connection = new Connection($config);
            self::$instances = self::$conn;
        }

        return self::$instances;
    }
}
