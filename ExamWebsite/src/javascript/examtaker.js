/*
    Count Array items(row) using PHP:
        json_encode(count($arrayvar));
    Count Array items(row) using JavaScript:
        arrayvar.length;

    To add an id to an HTML Element using JavaScript:
        htmlelementobject.setAttribute("id", "thisismyhtmlelementid");
    To add a class to an HTML Element using JavaScript:
        htmlelementobject.setAttribute("class", "thisismyhtmlelementclass");
    
    To find out Object length:
        Object.keys(obj).length;
*/

// ============================DECLARATIONS============================
/*
Data for this webpage:
    curr_tbExam_data
        clExID
        clExName
        clExDescription
        clExInstructions

    curr_QA_data
        clQsID
        clQsBody
        clQsType
        tbAnswer_data
            clAsID
            clAsBody
*/

var new_UserExam_data = {
    clUeID: tbuserexam_clUeID_topID, 
    clUrID: curr_clUrID_value, 
    clExID: parseInt(tbExam_data.clExID), 
}

var new_UserAnswer_data = [];


var questionAnsweredCount = 0;
var tbQuestion_data_length = 0;
var curr_tbAnswer_data_length = [];
var curr_tbAnswer_data_topID = [];

// var "tbExam_data" is declared on "admin_exameditor.php"
// var "tbQuestion_data" is declared on "admin_exameditor.php"
// var "tbAnswer" is declared on "admin_exameditor.php"

// Gather current exam id "tbExam_data" data
var curr_tbExam_data = {
    clExID: parseInt(tbExam_data.clExID), 
    clExName: tbExam_data.clExName, 
    clExDescription: tbExam_data.clExDescription, 
    clExInstructions: tbExam_data.clExInstructions, 
}

var totalQuestionCount = 0;
var curr_QA_data = [];
for(var question_count = 0; question_count < tbQuestion_data.length; question_count++) {
    if(curr_tbExam_data.clExID == tbQuestion_data[question_count].clExID) {
        var curr_tbAnswer_data = [];

        if(tbAnswer_data != null) { // If the "tbAnswer_data" data is NOT empty
            for(var answer_count = 0; answer_count < tbAnswer_data.length; answer_count++) {
                if(tbQuestion_data[question_count].clQsID == tbAnswer_data[answer_count].clQsID) {
                    curr_tbAnswer_data.push({
                        clAsID: parseInt(tbAnswer_data[answer_count].clAsID), 
                        clAsBody: tbAnswer_data[answer_count].clAsBody
                    });
                }
            }
        }

        curr_QA_data.push({
            clQsID: parseInt(tbQuestion_data[question_count].clQsID), 
            clQsBody: tbQuestion_data[question_count].clQsBody, 
            clQsType: tbQuestion_data[question_count].clQsType, 
            tbAnswer_data: curr_tbAnswer_data
        });

        if(tbQuestion_data[question_count].clQsType == 0) { // 0 = Fill in the Blanks;
            var curr_clUaAnswer_data = "";
        }
        else if(tbQuestion_data[question_count].clQsType == 1) { // 1 = Hybrid Multiple Choice;
            var curr_clUaAnswer_data = [];
        }

        new_UserAnswer_data.push({
            clUaQuestionID: parseInt(tbQuestion_data[question_count].clQsID), 
            clQsType: tbQuestion_data[question_count].clQsType, 
            clUaAnswer: curr_clUaAnswer_data, 
            answerCount: 0, 
        });

        curr_tbAnswer_data_length.push(curr_tbAnswer_data.length);
        curr_tbAnswer_data_topID.push(curr_tbAnswer_data[curr_tbAnswer_data.length-1].clAsID);

        curr_tbAnswer_data = undefined;

        totalQuestionCount++;
    }
}

tbQuestion_data_length = tbQuestion_data.length;

tbExam_data = undefined;
tbQuestion_data = undefined;
tbAnswer_data = undefined;


