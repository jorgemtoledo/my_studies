<?php
require_once 'auth.php';
$user = auth_current_user();
var_dump($user);