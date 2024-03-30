<?php
include 'database.php';
$conn = getConnection();

if(isset($_GET['id'])) {
    $data = $_GET['id'];
    if($data) {
        // Use prepared statement to prevent SQL injection
        $sql = "SELECT id FROM caro2 WHERE title = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $data);
        mysqli_stmt_execute($stmt);
        
        $result = mysqli_stmt_get_result($stmt);
        
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            if ($row) {
                $id = $row['id'];
                
                // Fetch title using the fetched id
                $sql1 = "SELECT title, discription, poster FROM caro2 WHERE id = ?";
                $stmt1 = mysqli_prepare($conn, $sql1);
                mysqli_stmt_bind_param($stmt1, "i", $id);
                mysqli_stmt_execute($stmt1);
                
                $result1 = mysqli_stmt_get_result($stmt1);
                
                if ($result1) {
                    $row1 = mysqli_fetch_assoc($result1);
                    if ($row1) {
                        $title = $row1["title"];
                        $dis = $row1["discription"];
                        $poster = $row1["poster"];
                    }
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title : "No title found"; ?></title>
</head>
<body>
    <h1><?php echo isset($title) ? $title : "No title found"; ?></h1>
    <p><?php echo isset($dis) ? $dis : "No description found"; ?></p>
    <img src="<?php echo isset($poster) ? $poster : "No description found"; ?>">
    <div class="getting">
        <?php
        // Check if $yt is set and not empty
        if (isset($yt) && !empty($yt)) {
            // Extract video ID from YouTube URL if it's a full URL
            $video_id = '';
            if (strpos($yt, 'youtube.com') !== false) {
                $query_string = parse_url($yt, PHP_URL_QUERY);
                parse_str($query_string, $params);
                if (isset($params['v'])) {
                    $video_id = $params['v'];
                }
            } else {
                // Otherwise, assume $yt contains only video ID
                $video_id = $yt;
            }

            // Embed YouTube video using the video ID
            echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $video_id . '" 
            title="YouTube video player" frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
            allowfullscreen></iframe>';
        } else {
            echo 'No video found';
        }
        ?>
</body>
</html>
