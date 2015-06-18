<?php require_once('Connections/conectt.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO calon_mhs (ID_MHS, NAMA, JENIS_KELAMIN, TEMPAT_LAHIR, TANGGAL_LAHIR, ASAL_SEKOLAH, NAMA_ORTU, PEKERJAAN, PENGHASILAN) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['ID_MHS'], "int"),
                       GetSQLValueString($_POST['NAMA'], "text"),
                       GetSQLValueString($_POST['JENIS_KELAMIN'], "text"),
                       GetSQLValueString($_POST['TEMPAT_LAHIR'], "text"),
                       GetSQLValueString($_POST['TANGGAL_LAHIR'], "text"),
                       GetSQLValueString($_POST['ASAL_SEKOLAH'], "text"),
                       GetSQLValueString($_POST['NAMA_ORTU'], "text"),
                       GetSQLValueString($_POST['PEKERJAAN'], "text"),
                       GetSQLValueString($_POST['PENGHASILAN'], "text"));

  mysql_select_db($database_conectt, $conectt);
  $Result1 = mysql_query($insertSQL, $conectt) or die(mysql_error());

  $insertGoTo = "index.html";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">ID_MHS:</td>
      <td><input type="text" name="ID_MHS" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">NAMA:</td>
      <td><input type="text" name="NAMA" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">JENIS_KELAMIN:</td>
      <td><input type="text" name="JENIS_KELAMIN" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">TEMPAT_LAHIR:</td>
      <td><input type="text" name="TEMPAT_LAHIR" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">TANGGAL_LAHIR:</td>
      <td><input type="text" name="TANGGAL_LAHIR" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">ASAL_SEKOLAH:</td>
      <td><input type="text" name="ASAL_SEKOLAH" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">NAMA_ORTU:</td>
      <td><input type="text" name="NAMA_ORTU" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">PEKERJAAN:</td>
      <td><input type="text" name="PEKERJAAN" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">PENGHASILAN:</td>
      <td><input type="text" name="PENGHASILAN" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Insert record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
</body>
</html>