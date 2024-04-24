<?php
include ("config.php");
$id=$_GET['id'];
$del_qry=$conn->query("delete from contact where id='$id'");
if($del_qry)
{
    header("Location: dashboardr.php");
}
?>