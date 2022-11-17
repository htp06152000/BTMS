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

        $user_id = sanitize_input($_POST['user_id']);


        $update_residents = $DB->prepare("UPDATE resident SET residentFName = ?, residentMName = ?, residentLName = ?, residentAge = ?, residentCivilStatus = ?, residentGender = ?, residentZoneNumber = ?, residentID = ? WHERE user_id = ?");

        try {
            $DB->beginTransaction();
            if( $update_residents->execute( [$residentFName, $residentMName, $residentLName, $residentAge, $residentCivilStatus, $residentGender, $residentZoneNumber, $residentID, $user_id ] ) ) {
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

        redirect_to('residents');

    }

    if ( isset($_POST['add-residents']) ) {

        $user_id = $_SESSION["user_info"]["id"];
        $residentFName = sanitize_input( $_POST['residentFName'] );
        $residentMName = sanitize_input( $_POST['residentMName'] );
        $residentLName = sanitize_input( $_POST['residentLName'] );
        $residentAge = sanitize_input( $_POST['residentAge'] );
        $residentCivilStatus = sanitize_input( $_POST['residentCivilStatus'] );
        $residentGender = sanitize_input( $_POST['residentGender'] );
        $residentZoneNumber = sanitize_input( $_POST['residentZoneNumber'] );

        $update_residents = $DB->prepare("INSERT INTO resident ( user_id, residentFName, residentMName, residentLName, residentAge, residentCivilStatus, residentGender, residentZoneNumber) VALUES (?, ?, ?, ?, ?, ?, ?, ? )");

        try {
            $DB->beginTransaction();
            if( $update_residents->execute( [$user_id, $residentFName, $residentMName, $residentLName, $residentAge, $residentCivilStatus, $residentGender, $residentZoneNumber,] ) ) {
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