<?php
session_start();
if (empty ($_POST)) {
    $token = bin2hex(random_bytes(3));
    $_SESSION["token"] = $token;
}

require("/home/afische1/db-creds.php");
$cnxn = mysqli_connect($host, $user, $password, $database)
or die("error connecting");

$token = $_SESSION["token"];

$fall = $_POST["fall"];
$winter = $_POST["winter"];
$spring = $_POST["spring"];
$summer = $_POST["summer"];
$lastUpdate = date("Y-m-d h:i:s");

if(!empty($_POST)){
    $select = "SELECT * FROM `adviseIt` WHERE token = '$token'";
    $result = mysqli_query($cnxn, $select);

    if (empty(mysqli_fetch_row($result))) {
        $sql = "INSERT INTO adviseIt (token, fall, winter, spring, summer, lastUpdate)
VALUES('$token','$fall','$winter','$spring','$summer','$lastUpdate')";

        mysqli_query($cnxn, $sql);
    } else{
        $sql = "UPDATE adviseIt SET fall = '$fall', winter = '$winter', spring  = '$spring',
                    summer= '$summer', lastUpdate = '$lastUpdate' WHERE token = '$token'";

        mysqli_query($cnxn , $sql);
    }
}



?>
<link rel="stylesheet" href="styles.css">
<div id="token">
<?php
print "<h1> Token: " . $_SESSION["token"];
?>
</div>
<br>

<form action="#" method="post">

    <div id="rows">

        <div class="quarter">
    <label for="fall">Fall</label><br>
    <textarea id="fall" name="fall" rows="5">
        <?php echo $winter ?>
    </textarea>
    <br>
        </div>


<div class="quarter">
    <label for="winter">Winter</label><br>
    <textarea id="winter" name="winter" rows="5">
        <?php echo $winter ?>
    </textarea>
    <br>
</div>


<div class="quarter">
    <label for="spring">Spring</label><br>
    <textarea id="spring" name="spring" rows="5">
        <?php echo $spring ?>
    </textarea>
    <br>
</div>

        <div class="quarter">
    <label for="summer">Summer</label><br>
    <textarea id="summer" name="summer" rows="5">
        <?php echo $summer ?>
   </textarea>
    <br>
        </div>

    </div>

    <div id="savePlan">
        <button id="save" type="submit"> Save</button>
    </div>


</form>

<?php
if (!empty($_POST)) {
    print "<div id='savedPlan'>
            <h1>Plan successfully saved!</h1>
            <h2>Last saved: $lastUpdate </h2>
            </div>";
}