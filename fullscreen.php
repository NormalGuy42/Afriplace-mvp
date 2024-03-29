<?php
    include("config/connection.php");
    $propertyID = $_GET['id']; 
    $query = "SELECT images FROM properties WHERE id = $propertyID";
    $property = mysqli_fetch_assoc(mysqli_query($db,$query));

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photos</title>
    <style>
        ul{
            list-style-type: none;
            margin: 0;
            padding: 10px 10px;
            height: 100%;
        }
        li img{
            width: 100%;
            max-width: 700px;
            margin: 0 auto;
            display: block;
        }
        body{
            background-color: #333;
            margin: 0;
            width: 100%;
            height: 100%;
            position: relative;
        }
        .svg_container{
            position: absolute;
            height: 40px;
            background: linear-gradient(rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0) 100%);
            width: 100%;
            padding: 20px 0;
        }
        svg{
            position: absolute;
            right: 5%;
            height: 40px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="svg_container">
            <svg onclick ="history.back()"viewBox="0 0 24 24" class="return"xmlns="http://www.w3.org/2000/svg">
                <path d="M11.8 11.8L4 4l7.8 7.8L4 19.6l7.8-7.8zm0 0l7.8 7.8-7.8-7.8L19.6 4l-7.8 7.8z" stroke="white" 
                stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
    </div>
    <ul>
        <?php
            $images = explode(',',$property['images']);
            array_pop($images);
            foreach($images as $img):
        ?>
            <li><img src="<?php echo htmlspecialchars($img)?>" alt=""></li>
        <?php endforeach?>
    </ul>
</body>
</html>