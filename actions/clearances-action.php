<?php if ( ! defined('ACCESS') ) die("Direct access not allowed.");

if ( isset($_POST['update-clearances']) ) {
        
    $servicesname = sanitize_input($_POST['servicesname']);
    $pickupdate = sanitize_input($_POST['pickupdate']);
    $status = sanitize_input($_POST['status']);
    $dateRecorded = sanitize_input($_POST['dateRecorded']);
    $amount = sanitize_input($_POST['amount']);
    $purpose = sanitize_input($_POST['purpose']);
    $barangayclearance_ID = sanitize_input($_POST['barangayclearance_ID']);

    $update_clearances = $DB->prepare("UPDATE barangayclearance SET servicesname = ?, pickupdate = ?, status = ?, dateRecorded = ?, amount = ?, purpose = ? WHERE barangayclearance_ID = ?");

    try {
        $DB->beginTransaction();
        if( $update_clearances->execute( [ $servicesname, $pickupdate, $status, $dateRecorded, $amount, $purpose, $barangayclearance_ID ] ) ) {
            $DB->commit();
            $_SESSION['message'] = "Request successfully updated";
            $_SESSION['messagetype'] = "success";
        } else {
            $DB->rollback();
            $_SESSION['message'] = "Request update unsuccessfull";
            $_SESSION['messagetype'] = "danger";
        }
    } catch (PDOException $err) {
        $DB->rollback();
        $_SESSION['message'] = "DB Transaction Error: " . $err->getMessage();
        $_SESSION['messagetype'] = "danger";

    }

    redirect_to('clearances');

}


if (isset($_POST['add-clearances'])) {

    $user_id = $_SESSION["user_info"]["id"];
    $servicesname = sanitize_input($_POST['servicesname']);
    $pickupdate = sanitize_input($_POST['pickupdate']);
    $status = sanitize_input($_POST['status']);
    $dateRecorded = sanitize_input($_POST['dateRecorded']);
    $amount = sanitize_input($_POST['amount']);
    $purpose = sanitize_input($_POST['purpose']);

    $update_clearances = $DB->prepare("INSERT INTO barangayclearance ( user_id, servicesname, pickupdate, status, dateRecorded, amount, purpose) VALUES (?, ?, ?, ?, ?, ?, ?)");

    try {
        $DB->beginTransaction();
        if( $update_clearances->execute( [$user_id, $servicesname, $pickupdate, $status, $dateRecorded, $amount, $purpose] ) ) {
            $DB->commit();
            $_SESSION['message'] = "Request successfully submitted";
            $_SESSION['messagetype'] = "success";
        } else {
            $DB->rollback();
            $_SESSION['message'] = "Unable to add Request";
            $_SESSION['messagetype'] = "danger";
        }
    } catch (PDOException $err) {
        $DB->rollback();
        $_SESSION['message'] = "DB Transaction Error: " . $err->getMessage();
        $_SESSION['messagetype'] = "danger";

    }
}

if (isset($_POST['delete-clearances'])) {
    $barangayclearance_ID  = sanitize_input( $_POST['itemid'] );

    $delete_clearances = $DB->prepare("DELETE FROM barangayclearance WHERE barangayclearance_ID = ?");

    try {
        $DB->beginTransaction();
        if( $delete_clearances->execute( [ $barangayclearance_ID ] ) ) {
            $DB->commit();
            $_SESSION['message'] = "Request successfully deleted";
            $_SESSION['messagetype'] = "success";
        } else {
            $DB->rollback();
            $_SESSION['message'] = "Unable to delete request";
            $_SESSION['messagetype'] = "danger";
        }
    } catch (PDOException $err) {
        $DB->rollback();
        $_SESSION['message'] = "DB Transaction Error: " . $err->getMessage();
        $_SESSION['messagetype'] = "danger";

    }
}