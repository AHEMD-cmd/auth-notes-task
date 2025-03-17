<div class="modal fade" id="deleteModal{{ $note->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $note->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel{{ $note->id }}">Delete Note</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete "{{ $note->title }}"? This action cannot be undone.
            </div>
            <form action="{{ route('notes.destroy', $note->slug) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>