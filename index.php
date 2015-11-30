<html>

<?php require('include_header.php'); ?>

<body>

<?php require('include_menu.php'); ?>

<div align="center" >
<table class="<?php print $tablebackground_nolines;?>" border="0">
<td>

<?php
if ($threshold <= $therm) {$threshold_warning='<div style="color:yellow;background-color:red;"><strong>Water Overheating Relay 8 Activated</strong></div>';}
else {$threshold_warning="";}
if ($threshold == 0 ) {$threshold_warning="";}
?>

<div class="customfontlrg" align="center">Pi4Fish</div>
<div class="customfontsml" align="center">Tank Fish Management</div>
<div class="customfontsml" align="center">www.code4pi.fr</div><br>
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


<?php require('include_footer.php'); ?>
</body>
</html>

