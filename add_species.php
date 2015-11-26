<?php

include "include.php";


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
<body>

<div align="center">	
<div class="<?php print $tablebackground_nolines;?>" style="max-width:800px; padding:10px;">
	<div align="left">
	<!-- Place this in the body of the page content -->
		<form enctype="multipart/form-data" action="general-submit.php" method="post">
		<input name="option" value="addspecies" hidden>
		Species Title<br>
			<input class="form-control" name = "article-title" style="width:300px;"><br>
		File<br>
		<td><input class="form-control" name="uploaded" type="file"></td><Br><tr>
		Description<Br>
		    <textarea name="article" style="height:200px"></textarea><br>

		    <button class="btn btn-default" type="submit">submit</button>
		</form>
	</div>
</div>
</div>
</body>
