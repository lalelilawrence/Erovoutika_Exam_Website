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
// If the examID is null, do not display anything(aka Add/Create New Exam), otherwise retrieve contents from database(aka Edit Existing Exam)
/*
Data for this webpage:
    curr_tbExam_data
        modifyType
        clExID
        clExName
        clExDescription
        clExInstructions
        clExPrice
        clExPublish
        clExLastEditedBy
        clExPublishedBy

    curr_QA_data
        modifyType
        clQsID
        clQsBody
        clQsType
        clQsCorrectAnswer
        tbAnswer_data
            modifyType
            clAsID
            clAsBody
*/
/*
Legend:
    modifyType:
        0 = No Change
        1 = Update
        2 = Delete
        3 = Add
*/


var tbQuestion_data_length = 0;
var curr_tbAnswer_data_length = [];
var curr_tbAnswer_data_topID = [];
var isAddNewQuestionActive = false;
var isAddNewFillBlanksActive = false;
var isAddNewHybridMultipleActive = false;

if(examID == 0) {
    var totalQuestionCount = 0;
    var curr_tbExam_data = {
        modifyType: 3, 
        clExID: tbExam_data_topID, 
        clExName: "", 
        clExDescription: "", 
        clExInstructions: "", 
        clExPrice: "",
        clExPublish: 0, 
        clExLastEditedBy: null, 
        clExPublishedBy: null
    }
    var curr_QA_data = [];
}
else {
    // var "tbExam_data" is declared on "admin_exameditor.php"
    // var "tbQuestion_data" is declared on "admin_exameditor.php"
    // var "tbAnswer" is declared on "admin_exameditor.php"

    if(tbExam_data.clExPublishedBy == null) {
        clExPublishedBy_id_value = null;
    }
    else {
        clExPublishedBy_id_value = tbExam_data.clExPublishedBy;
    }

    // Gather current exam id "tbExam_data" data
    var curr_tbExam_data = {
        modifyType: 0, 
        clExID: parseInt(tbExam_data.clExID), 
        clExName: tbExam_data.clExName, 
        clExDescription: tbExam_data.clExDescription, 
        clExInstructions: tbExam_data.clExInstructions, 
        clExPrice: tbExam_data.clExPrice,
        clExPublish: parseInt(tbExam_data.clExPublish), 
        clExLastEditedBy: parseInt(tbExam_data.clExLastEditedBy), 
        clExPublishedBy: clExPublishedBy_id_value
    }

    if(tbQuestion_data == null) { // If the "tbQuestion_data" data is empty
        var totalQuestionCount = 0;
        var curr_QA_data = [];
    }
    else {
        var totalQuestionCount = 0;
        var curr_QA_data = [];
        for(var question_count = 0; question_count < tbQuestion_data.length; question_count++) {
            if(curr_tbExam_data.clExID == tbQuestion_data[question_count].clExID) {
                var curr_tbAnswer_data = [];

                if(tbAnswer_data != null) { // If the "tbAnswer_data" data is NOT empty
                    for(var answer_count = 0; answer_count < tbAnswer_data.length; answer_count++) {
                        if(tbQuestion_data[question_count].clQsID == tbAnswer_data[answer_count].clQsID) {
                            curr_tbAnswer_data.push({
                                modifyType: 0, 
                                clAsID: parseInt(tbAnswer_data[answer_count].clAsID), 
                                clAsBody: tbAnswer_data[answer_count].clAsBody
                            });
                        }
                    }
                }
                var curr_clQsCorrectAnswer = (tbQuestion_data[question_count].clQsCorrectAnswer).split(',').map(clQsCorrectAnswer_item => {
                    return Number(clQsCorrectAnswer_item);
                });

                curr_QA_data.push({
                    modifyType: 0, 
                    clQsID: parseInt(tbQuestion_data[question_count].clQsID), 
                    clQsBody: tbQuestion_data[question_count].clQsBody, 
                    clQsType: tbQuestion_data[question_count].clQsType, 
                    clQsCorrectAnswer: curr_clQsCorrectAnswer, 
                    tbAnswer_data: curr_tbAnswer_data
                });

                curr_tbAnswer_data_length.push(curr_tbAnswer_data.length);
                curr_tbAnswer_data_topID.push(curr_tbAnswer_data[curr_tbAnswer_data.length-1].clAsID);

                curr_tbAnswer_data = undefined;

                totalQuestionCount++;
            }
        }

        tbQuestion_data_length = tbQuestion_data.length;

        tbQuestion_data = undefined;
    }
}

function displayExamInfo(in_displayContainerID) {
    var container_element = document.getElementById(in_displayContainerID);
    
    // Check if the container exists and is defined, if not, exit
    if(container_element === undefined || container_element === null) { return; }

    var examID_element = document.getElementById("i-label--exameditor-examID");
    var examPublish_element = document.getElementById("i-label--exameditor-examPublish");
    var examLastEditedBy_element = document.getElementById("i-label--exameditor-examLastEditedBy");
    var examPublishedBy_element = document.getElementById("i-label--exameditor-examPublishedBy");
    var examName_element = document.getElementById("i-input--exameditor-examName");
    var examDesc_element = document.getElementById("i-input--exameditor-examDesc");
    var examInst_element = document.getElementById("i-input--exameditor-examInst");
    var examPrice_element = document.getElementById("i-input--exameditor-examPrice");
    
    if(curr_tbExam_data.clExPublish == 0) { // If the Exam is NOT yet Published
        clExPublish_text_value = "Editable";
        examID_element.disabled = false;
        examPublish_element.disabled = false;
        examLastEditedBy_element.disabled = false;
        examPublishedBy_element.disabled = false;
        examName_element.disabled = false;
        examDesc_element.disabled = false;
        examInst_element.disabled = false;
        examPrice_element.disabled = false;
    }
    else if(curr_tbExam_data.clExPublish == 1) { // If the Exam is Published
        clExPublish_text_value = "Published";
        examID_element.disabled = true;
        examPublish_element.disabled = true;
        examLastEditedBy_element.disabled = true;
        examPublishedBy_element.disabled = true;
        examName_element.disabled = true;
        examDesc_element.disabled = true;
        examInst_element.disabled = true;
        examPrice_element.disabled = true;
    }

    if(curr_tbExam_data.clExLastEditedBy == null) {
        clExLastEditedBy_username_value = "N/A";
    }
    else {
        clExLastEditedBy_username_value = clExLastEditedBy_username.clUrUsername;
    }

    if(curr_tbExam_data.clExPublishedBy == null) {
        clExPublishedBy_username_value = "N/A";
    }
    else {
        clExPublishedBy_username_value = clExPublishedBy_username.clUrUsername;
    }

    // Fill Up EXAM INFORMATION==============================
    examID_element.innerHTML = curr_tbExam_data.clExID;
    examPublish_element.innerHTML = clExPublish_text_value;
    examLastEditedBy_element.innerHTML = clExLastEditedBy_username_value;
    examPublishedBy_element.innerHTML = clExPublishedBy_username_value;
    examName_element.innerHTML = curr_tbExam_data.clExName;
    examDesc_element.innerHTML = curr_tbExam_data.clExDescription;
    examInst_element.innerHTML = curr_tbExam_data.clExInstructions;
    examPrice_element.value = curr_tbExam_data.clExPrice;
}

