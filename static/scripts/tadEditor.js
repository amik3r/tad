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
            <textarea type="textarea" placeholder="English" class="form-control"></textarea>
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
                <textarea type="textarea" placeholder="English" class="form-control ${className}"></textarea>
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
        document.getElementById(id).innerHTML += getDualColRowInput(id, className, eventlistenerType, evenlistenerFunc)
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


function disableSubmitButton(){
    console.log('disabled');
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

function collapse1(){
    var coll = document.getElementsByClassName("collapse1");
    var i;
    
    for (i = 0; i < coll.length; i++) {
      coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = document.getElementById('content1');
        if (content.style.maxHeight){
            content.style.maxHeight = null;
          } else {
            content.style.maxHeight = content.scrollHeight + "px";
          }
      });
    }
}
function collapse2(){
    var coll = document.getElementsByClassName("collapse2");
    var i;
    
    for (i = 0; i < coll.length; i++) {
      coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = document.getElementById('content2');
        if (content.style.maxHeight){
            content.style.maxHeight = null;
          } else {
            content.style.maxHeight = content.scrollHeight + "px";
          }
      });
    }
}
function collapse3(){
    var coll = document.getElementsByClassName("collapse3");
    var i;
    
    for (i = 0; i < coll.length; i++) {
      coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = document.getElementById('content3');
        if (content.style.maxHeight){
            content.style.maxHeight = null;
          } else {
            content.style.maxHeight = content.scrollHeight + "px";
          }
      });
    }
}
function collapse4(){
    var coll = document.getElementsByClassName("collapse4");
    var i;
    
    for (i = 0; i < coll.length; i++) {
      coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = document.getElementById('content4');
        if (content.style.maxHeight){
            content.style.maxHeight = null;
          } else {
            content.style.maxHeight = content.scrollHeight + "px";
          }
      });
    }
}


const departmentsByCode = {
    "GT20": "Menedzsment és Vállalkozásgazdaságtan Tanszék",
    "GT30": "Közgazdaságtan Tanszék",
    "GT35": "Pénzügyek Tanszék",
    "GT41": "Filozófia és Tudománytörténet Tanszék",
    "GT42": "Környezetgazdaságtan Tanszék",
    "GT43": "Szociológia és Kommunikáció Tanszék",
    "GT51": "Műszaki Pedagógia Tanszék",
    "GT52": "Ergonómia és Pszichológia Tanszék",
    "GT55": "Üzleti Jog Tanszék",
    "GT61": "Idegen Nyelvi Központ",
    "GT62": "Idegen Nyelvi Központ",
    "GT63": "Idegen Nyelvi Központ",
    "GT65": "Idegen Nyelvi Központ",
    "GT70": "Testnevelési Központ",
    "GTDH": "Dékáni Hivatal"
}

const departmentsByName = {
    'Department of Ergonomics and Psychology': 'Ergonómia és Pszichológia Tanszék',
    'Department of Philosophy and History of Science ': 'Filozófia és Tudománytörténet Tanszék',
    'Centre of Modern Languages': 'Idegen Nyelvi Központ',
    'Department of Environmental Economics': 'Környezetgazdaságtan Tanszék',
    'Department of Economics': 'Közgazdaságtan Tanszék',
    'Department of Management and Business Economics': 'Menedzsment és Vállalkozásgazdaságtan Tanszék',
    'Institute of Continuing Engineering Education': 'Mérnöktovábbképző Intézet',
    'Department of Technical Education': 'Műszaki Pedagógia Tanszék',
    'Department of Sociology and Communication': 'Szociológia és Kommunikáció Tanszék',
    'Centre of Physical Education': 'Testnevelési Központ',
    'Department of Business Law': 'Üzleti Jog Tanszék',
    'Department of Finance': 'Pénzügyek Tanszék',
    "Dean's Office": 'Dékáni Hivatal',
}

function findEnglishDepartmentName(name){
    const englishNames = Object.keys(departmentsByName)
    for (let i = 0; i < englishNames.length; i++) {
        const element = englishNames[i];
        if (departmentsByName[element] === name){
            console.log(element);
            return element
        }
    }
}

function setDepartmentName(){
    var departmentValue = document.getElementById('ou').value
    var englishName = findEnglishDepartmentName(departmentsByCode[departmentValue])
    document.getElementById('ou_en').innerHTML = englishName
    document.getElementById('id_ou_en').value = englishName
    document.getElementById('id_ou').value = departmentsByCode[departmentValue]
}

document.addEventListener("DOMContentLoaded", function(event) {
    collapse1()
    collapse2()
    collapse3()
    collapse4()
    applySubmitDisabler()
    disableSubmitButton()
});
