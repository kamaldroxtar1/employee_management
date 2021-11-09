<?php
 //include("connection.php");
 class add{
     function adddetail($arr,$connect){

    $sql="INSERT into addemp (Uname,Email,NName,Age,City,Imagepath) values(:uname,:email,:name,:age,:city,:imagepath)";

    $data2=$connect->prepare($sql);
    $data2->bindParam(":uname",$arr[0]);
    $data2->bindParam(":email",$arr[1]);
    $data2->bindParam(":name",$arr[2]);
    $data2->bindParam(":age",$arr[3]);
    $data2->bindParam(":city",$arr[4]);
    $data2->bindParam(":imagepath",$arr[5]);
    $data2->execute();
    return true;
     }

 }

 class edit{
     function editdetail($arr,$connect){
        $sql="UPDATE addemp SET Uname=:uname ,Email=:email , NName=:name ,Age=:age ,City=:city ,Imagepath=:imagepath";

        $data2=$connect->prepare($sql);
        $data2->bindParam(":uname",$arr[0]);
        $data2->bindParam(":email",$arr[1]);
        $data2->bindParam(":name",$arr[2]);
        $data2->bindParam(":age",$arr[3]);
        $data2->bindParam(":city",$arr[4]);
        $data2->bindParam(":imagepath",$arr[5]);
        $data2->execute();
     }

 }

 class del{
    function deldetail($id,$connect){
     $sql="DELETE FROM addemp WHERE id='$id'";
     $data2=$connect->prepare($sql);
     $data2->execute();
    }
 }

 class fetch{
    function fetchall($connect){
        $sql="SELECT * from addemp";
        $data2=$connect->prepare($sql);
        $data2->execute();
        $lists=$data2->fetchAll(PDO::FETCH_OBJ);
        return $lists;
    }
}
 class getdata{
     function getdetail($id,$connect){
         $sql="SELECT * FROM addemp WHERE id='$id'";
         $data2=$connect->prepare($sql);
         $data2->execute();
         $lists=$data2->fetchall(PDO::FETCH_OBJ);
         return $lists ;
     }
 }
?>
