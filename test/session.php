<?php
session_start();

// $_SESSION['usertype'] = 'GUEST';

echo '<pre>';
print_r($_SESSION);
echo '</pre>';
echo 'Session id: ' . session_id();
echo '<br>';
echo 'usertype: ' . $_SESSION['usertype'];
?>