<?php
/**
 * Created by PhpStorm.
 * User: maud
 * Date: 29-3-2019
 * Time: 10:08
 */

require_once('../src/event/Events.php');
$event = new Events();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $state = $_POST['state'];
    $city = $_POST['city'];

    $name = $_POST['name'];
    $des = $_POST['description'];
    $address = $_POST['address'];
    $date = $_POST['date_picker'];
    $start_tm = $_POST['start_time'];
    $end_tm = $_POST['end_time'];

    if ($state == 'choose' || $state == 'anders' & $city == "")
    {
        header("Location: addevent.php?city");
    }

    if($city != ""){
        $event->addCity($city);
        $state = $event->getCityId($city);
    }

    $event->addEvent($name, $des, $start_tm, $end_tm, $date, $address, $state);

    $event_idarr = $event->getEventId($name, $date);
    $event_id = $event_idarr['event_id'];


    $aantal_roles = $_POST['all_roles'];
    $roles = $_POST['role'];


    for ($i = 0; $i < count($roles); $i++) {
        if ($roles[$i] != "") {
            $rol_idarr = $event->getRoleIdByName($roles[$i]);
            $rol_id = $rol_idarr['rol_id'];
            for ($i = 0; $i < count($roles); $i++) {
                if ($aantal_roles[$i] != "") {
                    $amount = $aantal_roles[$i];
                    $event->addPersonForEvent($event_id, $rol_id, $amount);
                }
            }
        }
    }
    exit;
}
?>

<!doctype html>
<html lang="en">
<head>
    <?php
    include "../public/head.html";
    ?>
    <title>evenement toevoegen</title>
</head>

<body>
<?php
include "../public/navbar.html";

$name = "Evenement naam";
$des = "Omschrijving van evenement";
$adres = "Straatnaam huisnummer";
$sel_city = "Stad kiezen";
$place_city = "Stad";
$date = "Datum";
$start_tm = "Start tijd";
$end_tm = "Eind tijd";
$button = "Toevoegen";
$action = "addevent.php";
?>
<div class="container">
    <?php
    include "form.php";

    ?>
</div>

<script src="../public/js.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
