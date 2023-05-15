<?php
	// Establish Database Connection
    include "../includes/connectdb.php";
	
    $sql_query = "";
    $updateType = $_POST['updateType_ajax'];
    $clExID_value = $_POST['clExID_ajax'];

    /*
    Legend:
        updateType:
            0 = Delete Existing Exam
            1 = Publish Existing Exam
    */

    if($updateType == 0) { // Delete Existing Exam

        // (tbQuestion)Fetch Questions Data======================================================================(START)
        $sql_query = "SELECT `clQsID` FROM `tbquestion` WHERE `clExID` = '$clExID_value';";
        $fetch_sql_query = mysqli_query($connectdb, $sql_query);
        if($fetch_sql_query){
            $curr_tbQuestion_data = null; // Without this, it will likely cause an Error if the table data is empty, which means that it will not go through the loop below, which means that this variable is never declared.
            while($curr_tbQuestion_row = mysqli_fetch_array($fetch_sql_query)){
                // $curr_tbQuestion_row['clQsBody'] = nl2br($curr_tbQuestion_row['clQsBody']);// Convert \n to <br>
                $curr_tbQuestion_data[] = $curr_tbQuestion_row;
            }

            // Clear variables(Optional)
            unset($curr_tbQuestion_row);

        if($curr_tbQuestion_data != null) { // If $curr_tbQuestion_data is empty
            for($question_count = 0; $question_count < count($curr_tbQuestion_data); $question_count++) {
                $clQsID_value = $curr_tbQuestion_data[$question_count]['clQsID'];
                
                $sql_query .= "DELETE FROM `tbanswer`
                    WHERE `clQsID` = '$clQsID_value';
                ";
                
                $sql_query .= "DELETE FROM `tbquestion`
                    WHERE `clQsID` = '$clQsID_value' AND `clExID` = '$clExID_value';
                    ";
    
                    // Clear variables(Optional)
                    unset($clQsID_value);
                }
    
                // Clear variables(Optional)
                unset($curr_tbQuestion_data);
            }
        }
        else{
            echo mysqli_error($connectdb);
        }
        // (tbQuestion)Fetch Questions Data======================================================================(END)

    
        $sql_query .= "DELETE FROM `tbexam`
            WHERE `clExID` = '$clExID_value';
        ";

        // Clear variables(Optional)
        unset($fetch_sql_query);
    }
    else if($updateType == 1) { // Publish Existing Exam
        $clExID_value = $_POST['clExID_ajax'];
        $clExPublish_value = $_POST['clExPublish_ajax'];
        $clExPublishedBy_value = $_POST['clExPublishedBy_ajax'];

        $sql_query .= "UPDATE `tbexam`
            SET `clExPublish` = '$clExPublish_value', 
                `clExPublishedBy` = '$clExPublishedBy_value', 
                `clExPublishedDate` = date_format(now(), '%Y-%m-%d %H:%i:%s')
            WHERE `clExID` = '$clExID_value';
            ";

// Clear variables(Optional)
unset($clExPublish_value);
unset($clExPublishedBy_value);
}

	if(!empty($sql_query)) {
        // Insert SQL Queries
        $update_sql_query = mysqli_multi_query($connectdb, $sql_query);
        
        if($update_sql_query){
            echo "Insertion to Database Successful";
        }
        else{
            echo "Insertion to Database Failed";
            echo mysqli_error($connectdb);
        }
        
        // Clear $sql_query variable(Optional)
        unset($sql_query);
    }
	
	// End Database Connection
	mysqli_close($connectdb);

    // Clear variables(Optional)
    unset($updateType);
    unset($clExID_value);

    unset($connectdb);
?>
