<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Tambah Mata Kuliah</title>
</head>
<body class="container mt-5">
    <h2>Tambah Mata Kuliah</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('matakuliah.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Kode MK</label>
            <input type="text" name="kode_mk" class="form-control" value="{{ old('kode_mk') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Mata Kuliah</label>
            <input type="text" name="nama_mk" class="form-control" value="{{ old('nama_mk') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">SKS</label>
            <input type="number" name="sks" class="form-control" value="{{ old('sks') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Semester</label>
            <input type="number" name="semester" class="form-control" value="{{ old('semester') }}">
        </div>
        
        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Simpan Data</button>
            <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</body>
</html>