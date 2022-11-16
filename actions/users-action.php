<?php if ( ! defined('ACCESS') ) die("Direct access not allowed.");

	if ( isset($_POST['update-user']) ) {
        
        $first_name = sanitize_input( $_POST['first_name'] );
        $middle_name = sanitize_input( $_POST['middle_name'] );
        $last_name = sanitize_input( $_POST['last_name'] );
        $email = sanitize_input( $_POST['email'] );
        $address = sanitize_input( $_POST['address'] );
        $role = sanitize_input( $_POST['role'] );

        $user_id = sanitize_input( $_POST['user_id'] );

        $update_user = $DB->prepare("UPDATE users SET first_name = ?, middle_name = ?, last_name = ?, email = ?, address = ?, role = ? WHERE user_id = ?");

        try {
            $DB->beginTransaction();
            if( $update_user->execute( [ $first_name, $middle_name, $last_name, $email, $address, $role, $user_id ] ) ) {
                $DB->commit();
                $_SESSION['message'] = "User successfully updated";
                $_SESSION['messagetype'] = "success";
            } else {
                $DB->rollback();
                $_SESSION['message'] = "User update unsuccessfull";
                $_SESSION['messagetype'] = "danger";
            }
        } catch (PDOException $err) {
            $DB->rollback();
            $_SESSION['message'] = "DB Transaction Error: " . $err->getMessage();
            $_SESSION['messagetype'] = "danger";

        }

        redirect_to('users');

    }

    if ( isset($_POST['add-user']) ) {
        
        $first_name = sanitize_input( $_POST['first_name'] );
        $middle_name = sanitize_input( $_POST['middle_name'] );
        $last_name = sanitize_input( $_POST['last_name'] );
        $email = sanitize_input( $_POST['email'] );
        $address = sanitize_input( $_POST['address'] );
        $role = sanitize_input( $_POST['role'] );
        $username = sanitize_input( $_POST['username'] );
        $password = sanitize_input( $_POST['password'] );

        $update_user = $DB->prepare("INSERT INTO users (first_name, middle_name, last_name, email, address, role, username, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        try {
            $DB->beginTransaction();
            if( $update_user->execute( [ $first_name, $middle_name, $last_name, $email, $address, $role, $username, md5($password) ] ) ) {
                $DB->commit();
                $_SESSION['message'] = "User successfully added";
                $_SESSION['messagetype'] = "success";
            } else {
                $DB->rollback();
                $_SESSION['message'] = "Unable to add User";
                $_SESSION['messagetype'] = "danger";
            }
        } catch (PDOException $err) {
            $DB->rollback();
            $_SESSION['message'] = "DB Transaction Error: " . $err->getMessage();
            $_SESSION['messagetype'] = "danger";

        }


    }


    if ( isset($_POST['delete-user']) ) {
        
        $user_id  = sanitize_input( $_POST['itemid'] );

        $delete_user = $DB->prepare("DELETE FROM users WHERE user_id = ?");

        try {
            $DB->beginTransaction();
            if( $delete_user->execute( [ $user_id ] ) ) {
                $DB->commit();
                $_SESSION['message'] = "User successfully deleted";
                $_SESSION['messagetype'] = "success";
            } else {
                $DB->rollback();
                $_SESSION['message'] = "Unable to delete user";
                $_SESSION['messagetype'] = "danger";
            }
        } catch (PDOException $err) {
            $DB->rollback();
            $_SESSION['message'] = "DB Transaction Error: " . $err->getMessage();
            $_SESSION['messagetype'] = "danger";

        }

    }