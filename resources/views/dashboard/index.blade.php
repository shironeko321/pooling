@extends('layout.dashboard')

@section('main')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $mahasiswa }}</h3>
              <p>Mahasiswa</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ route('mahasiswa.index') }}" class="small-box-footer">More info <i
                class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- /.col-md-6 -->
        <div class="col-lg-6">
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ $pemilih }}</h3>

              <p>Pemilih</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i
                class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col">
          <canvas id="myChart"></canvas>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </div>
@endsection

@push('style')
  <link rel="stylesheet" href="{{ asset('assets/plugins/chart.js/Chart.css') }}">
@endpush

@push('script')
  <script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>

  <script>
    let data = {{ Js::from($jumlah) }}
    let ctx = document.getElementById('myChart').getContext('2d')

    let label = data.map(v => v.label)
    let jumlah = data.map(v => v.data)
    let backgroundColor = data.map(v => v.backgroundColor)


    let chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'bar',
      // The data for our dataset
      data: {
        labels: label,
        datasets: [{
          label: 'Statistik Suara',
          data: jumlah,
          backgroundColor: backgroundColor,
          borderColor: backgroundColor,
          borderWidth: 1
        }]
      },

      // Configuration options go here
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  </script>
@endpush
