<?php
/**
 * Created by PhpStorm.
 * User: maud
 * Date: 8-4-2019
 * Time: 15:03
 */

require_once('../src/event/Events.php');
$event = new Events();

    $all_events = $event->getEvents();
    foreach ($all_events as $all_event) {

        $plaats_id = $all_event['tbl_plaats_plaats_id'];
        $plaats = $event->getCityById($plaats_id);
        $id = $all_event['event_id'];
//        $event->getAllRolesByEvent($id);
        ?>
        <div class="card mb-4">
            <h5 class="card-header"><?php echo $all_event['naam']; ?>
                <a href="deleteevent.php?delete=<?php echo $all_event['event_id'] ?>" class="btn btn-danger ml-2 float-right"><i class="fas fa-trash-alt"></i></a>
                <a href="editevent.php?edit=<?php echo $all_event['event_id'] ?>" class="btn btn-info  float-right"><i class="fas fa-edit"></i></a>
            </h5>
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