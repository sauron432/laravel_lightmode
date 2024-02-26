//laravelproject\resources\views\index.blade.php
<!DOCTYPE html>
<html>
<head>
    <title>Laravel Datatables Yajra Server Side</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
 
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>
<body>
<div class="container">
    <br />
    <h3 align="center">Laravel Datatables Yajra Server Side</h3>
    <br />
    <div align="right">
        <button type="button" name="add" id="add_data" class="btn btn-success"> <i class="bi bi-plus-square"></i> Add</button>
    </div>
    <br />
    <table id="customer_table" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Sn</th>
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
                <th>
                    <button type="button" name="bulk_delete" id="bulk_delete" class="btn btn-danger btn-xs"><i class="bi bi-backspace-reverse-fill"></i></button>
                </th>
            </tr>
        </thead>
    </table>
</div>
 
<script type="text/javascript">
$(document).ready(function() {
     $('#customer_table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('getdata') }}",
        "columns":[
            { "data": "CustomerName" },
            { "data": "Address" },
            { "data": "City" },
            { "data": "PostalCode" },
            { "data": "Country" },
            { "data": "action", orderable:false, searchable: false},
            { "data":"checkbox", orderable:false, searchable:false}
        ]
     });
});
</script>
</body>
</html>