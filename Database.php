<?php
$con= new mysqli('localhost','root','','siz');
if(!$con){
 die(mysqli_error($con));
}