function docReady(fn) {
    if (document.readyState === "complete" || document.readyState === "interactive") {
        setTimeout(fn(), 1);
    } else {
        document.addEventListener("DOMContentLoaded", fn);
    }
}



var dualColRowInput = `
<li>
    <div class="row">
        <div class="col-sm-12 col-md">
            <textarea type="textarea" placeholder="magyar" class="form-control"></textarea>
        </div>
        <div class="col-sm-12 col-md">
            <textarea type="textarea" placeholder="angol" class="form-control"></textarea>
        </div>
    </div>
</li>
`

function getDualColRowInput(id, className='', eventlistenerType='', eventlistenerFunc=''){
    var firstNode = '<li ' + 'class="' + id + '">'
    var fullNode = firstNode + `
        <div class="row">
            <div class="col-sm-12 col-md">
                <textarea type="textarea" placeholder="magyar" class="form-control ${className}"></textarea>
            </div>
            <div class="col-sm-12 col-md">
                <textarea type="textarea" placeholder="angol" class="form-control ${className}"></textarea>
            </div>
        </div>
    </li>
    `
    return fullNode
}
function getSingleColRowInput(id, placeholder="magyar", classname=''){
    var firstNode = '<li ' + 'class="' + id + '">'
    var fullNode = firstNode + `
        <div class="row">
            <div class="col-sm-12 col-md">
                <input type="text" placeholder="${placeholder}" class="form-control ${classname}"/>
            </div>
        </div>
    </li>
    `
    return fullNode
}

function getSingleColRowTextArea(id, placeholder="magyar", classname=""){
    var firstNode = '<li ' + 'class="' + id + '">'
    var fullNode = firstNode + `
        <div class="row">
            <div class="col-sm-12 col-md">
                <textarea type="text" placeholder="${placeholder}" class="form-control ${classname}"></textarea>
            </div>
        </div>
    </li>
    `
    return fullNode
}

function getPerformanceRow(id, fieldPrefix){
    var firstNode = '<li ' + 'class="' + id + '">'
    var fullNode = firstNode + `
        <div class="row">
            <div class="col-sm-12 col-md">
                <input type="text" placeholder="" class="form-control"/>
            </div>
            <div class="col-sm-12 col-md">
                <input type="textarea" placeholder="" class="form-control ${fieldPrefix}" {{readonly}}/>
            </div>
            <div class="col-sm-12 col-md">
                <input type="text" placeholder="" class="form-control ${fieldPrefix}-number-field" onchange="handlePerformanceCheck()"/>
            </div>
        </div>
    </li>
    `
    applySubmitDisabler()
    return fullNode
}

function handleNewOutcome(id, colcount, fieldPrefix="", className='', eventlistenerType='', evenlistenerFunc=''){
    if (colcount === "dual"){
        document.getElementById(id).innerHTML += getDualColRowInput(id, classname, eventlistenerType, evenlistenerFunc)
    } else if (colcount === 'performance'){
        document.getElementById(id).innerHTML += getPerformanceRow(id, fieldPrefix)
    } else {
        document.getElementById(id).innerHTML += getSingleColRowInput(id, placeholder="", classname=className)
    }
}




function handleRowDelete(id){
    var list = document.getElementById(id)
    if (list.childNodes.length == 3){
        return
    }
    var last = list.lastChild
    list.removeChild(last)
}

function handlePerformanceCheck(){
    var sum = 0
    var list = document.getElementById('performance-list')
    var listItems = list.getElementsByClassName('performance-number-field')
    for (let index = 0; index < listItems.length; index++) {
        sum += parseInt(listItems[index].value)
    }
    if (sum == 100){
        var alertContainer = document.getElementById('alert-container')
        alertContainer.style.display = "none"
    } else if (sum < 100){
        var alertContainer = document.getElementById('alert-container')
        alertContainer.style.display = "flex"
        alertContainer.style.backgroundColor = "#ffaaaa"
    } else if (sum > 100) {
        var alertContainer = document.getElementById('alert-container')
        alertContainer.style.display = "flex"
        alertContainer.style.backgroundColor = "#ffaaaa"
    }
}

function handleWorkingHoursChange(){
    var sum = 0
    var list = document.getElementById('workinghours')
    var listItems = list.getElementsByClassName('workinghours-number-field')
    for (var i=0;i<listItems.length;i++){
        sum += parseInt(listItems[i].value)
    }
    var sumLabel = document.getElementById('workinghours-sum')
    sumLabel.textContent = 'Összesen: ' + `${sum}`
}


function disableSubmitButton(){
    var b = document.getElementsByName('submitbutton')
    b = b[0]
    b.disabled = true
}

function enableSubmitButton(){
    var b = document.getElementsByName('submitbutton')
    b = b[0]
    b.disabled = false
}

function applySubmitDisabler(){
    var inputFields = document.getElementsByTagName('input')
    for (let i = 0; i < inputFields.length; i++) {
        const element = inputFields[i];
        element.addEventListener('keydown', disableSubmitButton)
    }
    var textAreas = document.getElementsByTagName('textarea')
    for (let i = 0; i < textAreas.length; i++) {
        const element = textAreas[i];
        element.addEventListener('keydown', disableSubmitButton)
    }
}

document.addEventListener("DOMContentLoaded", function(event) {
    applySubmitDisabler()
    disableSubmitButton()
});
