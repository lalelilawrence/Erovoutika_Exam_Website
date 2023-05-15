<?php
	// Establish Database Connection
    require_once "../includes/connectdb.php";
	
    $sql_query = "";
    $updateType = $_POST['updateType_ajax'];

    /*
    Legend:
        updateType:
            0 = Update/Delete Existing Exam
            1 = Add New Exam
            2 = Publish Existing Exam
    */

    if($updateType == 0) { // Update/Delete Existing Exam
        $curr_tbExam_data = $_POST['curr_tbExam_data_ajax'];
        $curr_QA_data = $_POST['curr_QA_data_ajax'];
        $clExID_value = $curr_tbExam_data['clExID'];
    
        /*
        Legend:
            modifyType:
                0 = No Change
                1 = Update
                2 = Delete
                3 = Add
        */
    
        for($question_count = 0; $question_count < count($curr_QA_data); $question_count++) {
            $question_modifyType = $curr_QA_data[$question_count]['modifyType'];
            $clQsID_value = $curr_QA_data[$question_count]['clQsID'];
    
            if($question_modifyType == "3") { // Add New Question
                $clQsBody_value = $curr_QA_data[$question_count]['clQsBody'];
                $clQsType_value = $curr_QA_data[$question_count]['clQsType'];
                $clQsCorrectAnswer_value = implode(",",$curr_QA_data[$question_count]['clQsCorrectAnswer']);

                $sql_query .= "INSERT INTO `tbquestion` (
                        `clQsID`, 
                        `clExID`, 
                        `clQsBody`, 
                        `clQsType`, 
                        `clQsCorrectAnswer`
                    )
                    VALUES (
                        '$clQsID_value', 
                        '$clExID_value', 
                        '$clQsBody_value', 
                        '$clQsType_value', 
                        '$clQsCorrectAnswer_value'
                    );
                ";
                
                // Clear variables(Optional)
                unset($clQsBody_value);
                unset($clQsType_value);
                unset($clQsCorrectAnswer_value);
            }

            for($answer_count = 0; $answer_count < count($curr_QA_data[$question_count]['tbAnswer_data']); $answer_count++) {
                $answer_modifyType = $curr_QA_data[$question_count]['tbAnswer_data'][$answer_count]['modifyType'];
                $clAsID_value = $curr_QA_data[$question_count]['tbAnswer_data'][$answer_count]['clAsID'];
                
                if($answer_modifyType == "2") { // Delete/Nullify Current Existing Answer
                    $sql_query .= "DELETE FROM `tbanswer`
                        WHERE `clAsID` = '$clAsID_value' AND `clQsID` = '$clQsID_value';
                    ";
                }
                else {
                    $clAsBody_value = $curr_QA_data[$question_count]['tbAnswer_data'][$answer_count]['clAsBody'];
    
                    if($answer_modifyType == "1") { // Update Current Existing Answer
                        $sql_query .= "UPDATE `tbanswer`
                            SET `clAsBody` = '$clAsBody_value' 
                            WHERE `clAsID` = '$clAsID_value' AND `clQsID` = '$clQsID_value';
                        ";
                    }
                    else if($answer_modifyType == "3") { // Add New Answer
                        $sql_query .= "INSERT INTO `tbanswer` (
                                `clAsID`, 
                                `clQsID`, 
                                `clAsBody`
                            )
                            VALUES (
                                '$clAsID_value', 
                                '$clQsID_value', 
                                '$clAsBody_value'
                            );
                        ";
                    }

                    // Clear variables(Optional)
                    unset($clAsBody_value);
                }

                // Clear variables(Optional)
                unset($answer_modifyType);
                unset($clAsID_value);
            }
            
            if($question_modifyType == "2") { // Delete/Nullify Current Existing Question
                $sql_query .= "DELETE FROM `tbquestion`
                    WHERE `clQsID` = '$clQsID_value' AND `clExID` = '$clExID_value';
                ";
            }
            else if($question_modifyType == "1") { // Update Current Existing Question
                $clQsBody_value = $curr_QA_data[$question_count]['clQsBody'];
                $clQsType_value = $curr_QA_data[$question_count]['clQsType'];
                $clQsCorrectAnswer_value = implode(",",$curr_QA_data[$question_count]['clQsCorrectAnswer']);

                $sql_query .= "UPDATE `tbquestion`
                    SET `clQsBody` = '$clQsBody_value', 
                        `clQsType` = '$clQsType_value', 
                        `clQsCorrectAnswer` = '$clQsCorrectAnswer_value' 
                    WHERE `clQsID` = '$clQsID_value' AND `clExID` = '$clExID_value';
                    ";

// Clear variables(Optional)
unset($clQsBody_value);
unset($clQsType_value);
unset($clQsCorrectAnswer_value);
}

