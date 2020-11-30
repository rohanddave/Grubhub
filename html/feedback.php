<?php
session_start();
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="../css/navbarStyle.css">
    <link rel="stylesheet" href="../css/feedback.css">
    <link href='https://fonts.googleapis.com/css?family=Bebas Neue' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet'>
    <title>Feeback Form</title>
<script>
function formvaildate()
{
    var name=document.getElementById("n").value;
    if(name=="")
    {
        alert("Please enter name");
        document.getElementById("n").focus();
    }

    var oid=parseInt(document.getElementById("i").value);
    if (oid > 100 && oid < 1000) 
    {
     
    }
    else
    {
        alert("Id is wrong");
    }

}
</script>
</head>
<body>
    
    <!--NavBar Begining-->
    <div clas="nav-bar-div">
            <ul class="nav-bar-list">
                <li class="left-align-list-item">
                    <a href="index.php">Grubhub</a>
                </li>

                <li class="right-align-list-item">
                    <a href="html/aboutus.php">About   <i class="fa fa-universal-access"></i></a>
                    <a href="html/features.php">Features     <i class="fa fa-certificate"></i></i></a>
                    <a href="html/cart.php">Cart     <i stlye="margin-left:5px;" class='fas fa-shopping-cart'></i></a>
                    <a id="variable-navbar-btn" href="html/signInPage.php">Sign In      <i class="fa fa-user-circle-o"></i></a>
                    <a id="logout-btn" style="display:none;">Logout</a>
                    <?php
                    if(isset($_SESSION['user_email'])){
                        $name = $_SESSION['fname'];
                        echo "<script>document.getElementById('variable-navbar-btn').innerHTML = '$name';document.getElementById('variable-navbar-btn').href='user.php';</script>";
                        echo "<script>document.getElementById('logout-btn').style.display='inline-block';document.getElementById('logout-btn').innerHTML = 'Logout';document.getElementById('logout-btn').href='php/logout.php';</script>";
                        }
                    ?>
                </li>
            </ul>
        </div>
        <!--NavBar End-->

<form style="text-align: center;" name="fb" >
    <fieldset>
        <legend class="font" style="color: white;">Your Feedback Our Tip</legend>
    <label>Name</label>
    <input type="text" id="n" /><br><br>
    <label>Contact</label>
    <input type="text" id="c" /><br><br>
    <label>Email</label>
    <input type="text" id="e" /><br><br>
    <label>Bill Id</label>
    <input type ="text" id="i" /><br><br>
    <label>Branch Visited</label>
    <input list="branch" name="bn" id="bid">
    <datalist id="branch">
      <option value="Churchgate">
      <option value="Lowerparel">
      <option value="Dadar">
      <option value="Bandra">
      <option value="Thane">
    </datalist>
    <br><br>
    <label>How was the table service?</label><br>
    <input type="radio" class="radioc" value="excellent"><label style="color: white;">Excellent</label>
    <input type="radio" class="radioc" value="good" ><label style="color: white;">Good</label>
    <input type="radio" class="radioc" value="average" ><label style="color: white;">Average</label>
    <input type="radio" class="radioc" value="poor" ><label style="color: white;">Poor</label>
    <br><br>
    <label>Saftey Measures Followed by Staff:</label><br><br>
    <input type="checkbox" value="mask"><label style="color: white;">All were wearing masks</label><br><br>
    <input type="checkbox" value="sanitization"><label style="color: white;">Your seats were sanitized</label><br><br>
    <input type="checkbox" value="social"><label style="color: white;">Social Distancing was Followed</label><br><br>
    <label>How will you rate you order?</label><br><br>
    <input type="radio" value="delicious"><label style="color: white;">Was Delicious</label><br><br>
    <input type="radio" value="g"><label style="color: white;">Was Good </label><br><br>
    <input type="radio" value="tless"><label style="color: white;">Was Tasteless</label><br><br>
    <input type="radio" value="price"><label style="color: white;">Not upto the Price</label><br><br>
  
    <input class="submitb" type="submit" name="SubmitBtn" value="Give Feedback" onclick="formvaildate()"/> 
</fieldset>
</form>
</div>
</body>
</html>