<form action="{{ route('contacts.destroy', $contact->id) }}" id="delete-form" method="POST">
    @csrf
    @method('DELETE')
    <button type="button" class="btn btn-sm {{ $classType }} ml-1 w-100" id="delete-button">
        <i class="fa-solid fa-trash"></i>
        @if ($message)
            {{ $message }}
        @endif
    </button>
</form>
