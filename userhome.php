<?php
include './userheader.php';
if(!isset($_POST['submit1'])) {
?>
<br>
<form name="f" action="userhome.php" method="post" enctype="multipart/form-data">
    <table class="login">
        <thead>
            <tr>
                <th colspan="2">APPLY LOAN</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Loan Amount</th>
                <td><input type="text" name="loanamt" pattern="\d+" autofocus required></td>
            </tr>
            <tr>
                <th>Bonafide (Proof)</th>
                <td><input type="file" name="ff" accept="image/*" required></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" class="center">
                    <input type="submit" name="submit1" value="Apply Loan">                  
                </td>
            </tr>
        </tfoot>
    </table>
    <Br><br>
</form>
<?php
} else if(isset($_POST['submit1'])) {
    extract($_POST);
    if(is_uploaded_file($_FILES['ff']['tmp_name'])) {
        $proof = "uploads/".time().$_FILES['ff']['name'];
        move_uploaded_file($_FILES['ff']['tmp_name'], $proof);
    $b = mysqli_query($link, "insert into loanapply(userid,loanamt,proof) values('$_SESSION[userid]','$loanamt','$proof')");
    if($b)
    echo "<div class='center'>Loan Applied Successfully...!<br><a href='userhome.php'>Back</a></div>";
    else
    echo "<div class='center'>Loan Already Applied...!<br><a href='userhome.php'>Back</a></div>";
    } else {
        echo "<div class='center'>Proof Not Uploaded...!<br><a href='userhome.php'>Back</a></div>";
    } 
}
include './footer.php';
?>