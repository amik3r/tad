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


document.addEventListener("DOMContentLoaded", function(event) {
    $(document).ready( function () {
        if (lang == 'hu'){
            $('#tad-table').DataTable( {
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Hungarian.json"
                }
            } );
        } else {
            $('#tad-table').DataTable()
        }
    } );
});