function baseQuestion(in_displayContainerID, in_questionCount) {
    var container_element = document.getElementById(in_displayContainerID);

    // For Return
    const inputElements_obj = {};

    // Create Main (ROW)
    var container_row_main = document.createElement("div");
    container_row_main.setAttribute("id", "i-div--question-list-" + (in_questionCount).toString());
    container_row_main.setAttribute("class", "row");
    // Insert Rows(CONTAINER)
    container_element.appendChild(container_row_main);
    // For Return
    inputElements_obj['question_row'] = container_row_main;
        // Create Sub 1 (ROW)
        var container_row_sub1 = document.createElement("div");
        container_row_sub1.setAttribute("class", "card mt-3-row");
        // Insert Rows(CONTAINER)
        container_row_main.appendChild(container_row_sub1);
            // Create Sub 2 (ROW)
            var container_row_sub2 = document.createElement("div");
            container_row_sub2.setAttribute("class", "card-body m-1");
            // Insert Rows(CONTAINER)
            container_row_sub1.appendChild(container_row_sub2);

    // Insert Row for QUESTION ID==============================
        // Create & Set (CELL LABEL)
        var insert_detail_label = document.createElement("label");
        insert_detail_label.setAttribute("id", "i-label--question-clQsID-detail-label-" + (in_questionCount).toString());
        insert_detail_label.setAttribute("class", "col text-primary fs-2 fw-bold-qid");
        insert_detail_label.innerHTML = "QUESTION ID: ";
        // Create & Set (CELL CONTENT)
        var insert_detail_text = document.createElement("label");
        insert_detail_text.setAttribute("id", "i-label--question-clQsID-" + (in_questionCount).toString());
        insert_detail_text.setAttribute("name", "clQsID_value");
        insert_detail_text.setAttribute("class", "col text-primary fs-2 fw-bold-qidnum");
    // Create & Set (CELL)
    var insert_detail_cell = document.createElement("div");
    insert_detail_cell.setAttribute("class", "row");
    insert_detail_cell.appendChild(insert_detail_label);
    insert_detail_cell.appendChild(insert_detail_text);
    // Set (ROW)
    container_row_sub2.appendChild(insert_detail_cell);
    // For Return
    inputElements_obj['question_clQsID_field'] = insert_detail_text;

    // Insert Row for QUESTION BODY==============================
        // Create & Set (CELL LABEL)
        var insert_detail_label = document.createElement("label");
        insert_detail_label.setAttribute("id", "i-label--question-clQsBody-detail-label-" + (in_questionCount).toString());
        insert_detail_label.setAttribute("class", "card-title text-dark text-uppercase fs-4 form-label-ques");
        insert_detail_label.setAttribute("for", "i-textarea--question-clQsBody-" + (in_questionCount).toString());
        insert_detail_label.innerHTML = "Question";
        // Create & Set (CELL CONTENT)
        var insert_detail_text = document.createElement("textarea");
        insert_detail_text.setAttribute("id", "i-textarea--question-clQsBody-qbox" + (in_questionCount).toString());
        insert_detail_text.setAttribute("name", "clQsBody_value");
        insert_detail_text.setAttribute("class", "form-control card-text text-dark fs-5-qbox");
        insert_detail_text.setAttribute("cols", "30");
        insert_detail_text.setAttribute("rows", "4");
        insert_detail_text.required = true;
    // Create & Set (CELL)
    var insert_detail_cell = document.createElement("div");
    insert_detail_cell.setAttribute("class", "row my-4 mx-4");
    insert_detail_cell.appendChild(insert_detail_label);
    insert_detail_cell.appendChild(insert_detail_text);
    // Set (ROW)
    container_row_sub2.appendChild(insert_detail_cell);
    // For Return
    inputElements_obj['question_clQsBody_field'] = insert_detail_text;
    
    // Insert Row for ANSWER ROW==============================
    // Create & Set (CELL)
    var insert_detail_cell = document.createElement("div");
    insert_detail_cell.setAttribute("id", "i-div--answer-" + (in_questionCount).toString());
    insert_detail_cell.setAttribute("class", "row my-4 mx-4");
    // Set (ROW)
    container_row_sub2.appendChild(insert_detail_cell);
    // For Return
    inputElements_obj['answer_row'] = insert_detail_cell;
        // Insert for ANSWER LABEL==============================
        var insert_detail_label = document.createElement("label");
        insert_detail_label.setAttribute("class", "card-title text-dark text-uppercase fs-4 form-label-ans-title");
        insert_detail_label.innerHTML = "Answer/s";
        // Set (ROW)
        insert_detail_cell.appendChild(insert_detail_label);

    // Insert Row for QUESTION MODIFY==============================
        // Create 'DELETE' Cell Content
        var insert_modify_deletebutton = document.createElement("input");
        insert_modify_deletebutton.setAttribute("type", "button");
        insert_modify_deletebutton.setAttribute("id", "i-inputbutton--exam-tbQuestion-delete-" + (in_questionCount).toString());
        insert_modify_deletebutton.setAttribute("class", "btn btn-danger fs-3-delete");
        insert_modify_deletebutton.setAttribute("name", "inputbutton_qa_delete");
        insert_modify_deletebutton.setAttribute("value", "Delete Question");
    // Create & Set (FILLER CELL)
    var insert_modify_cell_sub2 = document.createElement("div");
    insert_modify_cell_sub2.setAttribute("class", "col-3");
    insert_modify_cell_sub2.appendChild(insert_modify_deletebutton);
    // Create & Set (FILLER CELL)
    var insert_modify_cell_sub1 = document.createElement("div");
    insert_modify_cell_sub1.setAttribute("class", "col-9");
    insert_modify_cell_sub1.appendChild(insert_modify_cell_sub2);
    // Create & Set (CELL)
    var insert_modify_cell = document.createElement("div");
    insert_modify_cell.setAttribute("class", "row my-4 mx-4");
    insert_modify_cell.appendChild(insert_modify_cell_sub1);
    // Set (ROW)
    container_row_sub2.appendChild(insert_modify_cell);
    // For Return
    inputElements_obj['question_deletebutton'] = insert_modify_deletebutton;
    
    return inputElements_obj;
}

function correctAnswerSelector(in_element) {
    in_element.style['background-color'] = "#00ab41"; //Light Green
}
function correctAnswerDeselector(in_element) {
    in_element.style['background-color'] = "transparent";
}

function baseAnswerFillBlanks(in_displayContainerID, in_questionCount, in_answerCount) {
    var container_element = document.getElementById(in_displayContainerID);
    
    // For Return
    const inputElements_obj = {};

    // Insert Row for ANSWER BODY==============================
    // Create & Set (CELL CONTENT)
    var insert_detail_answer = document.createElement("textarea");
    insert_detail_answer.setAttribute("id", "i-textarea--answer-fillblanks-clAsBody-" + (in_questionCount).toString() + "-" + (in_answerCount).toString());
    insert_detail_answer.setAttribute("class", "c-element--answer-fillblanks-content form-control card-text text-dark fs-5-ans-box");
    insert_detail_answer.setAttribute("name", "answerfillblanks_clAsBody_value");
    insert_detail_answer.setAttribute("cols", "30");
    insert_detail_answer.setAttribute("rows", "4");
    insert_detail_answer.required = true;
    // Insert (CONTAINER)
    container_element.appendChild(insert_detail_answer);
    // For Return
    inputElements_obj['answerFillBlanks_clAsBody_field'] = insert_detail_answer;
    
    return inputElements_obj;
}

function baseAnswerHybridMultiple(in_displayContainerID, in_questionCount, in_answerCount) {
    // Insert for ANSWER TABLE BODY==============================
    var container_insert_table_tbody = document.getElementById(in_displayContainerID);
    
    // For Return
    const inputElements_obj = {};

    // Insert for ANSWER TABLE BODY TR==============================
    var insert_table_tbody_tr = document.createElement("tr");
    insert_table_tbody_tr.setAttribute("id", "i-div--answer-hybridmultiple-" + (in_questionCount).toString() + "-" + (in_answerCount).toString());
    insert_table_tbody_tr.setAttribute("class", "c-div--answer-hybridmultiple");
    // Insert (CONTAINER)
    container_insert_table_tbody.appendChild(insert_table_tbody_tr);
        // Insert for ANSWER TABLE BODY TR TD==============================
        var insert_table_tbody_tr_td = document.createElement("td");
        // Set To Table (ROW)
        insert_table_tbody_tr.appendChild(insert_table_tbody_tr_td);
            // Insert for ANSWER TABLE BODY TR TD DIV==============================
            var insert_table_tbody_tr_td_div = document.createElement("div");
            insert_table_tbody_tr_td_div.setAttribute("class", "form-check");
            // Set (ROW)
            insert_table_tbody_tr_td.appendChild(insert_table_tbody_tr_td_div);
                // Create & Set (CELL CHECKBOX)
                var insert_detail_checkbox = document.createElement("input");
                insert_detail_checkbox.setAttribute("type", "checkbox");
                insert_detail_checkbox.setAttribute("id", "i-inputcheckbox--answer-hybridmultiple-clAsBody-" + (in_questionCount).toString() + "-" + (in_answerCount).toString());
                insert_detail_checkbox.setAttribute("class", "c-element--answer-hybridmultiple-checkbox form-check-input");
                insert_detail_checkbox.setAttribute("name", "answerhybridmultiple_clAsBody_checkbox_value");
                insert_detail_checkbox.required = false;
                // Set (ROW)
                insert_table_tbody_tr_td_div.appendChild(insert_detail_checkbox);
        // Insert for ANSWER TABLE BODY TR TD==============================
        var insert_table_tbody_tr_td = document.createElement("td");
        // Set To Table (ROW)
        insert_table_tbody_tr.appendChild(insert_table_tbody_tr_td);
                // Create & Set (CELL CONTENT)
                var insert_detail_answer = document.createElement("textarea");
                insert_detail_answer.setAttribute("id", "i-textarea--answer-hybridmultiple-clAsBody-" + (in_questionCount).toString() + "-" + (in_answerCount).toString());
                insert_detail_answer.setAttribute("class", "c-element--answer-hybridmultiple-content form-control card-text text-dark fs-5");
                insert_detail_answer.setAttribute("name", "answerhybridmultiple_clAsBody_value");
                insert_detail_answer.required = true;
                // Set (ROW)
                insert_table_tbody_tr_td.appendChild(insert_detail_answer);
        // Insert for ANSWER TABLE BODY TR TD==============================
        var insert_table_tbody_tr_td = document.createElement("td");
        // Set To Table (ROW)
        insert_table_tbody_tr.appendChild(insert_table_tbody_tr_td);
                // Create 'DELETE' Cell Content
                var insert_modify_deletebutton = document.createElement("input");
                insert_modify_deletebutton.setAttribute("type", "button");
                insert_modify_deletebutton.setAttribute("id", "i-inputbutton--answer-hybridmultiple-delete-" + (in_questionCount).toString() + "-" + (in_answerCount).toString());
                insert_modify_deletebutton.setAttribute("class", "btn btn-danger");
                insert_modify_deletebutton.setAttribute("name", "inputbutton_answerhybridmultiple_delete");
                insert_modify_deletebutton.setAttribute("value", "Delete");
                // Set (ROW)
                insert_table_tbody_tr_td.appendChild(insert_modify_deletebutton);
    
    // For Return
    inputElements_obj['answerHybridMultiple_row'] = insert_table_tbody_tr;
    inputElements_obj['answerHybridMultiple_clAsBody_checkbox'] = insert_detail_checkbox;
    inputElements_obj['answerHybridMultiple_clAsBody_label'] = insert_detail_answer;
    inputElements_obj['answerHybridMultiple_deletebutton'] = insert_modify_deletebutton;

    return inputElements_obj;
}

