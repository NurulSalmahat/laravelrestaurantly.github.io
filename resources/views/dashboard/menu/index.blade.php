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
                                <h2>Data Menu</h2>
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
                            <h4>Data Menu</h4>
                            <!-- TOMBOL TAMBAH DATA -->
                            <div class="card-header-action">
                              <a href="{{ Route('menu.create') }}" class="btn btn-primary">Tambah Data Menu<i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                      <div class="card-body p-0">
                            <div class="table-responsive table-invoice">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="col-md-1">ID Menu</th>
                                            <th class="col-md-1">Menu</th>
                                            <th class="col-md-3">Deskripsi</th>
                                            <th class="col-md-2">Harga</th>
                                            <th class="col-md-2">Tampilan</th>
                                            <th class="col-md-3">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $id_menu = $data->firstItem() ?>
                                        @foreach ($data as $m)             
                                        <tr>
                                            <td>{{ $m->id_menu }}</td>
                                            <td>{{ $m->menu }}</td>
                                            <td>{{ $m->deskripsi }}</td>
                                            <td>{{ $m->harga }}</td>
                                            <td>
                                                <img src="{{ asset('menu-images/' . "$m->image")}}" width="100px">
                                            </td>
                                            <td>
                                                <a href='{{url('menu/'. $m->id .'/edit')}}' class="btn btn-warning btn-sm">Edit</a>
                                                <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{url('menu/'.$m->id_menu)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" name="submit" id="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php $id_menu++ ?>
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

