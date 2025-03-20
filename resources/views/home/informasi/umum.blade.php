@extends('layouts.main')

@section('container')
<div class="p-4 container-xxxl flex-grow-1 pt-3">
  <div class="row">
    <div class="col-lg-8 col-md-8">
      <div class="divider text-center">
        <div class="divider-text">
            <h5 class="text-muted fw-bold"> <i class='bx bx-info-circle bx-tada' ></i> {{ $title }} : </h5>
        </div>
    </div>
      <div class="card p-3 mb-4">
               @if($data->count())
                       <div class="accordion mt-3" id="accordionExample">
                            @foreach ($data as $row)
                            <div class="card accordion-item mb-3">
                              <h2 class="accordion-header bl-primary" id="heading{{ $row->id }}">
                                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordion{{ $row->id }}" aria-expanded="false" aria-controls="accordion{{ $row->id }}">
                                  <i class='bx bx-bookmark-minus'></i> &nbsp; {{ $row->nama }}
                                </button>
                              </h2>
              
                              <div id="accordion{{ $row->id }}" class="accordion-collapse collapse @if($loop->iteration =='1') show @endif" data-bs-parent="#accordionExample" style="">
                                <div class="accordion-body">
                                  <embed src="{{ asset('storage/'.$row->file.'') }}" width="100%" height="500" alt="pdf" />
                                </div>
                              </div>
                            </div>
                          @endforeach
                          @endif
                        </div>
      </div>
        </div>
        <div class="col-lg-4 col-md-4">
            @include('layouts.menu-kanan')
        </div>
            {{-- @include('layouts.kategori') --}}
    </div>
</div>
@endsection