function displayQA(in_displayContainerID, in_itemCount) {
    var container_element = document.getElementById(in_displayContainerID);

    // Check if the container exists and is defined, if not, exit
    if(container_element === undefined || container_element === null) { return; }
    
    // Check if there are any rows in the fetched database table, if none, print this message and exit
    toggleEmptyText(in_itemCount, "i-div--qa-empty", in_displayContainerID);
    if(in_itemCount <= 0) { return; }
    
    // Insert Row for EXAM QUESTION==============================
    for(var question_count = 0; question_count < in_itemCount; question_count++) {
        var inputElementsQuestion_obj = baseQuestion(container_element.id, question_count+1);
        
        inputElementsQuestion_obj['question_clQsID_field'].innerHTML = curr_QA_data[question_count].clQsID;
        inputElementsQuestion_obj['question_clQsBody_field'].innerHTML = curr_QA_data[question_count].clQsBody;
        inputElementsQuestion_obj['question_deletebutton'].setAttribute("onclick", "modifyExam(this.name,'" + (inputElementsQuestion_obj['question_row'].id).toString() + "')");

        if(curr_tbExam_data.clExPublish == 0) { // If the Exam is NOT yet Published
            inputElementsQuestion_obj['question_clQsID_field'].disabled = false;
            inputElementsQuestion_obj['question_clQsBody_field'].disabled = false;
            inputElementsQuestion_obj['question_deletebutton'].disabled = false;
        }
        else if(curr_tbExam_data.clExPublish == 1) { // If the Exam is Published
            inputElementsQuestion_obj['question_clQsID_field'].disabled = true;
            inputElementsQuestion_obj['question_clQsBody_field'].disabled = true;
            inputElementsQuestion_obj['question_deletebutton'].disabled = true;
        }

        var container_answer_element = inputElementsQuestion_obj['answer_row'];

        if(curr_QA_data[question_count].clQsType == 0) { // 0 = Fill in the Blanks
            var inputElementsAnswer_obj = baseAnswerFillBlanks(container_answer_element.id, question_count+1, 1);

            // Answer(Blank)
            inputElementsAnswer_obj['answerFillBlanks_clAsBody_field'].innerHTML = curr_QA_data[question_count].tbAnswer_data[0].clAsBody;
            correctAnswerSelector(inputElementsAnswer_obj['answerFillBlanks_clAsBody_field']);

            if(curr_tbExam_data.clExPublish == 0) { // If the Exam is NOT yet Published
                inputElementsAnswer_obj['answerFillBlanks_clAsBody_field'].disabled = false;
            }
            else if(curr_tbExam_data.clExPublish == 1) { // If the Exam is Published
                inputElementsAnswer_obj['answerFillBlanks_clAsBody_field'].disabled = true;
            }
            
            inputElementsAnswer_obj = undefined;
        }
        else if(curr_QA_data[question_count].clQsType == 1) { // 1 = Hybrid Multiple Choice
            // Insert for ANSWER TABLE==============================
            var insert_table = document.createElement("table");
            insert_table.setAttribute("id", "i-table--question-answer-" + (question_count+1).toString());
            insert_table.setAttribute("class", "table table-hover table-bordered");
            // Set (ROW)
            container_answer_element.appendChild(insert_table);
                // Insert for ANSWER TABLE HEADER==============================
                var insert_table_thead = document.createElement("thead");
                insert_table_thead.setAttribute("id", "i-thead--question-answer-" + (question_count+1).toString());
                insert_table_thead.setAttribute("class", "fs-5");
                // Set To Table (ROW)
                insert_table.appendChild(insert_table_thead);
                    // Insert for ANSWER TABLE HEADER TR==============================
                    var insert_table_thead_tr = document.createElement("tr");
                    // Set (ROW)
                    insert_table_thead.appendChild(insert_table_thead_tr);
                        // Insert for ANSWER TABLE HEADER TR TH Correct==============================
                        var insert_table_thead_tr_th = document.createElement("th");
                        insert_table_thead_tr_th.setAttribute("scope", "col");
                        insert_table_thead_tr_th.innerHTML = "Correct";
                        // Set (ROW)
                        insert_table_thead_tr.appendChild(insert_table_thead_tr_th);
                        // Insert for ANSWER TABLE HEADER TR TH Choice==============================
                        var insert_table_thead_tr_th = document.createElement("th");
                        insert_table_thead_tr_th.setAttribute("scope", "col");
                        insert_table_thead_tr_th.innerHTML = "Choice";
                        // Set (ROW)
                        insert_table_thead_tr.appendChild(insert_table_thead_tr_th);
                        // Insert for ANSWER TABLE HEADER TR TH Action==============================
                        var insert_table_thead_tr_th = document.createElement("th");
                        insert_table_thead_tr_th.setAttribute("scope", "col");
                        insert_table_thead_tr_th.innerHTML = "Action";
                        // Set (ROW)
                        insert_table_thead_tr.appendChild(insert_table_thead_tr_th);

                // Insert for ANSWER TABLE BODY==============================
                var insert_table_tbody = document.createElement("tbody");
                insert_table_tbody.setAttribute("id", "i-tbody--question-answer-" + (question_count+1).toString());
                // Set To Table (ROW)
                insert_table.appendChild(insert_table_tbody);
                    for(var answer_count = 0; answer_count < curr_tbAnswer_data_length[question_count]; answer_count++) {
                        var inputElementsAnswer_obj = baseAnswerHybridMultiple(insert_table_tbody.id, question_count+1, answer_count+1);
                        
                        // Answer(Choices)
                        inputElementsAnswer_obj['answerHybridMultiple_clAsBody_label'].innerHTML = curr_QA_data[question_count].tbAnswer_data[answer_count].clAsBody;
                        inputElementsAnswer_obj['answerHybridMultiple_deletebutton'].setAttribute("onclick", "modifyExam(this.name,'" + (inputElementsAnswer_obj['answerHybridMultiple_row'].id).toString() + "')");
                        if((curr_QA_data[question_count].clQsCorrectAnswer).includes(curr_QA_data[question_count].tbAnswer_data[answer_count].clAsID)) {
                            correctAnswerSelector(inputElementsAnswer_obj['answerHybridMultiple_row']);
                            inputElementsAnswer_obj['answerHybridMultiple_clAsBody_checkbox'].checked = true;
                        }

                        if(curr_tbExam_data.clExPublish == 0) { // If the Exam is NOT yet Published
                            inputElementsAnswer_obj['answerHybridMultiple_clAsBody_checkbox'].disabled = false;
                            inputElementsAnswer_obj['answerHybridMultiple_clAsBody_label'].disabled = false;
                            inputElementsAnswer_obj['answerHybridMultiple_deletebutton'].disabled = false;
                        }
                        else if(curr_tbExam_data.clExPublish == 1) { // If the Exam is Published
                            inputElementsAnswer_obj['answerHybridMultiple_clAsBody_checkbox'].disabled = true;
                            inputElementsAnswer_obj['answerHybridMultiple_clAsBody_label'].disabled = true;
                            inputElementsAnswer_obj['answerHybridMultiple_deletebutton'].disabled = true;
                        }
                        
                        inputElementsAnswer_obj = undefined;
                    }

                // Insert for ANSWER TABLE FOOTER==============================
                var insert_table_tfoot = document.createElement("tfoot");
                insert_table_tfoot.setAttribute("id", "i-tfoot--question-answer-" + (question_count+1).toString());
                // Set To Table (ROW)
                insert_table.appendChild(insert_table_tfoot);
                    // Insert for ANSWER TABLE FOOTER TR==============================
                    var insert_table_tfoot_tr = document.createElement("tr");
                    // Set (ROW)
                    insert_table_tfoot.appendChild(insert_table_tfoot_tr);
                        // Insert for ANSWER TABLE FOOTER TR TD Add Another Answer==============================
                        var insert_table_tfoot_tr_td = document.createElement("td");
                        insert_table_tfoot_tr_td.setAttribute("colspan", "3");
                        // Set (ROW)
                        insert_table_tfoot_tr.appendChild(insert_table_tfoot_tr_td);
                            // Create 'ADD' Cell Content
                            var insert_modify_addbutton = document.createElement("input");
                            insert_modify_addbutton.setAttribute("type", "button");
                            insert_modify_addbutton.setAttribute("id", "i-inputbutton--exam-tbAnswer-add-" + (question_count+1).toString());
                            insert_modify_addbutton.setAttribute("class", "btn btn-primary");
                            insert_modify_addbutton.setAttribute("name", "inputbutton_answerhybridmultiple_add");
                            insert_modify_addbutton.setAttribute("value", "Add Another Choice");
                            insert_modify_addbutton.setAttribute("onclick", "modifyExam(this.name,'" + (insert_table_tbody.id).toString() + "')");
                            // Set (ROW)
                            insert_table_tfoot_tr_td.appendChild(insert_modify_addbutton);
                            
                if(curr_tbExam_data.clExPublish == 0) { // If the Exam is NOT yet Published
                    insert_modify_addbutton.disabled = false;
                }
                else if(curr_tbExam_data.clExPublish == 1) { // If the Exam is Published
                    insert_modify_addbutton.disabled = true;
                }
        }

        inputElementsQuestion_obj = undefined;
    }
}

