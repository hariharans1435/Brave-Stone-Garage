<?php
include ("config.php");
$id=$_GET['id'];
$del_qry=$conn->query("delete from register where id='$id'");
if($del_qry)
{
	echo("<script>alert('data data successfully')</script>");
    header("Location: dashboard.php");
}
?>