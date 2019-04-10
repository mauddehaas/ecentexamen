<?php
/**
 * Created by PhpStorm.
 * User: maud
 * Date: 8-4-2019
 * Time: 15:18
 */
require_once('../src/event/Events.php');
$event = new Events();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_GET['edit'];
    $state = $_POST['state'];
    $city = $_POST['city'];

    if($city != "" && $state == 'anders'){
        $event->addCity($city);
        $state = $event->getCityId($city);
    }

    if ($state == 'choose' && $city == "")
    {
        header("Location: editevent.php?city");
    }

    if ($state == "choose" ) {
        $city = $_POST['city'];
        $state = $event->getCityId($city);
    }

    $name = $_POST['name'];
    $des = $_POST['description'];
    $address = $_POST['address'];
    $date = $_POST['date_picker'];
    $start_tm = $_POST['start_time'];
    $end_tm = $_POST['end_time'];

    $event->editEvent($name, $des, $start_tm, $end_tm, $date, $address, $state, $id);
}

if (isset($_GET['edit']) == true) {


    $id = $_GET['edit'];

    $eventfromid = $event->getEventById($id);

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
    $plaats_id = $eventfromid['tbl_plaats_plaats_id'];
    $plaats = $event->getCityById($plaats_id);

    $name = $eventfromid['naam'];
    $des = $eventfromid['omschrijving'];
    $adres = $eventfromid['start_tijd'];
    $sel_city = $plaats;
    $place_city = $plaats;
    $date = $eventfromid['datum'];
    $start_tm = $eventfromid['start_tijd'];
    $end_tm = $eventfromid['eind_tijd'];
    $button = "edit";
    $action = "editevent.php?edit=".$eventfromid['event_id']."";
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


    <?php
}
