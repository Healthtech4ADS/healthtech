<?php
  require '../vendor/autoload.php';
  require '../helpers/dotenv.php';
  require '../helpers/whoops.php';

  $BASE_URL = "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER['REQUEST_URI'].'?');
?>