function addDisplayQA(in_displayContainerID, in_itemCount, in_questionType) {
    var container_element = document.getElementById(in_displayContainerID);

    // Check if the container exists and is defined, if not, exit
    if(container_element === undefined || container_element === null) { return; }
    
    // Check if there are any rows in the fetched database table, if none, print this message and exit
    toggleEmptyText(in_itemCount, "i-div--qa-empty", in_displayContainerID);
    if(in_itemCount <= 0) { return; }

    isAddNewQuestionActive = true;
    
    // Insert Row for EXAM QUESTION==============================
    var inputElementsQuestion_obj = baseQuestion(container_element.id, in_itemCount);
    var questionTypeNum = null;
    var correctAnswer = [];
    
    tbQuestion_data_topID++;
    inputElementsQuestion_obj['question_clQsID_field'].innerHTML = tbQuestion_data_topID;
    inputElementsQuestion_obj['question_clQsBody_field'].innerHTML = "";
    inputElementsQuestion_obj['question_deletebutton'].setAttribute("onclick", "modifyExam(this.name,'" + (inputElementsQuestion_obj['question_row'].id).toString() + "')");

    inputElementsQuestion_obj['question_clQsID_field'].disabled = false;
    inputElementsQuestion_obj['question_clQsBody_field'].disabled = false;
    inputElementsQuestion_obj['question_deletebutton'].disabled = false;

    curr_tbAnswer_data_length.push(1);
    curr_tbAnswer_data_topID.push(1);
    correctAnswer.push(curr_tbAnswer_data_topID[curr_tbAnswer_data_topID.length-1]);

    var container_answer_element = inputElementsQuestion_obj['answer_row'];

    if((in_questionType.localeCompare("qa_add_fillblanks")) == 0) { // Fill in the Blanks
        var inputElementsAnswer_obj = baseAnswerFillBlanks(container_answer_element.id, in_itemCount, curr_tbAnswer_data_length[curr_tbAnswer_data_length.length-1]);

        isAddNewFillBlanksActive = true;
        
        // Answer(Blank)
        inputElementsAnswer_obj['answerFillBlanks_clAsBody_field'].innerHTML = "";
        correctAnswerSelector(inputElementsAnswer_obj['answerFillBlanks_clAsBody_field']);
        
        inputElementsAnswer_obj['answerFillBlanks_clAsBody_field'].disabled = false;

        questionTypeNum = 0;

        inputElementsAnswer_obj = undefined;
    }
    else if((in_questionType.localeCompare("qa_add_hybridmultiple")) == 0) { // Hybrid Multiple Choice
        // Insert for ANSWER TABLE==============================
        var insert_table = document.createElement("table");
        insert_table.setAttribute("id", "i-table--question-answer-" + (in_itemCount).toString());
        insert_table.setAttribute("class", "table table-hover table-bordered");
        // Set (ROW)
        container_answer_element.appendChild(insert_table);
            // Insert for ANSWER TABLE HEADER==============================
            var insert_table_thead = document.createElement("thead");
            insert_table_thead.setAttribute("id", "i-thead--question-answer-" + (in_itemCount).toString());
            insert_table_thead.setAttribute("class", "fs-5");
            // Set To Table (ROW)
            insert_table.appendChild(insert_table_thead);
                // Insert for ANSWER TABLE HEADER TR==============================
                var insert_table_thead_tr = document.createElement("tr");
                // Set (ROW)
                insert_table_thead.appendChild(insert_table_thead_tr);
                    // Insert for ANSWER TABLE HEADER TR TH Correct==============================
                    var insert_table_thead_tr_th = document.createElement("th");
                    insert_table_thead_tr_th.setAttribute("scope", "col");
                    insert_table_thead_tr_th.innerHTML = "Correct";
                    // Set (ROW)
                    insert_table_thead_tr.appendChild(insert_table_thead_tr_th);
                    // Insert for ANSWER TABLE HEADER TR TH Choice==============================
                    var insert_table_thead_tr_th = document.createElement("th");
                    insert_table_thead_tr_th.setAttribute("scope", "col");
                    insert_table_thead_tr_th.innerHTML = "Choice";
                    // Set (ROW)
                    insert_table_thead_tr.appendChild(insert_table_thead_tr_th);
                    // Insert for ANSWER TABLE HEADER TR TH Action==============================
                    var insert_table_thead_tr_th = document.createElement("th");
                    insert_table_thead_tr_th.setAttribute("scope", "col");
                    insert_table_thead_tr_th.innerHTML = "Action";
                    // Set (ROW)
                    insert_table_thead_tr.appendChild(insert_table_thead_tr_th);

            // Insert for ANSWER TABLE BODY==============================
            var insert_table_tbody = document.createElement("tbody");
            insert_table_tbody.setAttribute("id", "i-tbody--question-answer-" + (in_itemCount).toString());
            // Set To Table (ROW)
            insert_table.appendChild(insert_table_tbody);
                var inputElementsAnswer_obj = baseAnswerHybridMultiple(insert_table_tbody.id, in_itemCount, curr_tbAnswer_data_length[curr_tbAnswer_data_length.length-1]);
                
                isAddNewHybridMultipleActive = true;

                // Answer(Choices)
                inputElementsAnswer_obj['answerHybridMultiple_clAsBody_label'].innerHTML = "";
                inputElementsAnswer_obj['answerHybridMultiple_deletebutton'].setAttribute("onclick", "modifyExam(this.name,'" + (inputElementsAnswer_obj['answerHybridMultiple_row'].id).toString() + "')");
                
                correctAnswerSelector(inputElementsAnswer_obj['answerHybridMultiple_row']);
                inputElementsAnswer_obj['answerHybridMultiple_clAsBody_checkbox'].checked = true;
        
                inputElementsAnswer_obj['answerHybridMultiple_clAsBody_checkbox'].disabled = false;
                inputElementsAnswer_obj['answerHybridMultiple_clAsBody_label'].disabled = false;
                inputElementsAnswer_obj['answerHybridMultiple_deletebutton'].disabled = false;

                questionTypeNum = 1;
        
                inputElementsAnswer_obj = undefined;
            // Insert for ANSWER TABLE FOOTER==============================
            var insert_table_tfoot = document.createElement("tfoot");
            insert_table_tfoot.setAttribute("id", "i-tfoot--question-answer-" + (in_itemCount).toString());
            // Set To Table (ROW)
            insert_table.appendChild(insert_table_tfoot);
                // Insert for ANSWER TABLE FOOTER TR==============================
                var insert_table_tfoot_tr = document.createElement("tr");
                // Set (ROW)
                insert_table_tfoot.appendChild(insert_table_tfoot_tr);
                    // Insert for ANSWER TABLE FOOTER TR TD Add Another Answer==============================
                    var insert_table_tfoot_tr_td = document.createElement("td");
                    insert_table_tfoot_tr_td.setAttribute("colspan", "3");
                    // Set (ROW)
                    insert_table_tfoot_tr.appendChild(insert_table_tfoot_tr_td);
                        // Create 'ADD' Cell Content
                        var insert_modify_deletebutton = document.createElement("input");
                        insert_modify_deletebutton.setAttribute("type", "button");
                        insert_modify_deletebutton.setAttribute("id", "i-inputbutton--exam-tbAnswer-add-" + (in_itemCount).toString());
                        insert_modify_deletebutton.setAttribute("class", "btn btn-primary");
                        insert_modify_deletebutton.setAttribute("name", "inputbutton_answerhybridmultiple_add");
                        insert_modify_deletebutton.setAttribute("value", "Add Another Choice");
                        insert_modify_deletebutton.setAttribute("onclick", "modifyExam(this.name,'" + (insert_table_tbody.id).toString() + "')");
                        // Set (ROW)
                        insert_table_tfoot_tr_td.appendChild(insert_modify_deletebutton);
    }

    inputElementsQuestion_obj = undefined;

    if(questionTypeNum != null) {
        var curr_tbAnswer_data = [];

        // Save Answer to Array
        curr_tbAnswer_data.push({
            modifyType: 3, 
            clAsID: curr_tbAnswer_data_topID[curr_tbAnswer_data_topID.length-1], 
            clAsBody: ""
        });

        // Save Question to Array
        curr_QA_data.push({
            modifyType: 3, 
            clQsID: tbQuestion_data_topID, 
            clQsBody: "", 
            clQsType: questionTypeNum, 
            clQsCorrectAnswer: correctAnswer, 
            tbAnswer_data: curr_tbAnswer_data
        });
    }
}