function displayExamInfo() {
    var examName_element = document.getElementById("i-h--examtaker-examName");
    var examID_element = document.getElementById("i-h--examtaker-examID");
    var examDesc_element = document.getElementById("i-h--examtaker-examDesc");
    var examInst_element = document.getElementById("i-h--examtaker-examInst");
    
    // Fill Up EXAM INFORMATION==============================
    examName_element.innerHTML = curr_tbExam_data.clExName;
    examID_element.innerHTML = curr_tbExam_data.clExID;
    examDesc_element.innerHTML = curr_tbExam_data.clExDescription;
    examInst_element.innerHTML = curr_tbExam_data.clExInstructions;
}

function ans_unans_show(QuestionCount) {
    var mainContainer_AnsAnuns = document.getElementById("ans_unans_progress");

    var divContainer = document.createElement("div")
    divContainer.setAttribute("class", "row mt-2")
    divContainer.setAttribute("id", "button-container")

    mainContainer_AnsAnuns.appendChild(divContainer)
    
    for (var i=0; i < QuestionCount; i++){
        var buttonContainer = document.createElement("button");

        buttonContainer.setAttribute("class", "col-sm cardbtn btn-danger border border-2")
        buttonContainer.setAttribute("type", "button")
        buttonContainer.setAttribute("id", 'btn'+(i+1)+'')

        var testText = document.createTextNode(i+1)

        divContainer.appendChild(buttonContainer);
        buttonContainer.appendChild(testText);
    }
}

function displayExamButtons() {
    var takeExam_button = document.getElementById("i-button--examtaker-takeExam");
    
    // Fill Up EXAM BUTTONS==============================
    takeExam_button.setAttribute("onclick","tabComponent('c-div--examtaker-display','i-div--examtaker-question-1')");
}

