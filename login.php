<?php session_start(); /* Starts the session */
/* Check Login form submitted */if(isset($_POST['Submit'])){
/* Define username and associated password array */$logins = json_decode(file_get_contents('protected/users.json'), true);

/* Check and assign submitted Username and Password to new variable */$Username = isset($_POST['Username']) ? $_POST['Username'] : '';
$Password = isset($_POST['Password']) ? $_POST['Password'] : '';

/* Check Username and Password existence in defined array */if (isset($logins[$Username]) && $logins[$Username] == $Password){
/* Success: Set session variables and redirect to Protected page  */$_SESSION['UserData']['Username']=$logins[$Username];
header("location:index.php");
exit;
} else {
/*Unsuccessful attempt: Set error message */$msg="<span style='color:red; text-align:center;'>Invalid Login Details</span>";
}
}
?>

<!DOCTYPE html>
<html style="overflow-x: hidden;">
    <head>
        <link rel="stylesheet" href="style.css">
        <title>Flora Boards</title>
    </head>
    <body style="background-image: url('background.jpg');">
        <h1 style="text-align: center;">Flora Boards Login</h2>
        <div class="grid" style="width: 40%; margin: auto;"><div class="row"><div class="col">
        <form action="" method="post" name="Login_Form" style="text-align:center">
            <label>Username</label><br>
            <input name="Username" type="text" class="Input"><br><br>
            <label>Password</label><br>
            <input name="Password" type="password" class="Input"><br><br>
            <button name="Submit" type="submit" value="Login" class="Button3">Login</button>
        </form>
        </div></div></div><br>
        <div style="text-align:center">
        <?php if(isset($msg)){?>
                    <?php echo $msg;?>
                <?php } ?>
        </div>
    </body>
</html>