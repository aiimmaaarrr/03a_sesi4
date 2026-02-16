<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Mahasiswa</title>
</head>
<body class="container mt-5">
    <h2>Edit Mahasiswa</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mahasiswa.update', $mahasiswa->nim) }}" method="POST">
        @csrf
        @method('PUT') <div class="mb-3">
            <label>NIM (Tidak dapat diubah)</label>
            <input type="text" name="nim" class="form-control" value="{{ $mahasiswa->nim }}" readonly>
        </div>

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $mahasiswa->nama) }}" required>
        </div>

        <div class="mb-3">
            <label>Kelas</label>
            <input type="text" name="kelas" class="form-control" value="{{ old('kelas', $mahasiswa->kelas) }}" required>
        </div>

        <div class="mb-3">
            <label>Mata Kuliah</label>
            <input type="text" name="matakuliah" class="form-control" value="{{ old('matakuliah', $mahasiswa->matakuliah) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Data</button>
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</body>
</html>