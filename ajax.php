<?php
include("connection.php");
include("class.php");
$id=$_POST['delid'];

$sql="DELETE from addemp where id=:id";
$statement=$connect->prepare($sql);

$statement->bindParam(":id",$id);
$statement->execute();

$id=$_POST['editid'];
$listrow=new getdata();
$listrow1= $listrow->getdetail($id,$connect);
if($listrow1){
    echo json_encode($listrow1);
}
    
?>