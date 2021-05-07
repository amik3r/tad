function docReady(fn) {
    if (document.readyState === "complete" || document.readyState === "interactive") {
        setTimeout(fn(), 1);
    } else {
        document.addEventListener("DOMContentLoaded", fn);
        //splitOutcome1()
        var outcomes1 = document.getElementsByClassName('outcome_1');
        for (let i = 0; i < outcomes1.length; i++) {
            const element = outcomes1[i];
            element.addEventListener('change', splitOutcome1)
        }
        var outcomes2 = document.getElementsByClassName('outcome_2');
        for (let i = 0; i < outcomes2.length; i++) {
            const element = outcomes2[i];
            element.addEventListener('change', splitOutcome2)
        }
        var outcomes3 = document.getElementsByClassName('outcome_3');
        for (let i = 0; i < outcomes3.length; i++) {
            const element = outcomes3[i];
            element.addEventListener('change', splitOutcome3)
        }
        var outcomes4 = document.getElementsByClassName('outcome_4');
        for (let i = 0; i < outcomes4.length; i++) {
            const element = outcomes4[i];
            element.addEventListener('change', splitOutcome4)
        }
    }
}

function splitOutcome1() {
    var container = document.getElementById('outcomes_1');
    var valueField = document.getElementById('outcome_1_input');
    var valueFieldEn = document.getElementById('outcome_1_en_input');
    value = valueField.value;
    valueEn = valueFieldEn.value;
    values = value.split(/\d\.\s+/)
    valuesEn = valueEn.split(/\d\.\s+/)
    for (let i = 0; i < values.length; i++) {
        var elementHu = values[i];
        var elementEn = valuesEn[i];
        elementEn = capitalizeFirstLetter(elementEn.replace(/\n+/, " "))
        elementHu = capitalizeFirstLetter(elementHu.replace(/\n+/, " "))
    }
    var textboxArray = []
    for (let i = 0; i < values.length; i++) {
        var element = values[i];
        var element_en = valuesEn[i];
        if (element != '') {
            var listElement = `
            <li>
            <div class="row">
                <div class="col-sm-12 col-md">
                    <textarea type="textarea" class="form-control outcome_1" disabled>${element}</textarea>
                </div>
                <div class="col-sm-12 col-md">
                    <textarea type="textarea" class="form-control outcome_1_en" disabled>${element_en}</textarea>
                </div>
                </div>
            </li>
            `
            textboxArray.push(listElement)
        }
    }
    var ol = document.createElement('ol')
    for (let i = 0; i < textboxArray.length; i++) {
        const element = textboxArray[i];
        ol.innerHTML += element
    }
    container.innerHTML = ''
    container.appendChild(valueField)
    container.appendChild(valueFieldEn)
    document.getElementById('outcome_1_input').innerHTML = value
    container.appendChild(ol)
    console.log(values)
}

function splitOutcome2() {
    var container = document.getElementById('outcomes_2');
    var valueField = document.getElementById('outcome_2_input');
    var valueFieldEn = document.getElementById('outcome_2_en_input');
    value = valueField.value;
    valueEn = valueFieldEn.value;
    values = value.split(/\d\.\s+/)
    valuesEn = valueEn.split(/\d\.\s+/)
    for (let i = 0; i < values.length; i++) {
        var elementHu = values[i];
        var elementEn = valuesEn[i];
        elementHu = elementHu.replace(/\n+/, " ")
        elementEn = elementEn.replace(/\n+/, " ")
    }
    var textboxArray = []
    for (let i = 0; i < values.length; i++) {
        const element = values[i];
        const element_en = valuesEn[i];
        if (!element == '') {
            var listElement = `
            <li>
            <div class="row">
                <div class="col-sm-12 col-md">
                    <textarea type="textarea" class="form-control outcome_2" disabled>${element}</textarea>
                </div>
                <div class="col-sm-12 col-md">
                    <textarea type="textarea" class="form-control outcome_2_en" disabled>${element_en}</textarea>
                </div>
                </div>
            </li>
            `
            textboxArray.push(listElement)
        }
    }
    var ol = document.createElement('ol')
    for (let i = 0; i < textboxArray.length; i++) {
        const element = textboxArray[i];
        ol.innerHTML += element
    }
    container.innerHTML = ''
    container.appendChild(valueField)
    container.appendChild(valueFieldEn)
    document.getElementById('outcome_2_input').innerHTML = value
    container.appendChild(ol)
    console.log(values)
}

