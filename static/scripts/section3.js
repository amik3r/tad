function handleNewMidterm(){
    const node = `
    <li class="oc_1_1">
        <div class="row">
            <div class="col-sm-12 col-md">
                <input type="textarea" placeholder="" class="form-control midterm-hu"/>
            </div>
            <div class="col-sm-12 col-md">
                <input type="textarea" placeholder="" class="form-control midterm-en"/>
            </div>
            <div class="col-sm-12 col-md">
                <input type="text" placeholder="" class="form-control midterm-percent"/>
            </div>
        </div>
    </li>
    `
    disableSubmitButton()
    document.getElementById('midterm').innerHTML += node;
    applySubmitDisabler()
}

function handleNewExam(){
    const node = `
    <li class="oc_1_1">
        <div class="row">
            <div class="col-sm-12 col-md">
                <input type="textarea" placeholder="" class="form-control exam-hu"/>
            </div>
            <div class="col-sm-12 col-md">
                <input type="textarea" placeholder="" class="form-control exam-en"/>
            </div>
            <div class="col-sm-12 col-md">
                <input type="text" placeholder="" class="form-control exam-percent"/>
            </div>
        </div>
    </li>
    `
    disableSubmitButton()
    document.getElementById('exam').innerHTML += node;
    applySubmitDisabler()
}
function handleNewRetake(){
    const node = `
    <li class="oc_1_1">
        <div class="row">
            <div class="col-sm-12 col-md">
                <textarea type="textarea" placeholder="magyar" class="form-control"></textarea>
            </div>
            <div class="col-sm-12 col-md">
                <textarea type="textarea" placeholder="English (optional)" class="form-control"></textarea>
            </div>
        </div>
    </li>
    `
    disableSubmitButton()
    document.getElementById('retake').innerHTML += node;
    applySubmitDisabler()
}
function handleNewTopic(){
    const node = `
    <li class="oc_1_1">
        <div class="row">
            <div class="col-sm-12 col-md">
                <textarea type="textarea" placeholder="magyar" class="form-control topic-hu"></textarea>
            </div>
            <div class="col-sm-12 col-md">
                <textarea type="textarea" placeholder="English (optional)" class="form-control topic-en"></textarea>
            </div>
        </div>
    </li>
    `
    disableSubmitButton()
    document.getElementById('topics').innerHTML += node;
    applySubmitDisabler()
}
function handleNewTutor(){
    const node = `
    <li class="oc_1_1">
        <div class="row">
            <div class="col-sm-12 col-md">
                <input type="textarea" placeholder="Név/Name" class="form-control performance" {{readonly}} {{required}}/>
            </div>
            <div class="col-sm-12 col-md">
                <input type="textarea" placeholder="Beosztás/Position" class="form-control performance" {{readonly}} {{required}}/>
            </div>
            <div class="col-sm-12 col-md">
                <input type="text" placeholder="Elérhetőség/Contact" class="form-control performance-number-field" onchange="handlePerformanceCheck()" {{readonly}} {{required}} />
            </div>
        </div>
    </li>
    `
    disableSubmitButton()
    document.getElementById('tutors').innerHTML += node;
    applySubmitDisabler()
}