<?php
include './adminheader.php';
if(isset($_GET['delid'])) {
    mysqli_query($link, "update bank set accept='accept' where id='$_GET[delid]'");
    echo "<script>location.href='aaccept.php'</script>";
}
echo "<div class='right_align'><a href='avreqstatus.php'>Request Status</a></div>";
$rs = mysqli_query($link, "select l.id,l.userid,uname,addr,degree,college,l.loanamt,l.proof from loanapply l,newuser n where l.userid=n.userid and l.lstatus='pending' and l.id not in (select lid from reqtobank where astatus in ('pending','accept'))") or die(mysqli_error($link));
echo "<div class='scrolldiv'><table class='report_tab' style='float:none;margin:auto;min-width:75%;'><thead><tr><th colspan='7'>APPLIED LOAN LIST";
echo "<tr><th>Student Name<th>Address<th>Degree<th>College<th>Loan Amt<th>Proof<th>Task</thead><tbody>";
    while($row = mysqli_fetch_row($rs)) {
        echo "<tr>";
        echo "<td>$row[2]<td>$row[3]<td>$row[4]<td>$row[5]<td>$row[6]<td><a href='#' onclick=\"call('$row[7]')\">View Proof</a>";
        echo "<td><a href='avloans1.php?lid=$row[0]' onclick=\"javascript:return confirm('Are You Sure to Send Request ?')\">Send Request</a>";
    }
echo "</tbody></table></div><hr>";
mysqli_free_result($rs);
include './footer.php';
?>
<script>
function call(p) {
    window.open(p)
}
</script>