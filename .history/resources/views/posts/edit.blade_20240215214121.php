<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<x-app-layout>
    <div class="container">
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Create Post') }}
    </div>
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
            <textarea id="description" rows="10" class="block mt-1 w-full"  name="description"  {{ $post->description}}" required autofocus></textarea>
        </div>
        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{__('Submit') }}
            </x-primary-button>
        </div>
    </div>
    </form>
</x-app-layout>