function baseQuestion(in_displayContainerID, in_questionCount) {
    var container_element = document.getElementById(in_displayContainerID);

    // For Return
    const inputElements_obj = {};

    // Create Main (CONTAINER)
    var container_main = document.createElement("div");
    container_main.setAttribute("id", "i-div--examtaker-question-" + (in_questionCount).toString());
    container_main.setAttribute("class", "c-div--examtaker-display");
    container_main.setAttribute("style", "display:none");
    // Insert (CONTAINER)
    container_element.appendChild(container_main);
    // For Return
    inputElements_obj['question_row_main'] = container_main;
        // Create Question Content (CONTAINER)
        var container_questioncontent = document.createElement("div");
        container_questioncontent.setAttribute("class", "row ms-2 me-2 mt-4 mb-1");
        // Insert (CONTAINER)
        container_main.appendChild(container_questioncontent);
            // Create Sub 1 (CONTAINER)
            var container_questioncontent_sub1 = document.createElement("div");
            container_questioncontent_sub1.setAttribute("class", "container border border-4 border-primary rounded mt-4 mb-4");
            // Insert (CONTAINER)
            container_questioncontent.appendChild(container_questioncontent_sub1);
                // Create Question (CONTAINER)
                var container_questioncontent_sub1_question = document.createElement("div");
                container_questioncontent_sub1_question.setAttribute("class", "row ms-5 me-5 mt-4 mb-3");
                // Insert (CONTAINER)
                container_questioncontent_sub1.appendChild(container_questioncontent_sub1_question); //num 1 with the question
                    // Create ol (CONTAINER)
                    var container_questioncontent_sub1_question_ol = document.createElement("ol");
                    // Insert (CONTAINER)
                    container_questioncontent_sub1_question.appendChild(container_questioncontent_sub1_question_ol);
                        // Create li (CONTAINER)
                        var container_questioncontent_sub1_question_ol_li = document.createElement("li"); //Numbering
                        //container_questioncontent_sub1_question_ol_li.innerHTML = ""; // former question numbering
                        container_questioncontent_sub1_question_ol_li.value = in_questionCount; //Question numbering

                        // Insert (CONTAINER)
                        container_questioncontent_sub1_question_ol.appendChild(container_questioncontent_sub1_question_ol_li);
                        // For Return
                        inputElements_obj['question_clQsBody'] = container_questioncontent_sub1_question_ol_li;
                // Create Answer (CONTAINER)
                var container_questioncontent_sub1_answer = document.createElement("div");
                container_questioncontent_sub1_answer.setAttribute("id", "i-div--examtaker-question-answerrow-" + (in_questionCount).toString());
                container_questioncontent_sub1_answer.setAttribute("class", "container ms-5 me-5 mb-4");
                // Insert (CONTAINER)
                container_questioncontent_sub1.appendChild(container_questioncontent_sub1_answer);
                // For Return
                inputElements_obj['answer_row'] = container_questioncontent_sub1_answer;
        // Create Question Control (CONTAINER)
        var container_questioncontrol = document.createElement("div");
        container_questioncontrol.setAttribute("class", "row");
        // Insert (CONTAINER)
        container_main.appendChild(container_questioncontrol);
            // Create Answered Count (CONTAINER)
            var container_questioncontrol_answeredcount = document.createElement("div");
            container_questioncontrol_answeredcount.setAttribute("class", "col");
            // Insert (CONTAINER)
            container_questioncontrol.appendChild(container_questioncontrol_answeredcount);
                // Create h (CONTAINER)
                var container_questioncontrol_answeredcount_h = document.createElement("h4");
                container_questioncontrol_answeredcount_h.setAttribute("id", "i-h--examtaker-answeredcount-" + (in_questionCount).toString());
                container_questioncontrol_answeredcount_h.innerHTML = "";
                // Insert (CONTAINER)
                container_questioncontrol_answeredcount.appendChild(container_questioncontrol_answeredcount_h);
                // For Return
                inputElements_obj['questioncontrol_answeredcount'] = container_questioncontrol_answeredcount_h;
            // Create Traverse Control (CONTAINER)
            var container_questioncontrol_traverse = document.createElement("div");
            container_questioncontrol_traverse.setAttribute("class", "col-md-auto");
            // Insert (CONTAINER)
            container_questioncontrol.appendChild(container_questioncontrol_traverse);
                // Create Sub 1 (CONTAINER)
                var container_questioncontrol_traverse_sub1 = document.createElement("div");
                container_questioncontrol_traverse_sub1.setAttribute("class", "btn-group");
                // Insert (CONTAINER)
                container_questioncontrol_traverse.appendChild(container_questioncontrol_traverse_sub1);
                    // Create Left button (CONTAINER)
                    var container_questioncontrol_traverse_sub1_leftbutton = document.createElement("button");
                    container_questioncontrol_traverse_sub1_leftbutton.setAttribute("type", "button");
                    container_questioncontrol_traverse_sub1_leftbutton.setAttribute("id", "i-button--examtaker-leftbutton-" + (in_questionCount).toString());
                    container_questioncontrol_traverse_sub1_leftbutton.setAttribute("class", "btn btn-primary mr-1");
                    container_questioncontrol_traverse_sub1_leftbutton.setAttribute("data-bs-container", "body");
                    container_questioncontrol_traverse_sub1_leftbutton.setAttribute("data-bs-content", "html here");
                    container_questioncontrol_traverse_sub1_leftbutton.disabled = true;
                    // Insert (CONTAINER)
                    container_questioncontrol_traverse_sub1.appendChild(container_questioncontrol_traverse_sub1_leftbutton);
                    // For Return
                    inputElements_obj['questioncontrol_leftbutton'] = container_questioncontrol_traverse_sub1_leftbutton;
                        // Create Left button (CONTAINER)
                        var container_questioncontrol_traverse_sub1_leftbutton_i = document.createElement("i");
                        container_questioncontrol_traverse_sub1_leftbutton_i.setAttribute("class", "bi bi-arrow-left");
                        // Insert (CONTAINER)
                        container_questioncontrol_traverse_sub1_leftbutton.appendChild(container_questioncontrol_traverse_sub1_leftbutton_i);
                    // Create Right button (CONTAINER)
                    var container_questioncontrol_traverse_sub1_rightbutton = document.createElement("button");
                    container_questioncontrol_traverse_sub1_rightbutton.setAttribute("type", "button");
                    container_questioncontrol_traverse_sub1_rightbutton.setAttribute("id", "i-button--examtaker-rightbutton-" + (in_questionCount).toString());
                    container_questioncontrol_traverse_sub1_rightbutton.setAttribute("class", "btn btn-primary");
                    container_questioncontrol_traverse_sub1_rightbutton.setAttribute("data-bs-container", "body");
                    container_questioncontrol_traverse_sub1_rightbutton.setAttribute("data-bs-content", "html here");
                    container_questioncontrol_traverse_sub1_rightbutton.disabled = true;
                    // Insert (CONTAINER)
                    container_questioncontrol_traverse_sub1.appendChild(container_questioncontrol_traverse_sub1_rightbutton);
                    // For Return
                    inputElements_obj['questioncontrol_rightbutton'] = container_questioncontrol_traverse_sub1_rightbutton;
                        // Create Left button (CONTAINER)
                        var container_questioncontrol_traverse_sub1_rightbutton_i = document.createElement("i");
                        container_questioncontrol_traverse_sub1_rightbutton_i.setAttribute("class", "bi bi-arrow-right");
                        // Insert (CONTAINER)
                        container_questioncontrol_traverse_sub1_rightbutton.appendChild(container_questioncontrol_traverse_sub1_rightbutton_i);
            // Create Question Count (CONTAINER)
            var container_questioncontrol_questioncount = document.createElement("div");
            container_questioncontrol_questioncount.setAttribute("class", "col-md-auto mt-2");
            // Insert (CONTAINER)
            container_questioncontrol.appendChild(container_questioncontrol_questioncount);
                // Create h (CONTAINER)
                var container_questioncontrol_questioncount_h = document.createElement("h4");
                container_questioncontrol_questioncount_h.innerHTML = "";
                // Insert (CONTAINER)
                container_questioncontrol_questioncount.appendChild(container_questioncontrol_questioncount_h);
                // For Return
                inputElements_obj['questioncontrol_questioncount'] = container_questioncontrol_questioncount_h;

    return inputElements_obj;
}

