$(document).ready(function(){
    $('#careers').DataTable({
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": true,
        columnDefs: [ 
            { responsivePriority: 10001, targets: 0 },
            { responsivePriority: 10001, targets: 1 },
            { responsivePriority: 10001, targets: 2 },
            { responsivePriority: 10001, targets: 3 },
        ]
    });
});