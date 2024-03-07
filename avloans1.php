<?php
include './adminheader.php';
if(!isset($_POST['submit1'])) {
    $lid = $_GET['lid'];
    $result = mysqli_query($link, "select userid,bname from bank where (cname,aname) in (select cname,aname from newuser where userid=(select userid from loanapply where id='$lid')) and userid not in (select bankid from reqtobank where lid='$lid' and astatus in ('pending','reject')) and accept='accept'") or die(mysqli_error($link));
?>
<div class="right_align">
</div>
<br>
<form name="f" action="avloans1.php" method="post" onsubmit="return check_regn()">
    <table class="login">
        <thead>
            <tr>
                <th colspan="2">REQUEST LOAN TO BANK</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Select Bank</th>
                <td>
                    <select name="bankid" required>
                        <?php
                        while($row = mysqli_fetch_row($result)) {
                            echo "<option value='$row[0]'>$row[1]</option>";
                        }
                        mysqli_free_result($result);
                        ?>
                    </select>
                    <input type="hidden" name="lid" value="<?php echo $lid;?>" required>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" class="center">
                    <input type="submit" name="submit1" value="Send Request">
                </td>
            </tr>
        </tfoot>
    </table>
    <Br><br>
</form>
<?php
} else if(isset($_POST['submit1'])) {
    extract($_POST);
    $dt = date('Y-m-d',time());
    $b = mysqli_query($link, "insert into reqtobank(dt,lid,bankid) values('$dt','$lid','$bankid')");
    if($b)
    echo "<div class='center'>Request Send Successfully...!<br><a href='avloans.php'>Back</a></div>";
    else
        echo "<div class='center'>".mysqli_error($link)."<br><a href='avloans.php'>Retry</a></div>";
}
include './footer.php';
?>