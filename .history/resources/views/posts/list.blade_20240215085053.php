<head>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<div class="container">
<x-app-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Posts') }}
    </div>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <input type="text" id="success" value="{{ session('success')}}" readonly hidden>
        <input type="text" id="error" value="{{ session('error')}}" readonly hidden>
        <a href="{{route('post.create')}}" class='btn btn-primary mb-4'>Create</a>
        <table id="postTable" style='width:100%' class='table table-bordered'>
            <thead>
                <th>SN</th>
                <th>Title</th>
                <th>Description</th>
            </thead>
            <tbody>
            @php
            $serialNumber = 1;
            @endphp
            @foreach ($posts as $post)
            <tr>
                <th>{{ $serialNumber++ }}</th>
                <th>{{ $post->title }}</th>
                <th>{{ $post->description }}</th>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    <script
    src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
    crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            new DataTable('#postTable');
            if ($('#success').val() != '') {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: $('#success').val(),
                    showConfirmButton: false,
                    timer: 1500
                });
            }
    
            if ($('#error').val() != '') {
                Swal.fire({
                    position: "top-end",
                    icon: "error",
                    title: $('#error').val(),
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });
    </script>
</x-app-layout>
