<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Create Note Button -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Create New
                        Note</button>

                    <!-- Centered Notes Table -->
                    <div class="table-responsive mx-auto" style="max-width: 800px;">

                        @forelse ($notes as $note)
                            <p>
                            <div class="text-center">
                                <button class="btn btn-primary" type="button" data-toggle="collapse"
                                    data-target="#collapseExample{{ $note->id }}" aria-expanded="false"
                                    aria-controls="collapseExample{{ $note->id }}">
                                    {{ $note->title }}
                                </button>
                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                    data-target="#updateModal{{ $note->id }}">
                                    Update Note
                                </button>
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#deleteModal{{ $note->id }}">
                                    Delete Note
                                </button>
                            </div>
                            </p>
                            <div class="collapse" id="collapseExample{{ $note->id }}">
                                <div class="card card-body">
                                    {{ $note->content }}
                                </div>
                            </div>

                            @include('notes.modals.update')
                            @include('notes.modals.delete')
                            @empty
                                <p class="text-center">No notes available.</p>
                            @endforelse

                    </div>

                    <!-- Create Modal -->
                    @include('notes.modals.create')
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
