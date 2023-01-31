<?php
session_start();

if($_SESSION['admin']!='admin')
{
    header("Location: https://afischer4.greenriverdev.com/advise-it/login.php");
}


require("/home/afische1/db-creds.php");
$cnxn = mysqli_connect($host, $user, $password, $database)
or die("error connecting");
?>

<link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="admin.css">

    <h1>List of Saved Plans for Advise-It</h1>
    <div id="home">
        <a href="home.php"><button> Return to home page</button></a>
    </div>

<table id="plans" class="display">
    <thead>
    <tr>
        <th>Token</th>
        <th>Fall</th>
        <th>Winter</th>
        <th>Spring</th>
        <th>Summer</th>
        <th>Last Updated</th>
        <th>Advisor</th>
        <th>URL</th>
    </tr>
    </thead>
    <tbody>

<?php
$query = "SELECT * FROM adviseIt";
$result = mysqli_query($cnxn,$query);


foreach($result as $row) {
    $token = $row['token'];
    $fall = $row['fall'];
    $winter = $row['winter'];
    $spring = $row['spring'];
    $summer = $row['summer'];
    $lastUpdate = $row['lastUpdate'];
    $advisor = $row['advisor'];


    echo "
    <tr>
    <td>$token</td>
    <td>$fall</td>
    <td>$winter</td>
    <td>$spring</td>
    <td>$summer</td>
    <td>$lastUpdate</td>
    <td>$advisor</td>
    <td><a href='planner.php?token=$token'>$token</a></td>

</tr>";
}
?>
    </tbody>
</table>




<script src="//code.jquery.com/jquery-3.5.1.js"></script>
<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script>
    $('#plans').DataTable(
        {
            responsive: true
        }
    );
</script>


