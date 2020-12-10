<?php
   define('DB_SERVER', 'vietnamese-dictionary.clgtn4sxu21h.us-east-1.rds.amazonaws.com');
   define('DB_USERNAME', 'admin');
   define('DB_PASSWORD', 'WebIT4552');
   define('DB_DATABASE', 'vietdict');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>