function splitOutcome3() {
    console.log('replace3');
    var container = document.getElementById('outcomes_3');
    var valueField = document.getElementById('outcome_3_input');
    var valueFieldEn = document.getElementById('outcome_3_en_input');
    value = valueField.value;
    valueEn = valueFieldEn.value;
    values = value.split(/\d\.\s+/)
    valuesEn = valueEn.split(/\d\.\s+/)
    for (let i = 0; i < values.length; i++) {
        var elementHu = values[i];
        var elementEn = valuesEn[i];
        elementHu = elementHu.replace(/\n+/, " ")
        elementEn = elementEn.replace(/\n+/, " ")
    }
    var textboxArray = []
    for (let i = 0; i < values.length; i++) {
        const element = values[i];
        const element_en = valuesEn[i];
        if (!element == '') {
            var listElement = `
            <li>
            <div class="row">
                <div class="col-sm-12 col-md">
                    <textarea type="textarea" class="form-control outcome_3" disabled>${element}</textarea>
                </div>
                <div class="col-sm-12 col-md">
                    <textarea type="textarea" class="form-control outcome_3_en" disabled>${element_en}</textarea>
                </div>
                </div>
            </li>
            `
            textboxArray.push(listElement)
        }
    }
    var ol = document.createElement('ol')
    for (let i = 0; i < textboxArray.length; i++) {
        const element = textboxArray[i];
        ol.innerHTML += element
    }
    container.innerHTML = ''
    container.appendChild(valueField)
    container.appendChild(valueFieldEn)
    document.getElementById('outcome_3_input').innerHTML = value
    container.appendChild(ol)
    console.log(values)
}

function splitOutcome4() {
    console.log('replace4');

    var container = document.getElementById('outcomes_4');
    var valueField = document.getElementById('outcome_4_input');
    var valueFieldEn = document.getElementById('outcome_4_en_input');
    value = valueField.value;
    valueEn = valueFieldEn.value;
    values = value.split(/\d\.\s+/)
    valuesEn = valueEn.split(/\d\.\s+/)
    for (let i = 0; i < values.length; i++) {
        var elementHu = values[i];
        var elementEn = valuesEn[i];
        elementHu = elementHu.replace(/\n+/, " ")
        elementEn = elementEn.replace(/\n+/, " ")
    }
    var textboxArray = []
    for (let i = 0; i < values.length; i++) {
        const element = values[i];
        const element_en = valuesEn[i];
        if (!element == '') {
            var listElement = `
            <li>
            <div class="row">
                <div class="col-sm-12 col-md">
                    <textarea type="textarea" class="form-control outcome_4" disabled>${element}</textarea>
                </div>
                <div class="col-sm-12 col-md">
                    <textarea type="textarea" class="form-control outcome_4_en" disabled>${element_en}</textarea>
                </div>
                </div>
            </li>
            `
            textboxArray.push(listElement)
        }
    }
    var ol = document.createElement('ol')
    for (let i = 0; i < textboxArray.length; i++) {
        const element = textboxArray[i];
        ol.innerHTML += element
    }
    container.innerHTML = ''
    container.appendChild(valueField)
    container.appendChild(valueFieldEn)
    document.getElementById('outcome_4_input').innerHTML = value
    container.appendChild(ol)
    console.log(values)
}

function splitSupport() {
    var container = document.getElementsByClassName('supportmaterials');
    container = container[0];
    var valueField = document.getElementById('supportall');
    value = valueField.value;
    values = value.split(/\n/)
    var textboxArray = []
    for (let i = 0; i < values.length; i++) {
        var element = values[i];
        if (!element == '') {
            element = element.replace(/[0-9]\t/, '')
            var listElement = `
            <li class="supportmaterials">
            <div class="row">
                <div class="col-sm-12 col-md">
                    <input type="text" placeholder="" class="form-control supportmaterial" value="${element}" {{readonly}} {{required___}}/>
                </div>
            </div>
        </li>
                    `
            textboxArray.push(listElement)
        }
    }
    var ol = document.createElement('ul')
    ol.setAttribute('id', 'supportmaterials')
    for (let i = 0; i < textboxArray.length; i++) {
        const element = textboxArray[i];
        ol.innerHTML += element
    }
    container.innerHTML = ''
    container.appendChild(valueField)
    document.getElementById('supportall').innerHTML = value
    container.appendChild(ol)
    console.log(values)
}

