<?php
include './bankheader.php';
if(isset($_GET['aid'])) {
    mysqli_query($link, "update reqtobank set astatus='accept' where id='$_GET[aid]'");
    echo "<script>location.href='bankhome.php'</script>";
}
if(isset($_GET['jid'])) {
    mysqli_query($link, "update reqtobank set astatus='reject' where id='$_GET[jid]'");
    echo "<script>location.href='bankhome.php'</script>";
}
//echo "<div class='right_align'><a href='avreqstatus.php'>Request Status</a></div>";
$rs = mysqli_query($link, "select r.id,r.dt,r.lid,l.userid,uname,addr,degree,college,l.loanamt,l.proof,n.photo,n.aadhar,n.cproof from reqtobank r,loanapply l,newuser n where r.lid=l.id and l.userid=n.userid and r.astatus='pending' and r.bankid='$_SESSION[bankid]'") or die(mysqli_error($link));
echo "<div class='scrolldiv'><table class='report_tab' style='float:none;margin:auto;min-width:75%;'><thead><tr><th colspan='8'>LOAN REQUEST LIST";
echo "<tr><th>Req.Dt<th>Student Name<th>Address<th>Degree<th>College<th>Loan Amt<th>Proof<th>Task</thead><tbody>";
    while($row = mysqli_fetch_row($rs)) {
        echo "<tr>";
        echo "<td>$row[1]<td>$row[4]<td>$row[5]<td>$row[6]<td>$row[7]<td>$row[8]<td><a href='bankhome1.php?uid=$row[3]' target='_blank'>View Proof</a>";
        echo "<td><a href='bankhome.php?aid=$row[0]' onclick=\"javascript:return confirm('Are You Sure to Accept ?')\">Accept</a> | <a href='bankhome.php?jid=$row[0]' onclick=\"javascript:return confirm('Are You Sure to Reject ?')\">Reject</a>";
    }
echo "</tbody></table></div><hr>";
mysqli_free_result($rs);
include './footer.php';
?>
<script>
</script>