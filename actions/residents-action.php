<?php if ( ! defined('ACCESS') ) die("Direct access not allowed.");

	if ( isset($_POST['update-resident']) ) {
        
        $residentFName = sanitize_input( $_POST['residentFName'] );
        $residentMName = sanitize_input( $_POST['residentMName'] );
        $residentLName = sanitize_input( $_POST['residentLName'] );
        $residentAge = sanitize_input( $_POST['residentAge'] );
        $residentCivilStatus = sanitize_input( $_POST['residentCivilStatus'] );
        $residentGender = sanitize_input( $_POST['residentGender'] );
        $residentZoneNumber = sanitize_input( $_POST['residentZoneNumber'] );
        $residentsID = sanitize_input( $_POST['residentsID'] );

        $update_resident = $DB->prepare("UPDATE resident SET residentFName = ?, residentMName = ?, residentLName = ?, residentAge = ?, residentCivilStatus = ?, residentGender = ?, residentZoneNumber, WHERE residentID = ?");

        try {
            $DB->beginTransaction();
            if( $update_residents->execute( [ $residentFName, $residentMName, $residentLName, $residentAge, $residentCivilStatus, $residentGender, $residentZoneNumber,$residentID] ) ) {
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

        redirect_to('resident');

    }

    if ( isset($_POST['add-resident']) ) {
        
        $residentFName = sanitize_input( $_POST['residentFName'] );
        $residentMName = sanitize_input( $_POST['residentMName'] );
        $residentLName = sanitize_input( $_POST['residentLName'] );
        $residentAge = sanitize_input( $_POST['residentAge'] );
        $residentCivilStatus = sanitize_input( $_POST['residentCivilStatus'] );
        $residentGender = sanitize_input( $_POST['residentGender'] );
        $residentZoneNumber = sanitize_input( $_POST['residentZoneNumber'] );
        $residentID = sanitize_input( $_POST['residentsID'] );
        $update_residents = $DB->prepare("INSERT INTO resident (residentFName, residentMName, residentLName, residentAge, residentCivilStatus, residentGender, residentZoneNumber, residentID) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        try {
            $DB->beginTransaction();
            if( $update_residents->execute( [ $residentFName, $residentMName, $residentLName, $residentAge, $residentCivilStatus, $residentGender, $residentZoneNumber, $residentID] ) ) {
                $DB->commit();
                $_SESSION['message'] = "User successfully added";
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


    if ( isset($_POST['delete-resident']) ) {
        
        $residentID  = sanitize_input( $_POST['itemSid'] );

        $delete_residents = $DB->prepare("DELETE FROM resident WHERE residentID = ?");

        try {
            $DB->beginTransaction();
            if( $delete_residents->execute( [ $residentID ] ) ) {
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