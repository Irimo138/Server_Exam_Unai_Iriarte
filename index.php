<html>
<head>

<?php
    
    include "statistics.php";

?>

</head>


<body>


<?php
     
    $db = new DBManager();
    

    //LA CLAVE
    //$stat = new Statistics("LoL", "unai", "4", 56, true, date("Y-m-d", strtotime("2020-03-01")));
    //$db->insertStatistics($stat);

    $statsArray = $db->getStatistics();

    echo "<ul>";
    foreach ($statsArray as $stats){
        echo "<li>$stats</li>";
    }
    echo "<ul>";
    
    //$winner = "";
        
    
?>

    <form method="POST">
        <input type="text" name="GameName" id="name">
        <input type="text" name="TeamName" id="name">
        <input type="number" name="Number" id="number">
        <input type="number" name="Score" id="score">
        <label>Win<input type="checkbox" name="Result" id="result"></label>
        <input type="date" name="Date" id="date">
        <input type="submit" value="send">
    </form>

    <?php
        //COMPROBAR DATOS
        if ($_POST['Result'] == "on") {
            $winner = true;
        }else{
            $winner = false;
        }
        $today = date("Y-m-d", strtotime(20-10-2021));
        //echo $today;
        if ($_POST['Date'] > $today) {
            $dat = $today;
        }else{
            $dat = $_POST['Date'];
        }
        //$dat = $_POST['Date'];

        if ($_POST['Number'] < 1) {
            $number = 1;
        }else{
            $number = $_POST['Number'];
        }

        if ($_POST['Score'] < 0) {
            $score = 0;
        }else{
            $score = $_POST['Score'];
        }
        
        $stat = new Statistics($_POST['GameName'], $_POST['TeamName'], $number, $score, $winner, date("Y-m-d", strtotime($dat)));
        $db->insertStatistics($stat);
    ?>
</body>

</html>