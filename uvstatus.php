<?php
include './userheader.php';
if(isset($_GET['lid'])) {
    $dt = date('Y-m-d',time());
    $b = mysqli_query($link, "insert into acknowledgement(lid,dt,ack) values('$_GET[lid]','$dt','Received Loan...!')");
    if($b) {
        echo "<script>alert('Acknowledgement Send Successfully...!')</script>";
        echo "<script>location.href='uvstatus.php'</script>";
    } else {
        echo "<script>alert('Acknowledgement Already Send...!')</script>";
        echo "<script>location.href='uvstatus.php'</script>";
    }
}
//echo "<div class='right_align'><a href='avsanctions.php'>Sanctioned Loans</a></div>";
$rs = mysqli_query($link, "select l.id,l.loanamt,l.bankid,b.bname,b.cname,b.aname from loanapply l,bank b where l.userid='$_SESSION[userid]' and l.bankid=b.userid") or die(mysqli_error($link));
echo "<div class='scrolldiv'><table class='report_tab' style='float:none;margin:50px auto;min-width:75%;'><thead><tr><th colspan='6'>SANCTIONED LOAN LIST";
echo "<tr><th>Loan Amount<th>Bank Id<th>Bank Name<th>Area<th>City<th>Acknowledge</thead><tbody>";
    while($row = mysqli_fetch_row($rs)) {
        echo "<tr>";
        echo "<td>$row[1]<td>$row[2]<td>$row[3]<td>$row[5]<td>$row[4]<td><a href='uvstatus.php?lid=$row[0]'>Send Acknowledgement</a>";        
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