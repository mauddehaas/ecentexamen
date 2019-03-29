<?php
/**
 * Created by PhpStorm.
 * User: maud
 * Date: 27-3-2019
 * Time: 10:50
 */

require_once ('../src/event/Events.php');

$event = new Events();

$results = $event->getEvents();