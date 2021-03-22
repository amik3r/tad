function docReady(fn) {
    if (document.readyState === "complete" || document.readyState === "interactive") {
        setTimeout(fn(), 1);
    } else {
        document.addEventListener("DOMContentLoaded", fn);
    }
}

// get language from url if present, set default to hu if not

const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
var lang = urlParams.get('lang')
if (lang == null){
    lang = 'hu';
}

// apply BS4 classes to elements

function addBtn(){
    var buttons = document.getElementsByClassName("paginate_button");
    for (button of buttons){
        button.classList.add("btn");
        button.classList.add("btn-secondary");
    }
}

document.addEventListener("DOMContentLoaded", function(event) {
    $(document).ready( function () {
        if (lang == 'hu'){
            // Setup - add a text input to each footer cell
            $('#thead thead tr').clone(true).appendTo( '#thead thead' );
            $('#thead thead tr:eq(1) th').each( function (i) {
                var title = $(this).text();
                $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
            
                $( 'input', this ).on( 'keyup change', function () {
                    if ( table.column(i).search() !== this.value ) {
                        table
                            .column(i)
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
            $('#tad-table').DataTable( 
                {
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Hungarian.json"
                },
                columnDefs: [
                    { targets: 'no-sort', orderable: false }
                ],
                }
            );
        } else {
            $('#thead thead tr').clone(true).appendTo( '#thead thead' );
            $('#thead thead tr:eq(1) th').each( function (i) {
                var title = $(this).text();
                $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
            
                $( 'input', this ).on( 'keyup change', function () {
                    if ( table.column(i).search() !== this.value ) {
                        table
                            .column(i)
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
            $('#tad-table').DataTable( 
                {
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/English.json"
                    },
                    columnDefs: [
                        { targets: 'no-sort', orderable: false }
                    ]
                } 
            );
        }
    } );
});