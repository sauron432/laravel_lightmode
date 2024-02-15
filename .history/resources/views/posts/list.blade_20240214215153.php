<head>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
</head>
<body class="text-white">
    
    <x-app-layout>
        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Posts') }}
        </div>
        
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        @include ('sweetalert::alert')
        <table id="postTable" class="text-white">
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
    <script
    src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
    crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function ()
        {
            $('#postTable').DataTable();
        })
        </script>
</x-app-layout>
</body>