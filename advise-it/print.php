<?php
session_start();
?>

<link rel="stylesheet" href="styles.css">
<div id="token">
    <?php
    print "<h1> Token: " . $_SESSION["token"]
    ?>
</div>
<br>

<form action="#" method="post">
    <div id="rows">

        <div class="quarter">
            <label for="fall">Fall</label><br>
            <?php echo $_SESSION["fall"];
            ?>

            <br>
        </div>


        <div class="quarter">
            <label for="winter">Winter</label><br>
            <?php
            echo $_SESSION["winter"];
            ?>

            <br>
        </div>


        <div class="quarter">
            <label for="spring">Spring</label><br>

            <?php
            echo $_SESSION["spring"];
            ?>

            <br>
        </div>


        <div class="quarter">
            <label for="summer">Summer</label><br>

            <?php
            echo $_SESSION["summer"];
            ?>

            <br>
        </div>
    </div>
    <div id="advisor2">
        <label for="advisor">Advisor:</label><br>

        <?php
        echo $_SESSION["advisor"];
        ?>

    </div>

    <div id="print">
        <button onclick="window.print()" id="print2" type="submit" > Print</button>
    </div>

</form>
