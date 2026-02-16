<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Tambah Mata Kuliah</title>
</head>
<body class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Tambah Mata Kuliah</h4>
        </div>
        <div class="card-body">
            {{-- Menampilkan Error Validasi sesuai Modul --}}
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
                
                {{-- Input Kode MK - Harus Unik (Langkah 4) --}}
                <div class="mb-3">
                    <label class="form-label font-weight-bold">Kode Mata Kuliah</label>
                    <input type="text" name="kode_mk" class="form-control" value="{{ old('kode_mk') }}" placeholder="Contoh: MK001">
                </div>

                {{-- Input Nama MK (Langkah 1) --}}
                <div class="mb-3">
                    <label class="form-label font-weight-bold">Nama Mata Kuliah</label>
                    <input type="text" name="nama_mk" class="form-control" value="{{ old('nama_mk') }}" placeholder="Masukkan nama mata kuliah">
                </div>

                {{-- Input SKS (Langkah 1) --}}
                <div class="mb-3">
                    <label class="form-label font-weight-bold">SKS</label>
                    <input type="number" name="sks" class="form-control" value="{{ old('sks') }}" placeholder="Jumlah SKS">
                </div>

                {{-- Input Semester dihapus karena tidak ada di Migration Langkah 1 --}}
                
                <div class="mt-4 border-top pt-3">
                    <button type="submit" class="btn btn-success">Simpan Data</button>
                    <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>