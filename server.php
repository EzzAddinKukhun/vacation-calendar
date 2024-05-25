<?php
$server = "localhost";
$username = "root";
$password = "root123";
$dbName = "tech";
$connection = mysqli_connect($server, $username, $password, $dbName);
$response = array();
$currentMonth = date("m");
$currentDay = date("d");


if ($connection) {
    $getHolidaysQuery = "SELECT * FROM HOLIDAYS";
    $result = mysqli_query($connection, $getHolidaysQuery);
    if ($result) {
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $holidayTokens = explode('-', $row['holidayDate']);
            $holidayMonth = (int) $holidayTokens[1];
            $holidayDay = (int) $holidayTokens[2];

            if ($currentMonth <= $holidayMonth) {
                if ($currentMonth == $holidayMonth) {
                    if ($currentDay < $holidayDay) {
                        $response[$i]['holidayDate'] = $row['holidayDate'];
                        $response[$i]['holidayName'] = $row['holidayName'];
                        $i++;
                    }
                } else {
                    $response[$i]['holidayDate'] = $row['holidayDate'];
                    $response[$i]['holidayName'] = $row['holidayName'];
                    $i++;
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <input type="date" list="vacations-dates" />
    <datalist id="vacations-dates">
        <?php
        for ($i = 0; $i < count($response); $i++) {
            echo "<option value=". $response[$i]['holidayDate'] ." label=". $response[$i]['holidayName'] ."></option>";
        }
        ?>
    </datalist>

</body>

</html>