<?php
include './adminheader.php';
if(isset($_GET['lid'])) {
    mysqli_query($link, "update loanapply set lstatus='accept',bankid='$_GET[bankid]' where id='$_GET[lid]'");
    echo "<script>location.href='asanction.php'</script>";
}
echo "<div class='right_align'><a href='avsanctions.php'>Sanctioned Loans</a></div>";
$rs = mysqli_query($link, "select l.id,l.userid,uname,addr,degree,college,l.loanamt,l.proof,r.bankid from loanapply l,newuser n,reqtobank r where r.lid=l.id and l.userid=n.userid and l.lstatus='pending' and l.id in (select lid from reqtobank where astatus in ('accept'))") or die(mysqli_error($link));
echo "<div class='scrolldiv'><table class='report_tab' style='float:none;margin:auto;min-width:75%;'><thead><tr><th colspan='7'>SANCTION TO STUDENT";
echo "<tr><th>Student Name<th>Address<th>Degree<th>College<th>Loan Amt<th>Proof<th>Task</thead><tbody>";
    while($row = mysqli_fetch_row($rs)) {
        echo "<tr>";
        echo "<td>$row[2]<td>$row[3]<td>$row[4]<td>$row[5]<td>$row[6]<td><a href='#' onclick=\"call('$row[7]')\">View Proof</a>";
        echo "<td><a href='asanction.php?lid=$row[0]&bankid=$row[8]' onclick=\"javascript:return confirm('Are You Sure to Sanction Loan to Student ?')\">Sanction</a>";
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