function handleNewOutcome1(id) {
    var prevList = document.getElementById(id);
    const hu = prevList.getElementsByClassName('outcome_1')
    const en = prevList.getElementsByClassName('outcome_1_en')
    var prevValues = []
    for (let i = 0; i < hu.length; i++) {
        var d = {
            hu: hu[i].value,
            en: en[i].value
        }
        prevValues.push(d)
    }
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
    var newList = document.getElementById(id)
    var newHu = newList.getElementsByClassName('outcome_1')
    var newEn = newList.getElementsByClassName('outcome_1_en')
    for (let i = 0; i < newHu.length - 1; i++) {
        console.log(hu[i].value);
        newHu[i].value = prevValues[i].hu
        newEn[i].value = prevValues[i].en
    }
    applySubmitDisabler()
}

function handleNewOutcome2(id) {
    var prevList = document.getElementById(id);
    const hu = prevList.getElementsByClassName('outcome_2')
    const en = prevList.getElementsByClassName('outcome_2_en')
    var prevValues = []
    for (let i = 0; i < hu.length; i++) {
        var d = {
            hu: hu[i].value,
            en: en[i].value
        }
        prevValues.push(d)
    }
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
    var newList = document.getElementById(id)
    var newHu = newList.getElementsByClassName('outcome_2')
    var newEn = newList.getElementsByClassName('outcome_2_en')
    console.log(newHu.length);
    for (let i = 0; i < newHu.length - 1; i++) {
        console.log(hu[i].value);
        newHu[i].value = prevValues[i].hu
        newEn[i].value = prevValues[i].en
    }
    applySubmitDisabler()
}

function handleNewOutcome3(id) {
    var prevList = document.getElementById(id);
    const hu = prevList.getElementsByClassName('outcome_3')
    const en = prevList.getElementsByClassName('outcome_3_en')
    var prevValues = []
    for (let i = 0; i < hu.length; i++) {
        var d = {
            hu: hu[i].value,
            en: en[i].value
        }
        prevValues.push(d)
    }
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
    var newList = document.getElementById(id)
    var newHu = newList.getElementsByClassName('outcome_3')
    var newEn = newList.getElementsByClassName('outcome_3_en')
    console.log(newHu.length);
    for (let i = 0; i < newHu.length - 1; i++) {
        console.log(hu[i].value);
        newHu[i].value = prevValues[i].hu
        newEn[i].value = prevValues[i].en
    }
    applySubmitDisabler()
}

function handleNewOutcome4(id) {
    var prevList = document.getElementById(id);
    const hu = prevList.getElementsByClassName('outcome_4')
    const en = prevList.getElementsByClassName('outcome_4_en')
    var prevValues = []
    for (let i = 0; i < hu.length; i++) {
        var d = {
            hu: hu[i].value,
            en: en[i].value
        }
        prevValues.push(d)
    }
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
    var newList = document.getElementById(id)
    var newHu = newList.getElementsByClassName('outcome_4')
    var newEn = newList.getElementsByClassName('outcome_4_en')
    console.log(newHu.length);
    for (let i = 0; i < newHu.length - 1; i++) {
        console.log(hu[i].value);
        newHu[i].value = prevValues[i].hu
        newEn[i].value = prevValues[i].en
    }
    applySubmitDisabler()
}

function handleNewSupport(id) {
    var prevList = document.getElementById(id);
    const hu = prevList.getElementsByClassName('supportmaterial')
    var prevValues = []
    for (let i = 0; i < hu.length; i++) {
        var d = {
            hu: hu[i].value,
        }
        prevValues.push(d)
    }
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
    var newList = document.getElementById(id)
    var newHu = newList.getElementsByClassName('supportmaterial')
    console.log(newHu.length);
    for (let i = 0; i < newHu.length - 1; i++) {
        console.log(hu[i].value);
        newHu[i].value = prevValues[i].hu
    }
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

function gatherOutcome1() {
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
    console.log(document.getElementById('id_outcomes_value_1').value);
}

function gatherOutcome2() {
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
}

function gatherOutcome3() {
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

function gatherOutcome4() {
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

function gatherSupport() {
    var arr = []
    var supportElements = document.getElementsByClassName('supportmaterial')
    for (let i = 0; i < supportElements.length; i++) {
        var a = {
            hu: supportElements[i].value,
        }
        arr.push(a)
    }
    support.materials = arr
    document.getElementById('id_supportmaterial').value = JSON.stringify(support)
}

function gatherSection2() {
    gatherOutcome1()
    gatherOutcome2()
    gatherOutcome3()
    gatherOutcome4()
    gatherSupport()
}