<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UP-COMINGS</title>
    
</head>
<body>
<div class="nowshowing">


<?php
$msg = "";

if(isset($_POST['btnadd'])){
    $location = "caro/"; // Update the location path if necessary
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

        $sql = "INSERT INTO caro1 (id, title, discription, poster) VALUES ('$id', '$title', '$dis', '$path')";
        if(mysqli_query($conn, $sql)){
            move_uploaded_file($temp_name, $location . $name);
            $msg = "Movie Record Inserted";
        }else{
            $msg = mysqli_error($conn);
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
               <td colspan="2"><input type = "submit" name="btnadd" value="ADD"></td>
            </tr>
            <tr>
               <td colspan="2"><input type = "submit" name="btnview" value="RE-FRESH"></td>
            </tr>
        </table>
    </form>
   
     <!--  Update Area of Up-commings -->
    <?php
if(isset($_POST['btnup'])){
    $location = "caro/";
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
    </form><br><br>

    <!-- Data Showing -->
    <h2>Carousel Items</h2><br><br>
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