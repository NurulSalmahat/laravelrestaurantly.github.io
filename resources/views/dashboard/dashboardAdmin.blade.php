@include('dashboard.header')
@include('dashboard.navbar')
      
<!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
                  <div class="card-stats-items">
                    <div class="card-stats-item"></div>
                    <div class="card-stats-item"></div>
                    <div>
                      <div class="card-stats-item"></div>
                    </div>
                  </div>
                  <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-archive"></i>
                  </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Total User</h4>
                      </div>
                      <div class="card-body">{{ $count1 }}</div>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
                  <div class="card-stats-items">
                    <div class="card-stats-item"></div>
                    <div class="card-stats-item"></div>
                    <div>
                      <div class="card-stats-item"></div>
                    </div>
                  </div>
                  <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-archive"></i>
                  </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Total Chef</h4>
                      </div>
                      <div class="card-body">{{ $count3 }}</div>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
                  <div class="card-stats-items">
                    <div class="card-stats-item"></div>
                    <div class="card-stats-item"></div>
                    <div>
                      <div class="card-stats-item"></div>
                    </div>
                  </div>
                  <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-archive"></i>
                  </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Total Menu</h4>
                      </div>
                      <div class="card-body">{{ $count2 }}</div>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
                  <div class="card-stats-items">
                    <div class="card-stats-item"></div>
                    <div class="card-stats-item"></div>
                    <div>
                      <div class="card-stats-item"></div>
                    </div>
                  </div>
                  <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-archive"></i>
                  </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Total Reservasi</h4>
                      </div>
                      <div class="card-body">{{ $count4 }}</div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

@include('dashboard.sidebar')
@include('dashboard.footer')
      