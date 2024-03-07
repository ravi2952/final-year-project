<?php
include './db.php';
$d = $_GET['k'];
$s="<select name='aname' required>";
$res = mysqli_query($link, "select aname from area where cname='$d'");
while($r = mysqli_fetch_row($res)) {
    $s.="<option value='$r[0]'>$r[0]</option>";
}
$s.="</select>";
mysqli_free_result($res);
echo $s;
?>