@if(session()->has('success'))
              <div class="alert alert-success">
                <i class="fa fa-check"></i> &bull; {{ session('success') }}
              </div>
            @endif
@if(session()->has('error'))
            <div class="alert alert-danger">
              <i class="fa fa-times"></i> {{ session('error') }}
            </div>
          @endif