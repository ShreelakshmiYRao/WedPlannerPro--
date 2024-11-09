<?php
include('action.php');

if(isset($_POST['reg_id'])) {
    $reg_id = $_POST['reg_id'];
    
    // Delete the row from the database
    $sql = "DELETE FROM registration WHERE reg_id = '$reg_id'";
    $result = mysqli_query($con, $sql);
    
    if($result) {
        echo json_encode(array('status' => 'success', 'message' => 'Wedding detail deleted successfully.'));
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Failed to delete wedding detail.'));
    }
} else {
    echo json_encode(array('status' => 'error', 'message' => 'Invalid request.'));
}

?>