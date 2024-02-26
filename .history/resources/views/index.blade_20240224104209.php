<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>
    <input type="text" id="success" value="{{ session('success') }}" readonly hidden>
    <input type="text" id="error" value="{{ session('error') }}" readonly hidden>
    <div class="container py-6">
        @foreach ($posts as $post)
            <div class="mb-3">
                <div class="title-div bg-white p-3 ">
                    <h2 class="font-semibold" >{{ $post->title }}</h2>
                    <p class="my-2">
                       {{ $post->description }}
                    </p>
                    <div class="comment-section">
                        <div class="comment-area">
                            
                        </div>
                        <hr class="my-2">
                        <div class="form-group mb-2">
                            <textarea name="comment" placeholder="Add A Comment" class="form-control" id="post-{{$post->id}}" rows="3"></textarea>
                        </div>
                    </div>
                    <div>
                        <span class="btn like-btn btn-primary" data-id="{{ $post->id }}">Like</span>
                        <span class="btn comment-btn btn-light" data-id="{{ $post->id }}">Comment</span>
                    </div>
                    <div class="comment-div ms-3">
                    </div>
                </div> 
            </div>
        @endforeach

    </div>
</x-app-layout>
<script>
    $(document).ready(function() {
        $(".comment-btn").click(function(event) {
            event.preventDefault();
            let postid = $(this).attr('data-id');
            let comment = $(`#post-${postid}`).val();
            if(comment){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: "post",
                    url: '/admin/post/addComment',
                    data: {
                        post_id: postid,
                        comment: comment
                    },
                    //post
                    success: function(result) {
                        if (result.status && result.status == 200) {
                            console.log(result)
                            //add comment
                            //success message
                            //$(".comment-btn").append
                        } else {
                            //error message
                        }
    
                    }
                })
            }else{
                alert("Comment Needs to be entered.")
            }
        });
    });
</script>
