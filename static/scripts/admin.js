function handleCheckboxSelect(e){
    console.log(e.target.value);
}
var boxes = document.getElementsByClassName('checkbox')
boxes.forEach(element => {
    element.addEventListener("change", handleCheckboxSelect(e))
});