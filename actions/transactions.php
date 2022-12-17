<?php if ( ! defined('ACCESS') ) die("Direct access not allowed.");



if ( isset($_POST['add-clearances']) ) {

$user_id = $_SESSION["user_info"]["id"];
$requester = $_SESSION["requester"];
$services = $_SESSION["services"];

$update_residents = $DB->prepare("INSERT INTO resident ( user_id, residentFName, residentMName, residentLName, residentAge, residentCivilStatus, residentGender, residentZoneNumber, residentBdate, residentContactNumber, residentOccupation) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

try {
    $DB->beginTransaction();
    if( $update_residents->execute( [$user_id, $residentFName, $residentMName, $residentLName, $residentAge, $residentCivilStatus, $residentGender, $residentZoneNumber, $residentBdate, $residentContactNumber, $residentOccupation] ) ) {
        $DB->commit();
        $_SESSION['message'] = "Resident successfully added";
        $_SESSION['messagetype'] = "success";
    } else {
        $DB->rollback();
        $_SESSION['message'] = "Unable to add Resident";
        $_SESSION['messagetype'] = "danger";
    }
} catch (PDOException $err) {
    $DB->rollback();
    $_SESSION['message'] = "DB Transaction Error: " . $err->getMessage();
    $_SESSION['messagetype'] = "danger";

}


}