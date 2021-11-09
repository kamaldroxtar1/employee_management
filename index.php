<?php
include("connection.php");
include("class.php");

// for connection.
$obj = new connection();
$connect = $obj->get();
// for displaying details.
$listsobj = new fetch;
$lists = $listsobj->fetchall($connect);



//for sending data to database.
$error = "";
if (isset($_POST['submit'])) {
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $city = $_POST['city'];

    $temp = $_FILES['images']['tmp_name'];
    $fname = $_FILES['images']['name'];
    $ext = pathinfo($fname, PATHINFO_EXTENSION);
    $imgadd = "users/$email/" . $fname;

    $obj1 = new add;
    $listarraydetail = [$username, $email, $name, $age, $city, $imgadd];


    if (!empty($username) && !empty($email) && !empty($name) && !empty($age) && !empty($city) && !empty($temp)) {
        if ($ext == 'jpeg' or $ext == 'png' or $ext == 'jpg') {
            if ($obj1->adddetail($listarraydetail, $connect) == true) {
                echo "Details Added Successfully.";
                if (!(file_exists("users/$email"))) {
                    mkdir("users/$email");
                    move_uploaded_file($temp, "users/$email/" . $fname);
                }
            } else {
                $error = "User Already Exist";
            }
        } else {
            $error = "Choose Correct File";
        }
    } else {
        $error = 'Fill All Field';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="header">
        <div class="container text-right mt-3">
            <input type="button" class="btn btn-success" data-toggle="modal" data-target="#openmodal" value="Add Employee">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-3">
            <?php
            if (!empty($error)) {
            ?>
                <div class="alert-danger alert" role="alert"> <?php echo $error ?> </div>
            <?php  }
            ?>
        </div>
        <!-- Modal -->
        <div id="openmodalupdate" class="modal fade col-3" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class=" text-center">
                        <h4 class="modal-title mt-3">Update Employee</h4>
                    </div>
                    <div class="modal-body">
                        <!--  -->
                        <form class="container mt-4" method="POST" novalidate enctype="multipart/form-data">
                            <br>

                            <div class="form-group">
                                <input type="text" class="form-control" value="<?=$listrow1->Uname?>" placeholder="Username" id="uname" name="uname">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="email" value="<?=$listrow1->Email?> placeholder="Email" name="email">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="name" value="<?=$listrow1->NName?> placeholder="Name" name="name">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="age" value="<?=$listrow1->Age?> placeholder="Age" name="age">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="city" value="<?=$listrow1->City?> placeholder="City" name="city">
                            </div>

                            <div class="form-group">
                                <input type="file" class="form-control" placeholder="FILE Upload" name="images">
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="submit" class="form-control btn btn-success" value="Update Employee" id="sub" name="update">

                            </div>
                            <br>
                        </form>
                        <!--  -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">cancel</button>
                    </div>
                </div>

            </div>
        </div>

        <!-- Modal -->
        <div id="openmodal" class="modal fade col-3" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class=" text-center">
                        <h4 class="modal-title mt-3">Add Employee</h4>
                    </div>
                    <div class="modal-body">
                        <!--  -->
                        <form class="container mt-4" method="POST" novalidate enctype="multipart/form-data">
                            <br>

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Username" name="uname">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Email" name="email">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Name" name="name">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Age" name="age">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="City" name="city">
                            </div>

                            <div class="form-group">
                                <input type="file" class="form-control" placeholder="FILE Upload" name="images">
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="submit" class="form-control btn btn-success" value="Submit" id="sub" name="submit">

                            </div>
                            <br>
                        </form>
                        <!--  -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">cancel</button>
                    </div>
                </div>

            </div>
        </div>


        <div id="result" class="col-9">
            <div class="container">
                <div class="card mt-5">
                    <div class="card-header text-center bg-dark text-light">
                        <h2>Lists of Employees.</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>S.no</th>
                                <th>Uname</th>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>City</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>

                            <?php $sn = 1;
                            foreach ($lists as $list) : ?>
                                <tr>
                                    <td> <?= $sn; ?> </td>
                                    <td><?= $list->Uname ?></td>
                                    <td><?= $list->Email ?></td>
                                    <td><?= $list->NName ?></td>
                                    <td><?= $list->Age ?></td>
                                    <td><?= $list->City ?></td>
                                    <td><?= $list->Imagepath ?></td>
                                    <td><input type="submit" data-id="<?php echo $list->id ?>" data-toggle="modal" data-target="#openmodalupdate" name="update" class="btn btn-warning edit">
                                        <a href="#" data-id="<?php echo $list->id ?>" class="btn btn-danger delete"> Delete</a>
                                    </td>
                                </tr>

                            <?php $sn++;
                            endforeach; ?>
                        </table>
                    </div>

                </div>

            </div>
        </div>
        <script> 
        //deleteuser 
        $(".delete").click(function(){
            if(confirm("Do u want to delete ?")==true){
                var id=$(this).data('id');
                $.ajax({
                    type:"POST",
                    url:"ajax.php",
                    data:{delid:id},
                    success:function(data){
                        alert("Deleted successfully");
                        window.location.reload();
                    }
                })
            }
        }) 

        //edituser 
        $(".edit").click(function(){
                var id=$(this).data('id');
               
                $.ajax({
                    type:"post",
                    url:"ajax.php",
                    data:{editid:id},
                    dataType:'json',
                    success:function(data){
                        console.log(data.name)
                        $("#uname").val(data.Uname);
                        $("#email").val(data.Email);
                        $("#name").val(data.NName);
                        $("#age").val(data.Age);
                        $("#city").val(data.City);
                    }
                })
           
        })
        </script>

    </div>

</body>

</html>