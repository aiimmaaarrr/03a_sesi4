<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Daftar Mata Kuliah</title>
</head>
<body class="container mt-5">
    
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Mata Kuliah</h2>
        <div>
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-outline-secondary">Daftar Mahasiswa</a>
            <a href="{{ route('matakuliah.create') }}" class="btn btn-primary">Tambah MK</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark text-center">
            <tr>
                <th>Kode MK</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                {{-- Nama kolom diubah agar lebih sesuai dengan aksi klik --}}
                <th>Daftar Peminat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($matakuliahs as $mk)
            <tr>
                <td class="text-center">{{ $mk->kode_mk }}</td>
                <td><strong>{{ $mk->nama_mk }}</strong></td>
                <td class="text-center">{{ $mk->sks }}</td>
                
                {{-- PERBAIKAN: Mengganti <ul> menjadi Tombol Klik (Tugas Mandiri 6.2) --}}
                <td class="text-center">
                    <a href="{{ route('matakuliah.show', $mk->id) }}" class="btn btn-sm btn-info text-white">
                        <i class="bi bi-people"></i> Lihat ({{ $mk->mahasiswas->count() }}) Mahasiswa
                    </a>
                </td>

                <td class="text-center">
                    <a href="{{ route('matakuliah.edit', $mk->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    
                    <form action="{{ route('matakuliah.destroy', $mk->id) }}" method="POST" class="d-inline">
                        @csrf 
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>