<html>
<?php
include "include.php";
?>
<head>
<?php
if ($threshold <= $therm) {$threshold_warning='<div style="color:yellow;background-color:red;"><strong>Water Overheating Relay 8 Activated</strong></div>';}
else {$threshold_warning="";}
if ($threshold == 0 ) {$threshold_warning="";}
?>

</head>

<body>
<div align="center" >
<table class="<?php print $tablebackground_nolines;?>" border="0">
<td>


<div class="customfontlrg" align="center">Jay-Fish</div>
<div class="customfontsml" align="center">The Aquarium Management Project</div>
<div class="customfontsml" align="center">www.jayfish.net</div><br>
<div align="center"><img src="images/logo.png" width="180"><br>v2.1<br></div>

<div class="customfontsml" align="center">
<table>

        <td>Water Temperature:</td><td>&nbsp</td><td><?php print $therm;?> <?php print $thermclass;?></td><tr>
        <td>Air Temperature:</td><td>&nbsp</td><td><?php print $thermii;?> <?php print $thermclass;?></td><tr>
        <td>Power Phase Cycle:</td><td>&nbsp</td><td><?php print " ". $phase;?></td><Tr>
        <td></td>

        </div>
</table>
 <div  style="text-align:center;"><?php print $threshold_warning; ?></div>
</td>
</table>
</div>


</body>
</html>

