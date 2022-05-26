<?php

session_id("usuario");
session_start();
session_destroy();
header('Location: /holaubb/index.php');