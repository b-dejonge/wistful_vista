<?php
function read_comments(){
  global $db;
  
  $query = "SELECT * FROM comments  ORDER BY date DESC";
  $comments = $db->query($query);
  if ($comments == false){
    $error_message = "An error occured while reading from the database.";
    include ('views/error.php');
    exit();
    }
    else{
      return $comments;
    }
}

function write_comments($name,$message){
  global $db;
  
  $insert = "INSERT INTO comments (name, message) VALUES ('$name','$message')";
  $success = $db -> exec($insert);
  if ($success == false){
    $error_message = "An error occured while writing to the database.";
    include ('views/error.php');
    exit();
    }
}

function update_comment($id,$display){
  global $db;
  $query = "UPDATE comments SET display = '$display'
            WHERE id = '$id'";
  $success = $db -> exec($query);
  if($success == false){
    $error_message = "An error occurred while updating the database";
    include("./view/error.php");
    exit();
    }
}

function delete_comment($id){
  global $db;
  $delete = "DELETE FROM comments WHERE id = '$id'";
  $success = $db -> exec($delete);
  if($success == false){
    $error_message = "An error occurred while updating the database";
    include("./view/error.php");
    exit();
  }
}
?>