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
        <input type="text" id="success" value="{{ session('success') }}" readonly hidden>
        <input type="text" id="error" value="{{ session('error') }}" readonly hidden>
        {{-- <input type="text" id='error1' value='{{$error}}' hidden> --}}
        <a href="{{ route('post.create') }}" class="btn btn-primary mb-4">Create Post</a>
        <table id="postTable" class="table table-bordered" style="width:100%">
            <thead>
                <th>SN</th>
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
            </thead>
            <tbody>
                @php
                    $serialNumber = 1;
                @endphp
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $serialNumber++ }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->description }}</td>
                        <td>
                            <a href="{{ route('post.edit', ['postid' => $post->id]) }}"
                                class="btn btn-primary mb-4">Edit</a>
                            <span class="btn btn-danger mb-4 delete-button" data-id={{ $post->id }}>Delete</span>
                            <a href="{{ route('post.viewpost',['postid' => $post->id]) }}" class="btn btn-danger mb-">Add Comment</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
 
<script type="text/javascript">
$(document).ready(function() {
     $('#customer_table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route(post.table) }}",
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