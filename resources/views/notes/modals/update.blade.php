<div class="modal fade" id="updateModal{{ $note->id }}" tabindex="-1" aria-labelledby="updateModalLabel{{ $note->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel{{ $note->id }}">Edit Note</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('notes.update', $note->slug) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="updateTitle{{ $note->id }}" class="form-label">Title</label>
                        <input type="text" class="form-control" id="updateTitle{{ $note->id }}" name="title" value="{{ $note->title }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="updateContent{{ $note->id }}" class="form-label">Content</label>
                        <textarea class="form-control" id="updateContent{{ $note->id }}" name="content" rows="4" required>{{ $note->content }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>