function baseAnswerFillBlanks(in_displayContainerID, in_questionCount, in_answerCount) {
    var container_element = document.getElementById(in_displayContainerID);

    // For Return
    const inputElements_obj = {};

    // Create Main (CONTAINER)
    var container_main = document.createElement("div");
    container_main.setAttribute("id", "i-div--examtaker-answer-fillblanks-" + (in_questionCount).toString());
    container_main.setAttribute("class", "row");
    // Insert (CONTAINER)
    container_element.appendChild(container_main);
    // For Return
    inputElements_obj['answer_row_main'] = container_main;
        // Create Answer Content (CONTAINER)
        var container_answercontent = document.createElement("div");
        container_answercontent.setAttribute("class", "col-md-4");
        // Insert (CONTAINER)
        container_main.appendChild(container_answercontent);
                // Create input checkbox (CONTAINER)
                var container_answercontent_textarea = document.createElement("textarea");
                container_answercontent_textarea.setAttribute("id", "i-textarea--examtaker-answer-fillblanks-" + (in_questionCount).toString() + "-" + (in_answerCount).toString());
                container_answercontent_textarea.setAttribute("class", "card card-default card-body c-textarea--examtaker-answer-fillblanks");
                // Insert (CONTAINER)
                container_answercontent.appendChild(container_answercontent_textarea);
                // For Return
                inputElements_obj['answer_clAsBody'] = container_answercontent_textarea;

    return inputElements_obj;
}

