const replyButton = document.querySelectorAll(".thread-reply-button");
const replySubmitButton = document.querySelectorAll(".thread-reply-submit-button");


const displayReplyGroup = function(threadNumber) {
    const thisReplyGroup = document.querySelector(".thread" + threadNumber + "-reply-input-group");
    const thisThread = document.querySelector(".thread" + threadNumber);    
    if(window.innerWidth < 900) {
        thisReplyGroup.style.gridColumn = 1;
        thisReplyGroup.style.gridRow = 6;
    } else {
        thisReplyGroup.style.gridColumn = 2;
        thisReplyGroup.style.gridRow = 4;
    }
    thisReplyGroup.style.display = "flex";
}
const hideReplyDiv = function(threadNumber) {
    const thisReplyGroup = document.querySelector(".thread" + threadNumber + "-reply-input-group");
    thisReplyGroup.style.display = "none";
}
const getNumberOfGridRows = function(thisThread) {    
    const style = window.getComputedStyle(thisThread);
    let gridTemplateRows = style.getPropertyValue('grid-template-rows');    
    let rows = gridTemplateRows.split(' ').length; 
    return rows;
}
const increaseGridSize = function(threadNumber) {
    const thisThread = document.querySelector(".thread" + threadNumber);    
    let rows = getNumberOfGridRows(thisThread);
    rows = rows + 1;
    let gridTemplateRows = "";
    for(let i = 0; i < rows; i++) {
        gridTemplateRows = gridTemplateRows + "auto ";
    }
    //remove space at end
    gridTemplateRows = gridTemplateRows.trimEnd();
    console.log(gridTemplateRows);
    thisThread.style.gridTemplateRows = gridTemplateRows;    
}
const decreaseGridSize = function(threadNumber) {
    const thisThread = document.querySelector(".thread" + threadNumber);    
    let rows = getNumberOfGridRows(thisThread);
    rows = rows - 1;
    console.log(rows);
    let gridTemplateRows = "";
    for(let i = 0; i < rows; i++) {
        gridTemplateRows = gridTemplateRows + "auto ";
    }
    //remove space at end
    gridTemplateRows = gridTemplateRows.trimEnd();
    console.log(gridTemplateRows);
    thisThread.style.gridTemplateRows = gridTemplateRows;
}
const moveThreadNumToBottom = function(threadNumber) {
    //moves threadnum element to the last row
    const thisThread = document.querySelector(".thread" + threadNumber); 
    let rows = getNumberOfGridRows(thisThread);    
    const threadNumberElement = document.querySelector(".thread" + threadNumber + "-id");
    threadNumberElement.style.gridRow = rows;
}
const moveBinToBottom = function(threadNumber) {
    const thisThread = document.querySelector(".thread" + threadNumber); 
    let rows = getNumberOfGridRows(thisThread);    
    const garbageButtonElement = document.querySelector(".thread" + threadNumber + "-garbage-button");
    garbageButtonElement.style.gridRow = rows;
}
const extendReplyThings = function(threadNumber) {
    increaseGridSize(threadNumber);
    displayReplyGroup(threadNumber);
    moveThreadNumToBottom(threadNumber);
    moveBinToBottom(threadNumber);
}
const moveBinUp = function(threadNumber) {
    const garbageButtonElement = document.querySelector(".thread" + threadNumber + "-garbage-button");
    garbageButtonElement.style.gridRow = 3;
}
const moveThreadNumberUp = function(threadNumber) {
    const threadNumberElement = document.querySelector(".thread" + threadNumber + "-id");
    threadNumberElement.style.gridRow = 3;
}
const hideReplyThings = function(threadNumber) {
    moveBinUp(threadNumber);
    moveThreadNumberUp(threadNumber);    
    decreaseGridSize(threadNumber);
    hideReplyDiv(threadNumber);    
}
const replyButtonClick = function() {    
    //get the reply extended state
    const threadNumber = this.dataset.threadnumber;
    const replyDiv = document.querySelector(".thread"+ threadNumber +"-reply-input-group");    
    let replyDivExtendedState = replyDiv.dataset.replydivextended;
    //convert to boolean
    replyDivExtendedState = JSON.parse(replyDivExtendedState);    
    if(replyDivExtendedState) {        
        hideReplyThings(threadNumber);        
        replyDivExtendedState = false;
        //set the value on html
        replyDiv.dataset.replydivextended = replyDivExtendedState;        
    } else {        
        extendReplyThings(threadNumber);
        replyDivExtendedState = true;
        //set the value on html
        replyDiv.dataset.replydivextended = replyDivExtendedState;        
    }
}
const replySubmitButtonClick = function() {    
    const threadNumber = this.dataset.threadnumber;
    console.log("Thread number:" + threadNumber);
    //window.location.href = "./PHP/submit-reply.php?id="+ threadNumber;
}
//make an event listener for each reply button
for(i = 0; i < replyButton.length; i++) {
    replyButton[i].addEventListener('click', replyButtonClick);
}
//make an event listener for each submit button
for(i = 0; i < replySubmitButton.length; i++) {
    replySubmitButton[i].addEventListener('click', replySubmitButtonClick);
}
