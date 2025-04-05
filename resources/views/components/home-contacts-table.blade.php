<div class="overflow-x-scroll">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Contact</th>
                <th>E-mail</th>
                @if (auth()->user())
                    <th>Actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->id }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->contact }}</td>
                    <td>{{ $contact->email }}</td>
                    @if (auth()->user())
                        <td class="d-flex">
                            <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-sm btn-outline-warning">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <x-contacts-delete-form :contact="$contact" message="" classType="btn-outline-danger" />
                        </td>
                    @endif
                </tr>
            @endforeach

        </tbody>
    </table>

</div>
