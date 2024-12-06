<?php
setcookie("pizza".random_int(0, 2147483647), json_encode($_POST), 2147483647);
header("Location: response_page.php?code=2");