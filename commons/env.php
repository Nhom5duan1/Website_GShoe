<?php 
// Biến môi trường, dùng chung toàn hệ thống
// Khai báo dưới dạng HẰNG SỐ để không phải dùng $GLOBALS
define('BASE_URL'       , 'http://localhost/Website_GShoe/');
define('BASE_URL_ADMIN'       , 'http://localhost/Website_GShoe/admin/'); // Đường dẫn vào phần admin
define('DB_HOST'    , 'localhost');
define('DB_PORT'    , 3306);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME'    , 'db_wedsite_gshoe');  // Tên database
define('PATH_ROOT'    , __DIR__ . '/../');