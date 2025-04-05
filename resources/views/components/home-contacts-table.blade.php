<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Contact</th>
            <th>E-mail</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->contact }}</td>
                <td>{{ $contact->email }}</td>
                <td class="d-flex">
                    <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-sm btn-outline-warning">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>

                    <form action="{{ route('contacts.destroy', $contact->id) }}" id="delete-form" method="POST"
                        class="ml-1">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-sm btn-outline-danger" form="delete-form"
                            onclick="confirm('Are you sure?') && this.closest('form').submit()">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
