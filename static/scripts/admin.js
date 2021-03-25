function handleCheckboxSelect(e){
    console.log(e.target.value);
}
var boxes = document.getElementsByClassName('checkbox')
boxes.toArray()
var arr = Array.prototype.slice.call( coll, 0 );
arr.forEach(element => {
    element.addEventListener("change", handleCheckboxSelect(e))
});