<?php
setcookie('name', $_POST['username'], time()+6000);
echo '<pre>';
print_r($_POST);