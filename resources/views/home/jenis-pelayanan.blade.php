@extends('layouts.main')

@section('container')
<section class="section">
    <div class="shadow section-header mb-1">
        <h1> <i class="fa fa-list-ol"></i>&nbsp; {{ $title }} :</h1>
        </div>

    <div class="mb-3 section-body ">
          
            @foreach ($data as $row)
                
                    <div class="card shadow mb-2">
                        <div class="card-body p-3 mb-1">
                            <div class="row">
                                <div class="col-md-4 col-lg-4 mb-3">
                                    @if($row->image)
                                    <img src="{{ asset('storage/'.$row->image) }}" width="100%" height="150" style="float:left; padding:0px; padding-right: 5px;">
                                     @else
                                     <img src="{{ asset('assets/img/news/img13.jpg') }}" width="100%" height="150" style="float:left; padding:0px; padding-right: 5px;">
                                    @endif
                                </div>
                                <div class="col-md-8 col-lg-8 text-justify">
                                    <h4><i class="fa fa-bookmark p-1"></i> <a href="/jenis-pelayanan/{{ $row->slug }}"> {{ $row->name }}</a></h4>
                                    <hr class="text-muted mb-3">
                                    {{  str_replace('<div>','',Str::limit($row->description, '300','...'))  }}
                                   <div class="article-cta text-right ">
                                    <a href="/jenis-pelayanan/{{ $row->slug }}"> Read More <i class="fas fa-chevron-right"></i> </a>
    
                                    </div> 
                                   
                                 </div>
                                 
                            </div>
                        </div>
                    </div>
            @endforeach
            <div class="pagination justify-content-end bg-whitesmoke p-2" align="right" style="text-align: center;">
                {{ $data->links() }} 
             </div>
        
            </div>
        </div>
    </div>
    
</section>    
 
@endsection
