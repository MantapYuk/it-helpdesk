<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Products - SantriKoding.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('tickets.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">IMAGE</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                            
                                <!-- error message untuk image -->
                                @error('image')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">NAMA</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama Anda">
                            
                                <!-- error message untuk nama -->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">EMAIL</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Masukkan Email Anda">
                            
                                <!-- error message untuk email -->
                                @error('email')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">PHONE</label>
                                <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Masukkan No HP Anda">
                            
                                <!-- error message untuk phone -->
                                @error('phone')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">SUBJECT</label>
                                <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" value="{{ old('subject') }}" placeholder="Masukkan Subject Keluhan">
                                
                                <!-- error message untuk subject -->
                                @error('subject')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                                
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">MESSAGE</label>
                                <textarea class="form-control @error('massage') is-invalid @enderror" name="massage" rows="5" placeholder="Masukkan Deskripsi Anda">{{ old('massage') }}</textarea>
                                
                                <!-- error message untuk massage -->
                                @error('massage')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- Dropdown for unit -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">UNIT</label>
                                <select class="form-select @error('unit') is-invalid @enderror" name="unit">
                                    <option value="" disabled selected>Select Unit</option>
                                    <option value="Dosen" {{ old('unit') == 'Dosen' ? 'selected' : '' }}>Dosen</option>
                                    <option value="Mahasiswa" {{ old('unit') == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                                    <option value="Karyawan" {{ old('unit') == 'Karyawan' ? 'selected' : '' }}>Karyawan</option>
                                    <!-- Add more options as needed -->
                                </select>
                                
                                <!-- error message for unit -->
                                @error('unit')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary me-3">SAVE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'massage' );
    </script>
</body>
</html>