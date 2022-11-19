<?php if ( ! defined('ACCESS') ) die("Direct access not allowed.");

	if ( isset($_POST['update-blotters']) ) {
        
        $user_id = $_SESSION["user_info"]["id"];
        $complainant = sanitize_input( $_POST['complainant'] );
        $c_address = sanitize_input( $_POST['c_address'] );
        $c_contact = sanitize_input( $_POST['c_contact'] );
        $person_to_complain = sanitize_input( $_POST['person_to_complain'] );
        $p_address = sanitize_input( $_POST['p_address'] );
        $p_contact = sanitize_input( $_POST['p_contact'] );
        $date_recorded = sanitize_input( $_POST['date_recorded'] );
        $action_taken = sanitize_input($_POST['action_taken'] ); 
        $complaint_status = sanitize_input($_POST['complaint_status'] );
        $location_of_incidence = sanitize_input($_POST['location_of_incidence']);
        $complaint = sanitize_input($_POST['complaint'] );
        $blotterID = sanitize_input($_POST['blotterID']);
        $user_id = sanitize_input($_POST['user_id']);

        $update_blotters = $DB->prepare("UPDATE blotter SET complainant = ?, c_address = ?, c_contact = ?, person_to_complain = ?, p_address = ?, p_contact = ?, date_recorded = ?, action_taken = ?, complaint_status = ?, location_of_incidence = ?, complaint = ?, blotterID = ? WHERE user_id = ?");

        try {
            $DB->beginTransaction();
            if( $update_blotters->execute( [$complainant, $c_address, $c_contact, $person_to_complain, $p_address, $p_contact, $date_recorded, $action_taken, $complaint_status, $location_of_incidence, $complaint, $blotterID, $user_id,] ) ) {
                $DB->commit();
                $_SESSION['message'] = "Blotter report successfully updated";
                $_SESSION['messagetype'] = "success";
            } else {
                $DB->rollback();
                $_SESSION['message'] = "Blotter report update unsuccessfull";
                $_SESSION['messagetype'] = "danger";
            }
        } catch (PDOException $err) {
            $DB->rollback();
            $_SESSION['message'] = "DB Transaction Error: " . $err->getMessage();
            $_SESSION['messagetype'] = "danger";

        }

        redirect_to('blotters');

    }

    if ( isset($_POST['add-blotters']) ) {

        $user_id = $_SESSION["user_info"]["id"];
        $complainant = sanitize_input( $_POST['complainant'] );
        $c_address = sanitize_input( $_POST['c_address'] );
        $c_contact = sanitize_input( $_POST['c_contact'] );
        $person_to_complain = sanitize_input( $_POST['person_to_complain'] );
        $p_address = sanitize_input( $_POST['p_address'] );
        $p_contact = sanitize_input( $_POST['p_contact'] );
        $date_recorded = sanitize_input( $_POST['date_recorded'] );
        $complaint = sanitize_input($_POST['complaint'] );
        $action_taken = sanitize_input($_POST['action_taken'] ); 
        $complaint_status = sanitize_input($_POST['complaint_status'] );
        $location_of_incidence = sanitize_input($_POST['location_of_incidence']);


        $update_blotters = $DB->prepare("INSERT INTO blotter ( user_id, complainant, c_address, c_contact, person_to_complain, p_address, p_contact, date_recorded, action_taken, complaint_status, complaint, location_of_incidence) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        try {
            $DB->beginTransaction();
            if( $update_blotters->execute( [$user_id, $complainant, $c_address, $c_contact, $person_to_complain, $p_address, $p_contact, $date_recorded, $action_taken, $complaint_status, $complaint, $location_of_incidence] ) ) {
                $DB->commit();
                $_SESSION['message'] = "Blotter successfully added";
                $_SESSION['messagetype'] = "success";
            } else {
                $DB->rollback();
                $_SESSION['message'] = "Unable to add Blotter";
                $_SESSION['messagetype'] = "danger";
            }
        } catch (PDOException $err) {
            $DB->rollback();
            $_SESSION['message'] = "DB Transaction Error: " . $err->getMessage();
            $_SESSION['messagetype'] = "danger";

        }


    }


    if ( isset($_POST['delete-blotters']) ) {
        
        $blotterID  = sanitize_input( $_POST['itemid'] );

        $delete_blotters = $DB->prepare("DELETE FROM blotter WHERE blotterID = ?");

        try {
            $DB->beginTransaction();
            if( $delete_blotters->execute( [ $blotterID ] ) ) {
                $DB->commit();
                $_SESSION['message'] = "Blotter report successfully deleted";
                $_SESSION['messagetype'] = "success";
            } else {
                $DB->rollback();
                $_SESSION['message'] = "Unable to delete blotter report";
                $_SESSION['messagetype'] = "danger";
            }
        } catch (PDOException $err) {
            $DB->rollback();
            $_SESSION['message'] = "DB Transaction Error: " . $err->getMessage();
            $_SESSION['messagetype'] = "danger";

        }

    }