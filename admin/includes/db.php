<?php

global $connection;
$connection = mysqli_connect('localhost','root','','cms');

if(!$connection)
{
    echo "Database is Not Connected".mysqli_error();
}
?>