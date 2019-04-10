<?php
/**
 * Created by PhpStorm.
 * User: maud
 * Date: 9-4-2019
 * Time: 11:05
 */

if (isset($_GET['delete'])){
    require_once('../src/event/Events.php');
    $event = new Events();
    $id = $_GET['delete'];
    $event->deleteEvent($id);

    header("Location: index.php");

}