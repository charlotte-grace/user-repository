<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-body">
            <p class="mb-4">Are you sure you want to delete <strong>{{ $user->first_name }}</strong>?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <form action="/users/{{ $user->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>