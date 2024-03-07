<?php
include './adminheader.php';
if(!isset($_POST['submit1']) && !isset($_POST['submit2'])) {
    $result = mysqli_query($link, "select cname from city");
?>
<div class="right_align">
    <a href="avloc.php">View Area</a>
</div>
<br>
<form name="f" action="adminhome.php" method="post" onsubmit="return check_regn()">
    <table class="login">
        <thead>
            <tr>
                <th colspan="2">NEW CITY</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>City Name</th>
                <td><input type="text" name="cname" autofocus required></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" class="center">
                    <input type="submit" name="submit1" value="Create">                  
                </td>
            </tr>
        </tfoot>
    </table>
    <Br><br>
</form>
<form name="g" action="adminhome.php" method="post">
    <table class="login">
        <thead>
            <tr>
                <th colspan="2">NEW AREA</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>City Name</th>
                <td>
                    <select name="cname">
                        <option value="">--Select City--</option>
                        <?php
                        while($row = mysqli_fetch_row($result)) {
                            echo "<option value='$row[0]'>$row[0]</option>";
                        }
                        mysqli_free_result($result);
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Area Name</th>
                <td><input type="text" name="aname" autofocus required></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" class="center">
                    <input type="submit" name="submit2" value="Create">                  
                </td>
            </tr>
        </tfoot>
    </table>
    <Br><br>
</form>
<?php
} else if(isset($_POST['submit1'])) {
    extract($_POST);
    $b = mysqli_query($link, "insert into city(cname) values('$cname')");
    if($b)
    echo "<div class='center'>New City Created Successfully...!<br><a href='adminhome.php'>Back</a></div>";
    else
        echo "<div class='center'>".mysqli_error($link)."<br><a href='adminhome.php'>Retry</a></div>";
} else if(isset($_POST['submit2'])) {
    extract($_POST);
    $b = mysqli_query($link, "insert into area(cname,aname) values('$cname','$aname')");
    if($b)
    echo "<div class='center'>Area Created Successfully...!<br><a href='adminhome.php'>Back</a></div>";
    else
        echo "<div class='center'>".mysqli_error($link)."<br><a href='adminhome.php'>Retry</a></div>";
}
include './footer.php';
?>
<script>
    function check_regn() {
        var mobile = f.mobile.value
        var email = f.email.value
        var pwd = f.pwd.value
        var cpwd = f.cpwd.value
        
        if(!check_mobile(mobile)) {
            alert("Invlid Mobile Number")
            f.mobile.focus()
            return false
        }
        if(!check_email(email)) {
            alert("Invalid Email Id")
            f.email.focus()
            return false
        }
        if(pwd!=cpwd) {
            alert("Confirm Password not Match")
            f.cpwd.focus()
            return false
        }
        return true
    }
    function check_email(e) {
	var ep = /^\w+\.{0,1}\w+\@[a-z]+\.([a-z]{3}|[a-z]{2}\.[a-z]{2}){1}$/
	return e.match(ep)
    }
    function check_mobile(m) {
	var mp = /^[9876]\d{9}$/
	return m.match(mp)
    }    
</script>