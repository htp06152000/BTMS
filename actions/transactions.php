<?php if ( ! defined('ACCESS') ) die("Direct access not allowed.");



if ( isset($_POST['add-clearances']) ) {

$user_id = $_SESSION["user_info"]["id"];
$requester = $_SESSION["requester"];
$services = $_SESSION["services"];
$pickupdate = $_SESSION["pickupdate"];
$status = $_SESSION["status"];
$purpose = $_SESSION["purpose"];
$dateRecorded = $_SESSION["dateRecorded"];

$update_transactions = $DB->prepare("INSERT INTO transaction ( user_id, residentID, servicesID, pickupdate, status, purpose, dateRecorded, business_name, business_address, type_of_business) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

try {
    $DB->beginTransaction();
    if( $update_transactions->execute( [$user_id, $requester, $services, $pickupdate, $status, $purpose, $dateRecorded, $business_name, $business_address, $type_of_business] ) ) {
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