function baseExamButtons(in_displayContainerID, in_questionCount) {
    var container_element = document.getElementById(in_displayContainerID);

    // For Return
    const inputElements_obj = {};

    // Create 'ADD QA' Button==============================
    // Create Main (ROW)
    var container_row_main = document.createElement("div");
    container_row_main.setAttribute("class", "row mt-3");
    // Insert Rows(CONTAINER)
    container_element.appendChild(container_row_main);
        // Create & Set (FILLER CELL)
        var container_row_filler = document.createElement("div");
        container_row_filler.setAttribute("class", "col-9");
        // Insert Rows(CONTAINER)
        container_row_main.appendChild(container_row_filler);

        // Create Sub 1 (ROW)
        var container_row_sub1 = document.createElement("div");
        container_row_sub1.setAttribute("class", "col-3");
        // Insert Rows(CONTAINER)
        container_row_main.appendChild(container_row_sub1);
            // Create 'ADD QA' (SELECT)
            var insert_modify_select = document.createElement("select");
            insert_modify_select.setAttribute("id", "i-select--exam-addqaselect");
            insert_modify_select.setAttribute("class", "btn btn-primary dropdown-toggle");
            insert_modify_select.setAttribute("name", "select_qa_add");
            // Insert Rows(CONTAINER)
            container_row_sub1.appendChild(insert_modify_select);
            // For Return
            inputElements_obj['exam_addqaselect'] = insert_modify_select;
                // Create '--Select Question Type--' (SELECT)
                var insert_modify_option = document.createElement("option");
                insert_modify_option.setAttribute("value", "qa_add_null");
                insert_modify_option.innerHTML = "--Select Question Type--";
                insert_modify_option.selected = true;
                // Insert Rows(CONTAINER)
                insert_modify_select.appendChild(insert_modify_option);

                // Create 'Fill in the Blanks' (SELECT)
                var insert_modify_option = document.createElement("option");
                insert_modify_option.setAttribute("value", "qa_add_fillblanks");
                insert_modify_option.innerHTML = "Fill in the Blanks";
                // Insert Rows(CONTAINER)
                insert_modify_select.appendChild(insert_modify_option);

                // Create 'Hybrid Multiple Choice' (SELECT)
                var insert_modify_option = document.createElement("option");
                insert_modify_option.setAttribute("value", "qa_add_hybridmultiple");
                insert_modify_option.innerHTML = "Hybrid Multiple Choice";
                // Insert Rows(CONTAINER)
                insert_modify_select.appendChild(insert_modify_option);

            // Create & Set (FILLER CELL)
            var container_row_filler = document.createElement("div");
            container_row_filler.setAttribute("class", "mt-3");
            // Insert Rows(CONTAINER)
            container_row_sub1.appendChild(container_row_filler);
            
            // Create 'ADD QA' (BUTTON)
            var insert_modify_button = document.createElement("input");
            insert_modify_button.setAttribute("type", "button");
            insert_modify_button.setAttribute("id", "i-inputbutton--exam-addqabutton");
            insert_modify_button.setAttribute("class", "btn btn-primary fs-3");
            insert_modify_button.setAttribute("name", "inputbutton_qa_add");
            insert_modify_button.setAttribute("value", "Add New Question");
            insert_modify_button.setAttribute("onclick", "modifyExam(this.name,null)");
            // Insert Rows(CONTAINER)
            container_row_sub1.appendChild(insert_modify_button);
            // For Return
            inputElements_obj['exam_addqabutton'] = insert_modify_button;

    // Create 'DELETE' Button==============================
    // Create Main (ROW)
    var container_row_main = document.createElement("div");
    container_row_main.setAttribute("class", "row mt-3");
    // Insert Rows(CONTAINER)
    container_element.appendChild(container_row_main);
        // Create & Set (FILLER CELL)
        var container_row_filler = document.createElement("div");
        container_row_filler.setAttribute("class", "col-9");
        // Insert Rows(CONTAINER)
        container_row_main.appendChild(container_row_filler);

        // Create Sub 1 (ROW)
        var container_row_sub1 = document.createElement("div");
        container_row_sub1.setAttribute("class", "col-3");
        // Insert Rows(CONTAINER)
        container_row_main.appendChild(container_row_sub1);
            // Create 'DELETE' (BUTTON)
            var insert_modify_button = document.createElement("input");
            insert_modify_button.setAttribute("type", "button");
            insert_modify_button.setAttribute("id", "i-inputbutton--exam-deletebutton");
            insert_modify_button.setAttribute("class", "btn btn-danger fs-3");
            insert_modify_button.setAttribute("name", "inputbutton_exam_delete");
            insert_modify_button.setAttribute("value", "Delete Exam");
            insert_modify_button.setAttribute("onclick", "modifyExam(this.name,null)");
            // Insert Rows(CONTAINER)
            container_row_sub1.appendChild(insert_modify_button);
            // For Return
            inputElements_obj['exam_delete'] = insert_modify_button;

    // Create 'UPDATE/SAVE' Button==============================
    // Create Main (ROW)
    var container_row_main = document.createElement("div");
    container_row_main.setAttribute("class", "row mt-3");
    // Insert Rows(CONTAINER)
    container_element.appendChild(container_row_main);
        // Create & Set (FILLER CELL)
        var container_row_filler = document.createElement("div");
        container_row_filler.setAttribute("class", "col-9");
        // Insert Rows(CONTAINER)
        container_row_main.appendChild(container_row_filler);

        // Create Sub 1 (ROW)
        var container_row_sub1 = document.createElement("div");
        container_row_sub1.setAttribute("class", "col-3");
        // Insert Rows(CONTAINER)
        container_row_main.appendChild(container_row_sub1);
            // Create 'UPDATE/SAVE' (BUTTON)
            var insert_modify_button = document.createElement("input");
            insert_modify_button.setAttribute("type", "submit");
            insert_modify_button.setAttribute("id", "i-inputsubmit--exam-updatebutton");
            insert_modify_button.setAttribute("class", "btn btn-primary fs-3");
            insert_modify_button.setAttribute("name", "inputsubmit_exam_update");
            insert_modify_button.setAttribute("value", "");
            // Insert Rows(CONTAINER)
            container_row_sub1.appendChild(insert_modify_button);
            // For Return
            inputElements_obj['exam_update'] = insert_modify_button;

    // Create 'PUBLISH' Button==============================
    // Create Main (ROW)
    var container_row_main = document.createElement("div");
    container_row_main.setAttribute("class", "row mt-3");
    // Insert Rows(CONTAINER)
    container_element.appendChild(container_row_main);
        // Create & Set (FILLER CELL)
        var container_row_filler = document.createElement("div");
        container_row_filler.setAttribute("class", "col-9");
        // Insert Rows(CONTAINER)
        container_row_main.appendChild(container_row_filler);

        // Create Sub 1 (ROW)
        var container_row_sub1 = document.createElement("div");
        container_row_sub1.setAttribute("class", "col-3");
        // Insert Rows(CONTAINER)
        container_row_main.appendChild(container_row_sub1);
            // Create 'PUBLISH' (BUTTON)
            var insert_modify_button = document.createElement("input");
            insert_modify_button.setAttribute("type", "button");
            insert_modify_button.setAttribute("id", "i-inputbutton--exam-publishbutton");
            insert_modify_button.setAttribute("class", "btn btn-primary fs-3");
            insert_modify_button.setAttribute("name", "inputbutton_exam_publish");
            insert_modify_button.setAttribute("value", "");
            insert_modify_button.setAttribute("onclick", "modifyExam(this.name,null)");
            // Insert Rows(CONTAINER)
            container_row_sub1.appendChild(insert_modify_button);
            // For Return
            inputElements_obj['exam_publish'] = insert_modify_button;

    return inputElements_obj;
}

