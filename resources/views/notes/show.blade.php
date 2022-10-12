<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ !$note->trashed() ? __('Your Current Note') : __('Trash')}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
            <div class="flex">
                @if(!$note->trashed())
                    <p>
                        <strong class="opacity-70">Created: </strong> {{ $note->created_at->diffForHumans() }}
                    </p>
                    <p> 
                        <strong class="opacity-70 ml-8">Updated: </strong> {{ $note->updated_at->diffForHumans() }}
                    </p>
                    
                    <a href="{{ route('notes.edit', $note) }}" class="btn-link ml-auto" >Edit Note</a>
                    
                      
                    <form action="{{ route('notes.destroy', $note) }}" method="post">
                        @method('delete')
                        @csrf

                        <button type="submit" class="btn btn-danger ml-4"
                        onclick="return confirm('Are you sure you want to move this note to trash?')"
                        >Move To Trash</button>
                        
                    </form>
                    
                @else
                    <p>
                        <strong class="opacity-70">Deleted: </strong> {{ $note->deleted_at->diffForHumans() }}
                    </p>
                    <form action="{{  route('trashed.update', $note)  }}" method="post" class="ml-auto">
                        @method('put')
                        @csrf

                        <button type="submit" class="btn-link" >Restore Note</a>
                    </form>
                    
                       <form action="{{ route('trashed.destroy', $note) }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger ml-4" 
                        onclick="return confirm('Are you sure you want to delete this note permenantly?')"
                        >Delete Permenantly</button>
                         </form> 
                     @endif

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
