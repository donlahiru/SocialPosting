<?php
//include jqery files 
require_once "include/javascript.html";

//include css files 
require_once "include/css.html";

//read config file
$conf_array		= parse_ini_file(__DIR__ . "/config.ini" , true);
?>
<!DOCTYPE html>
<html>
<head>
<script type="application/javascript" src="src/social_post_js.js"></script>
</head>
<body style="background-color:#FFFFFF">
<form id="frmSocialPost" name="frmSocialPost">

<table al align="center" style="vertical-align:middle" width="50%" border="0" bgcolor="#FFFFFF">
<tr>
	<td height="50">&nbsp;</td>
</tr>
<tr>
	<td width="22%" valign="top">Post</td>
    <td width="78%"><textarea name="txtPost" id="txtPost" rows="3" style="width:100%" class="validate[required]"></textarea></td>
</tr>
<tr>
  <td valign="top">Social Network</td>
  <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
  <?php
  foreach($conf_array as $namespace => $properties)
  {
	  list($name, $className)    = explode(':', $namespace);
	  $name    = trim($name);
	  $className    = trim($className);
   ?>
    <tr>
    	<td width="6%" style="text-align:left"><input name="group[group]" class="validate[minCheckbox[1]] checkbox" id="<?php echo $className; ?>" type="checkbox" value="<?php echo $name; ?>" /></td>
        <td width="94%"><?php echo $name; ?></td>
    </tr>
   <?php
  }
  ?>
  </table></td>
</tr>
<tr>
  <td></td>
  <td></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td><input name="btnPost" id="btnPost" type="button" value="Post" /></td>
</tr>
</table>

</form>
</body>
</html>