function displayExamButtons(in_displayContainerID) {
    var container_element = document.getElementById(in_displayContainerID);

    // Check if the container exists and is defined, if not, exit
    if(container_element === undefined || container_element === null) { return; }
    
    // Insert Row for EXAM QUESTION==============================
    var inputElementsQuestion_obj = baseExamButtons(container_element.id);
    
    if(curr_tbExam_data.clExPublish == 0) { // If the Exam is NOT yet Published
        inputElementsQuestion_obj['exam_publish'].setAttribute("value", "Publish");
        inputElementsQuestion_obj['exam_addqaselect'].disabled = false;
        inputElementsQuestion_obj['exam_addqabutton'].disabled = false;
        inputElementsQuestion_obj['exam_delete'].disabled = false;
        inputElementsQuestion_obj['exam_update'].disabled = false;
        inputElementsQuestion_obj['exam_publish'].disabled = false;
    }
    else if(curr_tbExam_data.clExPublish == 1) { // If the Exam is Published
        inputElementsQuestion_obj['exam_publish'].setAttribute("value", "Published");
        inputElementsQuestion_obj['exam_addqaselect'].disabled = true;
        inputElementsQuestion_obj['exam_addqabutton'].disabled = true;
        inputElementsQuestion_obj['exam_delete'].disabled = true;
        inputElementsQuestion_obj['exam_update'].disabled = true;
        inputElementsQuestion_obj['exam_publish'].disabled = true;
    }
    
    if(examID == 0) { // If the Exam is a new Exam
        inputElementsQuestion_obj['exam_update'].setAttribute("value", "Save Exam");
    }
    else { // If the Exam is an existing Exam
        inputElementsQuestion_obj['exam_update'].setAttribute("value", "Update Exam");
    }
}

function deleteAnswer(in_questionIndex,in_answerIndex) {
    if((curr_QA_data[in_questionIndex].clQsCorrectAnswer).includes(curr_QA_data[in_questionIndex].tbAnswer_data[in_answerIndex].clAsID)) {
        var in_correctAnswerIndex = (curr_QA_data[in_questionIndex].clQsCorrectAnswer).findIndex(function (in_clAsID) {
            return in_clAsID == curr_QA_data[in_questionIndex].tbAnswer_data[in_answerIndex].clAsID;
        });
        
        (curr_QA_data[in_questionIndex].clQsCorrectAnswer).splice(in_correctAnswerIndex,1);
        curr_QA_data[in_questionIndex].modifyType = 1;
    }

    if(curr_QA_data[in_questionIndex].tbAnswer_data[in_answerIndex].modifyType == 3) { // If the modifyType is (3 = Add), then remove that from the save array
        // Delete row from save array
        if(curr_tbAnswer_data_topID[in_questionIndex] == curr_QA_data[in_questionIndex].tbAnswer_data[in_answerIndex].clAsID){
            curr_tbAnswer_data_length[in_questionIndex]--;
            curr_tbAnswer_data_topID[in_questionIndex]--;
        }

        (curr_QA_data[in_questionIndex].tbAnswer_data).splice(in_answerIndex,1);

        isAddNewHybridMultipleActive = false;
    }
    else {
        curr_QA_data[in_questionIndex].tbAnswer_data[in_answerIndex].clAsBody = null;
        
        if(curr_QA_data[in_questionIndex].tbAnswer_data[in_answerIndex].modifyType != 2) { // If the modifyType is NOT (1 = Update), then set it to (1 = Update)
            curr_QA_data[in_questionIndex].tbAnswer_data[in_answerIndex].modifyType = 2;
        }
    }
}

function setSaveArrayModifyType(in_modifyTypeValue) {
    curr_tbExam_data.modifyType = in_modifyTypeValue;

    curr_QA_data.forEach(function (in_question_data) {
        in_question_data.modifyType = in_modifyTypeValue;
        (in_question_data.tbAnswer_data).forEach(function (in_answer_data) {
            in_answer_data.modifyType = in_modifyTypeValue;
        });
    });
}

function setPublishStatus(in_setDisabledStatus) {
    var examPublishedBy_element = document.getElementById("i-label--exameditor-examPublishedBy");
    var examPublishStatus_element = document.getElementById('i-label--exameditor-examPublish');
    var examPublishButton_element = document.getElementById('i-inputbutton--exam-publishbutton');
    var input_elements = [];
    input_elements = input_elements.concat(Array.prototype.slice.call((document.getElementById('i-div--examinfo-display')).getElementsByTagName('textarea')));
    input_elements = input_elements.concat(Array.prototype.slice.call((document.getElementById('i-div--qa-display')).getElementsByTagName('input')));
    input_elements = input_elements.concat(Array.prototype.slice.call((document.getElementById('i-div--qa-display')).getElementsByTagName('textarea')));
    input_elements = input_elements.concat(Array.prototype.slice.call((document.getElementById('i-div--exambuttons-display')).getElementsByTagName('select')));
    input_elements = input_elements.concat(Array.prototype.slice.call((document.getElementById('i-div--exambuttons-display')).getElementsByTagName('input')));

    curr_tbExam_data.clExPublishedBy = curr_clUrID_value;
    examPublishedBy_element.innerHTML = curr_clUrUsername_value;

    if(in_setDisabledStatus) {
        curr_tbExam_data.clExPublish = 1;
        examPublishStatus_element.innerHTML = "Published";
        examPublishButton_element.setAttribute("value", "Published");
    }
    else {
        curr_tbExam_data.clExPublish = 0;
        examPublishStatus_element.innerHTML = "Editable";
        examPublishButton_element.setAttribute("value", "Publish");
    }

    for(var element_count = 0; element_count < input_elements.length; element_count++) {
        input_elements[element_count].disabled = in_setDisabledStatus;
    }

    // Pass to '../crud/admin_exameditor_update.php' for Database Insertion
    $(document).ready(function(){
        $.ajax({
            url: "../crud/admin_exameditor_update.php", 
            type: "POST", 
            data: {
                clExID_ajax: curr_tbExam_data.clExID, 
                clExPublish_ajax: curr_tbExam_data.clExPublish, 
                clExPublishedBy_ajax: curr_tbExam_data.clExPublishedBy, 
                updateType_ajax: 2
            }, 
            // contentType: false, 
            // processData: false, 
            // async: false, 
            cache: false, 
            success: function(data) {
                // alert(data);
                alert('SUCCESS: Exam published.');
                setSaveArrayModifyType(0);
            }, 
            error: function(data) {
                // alert(data);
                alert('ERROR: An error occured while saving the Exam.');
            }
        });
    });
}

function transferExamData(in_resetModifyTypeValue,in_updateType) {
    // Pass to '../crud/admin_exameditor_update.php' for Database Insertion
    $(document).ready(function(){
        $.ajax({
            url: "../crud/admin_exameditor_update.php", 
            type: "POST", 
            data: {
                curr_tbExam_data_ajax: curr_tbExam_data, 
                curr_QA_data_ajax: curr_QA_data, 
                updateType_ajax: in_updateType
            }, 
            // contentType: false, 
            // processData: false, 
            // async: false, 
            cache: false, 
            success: function(data) {
                // alert(data);
                
                if(in_resetModifyTypeValue == true) {
                    alert('SUCCESS: Exam saved.');
                    setSaveArrayModifyType(0);
                }
                else if(in_resetModifyTypeValue == false) {
                    alert('SUCCESS: Exam deleted.');
                    Object.keys(curr_tbExam_data).forEach(function(in_index) { delete curr_tbExam_data[in_index] })
                    curr_QA_data = [];
                }
            }, 
            error: function(data) {
                // alert(data);
                alert('ERROR: An error occured while saving the Exam.');
            }
        });
    });
}

// This function is copied from transferExamData()
function tempDeleteQuestion(in_resetModifyTypeValue,in_updateType) {
    // Pass to '../crud/admin_exameditor_update.php' for Database Insertion
    $(document).ready(function(){
        $.ajax({
            url: "../crud/admin_exameditor_update.php", 
            type: "POST", 
            data: {
                curr_tbExam_data_ajax: curr_tbExam_data, 
                curr_QA_data_ajax: curr_QA_data, 
                updateType_ajax: in_updateType
            }, 
            // contentType: false, 
            // processData: false, 
            // async: false, 
            cache: false, 
            success: function(data) {
                // alert(data);
                
            if(in_resetModifyTypeValue == false) {
                    alert('Question deleted successfully.');
                    Object.keys(curr_tbExam_data).forEach(function(in_index) { delete curr_tbExam_data[in_index] })
                    curr_QA_data = [];
                }
            }, 
            error: function(data) {
                // alert(data);
                alert('ERROR: An error occured while saving the Exam.');
            }
        });
    });
}

