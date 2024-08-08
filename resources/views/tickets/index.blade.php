<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Tickets - SantriKoding.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
</head>
<body style="background: #f8f9fa">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center mb-4">
                    <h3>Tutorial Laravel 11 untuk Pemula</h3>
                    <h5><a href="https://santrikoding.com" class="text-decoration-none">www.santrikoding.com</a></h5>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <a href="{{ route('tickets.create') }}" class="btn btn-success">ADD TICKET</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">IMAGE</th>
                                        <th scope="col">NAME</th>
                                        <th scope="col">EMAIL</th>
                                        <th scope="col">PHONE</th>
                                        <th scope="col">SUBJECT</th>
                                        <th scope="col">MESSAGE</th>
                                        <th scope="col">UNIT</th>
                                        <th scope="col" style="width: 20%">ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($tickets as $ticket)
                                        <tr>
                                            <td class="text-center">
                                                <img src="{{ asset('storage/tickets/'.$ticket->image) }}" class="img-thumbnail" style="max-width: 150px;">
                                            </td>
                                            <td>{{ $ticket->nama }}</td>
                                            <td>{{ $ticket->email }}</td>
                                            <td>{{ $ticket->phone }}</td>
                                            <td>{{ $ticket->subject }}</td>
                                            <td>{{ $ticket->massage }}</td>
                                            <td>{{ $ticket->unit }}</td>
                                            <td class="text-center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('tickets.destroy', $ticket->id) }}" method="POST">
                                                    <a href="{{ route('tickets.show', $ticket->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                                    <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">
                                                <div class="alert alert-warning">
                                                    No Tickets Available.
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            {{ $tickets->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Message with SweetAlert2
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>

</body>
</html>
