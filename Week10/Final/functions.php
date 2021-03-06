<?php
/*Joshua Grizzel*/
function emailIsValid( $email ) {
     if ( filter_var($email, FILTER_VALIDATE_EMAIL) != false ) {
        return true;
     } else {
         return false;
     }
}

function phoneIsValid( $phone ) {
    if ( !empty($phone) ) {
        return true;
    } else {
        return false;
    }
}

function heardFromIsValid( $heard_from ) {
    if ( !empty($heard_from) ) {
        return true;
    } else {
        return false;
    }
}

function contactIsValid( $contact_via ) {
    if ( !empty($contact_via) ) {
        return true;
    } else {
        return false;
    }
}

function displayErrorMsgs( $error_msgs ) {
     if ( is_array($error_msgs) && count($error_msgs) > 0 ) {
        foreach ($error_msgs as $err) {
          echo '<p>', $err, '</p>'; 
        }                    
    }
}

function displaySucessMsg($msg) {
    if ( is_string($msg) && !empty($msg) ) {
        echo '<h1>', $msg , '</h1>';
    }
}


function addUser($email,$phone,$heard_from,$contact_via,$comments) {
    // remember to change the port
    $db = new PDO("mysql:host=localhost;dbname=phpclasswinter2015; port=3307;", "root", "");
    $dbs = $db->prepare('insert into account set email = :email, phone = :phone, heard = :heard, contact = :contact, comments = :comments'); 

    // you must bind the data before you execute
    $dbs->bindParam(':email', $email, PDO::PARAM_STR);
    $dbs->bindParam(':phone', $phone, PDO::PARAM_STR);
    $dbs->bindParam(':heard', $heard_from, PDO::PARAM_STR);
    $dbs->bindParam(':contact', $contact_via, PDO::PARAM_STR);
    $dbs->bindParam(':comments', $comments, PDO::PARAM_STR);

    // When you execute remember that a rowcount means a change was made
     if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
        return true;
    } else {
        return false;
    }     
}


?>