<?php
include './adminheader.php';
if(isset($_GET['delid'])) {
    mysqli_query($link, "update bank set accept='accept' where id='$_GET[delid]'");
    echo "<script>location.href='aaccept.php'</script>";
}
echo "<div class='right_align'><a href='avabanks.php'>Accepted Banks</a></div>";
$rs = mysqli_query($link, "select id,bname,addr,cname,aname,mobile,userid from bank where accept='pending'") or die(mysqli_error($link));
echo "<div class='scrolldiv'><table class='report_tab' style='float:none;margin:auto;min-width:75%;'><thead><tr><th colspan='7'>REGISTERED BANK LIST";
echo "<tr><th>Bank Name<th>Address<th>City<th>Area<th>Mobile<th>User Id<th>Task</thead><tbody>";
    while($row = mysqli_fetch_row($rs)) {
        echo "<tr>";
        echo "<td>$row[1]<td>$row[2]<td>$row[3]<td>$row[4]<td>$row[5]<td>$row[6]";
        echo "<td><a href='aaccept.php?delid=$row[0]' onclick=\"javascript:return confirm('Are You Sure to Accept ?')\">Accept</a>";
    }
echo "</tbody></table></div><hr>";
mysqli_free_result($rs);
include './footer.php';