function baseAnswerHybridMultiple(in_displayContainerID, in_questionCount, in_answerCount) {
    var container_element = document.getElementById(in_displayContainerID);

    // For Return
    const inputElements_obj = {};

    // Create Main (CONTAINER)
    var container_main = document.createElement("div");
    container_main.setAttribute("id", "i-div--examtaker-answer-hybridmultiple-" + (in_questionCount).toString());
    container_main.setAttribute("class", "row");
    // Insert (CONTAINER)
    container_element.appendChild(container_main);
    // For Return
    inputElements_obj['answer_row_main'] = container_main;
        // Create Answer Content (CONTAINER)
        var container_answercontent = document.createElement("div");
        container_answercontent.setAttribute("class", "col-md-4");
        // Insert (CONTAINER)
        container_main.appendChild(container_answercontent);
            // Create label (CONTAINER)
            var container_answercontent_label = document.createElement("label");
            container_answercontent_label.setAttribute("for", "i-inputcheckbox--examtaker-answer-hybridmultiple-" + (in_questionCount).toString() + "-" + (in_answerCount).toString());
            // Insert (CONTAINER)
            container_answercontent.appendChild(container_answercontent_label);
                // Create input checkbox (CONTAINER)
                var container_answercontent_label_checkbox = document.createElement("input");
                container_answercontent_label_checkbox.setAttribute("type", "checkbox");
                container_answercontent_label_checkbox.setAttribute("id", "i-inputcheckbox--examtaker-answer-hybridmultiple-" + (in_questionCount).toString() + "-" + (in_answerCount).toString());
                container_answercontent_label_checkbox.setAttribute("class", "card-input-element c-inputcheckbox--examtaker-answer-hybridmultiple");
                container_answercontent_label_checkbox.setAttribute("name", "choice");
                container_answercontent_label_checkbox.checked = false;
                // Insert (CONTAINER)
                container_answercontent_label.appendChild(container_answercontent_label_checkbox);

                // Create div (CONTAINER)
                var container_answercontent_label_div = document.createElement("div");
                container_answercontent_label_div.setAttribute("class", "card card-default card-input");
                // Insert (CONTAINER)
                container_answercontent_label.appendChild(container_answercontent_label_div);
                    // Create div (CONTAINER)
                    var container_answercontent_label_div_div = document.createElement("div");
                    container_answercontent_label_div_div.setAttribute("class", "card-body");
                    //var container_answercontent_label_div_div = document.createElement("li");
                    // Insert (CONTAINER)
                    container_answercontent_label_div.appendChild(container_answercontent_label_div_div);
                        // Create label (CONTAINER)
                        var container_answercontent_label_div_div_label = document.createElement("label");
                        container_answercontent_label_div_div_label.setAttribute("for", "i-inputcheckbox--examtaker-answer-hybridmultiple-" + (in_questionCount).toString() + "-" + (in_answerCount).toString());
                        container_answercontent_label_div_div_label.innerHTML = "";
                        // Insert (CONTAINER)
                        container_answercontent_label_div_div.appendChild(container_answercontent_label_div_div_label);
                        // For Return
                        inputElements_obj['answer_clAsBody'] = container_answercontent_label_div_div_label;

    return inputElements_obj;
}

function displayQA(in_displayContainerID, in_itemCount) { //Question content
    var container_element = document.getElementById(in_displayContainerID);

    // Check if the container exists and is defined, if not, exit
    if(container_element === undefined || container_element === null) { return; }
    
    // Check if there are any rows in the fetched database table, if none, exit
    if(in_itemCount <= 0) { return; }

    // Insert Row for EXAM QUESTION==============================
    for(var question_count = 0; question_count < in_itemCount; question_count++) {
        var inputElementsQuestion_obj = baseQuestion(container_element.id, question_count+1);
        
        //var container_answercontent_label_div_div = document.createElement("li");
        inputElementsQuestion_obj['question_clQsBody'].innerHTML = curr_QA_data[question_count].clQsBody; //Question itself
        inputElementsQuestion_obj['questioncontrol_answeredcount'].innerHTML = "Questions Answered: " + (questionAnsweredCount).toString() + "/" + (in_itemCount).toString();
        inputElementsQuestion_obj['questioncontrol_questioncount'].innerHTML = "Question " + (question_count+1).toString() + " of " + (in_itemCount).toString();
        
        if(question_count != 0) {
            inputElementsQuestion_obj['questioncontrol_leftbutton'].disabled = false;
            inputElementsQuestion_obj['questioncontrol_leftbutton'].setAttribute("onclick","tabComponent('c-div--examtaker-display','i-div--examtaker-question-" + (question_count).toString() + "');");
        }
        
        if(question_count != (in_itemCount-1)) {
            inputElementsQuestion_obj['questioncontrol_rightbutton'].disabled = false;
            inputElementsQuestion_obj['questioncontrol_rightbutton'].setAttribute("onclick","tabComponent('c-div--examtaker-display','i-div--examtaker-question-" + (question_count+2).toString() + "');");
        }
        else {
            inputElementsQuestion_obj['questioncontrol_rightbutton'].disabled = false;
            inputElementsQuestion_obj['questioncontrol_rightbutton'].innerHTML = "Submit Exam";
            inputElementsQuestion_obj['questioncontrol_rightbutton'].setAttribute("onclick","submitExamData()");
        }
        
        var container_answer_element = inputElementsQuestion_obj['answer_row'];

        if(curr_QA_data[question_count].clQsType == 0) { // Fill in the Blanks
            var inputElementsAnswer_obj = baseAnswerFillBlanks(container_answer_element.id, question_count+1, 1);
            
            // Answer(Blank)
            inputElementsAnswer_obj['answer_clAsBody'].innerHTML = "";
        }
        else if(curr_QA_data[question_count].clQsType == 1) { // Hybrid Multiple Choice
            for(var answer_count = 0; answer_count < curr_tbAnswer_data_length[question_count]; answer_count++) {
                var inputElementsAnswer_obj = baseAnswerHybridMultiple(container_answer_element.id, question_count+1, answer_count+1);
                
                // Answer(Choices)
                inputElementsAnswer_obj['answer_clAsBody'].innerHTML = curr_QA_data[question_count].tbAnswer_data[answer_count].clAsBody;
                
                inputElementsAnswer_obj = undefined;
            }
        }

        inputElementsQuestion_obj = undefined;
    }
}

