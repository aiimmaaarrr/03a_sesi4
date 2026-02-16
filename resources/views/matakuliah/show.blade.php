<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Detail Peminat Mata Kuliah</title>
</head>
<body class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Detail Peminat Mata Kuliah</h4>
            <a href="{{ route('matakuliah.index') }}" class="btn btn-light btn-sm">Kembali</a>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-4">
                    <table class="table table-borderless">
                        <tr>
                            <th>Kode MK</th>
                            <td>: {{ $matakuliah->kode_mk }}</td>
                        </tr>
                        <tr>
                            <th>Nama Mata Kuliah</th>
                            <td>: {{ $matakuliah->nama_mk }}</td>
                        </tr>
                        <tr>
                            <th>SKS</th>
                            <td>: {{ $matakuliah->sks }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <h5 class="border-bottom pb-2">Daftar Mahasiswa yang Mengambil:</h5>
            
            <div class="table-responsive">
                <table class="table table-hover mt-3">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Kelas</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Menggunakan relasi hasMany untuk menampilkan data mahasiswa --}}
                        @forelse($matakuliah->mahasiswas as $index => $mhs)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $mhs->nim }}</td>
                            <td>{{ $mhs->nama }}</td>
                            <td>{{ $mhs->kelas }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted italic">
                                Belum ada mahasiswa yang mengambil mata kuliah ini.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="alert alert-secondary small mt-3">
                Total Peminat: <strong>{{ $matakuliah->mahasiswas->count() }}</strong> Mahasiswa
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>