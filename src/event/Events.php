<?php
/**
 * Created by PhpStorm.
 * User: maud
 * Date: 27-3-2019
 * Time: 10:43
 */

class Events
{
    public $conn;

    public function __construct()
    {
        define('__ROOT__', dirname(dirname(dirname(__FILE__))));
        $db = require_once(__ROOT__ . '/config/config.php');

        $server_name = $db['server_name'];
        $db_name = $db['db_name'];
        $username = $db['username'];
        $password = $db['password'];

        $this->conn = new PDO("mysql:host=$server_name;dbname=$db_name", $username, $password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    public function addCity($city)
    {
        $sql = "INSERT INTO tbl_plaats (plaats) VALUES ('$city')";
        $pdo = $this->conn->prepare($sql);

        $pdo->execute();
    }

    public function getCityId($city)
    {
        $sql = ("SELECT plaats_id FROM tbl_plaats where plaats = :ci");

        $sel = $this->conn->prepare($sql);
        $sel->bindParam('ci', $city);

        $sel->execute();

        $result = $sel->fetch();

        return $result['plaats_id'];
    }

    public function getCityById($id)
    {
        $sql = ("SELECT plaats FROM tbl_plaats where plaats_id = :id");

        $sel = $this->conn->prepare($sql);
        $sel->bindParam('id', $id);

        $sel->execute();

        $result = $sel->fetch();

        return $result['plaats'];
    }

    public function getEvents()
    {
        $sql = ("SELECT * FROM tbl_evenement");

        $sel = $this->conn->prepare($sql);

        $sel->execute();

        $result = $sel->fetchAll();

        return $result;

    }

    public function getEventById($id)
    {
        $sql = ("SELECT * FROM tbl_evenement where event_id = :id");

        $sel = $this->conn->prepare($sql);
        $sel->bindParam('id', $id);

        $sel->execute();

        $result = $sel->fetch();

        return $result;

    }

    public function addEvent($name, $description, $start_time, $end_time, $date, $address, $place_id)
    {
        $sql = "INSERT INTO tbl_evenement (naam, omschrijving, start_tijd, eind_tijd, datum, adres, tbl_plaats_plaats_id) VALUES ('$name', '$description', '$start_time', '$end_time', '$date', '$address', '$place_id' )";

        $pdo = $this->conn->prepare($sql);

        $pdo->execute();

//        header("Location: index.php");

    }

    public function editEvent($name, $description, $start_time, $end_time, $date, $address, $place_id, $event_id)
    {
        $sql = "UPDATE tbl_evenement SET 
        naam = :na, 
        omschrijving = :des,
        start_tijd = :sttm,
        eind_tijd = :eitm,
        datum = :date,
        adres = :ad,
        tbl_plaats_plaats_id = :pid
        WHERE event_id = :evid";

        $pdo = $this->conn->prepare($sql);
        $pdo->bindParam('na', $name);
        $pdo->bindParam('des', $description);
        $pdo->bindParam('sttm', $start_time);
        $pdo->bindParam('eitm', $end_time);
        $pdo->bindParam('date', $date);
        $pdo->bindParam('ad', $address);
        $pdo->bindParam('pid', $place_id);
        $pdo->bindParam('evid', $event_id);

        $pdo->execute();


        header("Location: index.php");
    }

    public function getRoleIdByName($rol)
    {
        $sql = ("SELECT rol_id FROM tbl_rol WHERE rol = :rol");

        $sel = $this->conn->prepare($sql);
        $sel->bindParam('rol', $rol);

        $sel->execute();

        $result = $sel->fetch();

        return $result;
    }

    public function getAllRolesByEvent($id)
    {
        echo "<pre>";
        print_r($id);
        exit;
        $sql = ("SELECT * FROM aantal_evenement WHERE tbl_evenement_event_id = :id");

        $sel = $this->conn->prepare($sql);
        $sel->bindParam('id', $id);
        $sel->execute();

        $result = $sel->fetchAll();
        echo "<pre>";
        print_r($result);
        exit;

        return $result;
    }

    public function addPersonForEvent($event_id, $rol_id, $amount)
    {
        $sql = "INSERT INTO aantal_evenement (aantal_evenement, tbl_evenement_event_id, tbl_rol_rol_id) 
        VALUES
         (:am, :event_id, :rol_id)";

        $pdo = $this->conn->prepare($sql);
        $pdo->bindParam('event_id', $event_id);
        $pdo->bindParam('rol_id', $rol_id);
        $pdo->bindParam('am', $amount);

        $pdo->execute();

        header("Location: index.php");
    }

    public function getEventId($name, $date)
    {
        $sql = ("SELECT event_id FROM tbl_evenement WHERE naam = :na AND datum = :da");

        $sel = $this->conn->prepare($sql);
        $sel->bindParam('na', $name);
        $sel->bindParam('da', $date);

        $sel->execute();

        $result = $sel->fetch();

        return $result;
    }

    public function deleteEvent($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM tbl_evenement WHERE event_id = :id");

        $stmt->bindParam('id', $id);

        $stmt->execute();
    }

    public function getCities()
    {
        $sql = ("SELECT * FROM tbl_plaats");

        $sel = $this->conn->prepare($sql);

        $sel->execute();

        $result = $sel->fetchAll();

        return $result;
    }
}