function setAnsweredCountDisplay() {
    var answeredcount_element = null;
    
    for(var question_count = 0; question_count < tbQuestion_data_length; question_count++) {
        answeredcount_element = document.getElementById("i-h--examtaker-answeredcount-" + (question_count+1).toString());
        answeredcount_element.innerHTML = "Questions Answered: " + (questionAnsweredCount).toString() + "/" + (tbQuestion_data_length).toString();
    }
}

function submitExamData() {
    var emptyAnswerQAID = "";

    for(var qa_saveArrayIndex = 0; qa_saveArrayIndex < curr_QA_data.length; qa_saveArrayIndex++) { // Check if there is a question with no answer/s.
        if(new_UserAnswer_data[qa_saveArrayIndex].answerCount == 0) { // If a question has no answer.
            emptyAnswerQAID = emptyAnswerQAID.concat("\n" + "Question ID #" + curr_QA_data[qa_saveArrayIndex].clQsID);
        }
    }
    
    if(emptyAnswerQAID.localeCompare("") != 0) {
        alert("Answer all questions before submitting the Exam: " + emptyAnswerQAID);
        return;
    }

    // Pass to '../crud/examtaker_submit.php' for Database Insertion
    $(document).ready(function(){
        $.ajax({
            url: "../crud/examtaker_submit.php", 
            type: "POST", 
            data: {
                UserExam_data_ajax: new_UserExam_data, 
                UserAnswer_data_ajax: new_UserAnswer_data,
                ExamQA_data_ajax: curr_QA_data
            }, 
            // contentType: false, 
            // processData: false, 
            // async: false, 
            cache: false, 
            success: function(data) {
                // alert(data);
                alert('SUCCESS: Exam submitted.');

                location.href = "../webexam/UserExamList.php";
            }, 
            error: function(data) {
                // alert(data);
                alert('ERROR: An error occured while submitting the Exam.');
            }
        });
    });
}


// ============================CALLS============================
displayExamInfo();
displayExamButtons();
ans_unans_show(totalQuestionCount);
displayQA("i-div--examtaker-questions-display", tbQuestion_data_length);

