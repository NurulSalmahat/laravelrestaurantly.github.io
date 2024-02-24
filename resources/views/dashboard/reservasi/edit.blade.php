<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Edit Reservasi &mdash; Restaurantly</title>

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
                  <form method="post" action="{{ url('reservasi/'.$data->id) }}" class="needs-validation" novalidate=""
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
                            <label for="no_meja">No Meja</label>
                            <input id="no_meja" type="text" class="form-control" name="no_meja" value="{{$data->id}}">
                            <div class="invalid-feedback">
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <label for="name">name</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{$data->name}}">
                            <div class="invalid-feedback">
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="text" class="form-control" name="email" value="{{$data->email}}">
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="date">date</label>
                            <input id="date" type="date" class="form-control" name="date" value="{{$data->date}}">
                            <div class="invalid-feedback">
                            </div>
                        </div>

                        <div class="form-group">
                          <label for="no_tlp">No Telp</label>
                          <input id="no_tlp" type="text" class="form-control" name="no_tlp" value="{{$data->no_tlp}}">
                          <div class="invalid-feedback">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="people">People</label>
                          <input id="people" type="number" class="form-control" name="people" value="{{$data->people}}">
                          <div class="invalid-feedback">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="message">message</label>
                          <input id="message" type="text" class="form-control" name="message" value="{{$data->message}}">
                          <div class="invalid-feedback">
                          </div>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" name="submit" id="submit">SIMPAN </button>
                        </div>
                        <form>
                            <a href="{{ url('/reservasi') }}" class="btn btn-secondary btn-lg btn-block">KEMBALI</a>
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