<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input[type="submit"] {
            background-color: tomato; /* Green background */
            border-radius: 15px;
            width: 100%;
            border: 1px red; /* Remove borders */
            color: white; /* White text */
            padding: 15px 32px; /* Padding */
            text-align: center; /* Center text */
            text-decoration: none; /* Remove underline */
            display: inline-block; /* Display as inline block */
            font-size: 16px; /* Font size */
            margin: 4px 2px; /* Margin */
            transition-duration: 0.4s; /* Transition duration */
            cursor: pointer; /* Cursor pointer */
        }

        /* On hover */
        input[type="submit"]:hover {
            background-color: #45a049; /* Darker green */
            color: white; /* White text */
        }
        form {
            margin-bottom: 20px; /* Add some bottom margin */
        }

        /* Input styles */
        input[type="text"], input[type="file"] {
            width: 100%; /* Full width */
            padding: 10px; /* Padding */
            margin-top: 5px; /* Top margin */
            margin-bottom: 10px; /* Bottom margin */
            border: 1px solid #ccc; /* Border style */
            border-radius: 15px;
            box-sizing: border-box; /* Box sizing */
        }

        /* Message styles */
        .message {
            color: red; /* Red color */
            margin-bottom: 10px; /* Bottom margin */
        }

        /* Image styles */
        img {
            width: 100%; /* Maximum width */
            height: 100%; /* Auto height */
        }

        /* Carousel styles */
        .carousel-item {
            text-align: center; /* Center align */
            margin-bottom: 20px; /* Bottom margin */
        }
    </style>
</head>
<body>
<div class="nowshowing">
    <?php
    $msg = "";

    if(isset($_POST['btnadd'])){
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
            $id2 = $_POST['txtID'];
            $title2 = $_POST['txttitle'];
            $dis2 = $_POST['txtdis'];
            $path2 = $location . $name;

            $sql = "INSERT INTO caro2 (id, title, discription, poster) VALUES ('$id2', '$title2', '$dis2', '$path2')";
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
                <td><label>Movie ID</label></td>
                <td><input type="text" name="txtID"></td>
            </tr>
            <tr>
                <td><label>Movie Title</label></td>
                <td><input type="text" name="txttitle"></td>
            </tr>
            <tr>
                <td><label>Description</label></td>
                <td><input type="text" name="txtdis"></td>
            </tr>
            <tr>
                <td><label>Movie poster</label></td>
                <td><input type="file" name="movieUpload"></td>
            </tr>
            <tr>
                <td colspan="2"><label class="message"><?php echo $msg; ?></label></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="btnadd" value="ADD"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="btnview" value="RE-FRESH"></td>
            </tr>
        </table>
    </form>

    <!-- Update Area of Up-commings -->
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
            $id2 = $_POST['txtID'];
            $title2 = $_POST['txttitle'];
            $dis2 = $_POST['txtdis'];
            $path2 = $location . $name;

            $sql = "UPDATE caro2 SET title='$title2', discription='$dis2', poster='$path2' WHERE id='$id2'";
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
                <td><label>Movie ID</label></td>
                <td><input type="text" name="txtID"></td>
            </tr>
            <tr>
                <td><label>Movie Title</label></td>
                <td><input type="text" name="txttitle"></td>
            </tr>
            <tr>
                <td><label>Description</label></td>
                <td><input type="text" name="txtdis"></td>
            </tr>
            <tr>
                <td><label>Movie poster</label></td>
                <td><input type="file" name="movieUpload"></td>
            </tr>
            <tr>
                <td colspan="2"><label class="message"><?php echo $msg; ?></label></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="btnup" value="Update"></td>
            </tr>
        </table>
    </form><br><br>

    <!-- Data Showing -->
    <h2>Carousel Items</h2><br><br>

    <?php
    if (isset($_POST['btnview'])) {
        $sql = "SELECT title, poster, discription FROM caro2";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $title2 = $row['title'];
                $poster2 = $row['poster'];
                $dis2 = $row['discription'];
                ?>
                <div class="carousel-item">
                    <img src="<?php echo $poster2; ?>" alt="<?php echo $title2; ?>" alt="<?php echo $dis2; ?>" style="width: 250px; height: 150px; margin: 0;">
                    <div class="carousel-caption">
                        <h5>Title : <?php echo $title2; ?></h5>
                        <h5>Discriptoin : <?php echo $dis2; ?></h5>
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
