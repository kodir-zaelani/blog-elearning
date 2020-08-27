<div>
    {{-- <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">Gerinda - Kalimatan Timur</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
              <ul class="navbar-nav mr-auto mb-2 mb-md-0">
                <li class="nav-item active">
                  <a class="nav-link" aria-current="page" href="{{ route('root') }}">Home</a>
                </li>
              
              </ul>
              <form class="d-flex">
                <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
            </div>
          </div>
        </nav>
      </header> --}}

<main class="flex-shrink-0">
    <div class="container">
        <div class="row mb-4">
            <div class="col text-center">
                <h1>SELAMAT DATANG</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                {{-- <div class="post col-xl-4 col-lg-4 col-md-12 col-xs-12 mb-4"> --}}
                    <div class="card h-100  border-0 rounded-lg">
                        <div class="card-img text-center">
                            <img src="{{ asset('/storage/logo/logogerindra.png') }}" class="w-100" style="max-width: 30%;">
                        </div>
                        <div class="card-body text-center">
                            <h2>RAPAT PIMPINAN DAERAH</h2>
                            <h1>P A R T A I &nbsp;&nbsp; G E R I N D R A</h1>
                            <h3>SE-KALIMANTAN TIMUR</h3>
                        </div>  
                    </div>
                {{-- </div> --}}
            </div>
            <div class="col">
                <div class="card h-100  border-0 rounded-lg">
                 
                  @foreach ($participants as $participant)
                    <div class="card-img text-center">
                      <img src="{{ ($participant->imageurl) ? $participant->imageurl : '/assets/admin/img/avatar/avatar-5.png' }}"  
                      class=" img-thumbnail" style="max-width: 50%;">
                    </div>
                    <div class="card-body text-center">
                      <h3> <strong>{{ $participant->name }}</strong></h3>
                      {{-- <h1>{!! QrCode::generate($participant->nik); !!}</h1> --}}
                      <h3>{{ $participant->statuspeserta }}</h3>
                      
                    </div> 
                    @endforeach 
                </div>
            </div>
        </div>
      
    </div>
  </main>

  
</div>
