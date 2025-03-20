@extends('layouts.main')

@section('container')
<div class="p-lg-4 p-2 container-xxxl flex-grow-1 pt-3">
  <div class="row">
    <div class="col-lg-8 col-md-8">
      <div class="divider text-center">
        <div class="divider-text">
            <h5 class="text-muted fw-bold"> <i class='bx bx-info-circle bx-tada' ></i> {{ $title }} : </h5>
        </div>
    </div>
      <div class="card p-3 mb-4">
        <div class="">
            <table class="table table-hover" id="dataTable">
                <thead>
                    <tr>
                        <th> No</th>
                        <th> Standar Pelayanan </th> 
                        <th> File </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($standar_pelayanan as $row )
                        <tr>
                            <td> {{ $loop->iteration }}</td>
                            <td> <a href="{{ asset('/storage/standar-pelayanan/'.$row->file) }}" target="_blank()"> {{ $row->nama }} </a> </td>
                            <td> <a href="{{ asset('/storage/standar-pelayanan/'.$row->file) }}" target="_blank()"> <i class='bx bxs-file-pdf'></i> Lihat File </a> </td>
                        </tr>
                    @endforeach
                        
                </tbody>
            </table>
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
