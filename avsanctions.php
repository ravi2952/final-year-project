<?php
include './adminheader.php';
if(isset($_GET['lid'])) {
    mysqli_query($link, "update loanapply set lstatus='accept',bankid='$_GET[bankid]' where id='$_GET[lid]'");
    echo "<script>location.href='asanction.php'</script>";
}
if(isset($_GET['ack'])) {
    $res = mysqli_query($link, "select dt,ack from acknowledgement where lid='$_GET[ack]'");
        if(mysqli_num_rows($res)>0) {
            $r = mysqli_fetch_row($res);
            echo "<script>alert('Acknowledgement Received on $r[0]')</script>";
        } else {
            echo "<script>alert('Acknowledgement Not Received...!')</script>";
        }
        echo "<script>location.href='avsanctions.php'</script>";
        mysqli_free_result($res);
}
//echo "<div class='right_align'><a href='avsanctions.php'>Sanctioned Loans</a></div>";
$rs = mysqli_query($link, "select l.id,l.userid,uname,n.addr,degree,college,l.loanamt,l.proof,r.bankid,b.bname,b.cname,b.aname from loanapply l,newuser n,reqtobank r,bank b where r.lid=l.id and l.userid=n.userid and l.lstatus='accept' and b.userid=r.bankid and l.id in (select lid from reqtobank where astatus in ('accept'))") or die(mysqli_error($link));
echo "<div class='scrolldiv'><table class='report_tab' style='float:none;margin:50px auto;min-width:75%;'><thead><tr><th colspan='8'>SANCTIONED LOANS TO STUDENT";
echo "<tr><th>Student Name<th>Address<th>Degree<th>College<th>Loan Amt<th>Proof<th>Bank<th>Acknowledgement</thead><tbody>";
    while($row = mysqli_fetch_row($rs)) {
        echo "<tr>";
        echo "<td>$row[2]<td>$row[3]<td>$row[4]<td>$row[5]<td>$row[6]<td><a href='#' onclick=\"call('$row[7]')\">View Proof</a><td>$row[9] <br>($row[11],$row[10])";
        echo "<td><a href='avsanctions.php?ack=$row[0]'>Show</a>";
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