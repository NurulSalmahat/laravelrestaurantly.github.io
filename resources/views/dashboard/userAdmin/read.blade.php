@extends ('layouts.template')

@section('konten')
@include('dashboard.header')
@include('dashboard.navbar')
@include('dashboard.sidebar')

    <div class="main-content">
        @if (Session::has('success'))
            <div class="pt-3">
                <div class="alert alert-success ">
                    {{Session::get('success')}}
                </div>
            </div>
        @endif
        <section class="section">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-statistic-2">
                        <div class="card-stats">
                            <div class="card-stats-title text-center">
                                <h2>Riwayat Login</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Riwayat Login</h4>
                            <!-- TOMBOL TAMBAH DATA -->
                        </div>
                      <div class="card-body p-0">
                            <div class="table-responsive table-invoice">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="col-md-1">Nama</th>
                                            <th class="col-md-2">Username</th>
                                            <th class="col-md-2">Email</th>
                                            <th class="col-md-2">password</th>
                                            <th class="col-md-2">role</th>
                                            <th class="col-md-2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $u)             
                                        <tr>
                                            <td>{{$u->name}}</td>
                                            <td>{{$u->username}}</td>
                                            <td>{{$u->email}}</td>
                                            <td class="hide-password" style="-webkit-text-security: disc;">{{$u->password}}</td>
                                            <td>{{ $u->role }}</td>
                                            <td>
                                                <form onsubmit="return confirm ('Yakin menghapus data?')" class="d-inline" action="{{'userAdmin/'.$u->id}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm p-2" name="submit">DEL</button>
                                                </form>
                                            </td>
                                        </tr>
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
    
    <!-- AKHIR DATA -->


    @include('dashboard.footer')
    @endsection
