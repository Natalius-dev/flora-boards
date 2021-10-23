<?php session_start(); /* Starts the session */
if(!isset($_SESSION['UserData']['Username'])){
    header("location:login.php");
    exit;
}
error_reporting(0);
$posts = json_decode(file_get_contents('protected/posts.json'), true);

function find($mot,$arr){
    $ok=false;
   foreach ($arr as $k => $v) 
      {
        if($k==$mot){
          return $v; $ok=true; // or return true;
        }
      }
    if(ok==false){ return -1; }  // or return false;
  }
function like($postID) {
    $data = json_decode(file_get_contents('protected/posts.json'), true);
    $data[$postID] = $data[$postID]+1;
    $json_object = json_encode($data);
    file_put_contents('protected/posts.json', $json_object);
}
?>

<!DOCTYPE html>
<html style="overflow-x: hidden;">
    <head>
        <link rel="stylesheet" href="style.css">
        <title>Flora Boards</title>
    </head>
    <body style="background-image: url('background.jpg');">
        <div style="margin: -10px; margin-top: -16px; position: sticky; top: 0;">
            <ul style="background-color: antiquewhite;">
                <li style="padding-left: 10px; padding-right: 10px;"><h1 style="text-align: center;">✿❁Flora Boards❁✿</h1></li>
            </ul>
            <ul style="background-color: antiquewhite; margin-top:-17px;">
                <li style="padding-left: 10px; padding-right: 10px;"><a href="index.php">Home</a></li>
                <li style="padding-left: 10px; padding-right: 10px;"><a href="about.html">About</a></li>
                <li style="padding-left: 10px; padding-right: 10px;"><a href="contact.html">Contact</a></li>
                <li style="padding-left: 10px; padding-right: 10px;"><a href="post.php">Post</a></li>
                <li style="padding-left: 10px; padding-right: 10px;"><a href="logout.php">Logout</a></li>
            </ul>
        </div>

        <h2 style="padding-top:20px">Top 4 This Month!</h2>
        <br>
        <ul style="width: fit-content; margin: auto; margin-top:-25px;">
            <li><div class="grid"><div class="row"><div class="col"><img style="width:200px; height:200px; object-fit:cover;" src="media/Top1.jpg"> <br><p>DamiennQED</p> </div></div></div></li>
            <li><div class="grid"><div class="row"><div class="col"><img style="width:200px; height:200px; object-fit:cover;" src="media/Top2.jpeg"></div></div></div></li>
            <li><div class="grid"><div class="row"><div class="col"><img style="width:200px; height:200px; object-fit:cover;" src="media/Top3.jpg"> <br><p>JazzG</p> </div></div></div></li>
            <li><div class="grid"><div class="row"><div class="col"><img style="width:200px; height:200px; object-fit:cover;" src="media/Top4.jpg"> <br><p>ZATLW</p> </div></div></div></li>
        </ul>
        <br><br>
        <h2>New Posts</h2>
        <div>
        <table style="margin:auto">
            <tr>
                <td><div class="grid"><div class="row"><div class="col"><img src="media/Post1.jpg"> <br><p>Lcoke</p> </div></div></div><button onClick="location.href='index.php?like=1'">Like</button></td>
                <td><div class="grid"><div class="row"><div class="col"><img src="media/Post2.jpg"> <br><p>CannedWater</p> </div></div></div><button onClick="location.href='index.php?like=2';">Like</button></td>
            </tr>
            <tr>
                <td name="1"><?php echo "<p>".find("Post1",$posts)." Likes</p>";?></td>
                <td name="2"><?php echo "<p>".find("Post2",$posts)." Likes</p>";?></td>
            </tr>
            <tr>
                <td><div class="grid"><div class="row"><div class="col"><img src="media/Post3.jpg"></div></div></div><button onClick="location.href='index.php?like=3'">Like</button></td>
                <td><div class="grid"><div class="row"><div class="col"><img src="media/Post4.jpg"> <br><p>JazzG</p> </div></div></div><button onClick="location.href='index.php?like=4';">Like</button></td>
            </tr>
            <tr>
                <td name="3"><?php echo "<p>".find("Post3",$posts)." Likes</p>";?></td>
                <td name="4"><?php echo "<p>".find("Post4",$posts)." Likes</p>";?></td>
            </tr>
            <tr>
                <td><div class="grid"><div class="row"><div class="col"><img src="media/Post5.jpg"></div></div></div><button onClick="location.href='index.php?like=5'">Like</button></td>
                <td><div class="grid"><div class="row"><div class="col"><img src="media/Post6.jpg"> <br><p>User1</p> </div></div></div><button onClick="location.href='index.php?like=6';">Like</button></td>
            </tr>
            <tr>
                <td name="5"><?php echo "<p>".find("Post5",$posts)." Likes</p>";?></td>
                <td name="6"><?php echo "<p>".find("Post6",$posts)." Likes</p>";?></td>
            </tr>
        </table>
        <?php 
        if($_GET['like']){
            like("Post".$_GET['like']);
            echo '<script type="text/JavaScript">location.href="index.php"</script>';
        }
        ?>
        </div>
    </body>
</html>