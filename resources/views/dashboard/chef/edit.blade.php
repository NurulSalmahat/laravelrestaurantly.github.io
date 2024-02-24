<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Edit Menu &mdash; Restaurantly</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-social/bootstrap-social.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">

  <link rel="icon" href="{{ asset('assets/img/logo-1-removebg-preview.png') }}" />

  <!-- Start GA -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
  </script>
  <!-- /END GA -->
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="row">
            <div class="col-md-10">
              <div class="card card-primary">
                <div class="card-header">
                  <h4>Edit</h4>
                </div>

                <div class="card-body">
                  <form method="post" action="{{ url('chef/'  .$data->id) }}" class="needs-validation" novalidate=""
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                    @endif

                    <div class="card-body">
                        <div class="form-group">
                            <label for="id_chef">ID Chef</label>
                            <input id="id_chef" type="text" class="form-control" name="id_chef" value="{{$data->id}}">
                            <div class="invalid-feedback">
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{$data->name}}">
                            <div class="invalid-feedback">
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <label for="posisi">posisi</label>
                            <input id="posisi" type="text" class="form-control" name="posisi" value="{{$data->posisi}}">
                            <div class="invalid-feedback">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">email</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{$data->email}}">
                            <div class="invalid-feedback">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input id="image" type="file" class="form-control" name="image" value="{{Session::get('image')}}">
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" name="submit" id="submit">SIMPAN </button>
                        </div>
                        <form>
                            <a href="{{ url('/chef') }}" class="btn btn-secondary btn-lg btn-block">KEMBALI</a>
                        </form>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/modules/popper.js') }}"></script>
  <script src="{{ asset('assets/modules/tooltip.js') }} "></script>
  <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }} "></script>
  <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }} "></script>
  <script src="{{ asset('assets/modules/moment.min.js') }} "></script>
  <script src="{{ asset('assets/js/stisla.js') }} "></script>

  <!-- JS Libraies -->

  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js') }} "></script>
  <script src="{{ asset('assets/js/custom.js') }} "></script>
</body>

</html>