function modifyExam(in_buttonName, in_elementID) {
    // =====Add=====
    if((in_buttonName.localeCompare("inputbutton_qa_add")) == 0) { // Add Question and Answers
        var select_element = document.getElementById("i-select--exam-addqaselect");

        // If No Type of Question is selected, exit
        if(((select_element.value).localeCompare("qa_add_null")) == 0) { return; }

        if(isAddNewQuestionActive == true || isAddNewFillBlanksActive == true || isAddNewHybridMultipleActive == true) { // Limit newly added questions to 1 only.
            alert("Fill up or delete the newly added question and its answers first before adding a new one.");
            return;
        }

        tbQuestion_data_length++;
        addDisplayQA("i-div--qa-display", tbQuestion_data_length, select_element.value);

        totalQuestionCount++;
        toggleEmptyText(totalQuestionCount, "i-div--qa-empty", "i-div--qa-display");
    }
    else if((in_buttonName.localeCompare("inputbutton_answerhybridmultiple_add")) == 0) { // Add Hybrid Multiple Choice Answer
        if(isAddNewHybridMultipleActive == true) { // Limit newly added Hybrid Multiple Choice Answer to 1 only.
            alert("Fill up or delete the newly added Hybrid Multiple Choice first before adding a new one.");
            return;
        }

        var qa_elementRow = document.getElementById(in_elementID);
        var qa_elementRowID = qa_elementRow.id;
        var qa_saveArrayIndex = Number(qa_elementRowID.substring(qa_elementRowID.lastIndexOf("-")+1)) - 1;
        
        curr_tbAnswer_data_length[qa_saveArrayIndex]++;
        curr_tbAnswer_data_topID[qa_saveArrayIndex]++;

        var inputElementsAnswer_obj = baseAnswerHybridMultiple(in_elementID, qa_saveArrayIndex + 1, curr_tbAnswer_data_length[qa_saveArrayIndex]);
        
        // Answer(Choices)
        inputElementsAnswer_obj['answerHybridMultiple_clAsBody_label'].innerHTML = "";
        inputElementsAnswer_obj['answerHybridMultiple_deletebutton'].setAttribute("onclick", "modifyExam(this.name,'" + (inputElementsAnswer_obj['answerHybridMultiple_row'].id).toString() + "')");
        
        inputElementsAnswer_obj = undefined;
        
        isAddNewHybridMultipleActive = true;

        // Save Answer to Question Array
        (curr_QA_data[qa_saveArrayIndex].tbAnswer_data).push({
            modifyType: 3, 
            clAsID: curr_tbAnswer_data_topID[qa_saveArrayIndex], 
            clAsBody: ""
        });
    }
    // =====Delete=====
    else if((in_buttonName.localeCompare("inputbutton_exam_delete")) == 0) { // Delete Exam
        curr_tbExam_data.clExLastEditedBy = curr_clUrID_value;

        setSaveArrayModifyType(2);
        transferExamData(false,1);
        
        window.location = "../webadmin/AdminExamList.php";
    }
    else if((in_buttonName.localeCompare("inputbutton_qa_delete")) == 0) { // Delete Question and Answers
        var qa_elementRow = document.getElementById(in_elementID);
        var qa_elementRowID = qa_elementRow.id;
        var qa_saveArrayIndex = Number(qa_elementRowID.substring(qa_elementRowID.lastIndexOf("-")+1)) - 1;
        var qa_modifyType = curr_QA_data[qa_saveArrayIndex].modifyType;
        
        for(answer_count = 0; answer_count < (curr_QA_data[qa_saveArrayIndex].tbAnswer_data).length; answer_count++) {
            deleteAnswer(qa_saveArrayIndex,answer_count);
        }

        if(qa_modifyType == 3) { // If the modifyType is NOT (1 = Update), then remove that from the save array
            if(tbQuestion_data_topID == curr_QA_data[qa_saveArrayIndex].clQsID){
                tbQuestion_data_length--;
                tbQuestion_data_topID--;
            }
            
            // Delete row from save array
            curr_QA_data.splice(qa_saveArrayIndex,1);

            curr_tbAnswer_data_length.splice(qa_saveArrayIndex,1);
            curr_tbAnswer_data_topID.splice(qa_saveArrayIndex,1);
            
            isAddNewQuestionActive = false;
            isAddNewFillBlanksActive = false;
        }
        else {
            for(var answer_count = 0; answer_count < (curr_QA_data[qa_saveArrayIndex].clQsCorrectAnswer).length; answer_count++) {
                curr_QA_data[qa_saveArrayIndex].clQsCorrectAnswer[answer_count].modifyType = 2;
                curr_QA_data[qa_saveArrayIndex].clQsCorrectAnswer[answer_count].clAsID = null;
                curr_QA_data[qa_saveArrayIndex].clQsCorrectAnswer[answer_count].clAsBody = null;
            }

            curr_QA_data[qa_saveArrayIndex].clQsBody = null;
            curr_QA_data[qa_saveArrayIndex].clQsType = null;
            curr_QA_data[qa_saveArrayIndex].clQsCorrectAnswer = null;
            
            if(curr_QA_data[qa_saveArrayIndex].modifyType != 2) { // If the modifyType is NOT (1 = Update), then set it to (1 = Update)
                curr_QA_data[qa_saveArrayIndex].modifyType = 2;
            }
        }

        totalQuestionCount--;
        toggleEmptyText(totalQuestionCount, "i-div--qa-empty", "i-div--qa-display");
        
        tempDeleteQuestion(false,0); // <--Temporary delete question, came from delete function exam
        
        // Delete in_element
        $(qa_elementRow).remove();
        
    }
    else if((in_buttonName.localeCompare("inputbutton_answerhybridmultiple_delete")) == 0) { // Delete Hybrid Multiple Choice Answer
        var answerHybridMultiple_elementRow = document.getElementById(in_elementID);
        var answerHybridMultiple_elementRowID = answerHybridMultiple_elementRow.id;
        var qa_saveArrayIndex = Number(answerHybridMultiple_elementRowID.slice(answerHybridMultiple_elementRowID.lastIndexOf("-",answerHybridMultiple_elementRowID.lastIndexOf("-")-1)+1,answerHybridMultiple_elementRowID.lastIndexOf("-"))) - 1;
        var answerHybridMultiple_saveArrayIndex = Number(answerHybridMultiple_elementRowID.substring(answerHybridMultiple_elementRowID.lastIndexOf("-")+1)) - 1;

        // If there are only 1 choice left on this question type (Hybrid Multiple Choice), alert user and return because there must be at least 1 choice left.
        // To determine if there are 1 choice left, check the total number of choices/row on the save array with the 'modifyType' values of either (0 = No Change), (1 = Update), or (3 = Add).
        // If the total sums only to 1, that means it is the last choice on the specific question.
        if(((curr_QA_data[qa_saveArrayIndex].tbAnswer_data).filter(function (in_code) { return (in_code.modifyType==0)||(in_code.modifyType==1)||(in_code.modifyType==3); })).length == 1) {
            alert("You can't delete this choice. There must be at least 1 choice for this Question Type.");
            return;
        }
        
        deleteAnswer(qa_saveArrayIndex,answerHybridMultiple_saveArrayIndex);

        // Delete in_element
        $(answerHybridMultiple_elementRow).remove();
        
    }
    // =====Update=====
    else if((in_buttonName.localeCompare("form_exam")) == 0) { // Update Exam (Form name = "form_exam"; Button name = "inputsubmit_exam_update")
        var emptyCorrectAnswerQAID = "";
        var toModifyCount = 0;
        var examLastEditedBy_element = document.getElementById("i-label--exameditor-examLastEditedBy");
        var examUpdateButton_element = document.getElementById('i-inputsubmit--exam-updatebutton');
        
        if(curr_QA_data.length == 0) { // Check if there is anything to edit
            alert("Add at least one Question.");
            return;
        }

        for(var qa_saveArrayIndex = 0; qa_saveArrayIndex < curr_QA_data.length; qa_saveArrayIndex++) {
            if((curr_QA_data[qa_saveArrayIndex].clQsCorrectAnswer).length == 0) { // Limit newly added Hybrid Multiple Choice Answer to 1 only.
                emptyCorrectAnswerQAID = emptyCorrectAnswerQAID.concat("\n" + "Question ID #" + curr_QA_data[qa_saveArrayIndex].clQsID);
            }
        }
        
        if(emptyCorrectAnswerQAID.localeCompare("") != 0) {
            alert("Select at least one(1) correct choice/answer from the following Hybrid Multiple Choice questions first before updating the Exam: " + emptyCorrectAnswerQAID);
            return;
        }
        
        
        if((curr_tbExam_data.modifyType==1)||(curr_tbExam_data.modifyType==2)||(curr_tbExam_data.modifyType==3)) { toModifyCount++; }
        console.log(curr_tbExam_data.clExPrice)
        console.log(curr_tbExam_data.modifyType)
        for(var question_count = 0; question_count < curr_QA_data.length; question_count++) {
            if((curr_QA_data[question_count].modifyType==1)||(curr_QA_data[question_count].modifyType==2)||(curr_QA_data[question_count].modifyType==3)) { toModifyCount++; }
            
            for(var answer_count = 0; answer_count < (curr_QA_data[question_count].tbAnswer_data).length; answer_count++) {
                if((curr_QA_data[question_count].tbAnswer_data[answer_count].modifyType==1)||(curr_QA_data[question_count].tbAnswer_data[answer_count].modifyType==2)||(curr_QA_data[question_count].tbAnswer_data[answer_count].modifyType==3)) { toModifyCount++; }
            }
        }

        if(toModifyCount == 0) { // Check if there is anything to edit
            alert("Nothing to Change on the Database.");
            return;
        }

        curr_tbExam_data.clExLastEditedBy = curr_clUrID_value;
        examLastEditedBy_element.innerHTML = curr_clUrUsername_value;

        if(examID == 0) { // If the Exam is a new Exam
            transferExamData(true,1);
            examUpdateButton_element.setAttribute("value", "Update Exam");
        }
        else {
            transferExamData(true,0);
        }
    }
    // =====Publish=====
    else if((in_buttonName.localeCompare("inputbutton_exam_publish")) == 0) { // Publish Exam
        if(curr_tbExam_data.clExLastEditedBy == null) {
            alert("Save the Exam First before Publishing it.");
            return;
        }

        setPublishStatus(true);
    }
}

