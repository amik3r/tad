function docReady(fn) {
    if (document.readyState === "complete" || document.readyState === "interactive") {
        setTimeout(fn(), 1);
    } else {
        document.addEventListener("DOMContentLoaded", fn);
    }
}

var checkedArray = []

function handleCheckboxSelect(e){
    if (checkedArray.length == 0 || !checkedArray.includes(e.target.value)){
        checkedArray.push(e.target.value)
    } else {
        return
    }
}

function handleDeleteButton(e){
    const urlBase = window.location.hostname + '/local/tad/delete.php'
    console.log(checkedArray);
    var url = urlBase+"?todelete="+checkedArray.toString()
    console.log(url);
    window.location.replace(url);
}


document.addEventListener("DOMContentLoaded", function(event) {
    var deleteButton = document.getElementById('delete-button')
    deleteButton.addEventListener("click", handleDeleteButton)
    var boxes = document.getElementsByClassName('checkbox')
    const arr = [...boxes];
    arr.forEach(element => {
        element.addEventListener("change", handleCheckboxSelect)
    });
});

