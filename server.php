<?php
$server = "localhost";
$username = "root";
$password = "root123";
$dbName = "tech";
$connection = mysqli_connect($server, $username, $password, $dbName);


class Vacation
{
    public $date;
    public $name;

    public function __construct($name, $date)
    {
        $this->name = $name;
        $this->date = $date;
    }

    public function displayInfo()
    {
        echo "Name: " . $this->name . ", Age: " . $this->date . "\n";
    }
}

$vac1 = new Vacation("holiday_1", "2024-05-10");
$vac2 = new Vacation("holiday_2", "2024-05-26");
$vac3 = new Vacation("holiday_3", "2024-05-29");
$vac4 = new Vacation("holiday_4", "2024-03-31");
$vac5 = new Vacation("holiday_5", "2024-06-30");


$vacations = array($vac1, $vac2, $vac3, $vac4, $vac5);

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
        for ($i = 0; $i < count($vacations); $i++) {
            echo "<option value=" . $vacations[$i]->date . " label=" . $vacations[$i]->name . "></option>";
        }
        ?>
    </datalist>

</body>

</html>