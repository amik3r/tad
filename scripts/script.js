function docReady(fn) {
    if (document.readyState === "complete" || document.readyState === "interactive") {
        setTimeout(fn(), 1);
    } else {
        document.addEventListener("DOMContentLoaded", fn);
    }
}

function decorateTable(){
    var table = document.getElementById("tad-table");
    for (i=1;i<=table.rows.length - 1;i++){
        if (i%2 == 1) {
            table.rows[i].style.background = '#f0f0f0';
        }
    }
};

function filter(){
    preparePagination('tad-table')
    var table = document.getElementById("tad-table")
    var display = table.rows[0].cells[0].style.display  
    var filterValue = document.getElementById('filter').value
    filterValue = filterValue.toLowerCase()

    document.getElementById('noresult').style.display = 'none'
    if (filterValue.length === 0){
        for (var i = 1, row; row = table.rows[i]; i++) {
            table.style.display = 'table'
        }
        // reset pagination
        paginate(currpage)
    }
    
    for (var i = 1, row; row = table.rows[i]; i++) {
        row.style.display = 'none'
    }

    var foundSmt = false

    // check if any cell contains the filter
    for (var i = 1, row; row = table.rows[i]; i++) {
        for (var j = 0, col; col = row.cells[j]; j++) {
            if (col.textContent.trim().toLowerCase().includes(filterValue)){
                row.style.display = display
                foundSmt = true
            }
        }  
    }
    // Display not found if no result
    // Display table
    if (!foundSmt){
        document.getElementById('noresult').style.display = 'block'
        for (var i = 1, row; row = table.rows[i]; i++) {
            table.style.display = display
        }
    } else {

    }
}

// Pagination globals
var maxrows = 25
var numpages = 1
var currpage = 1

function preparePagination(){
    try {
        document.getElementById('pagination-row').innerHTML = ''
    } catch{}
    var table = document.getElementById("tad-table");

    var display = table.rows[0].cells[0].style.display      
    var btnGroup = document.getElementById('pagination-row')
    numpages = Math.round((table.rows.length / maxrows) + 1)
    
    // Create 'prev' button
    var button = document.createElement("button");
    button.innerHTML = 'Prev';
    button.id = "btn-prev"
    button.classList = "btn btn-primary"
    button.addEventListener(
        "click", 
        {handleEvent: 
            function (event){
                if (event.target.classList.contains("btn-disabled")){
                    return
                } else{
                    paginate(Number(currpage)-1);
                }
            }
        }
    );
    btnGroup.appendChild(button)
    // Add page buttons
    for (var i=1;i<=numpages; i++){
        var button = document.createElement("button");
        button.innerHTML = i;
        button.classList = "btn btn-primary"
        button.addEventListener(
            "click", 
            {handleEvent: 
                function (event){
                    paginate(event.target.innerHTML);
                }
            }
        );
        btnGroup.appendChild(button)
    }
    // Create next button
    var button = document.createElement("button");
    button.innerHTML = 'Next';
    button.classList = "btn btn-primary"
    button.id = "next-btn"
    button.addEventListener(
        "click", 
        {handleEvent: 
            function (event){
                if (event.target.classList.contains("btn-disabled")){
                    return
                } else{
                    paginate(Number(currpage)+1);
                }
            }
        }
    );
    btnGroup.appendChild(button)

    // Hide all rows
    for (var i=1;i<=table.rows.length - 1;i++){
        table.rows[i].style.display = 'none'
    }
    // Display first 25
    try {
        for (var i=1;i<=maxrows;i++){
            table.rows[i].style.display = display
        }
    } catch{}
    return true
}
function paginate(page){
    console.log('paginating page: ' + page);

    var table = document.getElementById("tad-table");
    var display = table.rows[0].cells[0].style.display
    var start = (page === 0) ? page : page*maxrows - maxrows
    var end = page*maxrows - 1

    if (page >= numpages){
        document.getElementById('next-btn').classList.remove("btn-primary")
        document.getElementById('next-btn').classList.add("btn-disabled")
    } else {
        document.getElementById('next-btn').classList.remove("btn-disabled")
        document.getElementById('next-btn').classList.add("btn-primary")
    }

    if (page == 1){
        document.getElementById('btn-prev').classList.remove("btn-primary")
        document.getElementById('btn-prev').classList.add("btn-disabled")
    } else {
        document.getElementById('btn-prev').classList.remove("btn-disabled")
        document.getElementById('btn-prev').classList.add("btn-primary")
    }

    // Hide all rows
    for (var i=1;i<=table.rows.length - 1;i++){
        table.rows[i].style.display = 'none'
    }
    
    if (end > table.rows.length){
        end = table.rows.length + (table.rows.length % maxrows)
    }
    
    for (var i=start;i<=end;i++){
        try{
            table.rows[i].style.display = display
        }
        catch {
            
        }
    }
    currpage = page
}

document.addEventListener("DOMContentLoaded", function(event) {
    if(preparePagination()){
    }
    decorateTable();
});