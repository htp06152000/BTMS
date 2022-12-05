<?php if ( ! defined('ACCESS') ) die("Direct access not allowed.");

if ( isset($_POST['update-indigencies']) ) {
        
    $status = sanitize_input($_POST['status']);
    $certificateindigency_ID = sanitize_input($_POST['certificateindigency_ID']);

    $update_indigencies = $DB->prepare("UPDATE certificateindigency SET  status = ? WHERE certificateindigency_ID = ?");

    try {
        $DB->beginTransaction();
        if( $update_indigencies->execute( [ $status,$certificateindigency_ID ] ) ) {
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

    redirect_to('indigencies');

}


if (isset($_POST['add-indigencies'])) {

    $user_id = $_SESSION["user_info"]["id"];
    $servicesname = sanitize_input($_POST['servicesname']);
    $pickupdate = sanitize_input($_POST['pickupdate']);
    $status = sanitize_input($_POST['status']);
    $dateRecorded = sanitize_input($_POST['dateRecorded']);
    $amount = sanitize_input($_POST['amount']);
    $purpose = sanitize_input($_POST['purpose']);

    $update_indigencies = $DB->prepare("INSERT INTO certificateindigency ( user_id, servicesname, pickupdate, status, dateRecorded, amount, purpose) VALUES (?, ?, ?, ?, ?, ?, ?)");

    try {
        $DB->beginTransaction();
        if( $update_indigencies->execute( [$user_id, $servicesname, $pickupdate, $status, $dateRecorded, $amount, $purpose] ) ) {
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

if (isset($_POST['delete-indigencies'])) {
    $certificateindigency_ID  = sanitize_input( $_POST['itemid'] );

    $delete_indigencies = $DB->prepare("DELETE FROM certificateindigency WHERE certificateindigency_ID = ?");

    try {
        $DB->beginTransaction();
        if( $delete_indigencies->execute( [ $certificateindigency_ID ] ) ) {
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