// ============================Save Content of Field(Filled/Empty(Answer)) for Fill in the Blanks(Answer Body)============================
$('#i-div--examtaker-questions-display').on('blur', 'textarea.c-textarea--examtaker-answer-fillblanks', function() {
    var fieldID = $(this).attr('id');
    var qa_saveArrayIndex = Number(fieldID.slice(fieldID.lastIndexOf("-",fieldID.lastIndexOf("-")-1)+1,fieldID.lastIndexOf("-"))) - 1;
    
    if(((new_UserAnswer_data[qa_saveArrayIndex].clUaAnswer).localeCompare($(this).val())) != 0) { // If Field Content is NOT the same as the one in the save array
        if(((new_UserAnswer_data[qa_saveArrayIndex].clUaAnswer).length == 0) && (($(this).val()).length != 0)) { // If Save Array is Empty and Field Content is NOT empty
            new_UserAnswer_data[qa_saveArrayIndex].answerCount++;
            questionAnsweredCount++;
            button_recolor = document.getElementById("btn"+((qa_saveArrayIndex+1).toString()));
            button_recolor.removeAttribute("class");
            button_recolor.setAttribute("class", "col-sm cardbtn btn-primary border border-2")
            setAnsweredCountDisplay();
        }
        else if(((new_UserAnswer_data[qa_saveArrayIndex].clUaAnswer).length != 0) && (($(this).val()).length == 0)) { // If Save Array is NOT Empty and Field Content is empty
            new_UserAnswer_data[qa_saveArrayIndex].answerCount--;
            questionAnsweredCount--;
            button_recolor = document.getElementById("btn"+((qa_saveArrayIndex+1).toString()));
            button_recolor.removeAttribute("class");
            button_recolor.setAttribute("class", "col-sm cardbtn btn-danger border border-2")
            setAnsweredCountDisplay();
        }
        
        new_UserAnswer_data[qa_saveArrayIndex].clUaAnswer = $(this).val();
    }
});

// ============================Save the State of Checkbox(Checked/Unchecked(Correct Answer)) for Hybrid Multiple Choice(Answer Checkbox)============================
$('#i-div--examtaker-questions-display').on('change', 'input.c-inputcheckbox--examtaker-answer-hybridmultiple', function() {
    var checkboxID = $(this).attr('id');
    var qa_saveArrayIndex = Number(checkboxID.slice(checkboxID.lastIndexOf("-",checkboxID.lastIndexOf("-")-1)+1,checkboxID.lastIndexOf("-"))) - 1;
    var answer_saveArrayIndex = Number(checkboxID.substring(checkboxID.lastIndexOf("-")+1)) - 1;
    var prev_answerCount = new_UserAnswer_data[qa_saveArrayIndex].answerCount;
    
    var existingAnswer_saveArrayIndex = (new_UserAnswer_data[qa_saveArrayIndex].clUaAnswer).findIndex(function (in_AnswerID) {
        return in_AnswerID == curr_QA_data[qa_saveArrayIndex].tbAnswer_data[answer_saveArrayIndex].clAsID;
    });
    
    if((this.checked == true) && (existingAnswer_saveArrayIndex == -1)) { // Checked & Doesn't Exist Yet on Save Array
        (new_UserAnswer_data[qa_saveArrayIndex].clUaAnswer).push(curr_QA_data[qa_saveArrayIndex].tbAnswer_data[answer_saveArrayIndex].clAsID);
        new_UserAnswer_data[qa_saveArrayIndex].answerCount++;
    }
    else if((this.checked == false) && (existingAnswer_saveArrayIndex != -1)) { // Not Checked & Exists on Save Array
        (new_UserAnswer_data[qa_saveArrayIndex].clUaAnswer).splice(existingAnswer_saveArrayIndex,1);
        new_UserAnswer_data[qa_saveArrayIndex].answerCount--;
    }
    else {
        return;
    }

    if((prev_answerCount == 0) && (new_UserAnswer_data[qa_saveArrayIndex].answerCount == 1)) { // If there are Checkboxes checked
        questionAnsweredCount++;
        button_recolor = document.getElementById("btn"+((qa_saveArrayIndex+1).toString()));
        button_recolor.removeAttribute("class");
        button_recolor.setAttribute("class", "col-sm cardbtn btn-primary border border-2")
        setAnsweredCountDisplay();
    }
    else if((prev_answerCount == 1) && (new_UserAnswer_data[qa_saveArrayIndex].answerCount == 0)) { // If there are no Checkboxes checked
        questionAnsweredCount--;
        button_recolor = document.getElementById("btn"+((qa_saveArrayIndex+1).toString()));
        button_recolor.removeAttribute("class");
        button_recolor.setAttribute("class", "col-sm cardbtn btn-danger border border-2")
        setAnsweredCountDisplay();
    }
}); 
