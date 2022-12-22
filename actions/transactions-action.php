<?php if ( ! defined('ACCESS') ) die("Direct access not allowed.");



if ( isset($_POST['add-clearances']) ) {

$user_id = $_SESSION["user_info"]["id"];
$requester =  sanitize_input( $_POST['requester'] );
$tod =  sanitize_input( $_POST['tod'] );
$pickupdate =  sanitize_input( $_POST['pickupdate'] );
$status =  sanitize_input( $_POST['status'] );
$purpose = sanitize_input( $_POST['purpose'] );
$dateRecorded = sanitize_input( $_POST['dateRecorded'] );

$update_transactions = $DB->prepare("INSERT INTO transaction ( user_id, residentID, servicesID, pickupdate, status, purpose, dateRecorded) VALUES (?, ?, ?, ?, ?, ?, ?)");

try {
    $DB->beginTransaction();
    if( $update_transactions->execute( [$user_id, $requester, $tod, $pickupdate, $status, $purpose, $dateRecorded] ) ) {
        $DB->commit();
        $_SESSION['message'] = "Request successfully added";
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

if ( isset($_POST['add-indigencies']) ) {

    $user_id = $_SESSION["user_info"]["id"];
    $requester =  sanitize_input( $_POST['requester'] );
    $tod =  sanitize_input( $_POST['tod'] );
    $pickupdate =  sanitize_input( $_POST['pickupdate'] );
    $status =  sanitize_input( $_POST['status'] );
    $purpose = sanitize_input( $_POST['purpose'] );
    $dateRecorded = sanitize_input( $_POST['dateRecorded'] );
    
    $update_transactions = $DB->prepare("INSERT INTO transaction ( user_id, residentID, servicesID, pickupdate, status, purpose, dateRecorded) VALUES (?, ?, ?, ?, ?, ?, ?)");
    
    try {
        $DB->beginTransaction();
        if( $update_transactions->execute( [$user_id, $requester, $tod, $pickupdate, $status, $purpose, $dateRecorded] ) ) {
            $DB->commit();
            $_SESSION['message'] = "Request successfully added";
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

    if ( isset($_POST['add-permits']) ) {

        $user_id = $_SESSION["user_info"]["id"];
        $requester =  sanitize_input( $_POST['requester'] );
        $tod =  sanitize_input( $_POST['tod'] );
        $business_name = sanitize_input($_POST['business_name']);
        $business_address = sanitize_input($_POST['business_address']);
        $type_of_business = sanitize_input($_POST['type_of_business']);
        $pickupdate =  sanitize_input( $_POST['pickupdate'] );
        $status =  sanitize_input( $_POST['status'] );
        $purpose = sanitize_input( $_POST['purpose'] );
        $dateRecorded = sanitize_input( $_POST['dateRecorded'] );
        
        $update_transactions = $DB->prepare("INSERT INTO transaction ( user_id, residentID, servicesID, business_name, business_address, type_of_business, pickupdate, status, purpose, dateRecorded) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        try {
            $DB->beginTransaction();
            if( $update_transactions->execute( [$user_id, $requester, $tod, $business_name, $business_address, $type_of_business, $pickupdate, $status, $purpose, $dateRecorded] ) ) {
                $DB->commit();
                $_SESSION['message'] = "Request successfully added";
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