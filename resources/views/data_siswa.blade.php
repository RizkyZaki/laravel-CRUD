@extends('template.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2" id="title">add siswa</h1>
</div>
<form id="form">
    <div class=" row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama</label>
                <input type="text" id="nama" class="form-control @error('nama') is-invalid @enderror" name="nama"
                    aria-describedby="emailHelp">
                @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Kelas</label>
                <input type="number" id="kelas" name="kelas" class="form-control @error('kelas') is-invalid @enderror">
                @error('kelas')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" id="btn" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>

<div class="shadow mt-3 px-3 py-3 rounded">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody id="tabel">
            @php
            $nomor = 1;
            @endphp
            @foreach ($siswa as $item)
            <tr>
                <td>{{$nomor}}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->kelas}}</td>
                <td class="text-center"><button class="btn btn-primary btn-sm" onclick="edit({{$item->id}})"
                        role="button">Edit</button>
                    <button class="btn btn-danger btn-sm" onclick="hapus({{$item->id}})" role="button">Delete</button>
                </td>
            </tr>
            @php
            $nomor++;
            @endphp
            @endforeach
        </tbody>
    </table>
</div>
<script>
    const form = document.querySelector('form');
    let id_siswa = 0

    form.addEventListener('submit', function (e) {
            e.preventDefault();
            let url = '{{url('siswa/store')}}'

            if (id_siswa > 0) {
                url = '{{url('siswa/edit/')}}' + '/' + id_siswa
            }
            const data = new FormData(form)

            fetch(url, {
                method: 'POST', 
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                body: data
            })
            .then(resp => resp.text())
            .then(data => {
                tabel.innerHTML = data
            })
        });

    async function edit(siswa) {
        id_siswa = siswa
        let response = await fetch ('{{url('siswa/edit/')}}' + '/'+ siswa)
        let data = await response.json()
        console.log(data)
        document.getElementById('nama').value=data.nama
        form.kelas.value=data.kelas
    }

</script>
@endsection