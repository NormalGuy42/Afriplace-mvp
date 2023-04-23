<?php
    include('../config/connection.php');
    //Code for quartier autocomplete start
    if(isset($_POST['query'])){
        $inputText = $_POST['query'];
        $query = "SELECT `communes rurales` FROM places WHERE `communes rurales` LIKE '%$inputText%' LIMIT 5";
        $result = mysqli_query($db,$query);
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                echo "<div class='quartierOption'>".$row['communes rurales']."</div>";
            }
        }else{
            echo "<div>Aucun résultat</div>";
        }
    }
    //Code for quartier autocomplete end
?>