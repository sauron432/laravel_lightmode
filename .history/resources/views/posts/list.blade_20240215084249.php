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
        <input type="text" id='success' value='{{ session('success') }}' hidden>
        <input type="text" id='fail' value='{{ session('fail') }}' hidden>
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
    <script>
        $(document).ready( function ()
        {
            $('#postTable').DataTable();
            if($('#success').val() != '')
            {
                Swal.fire({
                    title: "Sweet!",
                    text: "Modal with a custom image.",
                    imageUrl: "https://unsplash.it/400/200",
                    imageWidth: 400,
                    imageHeight: 200,
                    imageAlt: "Custom image"
                    });
            })
        }
        </script>
</x-app-layout>
