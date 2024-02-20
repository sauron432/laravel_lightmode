<x-app-layout>
    <div class="container">
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Create Post') }}
    </div>
    <?php
    $error = '';
    if ($errors->any()) 
    {
        echo "adasdsadasdasd"
        foreach ($errors->all() as $message) 
        {
            $error .= $message.'<br>';
        }
    }
    ?>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form method="POST" action="{{ route('post.update',['postid'=>$post->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Title -->
        <div>
            <label for="title">{{ __('Title') }}</label>
            <input id="title" class="block mt-1 w-full" type="text" name="title"  value='{{ $post->title }}' required autofocus />
        </div>
         <!-- Description -->
         <div>
            <label for="description">{{ __('Description') }}</label>
            <textarea id="description" rows="10" class="block mt-1 w-full"  name="description" required autofocus>{{ $post->description}}</textarea>
        </div>
        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{__('Submit') }}
            </x-primary-button>
        </div>
    </div>
    </form>
    <footer>
        <script>
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger"
                },
                buttonsStyling: false
            });
            $(".delete-button").click(function() {
                let postid=$(this).attr('data-id');
                swalWithBootstrapButtons.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url:'/admin/post/delete/' + postid,
                            success:function(result)
                            {
                                let message = JSON.parse(result);
                                if(message.status)
                                {
                                    swalWithBootstrapButtons.fire({
                                        title: "Deleted!",
                                        text: message.message,
                                        icon: "success"
                                    });
                                }
                                else
                                {
                                    swalWithBootstrapButtons.fire({
                                        title: "Cancelled",
                                        text: message.message,
                                        icon: "error"
                                    });
                                }
                            }
                        })
                    } else if (
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                    }
                });
            });
            $(document).ready(function() {
                new DataTable('#postTable');
                if ($('#success').val() != '') 
                {
                    Swal.fire({
                        position: "bottom-end",
                        icon: "success",
                        title: $('#success').val(),
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
                if ($('#error').val() != '') {
                    Swal.fire({
                        position: "bottom-end",
                        icon: "error",
                        title: $('#error').val(),
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
                // if ($('#error1').val() != '') {
                //     Swal.fire({
                //         position: "bottom-end",
                //         icon: "error",
                //         title: $('#error').val(),
                //         showConfirmButton: false,
                //         timer: 2000
                //     });
                // }
                
            });
        </script>        
    </footer>
</x-app-layout>