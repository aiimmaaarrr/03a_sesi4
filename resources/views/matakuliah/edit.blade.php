<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Mata Kuliah</title>
</head>
<body class="container mt-5">
    <h2>Edit Mata Kuliah</h2>

    <form action="{{ route('matakuliah.update', $matakuliah->kode_mk) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Kode MK (Tidak dapat diubah)</label>
            <input type="text" class="form-control" value="{{ $matakuliah->kode_mk }}" readonly>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Mata Kuliah</label>
            <input type="text" name="nama_mk" class="form-control" value="{{ old('nama_mk', $matakuliah->nama_mk) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">SKS</label>
            <input type="number" name="sks" class="form-control" value="{{ old('sks', $matakuliah->sks) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Semester</label>
            <input type="number" name="semester" class="form-control" value="{{ old('semester', $matakuliah->semester) }}">
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Update Data</button>
            <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</body>
</html>