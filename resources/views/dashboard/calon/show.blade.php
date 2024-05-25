@extends('layout.dashboard')

@section('main')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Calon</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Calon</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="row g-0">
          <div class="col-md-4 d-flex justify-content-center align-items-center pl-3">
            <img src='{{ asset("storage/images/$data->gambar") }}' class="card-img-top">
          </div>

          <div class="col-md-8">
            <div class="card-body">
              <ul class="nav nav-tabs" id="mytab" role="tablist">
                <li class="nav-item">
                  <button class="nav-link active" data-toggle="tab"
                    data-target="#profile">Profile</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-toggle="tab" data-target="#visi">Visi</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-toggle="tab" data-target="#misi">Misi</button>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="profile" role="tabpanel">
                  <div class="card mt-2">
                    <div class="card-header">Calon Ketua</div>
                    <div class="card-body">
                      <div class="row">
                        <span class="col-3">Nama</span>
                        <span class="col-9">{{ $data->calonketua->nama }}</span>
                      </div>
                      <div class="row">
                        <span class="col-3">NIM</span>
                        <span class="col-9">{{ $data->calonketua->nim }}</span>
                      </div>
                      <div class="row">
                        <span class="col-3">Jurusan</span>
                        <span class="col-9">{{ $data->calonketua->jurusan }}</span>
                      </div>
                    </div>
                  </div>

                  <div class="card">
                    <div class="card-header">Calon Wakil Ketua</div>
                    <div class="card-body">
                      <div class="row">
                        <span class="col-3">Nama</span>
                        <span class="col-9">{{ $data->calonwakilketua->nama }}</span>
                      </div>
                      <div class="row">
                        <span class="col-3">NIM</span>
                        <span class="col-9">{{ $data->calonwakilketua->nim }}</span>
                      </div>
                      <div class="row">
                        <span class="col-3">Jurusan</span>
                        <span class="col-9">{{ $data->calonwakilketua->jurusan }}</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="visi" role="tabpanel">
                  <div class="card mt-2">
                    <div class="card-body">
                      {!! $data->visi !!}
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="misi" role="tabpanel">
                  <div class="card mt-2">
                    <div class="card-body">
                      {!! $data->misi !!}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <a href="{{ route('calon.edit', ['calon' => $data->id]) }}" class="btn btn-primary">Edit</a>
    </div><!-- /.container-fluid -->
  </div>
@endsection
