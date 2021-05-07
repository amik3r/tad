function handleNewMidterm() {
    var prevList = document.getElementById('midterm');
    const hu = prevList.getElementsByClassName('midterm-hu')
    const en = prevList.getElementsByClassName('midterm-en')
    const percent = prevList.getElementsByClassName('midterm-percent')
    var prevValues = []
    for (let i = 0; i < hu.length; i++) {
        var d = {
            hu: hu[i].value,
            en: en[i].value,
            percent: percent[i].value
        }
        prevValues.push(d)
    }
    const node = `
    <li class="oc_1_1">
        <div class="row">
            <div class="col-sm-12 col-md">
                <input type="textarea" placeholder="Típus (magyar)" class="form-control midterm-hu"/>
            </div>
            <div class="col-sm-12 col-md">
                <input type="textarea" placeholder="Type (optional)" class="form-control midterm-en"/>
            </div>
            <div class="col-sm-12 col-md">
                <input type="text" placeholder="Százalék/percent" class="form-control midterm-percent"/>
            </div>
        </div>
    </li>
    `
    disableSubmitButton()
    document.getElementById('midterm').innerHTML += node;
    var newList = document.getElementById('midterm')
    var newHu = newList.getElementsByClassName('midterm-hu')
    var newEn = newList.getElementsByClassName('midterm-en')
    var newPercent = newList.getElementsByClassName('midterm-percent')
    for (let i = 0; i < newHu.length - 1; i++) {
        console.log(hu[i].value);
        newHu[i].value = prevValues[i].hu
        newEn[i].value = prevValues[i].en
        newPercent[i].value = prevValues[i].en
    }
    applySubmitDisabler()
}

function handleNewExam() {
    var prevList = document.getElementById('exam');
    const hu = prevList.getElementsByClassName('exam-hu')
    const en = prevList.getElementsByClassName('exam-en')
    const percent = prevList.getElementsByClassName('exam-percent')
    var prevValues = []
    for (let i = 0; i < hu.length; i++) {
        var d = {
            hu: hu[i].value,
            en: en[i].value,
            percent: percent[i].value
        }
        prevValues.push(d)
    }
    const node = `
    <li class="oc_1_1">
        <div class="row">
            <div class="col-sm-12 col-md">
                <input type="textarea" placeholder="Típus (magyar)" class="form-control exam-hu"/>
            </div>
            <div class="col-sm-12 col-md">
                <input type="textarea" placeholder="Type (optional)" class="form-control exam-en"/>
            </div>
            <div class="col-sm-12 col-md">
                <input type="text" placeholder="Százalék/percent" class="form-control exam-percent"/>
            </div>
        </div>
    </li>
    `
    disableSubmitButton()
    document.getElementById('exam').innerHTML += node;
    var newList = document.getElementById('midterm')
    var newHu = newList.getElementsByClassName('exam-hu')
    var newEn = newList.getElementsByClassName('exam-en')
    var newPercent = newList.getElementsByClassName('exam-percent')
    for (let i = 0; i < newHu.length - 1; i++) {
        console.log(hu[i].value);
        newHu[i].value = prevValues[i].hu
        newEn[i].value = prevValues[i].en
        newPercent[i].value = prevValues[i].en
    }
    applySubmitDisabler()
}

function handleNewRetake() {
    const node = `
    <li class="oc_1_1">
        <div class="row">
            <div class="col-sm-12 col-md">
                <textarea type="textarea" placeholder="magyar" class="form-control retake"></textarea>
            </div>
            <div class="col-sm-12 col-md">
                <textarea type="textarea" placeholder="English (optional)" class="form-control retake_en"></textarea>
            </div>
        </div>
    </li>
    `
    disableSubmitButton()
    document.getElementById('retake').innerHTML += node;
    applySubmitDisabler()
}

function handleNewWorkingHours() {
    var node = `
    <li class="oc_1_1">
        <div class="row">
            <div class="col-sm-12 col-md">
                <input type="text" placeholder="Munka jellege" class="form-control workinghours-type"/>
            </div>
            <div class="col-sm-12 col-md">
                <input type="textarea" placeholder="Munkaórák száma" class="form-control workinghours-length" {{readonly}} {{required}}/>
            </div>
            <div class="col-sm-12 col-md">
                <input type="text" placeholder="Alkalmak száma félévente" class="form-control workinghours-amount" onchange="handleWorkingHoursChange()"/>
            </div>
        </div>
    </li>
    `
    disableSubmitButton()
    document.getElementById('workinghours').innerHTML += node;
    applySubmitDisabler()
}



var midterm = {
    "midterms": []
}
var exam = {
    "exams": []
}
var retake = {
    "retakes": []
}
var workinghours = {
    "workinghours": []
}

function gatherMidterm() {
    var arr = []
    var container = document.getElementById('midterm')
    var rows = container.getElementsByClassName('row')
    for (let i = 0; i < rows.length; i++) {
        var data = {
            "hu": rows[i].getElementsByClassName('midterm-hu')[0].value,
            "en": rows[i].getElementsByClassName('midterm-en')[0].value,
            "percent": rows[i].getElementsByClassName('midterm-percent')[0].value
        }
        arr.push(data)
    }
    midterm.midterms = arr
    console.log(midterm);
    document.getElementById('id_midterm_proportions').value = JSON.stringify(midterm)
}

function gatherExam() {
    var arr = []
    var container = document.getElementById('exam')
    var rows = container.getElementsByClassName('row')
    for (let i = 0; i < rows.length; i++) {
        var data = {
            "hu": rows[i].getElementsByClassName('exam-hu')[0].value,
            "en": rows[i].getElementsByClassName('exam-en')[0].value,
            "percent": rows[i].getElementsByClassName('exam-percent')[0].value
        }
        arr.push(data)
    }
    exam.exams = arr
    console.log(exam);
    document.getElementById('id_exam_proportions').value = JSON.stringify(exam)
}

function gatherWorkingHours() {
    var arr = []
    var container = document.getElementById('workinghours')
    var rows = container.getElementsByClassName('row')
    for (let i = 0; i < rows.length; i++) {
        var data = {
            "type": rows[i].getElementsByClassName('workinghours-type')[0].value,
            "type_en": rows[i].getElementsByClassName('workinghours-length')[0].value,
            "amount": rows[i].getElementsByClassName('workinghours-amount')[0].value
        }
        arr.push(data)
    }
    workinghours.workinghours = arr
    console.log(workinghours);
    document.getElementById('id_workhours_activity').value = JSON.stringify(workinghours)
}

function gatherSection3() {
    gatherMidterm()
    gatherExam()
    gatherWorkingHours()
}