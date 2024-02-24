@extends ('layouts.template')

@section('konten')
@include('dashboard.header')
@include('dashboard.navbar')
@include('dashboard.sidebar')

    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-statistic-2">
                        <div class="card-stats">
                            <div class="card-stats-title text-center">
                                <h2>Data Reservasi</h2>
                            </div>
                        </div>
                    </div>
                </div>
                @include('komponen.pesan')
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Reservasi</h4>
                            <!-- TOMBOL TAMBAH DATA -->
                            <div class="card-header-action">
                              <a href="{{ url('reservasi/create') }}" class="btn btn-primary">Tambah Data Reservasi<i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                      <div class="card-body p-0">
                            <div class="table-responsive table-invoice">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="col-md-1">No Meja</th>
                                            <th class="col-md-2">Nama</th>
                                            <th class="col-md-2">Email</th>
                                            <th class="col-md-2">Waktu</th>
                                            <th class="col-md-2">No Telp</th>
                                            <th class="col-md-1">Of People</th>
                                            <th class="col-md-3">Deskripsi</th>
                                            <th class="col-md-3">Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $id = $data->firstItem() ?>
                                        @foreach ($data as $m)             
                                        <tr>
                                            <td>{{ $m->no_meja }}</td>
                                            <td>{{ $m->name }}</td>
                                            <td>{{ $m->email }}</td>
                                            <td>{{ $m->date }}</td>
                                            <td>{{ $m->no_tlp }}</td>
                                            <td>{{ $m->people }}</td>
                                            <td>{{ $m->message }}</td>
                                            <td>
                                                <a href='{{url('reservasi/'. $m->id .'/edit')}}' class="btn btn-warning btn-sm">Edit</a>
                                                <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{url('reservasi/'.$m->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" name="submit" id="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php $id++ ?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    {{$data->withQueryString()->links()}}
    <!-- AKHIR DATA -->

@include('dashboard.footer')
@endsection

