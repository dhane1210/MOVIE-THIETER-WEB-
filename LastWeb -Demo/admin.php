<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
</head>

<body>
<div class="upcommings">

<?php
$msg2 = "";

if(isset($_POST['btnadd2'])){
    $location2 = "caro2/"; // Update the location path if necessary
    $maxSize2 = 5000000;
    $checked2 = true;
    $fileExt2 = array('jpg','jpeg','png');
    
    $name2 = basename($_FILES['movieUpload']['name2']);
    $temp_name2 = $_FILES['movieUpload']['tmp_name2'];
    $type2 = $_FILES['movieUpload']['type2'];
    $size2 = $_FILES['movieUpload']['size2'];    
    $ext2 = strtolower(pathinfo($name2, PATHINFO_EXTENSION));

    if(file_exists($location2 . $name2)){
        $msg2 = "File already exists";
        $checked2 = false;
    }
    if($size2 > $maxSize2){
        $msg2 = "File is too large";
        $checked2 = false;
    }
    if(!in_array($ext2, $fileExt2)){
        $msg2 = "Invalid file type";
        $checked2 = false;
    }
    if($checked2){
        $id2 = $_POST['txtID2'];
        $title2 = $_POST['txttitle2'];
        $dis2 = $_POST['txtdis2'];
        $path2 = $location2 . $name2;

        $sql2 = "INSERT INTO caro2 (id2, title2, discription2, poster2) VALUES ('$id2', '$title2', '$dis2', '$path2')";
        if(mysqli_query($conn, $sql2)){
            move_uploaded_file($temp_name2, $location2 . $name2);
            $msg2 = "Movie Record Inserted";
        }else{
            $msg2 = mysqli_error($conn);
        }
    } 
}
?>
<!-- Add Data for up-commings -->
<form method="post" enctype="multipart/form-data">
        <h2>Add Data</h2>
        <table>
            <tr>
                <td><lable>Movie ID</lable></td>
                <td><input type="text" name="txtID2"></td>
            </tr>
            <tr>
                <td><lable>Movie Title</lable></td>
                <td><input type="text" name="txttitle2"></td>
            </tr>
            <tr>
                <td><lable>Discriptoin</lable></td>
                <td><input type="text" name="txtdis2"></td>
            </tr>
            <tr>
                <td><lable>Movie poster</lable></td>
                <td><input type="file" name="movieUpload"></td>
            </tr>
            <tr>
                <td colspan="2"><lable></lable></td>

            </tr>
            <tr>
               <td colspan="2"><input type = "submit" name="btnadd" value="Add2"></td>
            </tr>
            <tr>
               <td colspan="2"><input type = "submit" name="btnview" value="View2"></td>
            </tr>
        </table>
    </form>

     <!--  Update Area of Up-commings -->
    <?php
if(isset($_POST['btnup'])){
    $location = "caro2/";
    $maxSize = 5000000;
    $checked = true;
    $fileExt = array('jpg','jpeg','png');
    
    $name = basename($_FILES['movieUpload']['name']);
    $temp_name = $_FILES['movieUpload']['tmp_name'];
    $type = $_FILES['movieUpload']['type'];
    $size = $_FILES['movieUpload']['size'];    
    $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));

    if(file_exists($location . $name)){
        $msg = "File already exists";
        $checked = false;
    }
    if($size > $maxSize){
        $msg = "File is too large";
        $checked = false;
    }
    if(!in_array($ext, $fileExt)){
        $msg = "Invalid file type";
        $checked = false;
    }
    if($checked){
        $id = $_POST['txtID'];
        $title = $_POST['txttitle'];
        $dis = $_POST['txtdis'];
        $path = $location . $name;

        $sql = "UPDATE caro1 SET title='$title', discription='$dis', poster='$path' WHERE id='$id'";
        if(mysqli_query($conn, $sql)){
            move_uploaded_file($temp_name, $location . $name);
            $msg = "Movie Record Updated";
        }else{
            $msg = mysqli_error($conn);
        }
    } 
}
?>
    <form method="post" enctype="multipart/form-data">
        <h2>Update Data</h2>
        <table>
            <tr>
                <td><lable>Movie ID</lable></td>
                <td><input type="text" name="txtID"></td>
            </tr>
            <tr>
                <td><lable>Movie Title</lable></td>
                <td><input type="text" name="txttitle"></td>
            </tr>
            <tr>
                <td><lable>Discriptoin</lable></td>
                <td><input type="text" name="txtdis"></td>
            </tr>
            <tr>
                <td><lable>Movie poster</lable></td>
                <td><input type="file" name="movieUpload"></td>
            </tr>
            <tr>
                <td colspan="2"><lable><?php echo $msg; ?></lable></td>

            </tr>
            <tr>
               <td colspan="2"><input type = "submit" name="btnup" value="Update"></td>
            </tr>
           
        </table>
    </form>

    <!-- Data Showing -->

    <?php
    if (isset($_POST['btnview'])) {
        $sql = "SELECT title, poster, discription FROM caro1";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $title = $row['title'];
                $poster = $row['poster'];
                $dis = $row['discription'];

            ?>
             <div class="carousel-item">
                <img src="<?php echo $poster; ?>" alt="<?php echo $title; ?>" alt="<?php echo $dis; ?>" style="width: 250px; height: 150px; margin: 0;">
                <div class="carousel-caption">
                    <h5>Title : <?php echo $title; ?></h5>
                    <h5>Discriptoin : <?php echo $dis; ?></h5>
                </div>
            </div>
            <?php
            }

        }
    }
?>

</div>

   
</body>
</html>