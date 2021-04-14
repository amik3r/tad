function docReady(fn) {
    if (document.readyState === "complete" || document.readyState === "interactive") {
        setTimeout(fn(), 1);
    } else {
        document.addEventListener("DOMContentLoaded", fn);
    }
}



function handleNewOutcome1(id){
    var firstNode = '<li ' + 'class="' + id + '">'
    var fullNode = firstNode + `
        <div class="row">
            <div class="col-sm-12 col-md">
                <textarea type="textarea" placeholder="magyar" value='' class="form-control outcome_1"></textarea>
            </div>
            <div class="col-sm-12 col-md">
                <textarea type="textarea" placeholder="English" value='' class="form-control outcome_1_en"></textarea>
            </div>
        </div>
    </li>
    `
    disableSubmitButton()
    document.getElementById(id).innerHTML += fullNode
    applySubmitDisabler()
}
function handleNewOutcome2(id){
    var firstNode = '<li ' + 'class="' + id + '">'
    var fullNode = firstNode + `
        <div class="row">
            <div class="col-sm-12 col-md">
                <textarea type="textarea" placeholder="magyar" value='' class="form-control outcome_2"></textarea>
            </div>
            <div class="col-sm-12 col-md">
                <textarea type="textarea" placeholder="English" value='' class="form-control outcome_2_en"></textarea>
            </div>
        </div>
    </li>
    `
    disableSubmitButton()
    document.getElementById(id).innerHTML += fullNode
    applySubmitDisabler()
}
function handleNewOutcome3(id){
    var firstNode = '<li ' + 'class="' + id + '">'
    var fullNode = firstNode + `
        <div class="row">
            <div class="col-sm-12 col-md">
                <textarea type="textarea" placeholder="magyar" value='' class="form-control outcome_3"></textarea>
            </div>
            <div class="col-sm-12 col-md">
                <textarea type="textarea" placeholder="English" value='' class="form-control outcome_3_en"></textarea>
            </div>
        </div>
    </li>
    `
    disableSubmitButton()
    document.getElementById(id).innerHTML += fullNode
    applySubmitDisabler()
}

function handleNewOutcome4(id){
    var firstNode = '<li ' + 'class="' + id + '">'
    var fullNode = firstNode + `
        <div class="row">
            <div class="col-sm-12 col-md">
                <textarea type="textarea" placeholder="magyar" value='' class="form-control outcome_4"></textarea>
            </div>
            <div class="col-sm-12 col-md">
                <textarea type="textarea" placeholder="English" value='' class="form-control outcome_4_en"></textarea>
            </div>
        </div>
    </li>
    `
    disableSubmitButton()
    document.getElementById(id).innerHTML += fullNode
    applySubmitDisabler()
}
function handleNewSupport(id){
    var firstNode = '<li ' + 'class="' + id + '">'
    var fullNode = firstNode + `
        <div class="row">
            <div class="col-sm-12 col-md">
                <input type="text" placeholder="" class="form-control supportmaterial"/>
            </div>
        </div>
    </li>
    `
    disableSubmitButton()
    document.getElementById(id).innerHTML += fullNode
    applySubmitDisabler()
}

// section 2 scripts
var outcome1 = {
    outcomes: []
}
var outcome2 = {
    outcomes: []
}
var outcome3 = {
    outcomes: []
}
var outcome4 = {
    outcomes: []
}
var support = {
    materials: []
}

function gatherOutcome1(){
    var arr = []
    var o1ElementsHu = document.getElementsByClassName('outcome_1')
    var o1ElementsEn = document.getElementsByClassName('outcome_1_en')
    for (let i = 0; i < o1ElementsHu.length; i++) {
        var a = {
            hu: o1ElementsHu[i].value, 
            en: o1ElementsEn[i].value
        }
        arr.push(a)
    }
    outcome1.outcomes = arr
    document.getElementById('id_outcomes_value_1').value = JSON.stringify(outcome1)
    //outcome1.outcomes.push(outcomeObject)
}

function gatherOutcome2(){
    var arr = []
    var o2ElementsHu = document.getElementsByClassName('outcome_2')
    var o2ElementsEn = document.getElementsByClassName('outcome_2_en')
    for (let i = 0; i < o2ElementsHu.length; i++) {
        var a = {
            hu: o2ElementsHu[i].value, 
            en: o2ElementsEn[i].value
        }
        arr.push(a)
    }
    outcome2.outcomes = arr
    document.getElementById('id_outcomes_value_2').value = JSON.stringify(outcome2)
    //outcome1.outcomes.push(outcomeObject)
}
function gatherOutcome3(){
    var arr = []
    var eHu = document.getElementsByClassName('outcome_3')
    var eEn = document.getElementsByClassName('outcome_3_en')
    for (let i = 0; i < eHu.length; i++) {
        var a = {
            hu: eHu[i].value, 
            en: eEn[i].value
        }
        arr.push(a)
    }
    outcome3.outcomes = arr
    document.getElementById('id_outcomes_value_3').value = JSON.stringify(outcome3)
}
function gatherOutcome4(){
    var arr = []
    var eHu = document.getElementsByClassName('outcome_4')
    var eEn = document.getElementsByClassName('outcome_4_en')
    for (let i = 0; i < eHu.length; i++) {
        var a = {
            hu: eHu[i].value, 
            en: eEn[i].value
        }
        arr.push(a)
    }
    outcome4.outcomes = arr
    document.getElementById('id_outcomes_value_4').value = JSON.stringify(outcome4)
}
function gatherSupport(){
    var arr = []
    var support = document.getElementsByClassName('supportmaterial')
    for (let i = 0; i < support.length; i++) {
        var a = {
            hu: support[i].value, 
        }
        arr.push(a)
    }
    support.materials = arr
    document.getElementById('id_supportmaterial').value = JSON.stringify(support)
}

function gatherSection2(){
    gatherOutcome1()
    gatherOutcome2()
    gatherOutcome3()
    gatherOutcome4()
    gatherSupport()
    enableSubmitButton()
}