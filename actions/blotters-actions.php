<?php if ( ! defined('ACCESS') ) die("Direct access not allowed.");

	if ( isset($_POST['update-residents']) ) {
        
        $residentFName = sanitize_input( $_POST['residentFName'] );
        $residentMName = sanitize_input( $_POST['residentMName'] );
        $residentLName = sanitize_input( $_POST['residentLName'] );
        $residentAge = sanitize_input( $_POST['residentAge'] );
        $residentCivilStatus = sanitize_input( $_POST['residentCivilStatus'] );
        $residentGender = sanitize_input( $_POST['residentGender'] );
        $residentZoneNumber = sanitize_input( $_POST['residentZoneNumber'] );
        $residentID = sanitize_input( $_POST['residentID']);
        $residentBdate = sanitize_input($_POST['residentBdate'] );
        $residentContactNumber = sanitize_input($_POST['residentContactNumber'] ); 
        $residentOccupation = sanitize_input($_POST['residentOccupation'] );

        $user_id = sanitize_input($_POST['user_id']);


        $update_residents = $DB->prepare("UPDATE resident SET residentFName = ?, residentMName = ?, residentLName = ?, residentAge = ?, residentCivilStatus = ?, residentGender = ?, residentZoneNumber = ?, residentBdate = ?, residentContactNumber = ?, residentOccupation = ?, residentID = ? WHERE user_id = ?");

        try {
            $DB->beginTransaction();
            if( $update_residents->execute( [$residentFName, $residentMName, $residentLName, $residentAge, $residentCivilStatus, $residentGender, $residentZoneNumber, $residentID, $residentBdate, $residentContactNumber, $residentOccupation, $user_id ] ) ) {
                $DB->commit();
                $_SESSION['message'] = "Resident successfully updated";
                $_SESSION['messagetype'] = "success";
            } else {
                $DB->rollback();
                $_SESSION['message'] = "Resident update unsuccessfull";
                $_SESSION['messagetype'] = "danger";
            }
        } catch (PDOException $err) {
            $DB->rollback();
            $_SESSION['message'] = "DB Transaction Error: " . $err->getMessage();
            $_SESSION['messagetype'] = "danger";

        }

        redirect_to('blotter');

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

        $update_blotters = $DB->prepare("INSERT INTO blotter ( user_id, complainant, c_address, c_contact, person_to_complain, p_address, p_contact, date_recorded, action_taken, complaint_status, complaint) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        try {
            $DB->beginTransaction();
            if( $update_blotters->execute( [$user_id, $complainant, $c_address, $c_contact, $person_to_complain, $p_address, $p_contact, $date_recorded, $action_taken, $complaint_status, $complaint] ) ) {
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


    if ( isset($_POST['delete-residents']) ) {
        
        $user_id  = sanitize_input( $_POST['itemid'] );

        $delete_residents = $DB->prepare("DELETE FROM resident WHERE user_id = ?");

        try {
            $DB->beginTransaction();
            if( $delete_residents->execute( [ $user_id ] ) ) {
                $DB->commit();
                $_SESSION['message'] = "Resident successfully deleted";
                $_SESSION['messagetype'] = "success";
            } else {
                $DB->rollback();
                $_SESSION['message'] = "Unable to delete resident";
                $_SESSION['messagetype'] = "danger";
            }
        } catch (PDOException $err) {
            $DB->rollback();
            $_SESSION['message'] = "DB Transaction Error: " . $err->getMessage();
            $_SESSION['messagetype'] = "danger";

        }

    }