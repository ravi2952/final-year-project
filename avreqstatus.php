<?php
include './adminheader.php';
if(isset($_GET['delid'])) {
    mysqli_query($link, "update bank set accept='accept' where id='$_GET[delid]'");
    echo "<script>location.href='aaccept.php'</script>";
}
$rs = mysqli_query($link, "select r.id,r.dt,l.userid,l.loanamt,bname,b.cname,b.aname,r.astatus from reqtobank r,loanapply l,bank b where r.lid=l.id and r.bankid=b.userid") or die(mysqli_error($link));
echo "<div class='scrolldiv'><table class='report_tab' style='float:none;margin:auto;min-width:75%;'><thead><tr><th colspan='7'>LOAN REQUEST STATUS TO BANK";
echo "<tr><th>Req.Date<th>Student Id<th>Loan Amt<th>Bank Name<th>City<th>Area<th>Status</thead><tbody>";
    while($row = mysqli_fetch_row($rs)) {
        echo "<tr>";
        echo "<td>$row[1]<td>$row[2]<td>$row[3]<td>$row[4]<td>$row[5]<td>$row[6]<td>$row[7]";
        //echo "<td><a href='avreqstatus.php?lid=$row[0]' onclick=\"javascript:return confirm('Are You Sure to Send Request ?')\">Send Request</a>";
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