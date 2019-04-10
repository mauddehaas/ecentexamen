<?php
/**
 * Created by PhpStorm.
 * User: maud
 * Date: 8-4-2019
 * Time: 15:04
 */

require_once('../src/event/Events.php');
$event = new Events();

    $all_events = $event->getEvents();
    foreach ($all_events as $all_event) {

        $plaats_id = $all_event['tbl_plaats_plaats_id'];
        $plaats = $event->getCityById($plaats_id);
        ?>
        <div class="card mb-4">
            <h5 class="card-header"><?php echo $all_event['naam']; ?></h5>
            <div class="card-body">
                <h5 class="card-title"><?php echo $all_event['omschrijving']; ?></h5>
                <p class="card-text">
                    Stad: <?php echo $plaats ?><br>
                    Adres: <?php echo $all_event['adres']; ?><br>
                    Datum: <?php echo $all_event['datum']; ?><br>
                    Begint: <?php echo $all_event['start_tijd']; ?><br>
                    Eidigt: <?php echo $all_event['eind_tijd']; ?>
                </p>
                <!--                <a href="#" class="btn btn-primary"></a>-->
            </div>
        </div>
        <?php
    }
    ?>