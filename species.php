<?php

include "include.php";

?>
<style type="text/css">
 
 body {text-align: justify;}
 .scroll {
    width: 300px;
    margin-left:20px;
    height: 180px;
    overflow: scroll;
    overflow-x: hidden;

  }

  .species_box {
    width: 340px;
    margin-bottom: 3px;
    display: inline-block;
    

  }

</style>

<body>


<div align="center">



<?php
$query = "SELECT * FROM species;";
$result = mysqli_query($con,$query) or die (mysqli_error($con));


while($rows = mysqli_fetch_array($result)) {
  $id = $rows['id'];
  $article = $rows['article'];
  $image = $rows['image'];
  $title = $rows['title'];
    
    print '
      
      <div class="species_box">
      <div class="'.$tablebackground_nolines_header.'"><div class="customfontsml" align="center">'.$title.'</div></div>
      <div class="'.$tablebackground_nolines.'">
      
      <br>
       <img class="img-thumbnail" src="species/'.$image.'" alt="..." style="height:200px; width:320x;padding-top:3px;">
          <div class="caption">
            
            <p><div class="scroll">'.$article.'</div></p>
        </div>
       <form action="species-edit.php" method="post"><input name="editspecies" value="'. $id .'" size="1" readonly hidden><button class="btn btn-default" type="submit">Edit</button></form>
       <br>
        </div>

        </div>
       
    
    ';
    
    print '</ul>';
};

?>

<br><bR><br><br>


</div>
</body>
</html>

