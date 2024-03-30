<!DOCTYPE html>
<html lang="en">
<head>
    <title>Documehhhnt</title>
</head>

<body>
    <h1>FILE UPLOAD</h1>

    <form method="post" enctype="multipart/form-data">

        SELECT A FILE : <input type="file" name="fileUpload">
        <br><br>

        <input type="submit" value="Upload" name="btnupload">
    </form>

    <?php
    $location = "Documents/";
    $maxsize = 100000;
    $checked = true;
    $filetxt = array(''); // Added semicolon here
    if(isset($_POST['btnupload'])){
            $name = basename($_FILES['fileUpload']['name']);
            $temp_name = $_FILES['fileUpload']['tmp_name'];
            $type = $_FILES['fileUpload']['type'];
            $size = $_FILES['fileUpload']['size'];
            $ext = pathinfo($name, PATHINFO_EXTENSION);

            echo $name . "<br>";
            echo $type . "<br>";
            echo $size . "<br>";
            echo $ext . "<br>";

            move_uploaded_file($temp_name,$location.$name); // Corrected variable name
        }
    ?>
</body>
</html>