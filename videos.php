<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Youtube data API  V3 integration in PHP and MySQL</h2>
        <h3 class="text-center">Part:5 Embed videos and playlist in webpage from </h3>

    </div>
    <?php
           
           include "DbConnect.php";

           $db = new DbConnect();
           $conn = $db->connect(); 

           $stmt = $conn->prepare("SELECT * FROM videos WHERE video_type = 1");
           $stmt->execute();
           $videos = $stmt->fetchAll(PDO::FETCH_ASSOC);
           echo "<div class='row align-center'>";
           foreach($videos as $video) {
               echo "<div class='col-md-6'>";
               echo "<label>".$video['title']."</label>";
               echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$video['video_id'].'" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
               echo "</div>";
           }

           echo "</div>";

    ?>
    <div style="position: fixed; bottom:10px; right:10px; color:green;">
       <strong>
           Learn web coding
       </strong>

    </div>
    
</body>
</html>