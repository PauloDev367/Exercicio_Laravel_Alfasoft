<form action="{{ route('contacts.destroy', $contact->id) }}" id="delete-form" method="POST">
    @csrf
    @method('DELETE')
    <button type="button" class="btn btn-sm btn-danger w-100" form="delete-form"
        onclick="confirm('Are you sure?') && this.closest('form').submit()">
        <i class="fa-solid fa-trash"></i> Delete contact
    </button>
</form>