// Clear variables(Optional)
unset($question_modifyType);
unset($clQsID_value);
}
    
        $examInfo_modifyType = $curr_tbExam_data['modifyType'];
        
        if($examInfo_modifyType == "2") { // Delete/Nullify Current Exam Information
            $sql_query .= "DELETE FROM `tbexam`
                WHERE `clExID` = '$clExID_value';
            ";
        }
        else {
            $clExName_value = $curr_tbExam_data['clExName'];
            $clExDescription_value = $curr_tbExam_data['clExDescription'];
            $clExInstructions_value = $curr_tbExam_data['clExInstructions'];
            $clExPrice_value = $curr_tbExam_data['clExPrice'];
            $clExLastEditedBy_value = $curr_tbExam_data['clExLastEditedBy'];
            
            if($examInfo_modifyType == "1") { // Update Current Exam Information
                $sql_query .= "UPDATE `tbexam`
                    SET `clExName` = '$clExName_value', 
                        `clExDescription` = '$clExDescription_value', 
                        `clExInstructions` = '$clExInstructions_value',
                        `clExPrice` = '$clExPrice_value',
                        `clExLastEditedBy` = '$clExLastEditedBy_value',
                        `clExLastEditDate` = date_format(now(), '%Y-%m-%d %H:%i:%s')
                    WHERE `clExID` = '$clExID_value';
                ";
            }
            else if($examInfo_modifyType == "3") { // Add New Exam Information
                $sql_query .= "INSERT INTO `tbexam` (
                        `clExID`, 
                        `clExName`, 
                        `clExDescription`, 
                        `clExInstructions`,
                        `clExPrice`,
                        `clExPublish`, 
                        `clExLastEditedBy`, 
                        `clExPublishedBy`
                    )
                    VALUES (
                        '$clExID_value', 
                        '$clExName_value', 
                        '$clExDescription_value', 
                        '$clExInstructions_value',
                        '$clExPrice_value',
                        0, 
                        '$clExLastEditedBy_value', 
                        null
                    );
                ";
            }

            // Clear variables(Optional)
            unset($clExName_value);
            unset($clExDescription_value);
            unset($clExInstructions_value);
            unset($clExPrice_value);
            unset($clExLastEditedBy_value);
        }

        // Clear variables(Optional)
        unset($curr_tbExam_data);
        unset($curr_QA_data);
        
        unset($examInfo_modifyType);
    }
    else if($updateType == 1) { // Add New Exam
        $curr_tbExam_data = $_POST['curr_tbExam_data_ajax'];
        $curr_QA_data = $_POST['curr_QA_data_ajax'];
        $clExID_value = $curr_tbExam_data['clExID'];

        $clExName_value = $curr_tbExam_data['clExName'];
        $clExDescription_value = $curr_tbExam_data['clExDescription'];
        $clExInstructions_value = $curr_tbExam_data['clExInstructions'];
        $clExPrice_value = $curr_tbExam_data['clExPrice'];
        $clExLastEditedBy_value = $curr_tbExam_data['clExLastEditedBy'];

        $sql_query .= "INSERT INTO `tbexam` (
                `clExID`, 
                `clExName`, 
                `clExDescription`, 
                `clExInstructions`,
                `clExPrice`, 
                `clExPublish`, 
                `clExLastEditedBy`, 
                `clExPublishedBy`
            )
            VALUES (
                '$clExID_value', 
                '$clExName_value', 
                '$clExDescription_value', 
                '$clExInstructions_value',
                '$clExPrice_value', 
                0, 
                '$clExLastEditedBy_value', 
                null
            );
        ";
    
        for($question_count = 0; $question_count < count($curr_QA_data); $question_count++) {
            $clQsID_value = $curr_QA_data[$question_count]['clQsID'];
            $clQsBody_value = $curr_QA_data[$question_count]['clQsBody'];
            $clQsType_value = $curr_QA_data[$question_count]['clQsType'];
            $clQsCorrectAnswer_value = implode(",",$curr_QA_data[$question_count]['clQsCorrectAnswer']);
    
            $sql_query .= "INSERT INTO `tbquestion` (
                    `clQsID`, 
                    `clExID`, 
                    `clQsBody`, 
                    `clQsType`, 
                    `clQsCorrectAnswer`
                )
                VALUES (
                    '$clQsID_value', 
                    '$clExID_value', 
                    '$clQsBody_value', 
                    '$clQsType_value', 
                    '$clQsCorrectAnswer_value'
                );
            ";

            for($answer_count = 0; $answer_count < count($curr_QA_data[$question_count]['tbAnswer_data']); $answer_count++) {
                $clAsID_value = $curr_QA_data[$question_count]['tbAnswer_data'][$answer_count]['clAsID'];
                $clAsBody_value = $curr_QA_data[$question_count]['tbAnswer_data'][$answer_count]['clAsBody'];

                $sql_query .= "INSERT INTO `tbanswer` (
                        `clAsID`, 
                        `clQsID`, 
                        `clAsBody`
                    )
                    VALUES (
                        '$clAsID_value', 
                        '$clQsID_value', 
                        '$clAsBody_value'
                    );
                ";

                // Clear variables(Optional)
                unset($clAsID_value);
                unset($clAsBody_value);
            }

            // Clear variables(Optional)
            unset($clQsID_value);
            unset($clQsBody_value);
            unset($clQsType_value);
            unset($clQsCorrectAnswer_value);
        }

        // Clear variables(Optional)
        unset($curr_tbExam_data);
        unset($curr_QA_data);

        unset($clExName_value);
        unset($clExDescription_value);
        unset($clExInstructions_value);
        unset($clExPrice_value);
        unset($clExLastEditedBy_value);
    }
    else if($updateType == 2) { // Publish Existing Exam
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
