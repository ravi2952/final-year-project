<?php
include './bankheader.php';
?>
<style>
    div {
        text-align: center;
    }
</style>
<?php
$uid = $_GET['uid'];
$rs = mysqli_query($link, "select l.proof,n.photo,n.aadhar,n.cproof from loanapply l,newuser n where l.userid=n.userid and n.userid='$uid'") or die(mysqli_error($link));
$r = mysqli_fetch_row($rs);
echo "<div>Proof : <br><img src='$r[0]'></div>";
echo "<div>Photo : <br><img src='$r[1]'></div>";
echo "<div>Aadhar : <br><img src='$r[2]'></div>";
echo "<div>College Proof : <br><img src='$r[3]'></div>";
mysqli_free_result($rs);
include './footer.php';
?>