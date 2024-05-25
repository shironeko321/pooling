@extends('layout.index')

@push('style')
  <style>
    .card-img-overlay {
      opacity: 0;
      transition: .3s all;
    }

    .card:hover .card-img-overlay {
      opacity: 1;
      transition: .3s all;
    }
  </style>
@endpush

@section('content')
  <div class="min-vh-100 d-flex flex-column">
    @include('template.home.navbar')

    @if (session()->has('msg'))
      <div class="alert alert-success">
        {{ session()->get('msg') }}
      </div>
    @endif

    <div class="container h-100 flex-grow-1 d-flex justify-content-center align-items-center">
      <div class="row h-100 py-3 p-md-5 g-5">
        @foreach ($collection as $item)
          @if ($item->kotak_kosong != 1)
            <div @class([
                'col-12 col-md-6 align-self-center m-auto',
                'col-lg-4' => $loop->count > 2,
            ])>
              <a href="{{ route('detailcalon', ['calon' => $item->id]) }}"
                class="card border-0 shadow  text-decoration-none">
                <img src='{{ asset("storage/images/$item->gambar") }}' class="card-img" alt="..."
                  height="250">
                <div class="card-img-overlay bg-black" style="--bs-bg-opacity: .6">
                  <div class="card-body">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item flex-fill bg-transparent">
                        <p class="card-title">Calon Ketua</p>
                        <p class="card-subtitle mb-2 text-body-secondary">
                          {{ $item->calonketua->jurusan }}</p>
                        <p class="card-text">{{ $item->calonketua->nama }}</p>
                      </li>
                      <li class="list-group-item flex-fill bg-transparent">
                        <p class="card-title">Calon Wakil Ketua</p>
                        <p class="card-subtitle mb-2 text-body-secondary">
                          {{ $item->calonwakilketua->jurusan }}</p>
                        <p class="card-text">{{ $item->calonwakilketua->nama }}</p>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="card-footer">
                  <h2 class="text-center">Calon {{ $loop->iteration }}</h2>
                </div>
              </a>
            </div>
          @else
            <div class="col-12 col-md-4 align-self-center m-auto" style="order: 999">
              <div class="card">
                <img src="{{ asset('assets/img/Isolated_cardboard_box.jpg') }}" class="card-img-top"
                  alt="nothing">
                <div class="card-body">
                  <p>kotak kosong</p>
                </div>

                <div class="card-footer">
                  <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                    data-bs-target="#calonmodal">
                    Pilih Kotak Kosong
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="calonmodal" tabindex="-1"
                    aria-labelledby="calonmodallabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="calonmodallabel">Peringatan Memilih</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <p>Anda Yakin Ingin memilih kotak kosong</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger"
                            data-bs-dismiss="modal">Close</button>
                          <form action="{{ route('pilih') }}" method="post">
                            @csrf
                            <input type="hidden" name="pilihan" value="{{ $item->id }}">
                            <button type="submit" class="btn btn-primary">Pilih</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endif
        @endforeach
      </div>
    </div>
  </div>
@endsection
