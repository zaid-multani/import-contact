@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="my-4 text-center">Contacts List</h2>

        @if (session('success'))
            <div class="alert alert-success" id="success-alert">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" id="error-alert">{{ session('error') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger" id="error-list-alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="d-flex justify-content-between mb-4">
            <div>
                @if ($contacts->isNotEmpty())
                    <a href="{{ route('contacts.export') }}" class="btn btn-rounded btn-export">
                        <i class="fas fa-download"></i> Export Contacts
                    </a>
                @endif

                <a href="{{ url('/contacts/create') }}" class="btn btn-primary btn-rounded ms-3">
                    <i class="fas fa-plus"></i> Add Contact
                </a>

                <a href="{{ asset('sample.xml') }}" class="btn btn-info btn-rounded ms-3" download>
                    <i class="fas fa-download"></i> Download Sample XML
                </a>
            </div>


            <form action="{{ url('/contacts/import') }}" method="POST" enctype="multipart/form-data"
                class="d-flex align-items-center">
                @csrf
                <div class="input-groupnew">
                    <input type="file" name="xml_file" required class="form-control"
                        style="max-width: 250px; border-radius: 25px;">
                    <button type="submit" class="btn btn-import">
                        <i class="fas fa-upload"></i> Import XML
                    </button>
                </div>
            </form>
        </div>

        <div class="card shadow-lg">
            <div class="card-header">Contacts</div>
            <div class="card-body">
                <div class="table-responsive">
                    @if ($contacts->isEmpty())
                        <p class="text-center">No contacts available.</p>
                    @else
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th> <i class="fa-solid fa-id-card"></i> Id</th>
                                    <th> <i class="fa-solid fa-file-signature"></i> Name</th>
                                    <th> <i class="fa-solid fa-phone"></i> Phone Number</th>
                                    <th> <i class="fas fa-edit"> </i> / <i class="fas fa-trash-alt"></i> Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <td>{{ $contact->id }}</td>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->phone_number }}</td>
                                        <td class="d-flex">
                                            <a href="{{ url('/contacts/' . $contact->id . '/edit') }}"
                                                class="btn btn-warning btn-sm me-2">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ url('/contacts/' . $contact->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this contact?')">
                                                    <i class="fas fa-trash-alt"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>

                <div class="d-flex justify-content-center mt-4">
                    {{ $contacts->links('vendor.pagination.bootstrap-4') }}
                </div>

            </div>
        </div>
    </div>

    <script>
        // Hide alerts after 5 seconds
        window.onload = function() {
            setTimeout(function() {
                var successAlert = document.getElementById('success-alert');
                var errorAlert = document.getElementById('error-alert');
                var errorListAlert = document.getElementById('error-list-alert');

                if (successAlert) {
                    successAlert.style.display = 'none';
                }
                if (errorAlert) {
                    errorAlert.style.display = 'none';
                }
                if (errorListAlert) {
                    errorListAlert.style.display = 'none';
                }
            }, 5000); // 5000 milliseconds = 5 seconds
        }
    </script>
@endsection
