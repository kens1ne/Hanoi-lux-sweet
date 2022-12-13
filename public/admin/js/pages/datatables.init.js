document.addEventListener('DOMContentLoaded', function () {
    new DataTable('#example', {
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'print', 'pdf'],
        order: [[0, 'desc']],
    });
});
