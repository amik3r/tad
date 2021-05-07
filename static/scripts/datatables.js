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
if (lang == null) {
    lang = 'hu';
}

document.addEventListener("DOMContentLoaded", function(event) {
    $(document).ready(function() {
        if (lang == 'hu') {
            // Setup - add a text input to each footer cell
            var searchhead = $('thead tr').clone(true).appendTo('thead');
            searchhead.addClass('search-header')
            $('thead tr:eq(1) th').each(function(i) {
                var elem = $(this)
                if (elem.hasClass('no-sort')) {
                    elem.css("height", "30px")
                    elem.css("height", "30px")
                    elem.css('background-color', 'white')
                    elem.html('');
                    return;
                }
                elem.css({
                    "background-color": "white",
                    "height": "10px",
                    "margin": "0px"
                })
                $(this).html('<input type="text" type="search" class="subsearch" placeholder="Keresés"/>');
                $('input', this).on('keyup change', function() {
                    if (table.column(i).search() !== this.value) {
                        table
                            .column(i)
                            .search(this.value)
                            .draw();
                    }
                });
            });
            var table = $('#tad-table').DataTable({
                "language": {
                    "emptyTable": "Nincs rendelkezésre álló adat",
                    "info": "Találatok: _START_ - _END_ Összesen: _TOTAL_",
                    "infoEmpty": "Nulla találat",
                    "infoFiltered": "(_MAX_ összes rekord közül szűrve)",
                    "infoThousands": " ",
                    "lengthMenu": "_MENU_ találat oldalanként",
                    "loadingRecords": "Betöltés...",
                    "processing": "Feldolgozás...",
                    "search": ":",
                    "zeroRecords": "Nincs a keresésnek megfelelő találat",
                    "paginate": {
                        "first": "Első",
                        "previous": "Előző",
                        "next": "Következő",
                        "last": "Utolsó"
                    },
                    "aria": {
                        "sortAscending": ": aktiválja a növekvő rendezéshez",
                        "sortDescending": ": aktiválja a csökkenő rendezéshez"
                    },
                    "select": {
                        "rows": {
                            "_": "%d sor kiválasztva",
                            "1": "1 sor kiválasztva"
                        },
                        "1": "%d sor kiválasztva",
                        "_": "%d sor kiválasztva",
                        "cells": {
                            "1": "1 cella kiválasztva",
                            "_": "%d cella kiválasztva"
                        },
                        "columns": {
                            "1": "1 oszlop kiválasztva",
                            "_": "%d oszlop kiválasztva"
                        }
                    },
                    "buttons": {
                        "colvis": "Oszlopok",
                        "copy": "Másolás",
                        "copyTitle": "Vágólapra másolás",
                        "copySuccess": {
                            "_": "%d sor másolva",
                            "1": "1 sor másolva"
                        },
                        "collection": "Gyűjtemény",
                        "colvisRestore": "Oszlopok visszaállítása",
                        "copyKeys": "Nyomja meg a CTRL vagy u2318 + C gombokat a táblázat adatainak a vágólapra másolásához.<br \/><br \/>A megszakításhoz kattintson az üzenetre vagy nyomja meg az ESC billentyűt.",
                        "csv": "CSV",
                        "excel": "Excel",
                        "pageLength": {
                            "-1": "Összes sor megjelenítése",
                            "1": "1 sor megjelenítése",
                            "_": "%d sor megjelenítése"
                        },
                        "pdf": "PDF",
                        "print": "Nyomtat"
                    },
                    "autoFill": {
                        "cancel": "Megszakítás",
                        "fill": "Összes cella kitöltése a következővel: <i>%d<\/i>",
                        "fillHorizontal": "Cellák vízszintes kitöltése",
                        "fillVertical": "Cellák függőleges kitöltése"
                    },
                    "searchBuilder": {
                        "add": "Feltétel hozzáadása",
                        "button": {
                            "0": "Keresés konfigurátor",
                            "_": "Keresés konfigurátor (%d)"
                        },
                        "clearAll": "Összes feltétel törlése",
                        "condition": "Feltétel",
                        "conditions": {
                            "date": {
                                "after": "Után",
                                "before": "Előtt",
                                "between": "Között",
                                "empty": "Üres",
                                "equals": "Egyenlő",
                                "not": "Nem",
                                "notBetween": "Kívül eső",
                                "notEmpty": "Nem üres"
                            },
                            "number": {
                                "between": "Között",
                                "empty": "Üres",
                                "equals": "Egyenlő",
                                "gt": "Nagyobb mint",
                                "gte": "Nagyobb vagy egyenlő mint",
                                "lt": "Kissebb mint",
                                "lte": "Kissebb vagy egyenlő mint",
                                "not": "Nem",
                                "notBetween": "Kívül eső",
                                "notEmpty": "Nem üres"
                            },
                            "string": {
                                "contains": "Tartalmazza",
                                "empty": "Üres",
                                "endsWith": "Végződik",
                                "equals": "Egyenlő",
                                "not": "Nem",
                                "notEmpty": "Nem üres",
                                "startsWith": "Kezdődik"
                            }
                        },
                        "data": "Adat",
                        "deleteTitle": "Feltétel törlése",
                        "logicAnd": "És",
                        "logicOr": "Vagy",
                        "title": {
                            "0": "Keresés konfigurátor",
                            "_": "Keresés konfigurátor (%d)"
                        },
                        "value": "Érték"
                    },
                    "searchPanes": {
                        "clearMessage": "Szűrők törlése",
                        "collapse": {
                            "0": "Szűrőpanelek",
                            "_": "Szűrőpanelek (%d)"
                        },
                        "count": "{total}",
                        "countFiltered": "{shown} ({total})",
                        "emptyPanes": "Nincsenek szűrőpanelek",
                        "loadMessage": "Szűrőpanelek betöltése",
                        "title": "Aktív szűrőpanelek: %d"
                    },
                    "searchPlaceholder": ""
                },
                columnDefs: [
                    { targets: 'no-sort', orderable: false, searchable: false }
                ],
                orderCellsTop: true,
                fixedHeader: true
            });
        } else {
            var searchhead = $('thead tr').clone(true).appendTo('thead');
            searchhead.addClass('search-header')
            $('thead tr:eq(1) th').each(function(i) {
                var elem = $(this)
                if (elem.hasClass('no-sort')) {
                    elem.css("height", "30px")
                    elem.css("height", "30px")
                    elem.css('background-color', 'white')
                    elem.html('');
                    return;
                }
                elem.css({
                    "background-color": "white",
                    "height": "10px",
                    "margin": "0px"
                })
                $(this).html('<input type="text" type="search" class="subsearch" placeholder="Search"/>');
                $('input', this).on('keyup change', function() {
                    if (table.column(i).search() !== this.value) {
                        table
                            .column(i)
                            .search(this.value)
                            .draw();
                    }
                });
            });
            var table = $('#tad-table').DataTable({
                "language": {
                    "search": ""
                },
                columnDefs: [
                    { targets: 'no-sort', orderable: false, searchable: false }
                ],
                orderCellsTop: true,
                fixedHeader: true,
            });
        }
    });

});