<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Youtube data API V3 integration in PHP and MYSQL</h2>
    </div>
    <?php
          
    $key = "AIzaSyCnnEQwmgyZHuZpXXQkvWDopez_vV5TUTM";
    $base_url = "https://www.googleapis.com/youtube/v3/";
    $channelId = "UCxnUFZ_e7aJFw3Tm8mA7pvQ";
    $maxResult = 10;

    $API_URL = $base_url . "search?order=date&part=snippet&channelId=".$channelId."&maxResults=".$maxResult."&key=".$key;

    $videos = json_decode(file_get_contents($API_URL));

    include "DbConnect.php";

    $db = new DbConnect();
    $conn = $db->connect();
    foreach($videos->items as $video) {
   
    $sql = "INSERT INTO `videos` (`id`, `video_type`, `video_id`, `title`, `thumbnail_url`, `published_at`) VALUES (NULL, 1, :vid, :title, :turl, :pdate)";
        
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":vid", $video->id->videoId);
    $stmt->bindParam(":title", $video->snippet->title);
    $stmt->bindParam(":turl", $video->snippet->thumbnails->high->url);
    $stmt->bindParam(":pdate", $video->snippet->publishedAt);
    $stmt->execute();
    
    }


    ?>
    <div style="position: fixed; bottom:10px; right: 10px; color: green;">

    </div>
</body>
</html>


