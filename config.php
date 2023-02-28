<?php
session_start();


$con = mysqli_connect("localhost","root","","new_db");
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}