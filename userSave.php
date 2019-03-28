<?php

print_r($_GET);

echo 'Hello ' . htmlspecialchars($_POST["first_name"]) . '!';
die();
