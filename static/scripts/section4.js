function handleNewTutor() {
    const node = `
    <li class="oc_1_1">
        <div class="row">
            <div class="col-sm-12 col-md">
                <input type="textarea" placeholder="Név/Name" class="form-control tutor-name" {{readonly}} {{required}}/>
            </div>
            <div class="col-sm-12 col-md">
                <input type="textarea" placeholder="Beosztás/Position" class="form-control tutor-rank" {{readonly}} {{required}}/>
            </div>
            <div class="col-sm-12 col-md">
                <input type="text" placeholder="Elérhetőség/Contact" class="form-control tutor-contact" onchange="handlePerformanceCheck()" {{readonly}} {{required}} />
            </div>
        </div>
    </li>
    `
    disableSubmitButton()
    document.getElementById('tutors').innerHTML += node;
    applySubmitDisabler()
}

function handleNewTopic() {
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

var topics = {
    "topics": []
}
var topicsummary = {
    "topics": []
}

var lecturers = {
    "lecturers": []
}

function gatherTopicSummary() {
    var arr = []
    var data = {
        "hu": document.getElementById('topic-summary-hu').value,
        "en": document.getElementById('topic-summary-en').value,
    }
    arr.push(data)
    topicsummary.topics = arr
    console.log(topicsummary);
    document.getElementById('id_topics_summary').value = JSON.stringify(topicsummary)
}

function gatherTopic() {
    var arr = []
    var container = document.getElementById('topics')
    var rows = container.getElementsByClassName('row')
    for (let i = 0; i < rows.length; i++) {
        var data = {
            "hu": rows[i].getElementsByClassName('topic-hu')[0].value,
            "en": rows[i].getElementsByClassName('topic-en')[0].value,
        }
        arr.push(data)
    }
    topics.topics = arr
    console.log(topics);
    document.getElementById('id_topics').value = JSON.stringify(topics)
}

function splitTutors() {
    var container = document.getElementsByClassName('tutors');
    container = container[0];
    var valueField = document.getElementById('tutorlist');
    value = valueField.value;
    values = value.split(/\n/)
    var tutors = []
    for (let i = 0; i < values.length; i++) {
        var rank = '';
        var email = '';
        const element = values[i];
        var splitElement = element.split(/\t/)
        var name = String(splitElement[0]);
        for (let j = 1; j < splitElement.length; j++) {
            const e = splitElement[j];
            if (e.includes('@')) {
                email = String(e)
            } else {
                rank = String(e)
            }
        }
        var tutor = { 'name': name, 'rank': rank, 'email': email }
        console.log(tutor)
        tutors.push(tutor)
    }
    var textboxArray = []
    for (let i = 0; i < tutors.length; i++) {
        const element = tutors[i];
        if (!element == '') {
            console.log(element)
            var name = element.name
            console.log(name);
            var rank = element.rank
            var email = element.email
            var listElement = `
            <li class="tutor">
                    <div class="row">
                        <div class="col-sm-12 col-md">
                            <input type="textarea" placeholder="Név/Name" class="form-control tutor-name" {{readonly}} {{required}} disabled value="${name}"/>
                        </div>
                        <div class="col-sm-12 col-md">
                            <input type="textarea" placeholder="Beosztás/Position" class="form-control tutor-rank" disabled {{readonly}} {{required}} value="${rank}"/>
                        </div>
                        <div class="col-sm-12 col-md">
                            <input type="text" placeholder="Elérhetőség/Contact" class="form-control tutor-contact" disabled {{readonly}} {{required}} value="${
email}"/>
                        </div>
                    </div>
                </li>
                `
            textboxArray.push(listElement)
        }
    }
    var ol = document.createElement('ol')
    ol.setAttribute('id', 'tutors')
    for (let i = 0; i < textboxArray.length; i++) {
        const element = textboxArray[i];
        ol.innerHTML += element
    }
    container.innerHTML = ''
    container.appendChild(valueField)
    document.getElementById('tutorlist').innerHTML = value
    container.appendChild(ol)
    console.log(values)
}


function gatherTutors() {
    var arr = []
    var container = document.getElementById('tutors')
    console.log(container);
    var rows = container.getElementsByTagName('li')
    for (let i = 0; i < rows.length; i++) {
        var data = {
            "name": rows[i].getElementsByClassName('tutor-name')[0].value,
            "rank": rows[i].getElementsByClassName('tutor-rank')[0].value,
            "contact": rows[i].getElementsByClassName('tutor-contact')[0].value,
        }
        arr.push(data)
    }
    lecturers.lecturers = arr
    console.log(lecturers);
    document.getElementById('id_lecturers').value = JSON.stringify(lecturers)
}

function gatherSection4() {
    gatherSection2()
    gatherSection3()
    gatherTopicSummary()
    gatherTopic()
    gatherTutors()
    enableSubmitButton()
}