// ============================CALLS============================
displayExamInfo("i-div--examinfo-display");
addEmptyText("i-div--qa-empty");
if(examID != 0) { // If the Exam is a new Exam(examID is NOT 0), retrieve contents from database(aka Edit Existing Exam), otherwise do not display anything(aka Add/Create New Exam)
    displayQA("i-div--qa-display", tbQuestion_data_length);
}
else {
    toggleEmptyText(0, "i-div--qa-empty", "i-div--qa-display");
}
displayExamButtons("i-div--exambuttons-display");

// ============================Textarea Enter Key Avoider============================
$(
    '[name="clExID_value"],[name="clExName_value"],[name="clExDescription_value"],[name="clExInstructions_value"], [name="clExPrice_value"]'
).bind('keypress', function(e) {
    if ((e.keyCode || e.which) == 13) {
        $(this).parents('form').submit();
        return false;
    }
});

// ============================Save Content of Field(Filled/Empty) for Exam Information(Body)============================
$('#i-div--examinfo-display').on('blur', '[name="clExName_value"],[name="clExDescription_value"],[name="clExInstructions_value"], [name="clExPrice_value"]', function() {
    
    var fieldName = $(this).attr('name');
    var examInfoName = (fieldName).substring(0,(fieldName).indexOf('_'));

    

    if(((curr_tbExam_data[examInfoName]).localeCompare($(this).val())) != 0) { // If Field Content is not the same from the saved array, save it
        curr_tbExam_data[examInfoName] = $(this).val();
        
        if((curr_tbExam_data.modifyType != 1) && (curr_tbExam_data.modifyType != 3)) { // If the modifyType is NOT (1 = Update) and (3 = Add), then set it to (1 = Update)
            curr_tbExam_data.modifyType = 1;
        }
    }
});

// ============================Save Content of Field(Filled/Empty) for Questions(Question Body)============================
$('#i-div--qa-display').on('blur', '[name="clQsBody_value"]', function() {
    var fieldID = $(this).attr('id');
    var qa_saveArrayIndex = Number(fieldID.substring(fieldID.lastIndexOf("-")+1)) - 1;

    if(((("").localeCompare($(this).val())) != 0) && ((("\n").localeCompare($(this).val())) != 0)) {
        isAddNewQuestionActive = false;
    }
    
    if(((curr_QA_data[qa_saveArrayIndex].clQsBody).localeCompare($(this).val())) != 0) { // If Field Content is not the same from the saved array, save it
        curr_QA_data[qa_saveArrayIndex].clQsBody = $(this).val();

        if((curr_QA_data[qa_saveArrayIndex].modifyType != 1) && (curr_QA_data[qa_saveArrayIndex].modifyType != 3)) { // If the modifyType is NOT (1 = Update) and (3 = Add), then set it to (1 = Update)
            curr_QA_data[qa_saveArrayIndex].modifyType = 1;
        }
    }
});

// ============================Change Color of Field(Filled/Empty(Correct Answer)) for Fill in the Blanks(Answer Body)============================
$('#i-div--qa-display').on('input propetychange', 'textarea.c-element--answer-fillblanks-content', function() {
    var fieldID = $(this).attr('id');
    var answerFillBlanks_fieldElement = document.getElementById(fieldID);

    if($.trim($(this).val())) { // Not Empty
        correctAnswerSelector(answerFillBlanks_fieldElement);
    }
    else { // Empty
        correctAnswerDeselector(answerFillBlanks_fieldElement);
    }
});

// ============================Save Content of Field(Filled/Empty(Correct Answer)) for Fill in the Blanks(Answer Body) & Hybrid Multiple Choice(Answer Body)============================
$('#i-div--qa-display').on('blur', 'textarea.c-element--answer-fillblanks-content,textarea.c-element--answer-hybridmultiple-content', function() {
    var fieldID = $(this).attr('id');
    var qa_saveArrayIndex = Number(fieldID.slice(fieldID.lastIndexOf("-",fieldID.lastIndexOf("-")-1)+1,fieldID.lastIndexOf("-"))) - 1;
    var answer_saveArrayIndex = Number(fieldID.substring(fieldID.lastIndexOf("-")+1)) - 1;
    
    if(((("").localeCompare($(this).val())) != 0) && ((("\n").localeCompare($(this).val())) != 0)) {
        if((("answerfillblanks_clAsBody_value").localeCompare($(this).attr('name'))) == 0) {
            isAddNewFillBlanksActive = false;
        }
        else if((("answerhybridmultiple_clAsBody_value").localeCompare($(this).attr('name'))) == 0) {
            isAddNewHybridMultipleActive = false;
        }
    }

    if(((curr_QA_data[qa_saveArrayIndex].tbAnswer_data[answer_saveArrayIndex].clAsBody).localeCompare($(this).val())) != 0) { // If Field Content is not the same from the saved array, save it
        curr_QA_data[qa_saveArrayIndex].tbAnswer_data[answer_saveArrayIndex].clAsBody = $(this).val();

        if((curr_QA_data[qa_saveArrayIndex].tbAnswer_data[answer_saveArrayIndex].modifyType != 1) && (curr_QA_data[qa_saveArrayIndex].tbAnswer_data[answer_saveArrayIndex].modifyType != 3)) { // If the modifyType is NOT (1 = Update) and (3 = Add), then set it to (1 = Update)
            curr_QA_data[qa_saveArrayIndex].tbAnswer_data[answer_saveArrayIndex].modifyType = 1;
        }
    }
});

// ============================Change Color & Set of Checkbox(Checked/Unchecked(Correct Answer)) for Hybrid Multiple Choice(Answer Checkbox)============================
$('#i-div--qa-display').on('change', 'input.c-element--answer-hybridmultiple-checkbox', function() {
    var checkboxID = $(this).attr('id');
    var qa_saveArrayIndex = Number(checkboxID.slice(checkboxID.lastIndexOf("-",checkboxID.lastIndexOf("-")-1)+1,checkboxID.lastIndexOf("-"))) - 1;
    var answerHybridMultiple_saveArrayIndex = Number(checkboxID.substring(checkboxID.lastIndexOf("-")+1)) - 1;
    var answerHybridMultiple_rowElement = document.getElementById("i-div--answer-hybridmultiple-" + (qa_saveArrayIndex+1) + "-" + (answerHybridMultiple_saveArrayIndex+1));
    
    var correctAnswerHybridMultiple_saveArrayIndex = (curr_QA_data[qa_saveArrayIndex].clQsCorrectAnswer).findIndex(function (in_clAsID) {
        return in_clAsID == curr_QA_data[qa_saveArrayIndex].tbAnswer_data[answerHybridMultiple_saveArrayIndex].clAsID;
    });

    if((this.checked == true) && (correctAnswerHybridMultiple_saveArrayIndex == -1)) { // Checked & Doesn't Exist Yet on Save Array
        correctAnswerSelector(answerHybridMultiple_rowElement);
        
        (curr_QA_data[qa_saveArrayIndex].clQsCorrectAnswer).push(curr_QA_data[qa_saveArrayIndex].tbAnswer_data[answerHybridMultiple_saveArrayIndex].clAsID);
    }
    else if((this.checked == false) && (correctAnswerHybridMultiple_saveArrayIndex != -1)) { // Not Checked & Exists on Save Array
        correctAnswerDeselector(answerHybridMultiple_rowElement);

        (curr_QA_data[qa_saveArrayIndex].clQsCorrectAnswer).splice(correctAnswerHybridMultiple_saveArrayIndex,1);
    }
    else { // Exit if failed
        return;
    }

    if((curr_QA_data[qa_saveArrayIndex].modifyType != 1) && (curr_QA_data[qa_saveArrayIndex].modifyType != 3)) { // If the modifyType is NOT (1 = Update) and (3 = Add), then set it to (1 = Update)
        curr_QA_data[qa_saveArrayIndex].modifyType = 1;
    }
});

