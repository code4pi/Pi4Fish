<?php

$editspecies = $_POST['editspecies'];

include "include.php";

$query = "SELECT * FROM species WHERE id = $editspecies";
$result=mysqli_query($con,$query) or die (mysqli_error($con));
while($rows=mysqli_fetch_array($result)) {
  $title = $rows['title'];
  $image = $rows['image'];
  $article = $rows['article'];
  
}

?>
<html>
<head>
<!-- Place inside the <head> of your HTML -->
<script type="text/javascript" src="tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="tinymce/plugins/table/plugin.min.js"></script>
<script type="text/javascript" src="tinymce/plugins/pagebreak/>plugin.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    plugins: "table",
    tools: "inserttable",
    plugins: "pagebreak",
    pagebreak_separator: "<!-- my page break -->"
 });
</script>
</head>

<style type="text/css">
  td {border: 0px !important;}

</style>


<body>

<div align="center">
<div style="max-width:800px; padding:0px;">
  
<?php  
     $delete = '<form action="general-submit.php" method="post">
          <input name="option" value="delete_species" hidden>
          <input name="image" value="'.$image.'" hidden>
          <input name="speciesid" value="'.$editspecies.'" hidden><button class="btn btn-danger" type="submit">DELETE SPECIES</button></form>';
?>
  
       
      
  <table class="<?php print $tablebackground; ?>" border="1">
      <div class="<?php print $tablebackground_nolines_header;?>"><div class="customfont" align="center">Edit Species</div></div>
        <form enctype="multipart/form-data" action="general-submit.php" method="post">
          <input name ="option" value="species_edit" hidden>
          <input name="id" value="<?php print $editspecies; ?>" hidden readonly>
          <Td colspan="2"><div align="left"><img class="img-thumbnail" src="species/<?php print $image; ?>" width="150"></div></Td><tr>
          <td>Species Name
          <input class="form-control" name = "article-title"  value="<?php print $title; ?>" style="width:300px;"></td><td></td><tr>
          <td><div align="left">Current Image Name</div>
          <input class="form-control" name = "article-image" value="<?php print $image; ?>" style="width:300px;" readonly></td><td></td><tr>
          
          <td><div align="left">New File Name</div>
          <input class="form-control" name="uploaded" type="file"></td><td></td><tr>
          <td colspan="2"><div align="left">Description</div>
          <textarea name="article"><?php print $article; ?></textarea></td><tr>
          <td ><button class="btn btn-default" type="submit">UPDATE</button>&nbsp<a href="species.php"><button class="btn btn-default">CANCEL</button></a></td>
        </form><td align="right"><?php print $delete; ?></td>
    </td>
  </table>
</div>
</div>

</body>
</html>
