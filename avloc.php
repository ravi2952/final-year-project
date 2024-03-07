<?php
include './adminheader.php';
if(isset($_GET['delid'])) {
    mysqli_query($link, "delete from area where id='$_GET[delid]'");
    echo "<script>location.href='avloc.php'</script>";
}
$rs = mysqli_query($link, "select id,cname,aname from area") or die(mysqli_error($link));
echo "<div class='scrolldiv'><table class='report_tab' style='float:none;margin:auto;min-width:700px;'><thead><tr><th colspan='3'>AREA LIST<tr><th>City Name<th>Area Name<th>Task</thead><tbody>";
    while($row = mysqli_fetch_row($rs)) {
        echo "<tr>";
        echo "<td>$row[1]<td>$row[2]";
        echo "<td><a href='avloc.php?delid=$row[0]' onclick=\"javascript:return confirm('Are You Sure to Delete ?')\">Delete</a>";
    }
echo "</tbody></table></div><hr>";
mysqli_free_result($rs);
include './footer.php';