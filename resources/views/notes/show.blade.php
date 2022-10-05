<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Current Note') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div calss="flex max-w-7xl mx-auto sm:px-6 lg:px-8">
                <x-alert-success>
                    {{ session('success') }}
                </x-alert-success>
                <p>
                    <strong class="opacity-70">Created: </strong> {{ $note->created_at->diffForHumans() }}
                    <strong class="opacity-70 ml-12">Updated at: </strong> {{ $note->updated_at->diffForHumans() }}
                    <a href="{{ route('notes.edit', $note) }}" class="btn-link" >Edit Note</a>
                    <form action="{{ route('notes.destroy', $note) }}" method="post">
                       @method('delete')
                       @csrf

                       <button type="submit" class="btn btn-danger ml-4" onclick="return confirm('Are you sure you want to delete this note?')">Delete Note</button>
                    
                    </form>
                </p>
               {{--   <p class="opacity-70 ml-13">
                    <strong>Updated at: </strong> {{ $note->updated_at->diffForHumans() }}
                </p>--}}
                {{--  <a href="{{ route('notes.edit', $note) }}" class="btn-link ml-auto" >Edit Note</a>--}}
            </div>

            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <h2 class="font-bold text-4xl">
                   {{ $note->title }}
                </h2>
                <p class="mt-6"> {{ $note->text }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
