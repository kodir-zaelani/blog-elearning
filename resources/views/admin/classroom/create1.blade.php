@extends('admin.templates.default')
@section("title")Posts @endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Berita</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-book-open"></i> Tambah Rombongan Belajar</h4>
                    </div>
                    
                    <div class="card-body">
                        <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>LEVEL CLASS</label>
                                        <select class="form-control select-category @error('levelclass_id') is-invalid @enderror" 
                                        id="myLevelclassselect" name="levelclass_id" onchange="myLevelclass()">
                                            <option value="">-- SELECT --</option>
                                            @foreach ($levelclasses as $levelclass)
                                                <option value="{{ $levelclass->id }}">
                                                    {{ $levelclass->title }} | {{ $levelclass->idalphabet }} | {{ $levelclass->enalphabet }}
                                                </option>
                                            @endforeach
                                        </select>
                                       
                                        @error('levelclass_id')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                            <div class="form-group">
                                                <label>DEPARTMENT</label>
                                                <select class="form-control select-category @error('departmen_id') is-invalid @enderror" 
                                                id="myDepartmentselect" name="departmen_id" onchange="myDepartment()">
                                                    <option value="">-- SELECT --</option>
                                                    @foreach ($departments as $department)
                                                        <option value="{{ $department->id }}">{{ $department->title_id }}</option>
                                                    @endforeach
                                                </select>
                                                @error('department_id')
                                                <div class="invalid-feedback" style="display: block">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>ROOM</label>
                                        <select class="form-control select-category @error('room_id') is-invalid @enderror" 
                                        name="room_id" id="myRoomselect" onchange="myRoom()" >
                                            <option value="">-- SELECT --</option>
                                            @foreach ($rooms as $rooms)
                                                <option value="{{ $rooms->id }}">
                                                    {{ $rooms->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('levelclass_id')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label >Classroom: </label>
                                <label id="idlevelclass"></label> -
                                <label id="iddepartmen"></label> -
                                <label id="idroom"></label> -
                                <input type="text"  name="levelclasse" >
                                <input type="text" id="department" name="departmente" >
                                <input type="text" id="room" name="roome" >
                                {{-- <input type="text" name="complete_title" value="{{ old('complete_title') }}" placeholder="Masukkan Judul Berita" class="form-control @error('complete_title') is-invalid @enderror"> --}}

                                @error('complete_title')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                {{-- <label>Ruang</label>
                                <input type="text" name="short_title" value="{{ old('short_title') }}" placeholder="Masukkan Judul Berita" class="form-control @error('short_title') is-invalid @enderror"> --}}

                                @error('short_title')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> SIMPAN</button>
                            <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('admin.partials.ckeditor')
    
    
    <script>
    function myFunction() {
      var x = document.getElementById("mySelect").value;
      document.getElementById("demo").innerHTML = "You selected: " + x;
    }
    </script>

    <script>
    function myLevelclass() {
      var levelcs = document.getElementById("myLevelclassselect").value;
      document.getElementById("idlevelclass").innerHTML = levelcs;
    }
    </script>
    <script>
    function myDepartment() {
      var dept = document.getElementById("myDepartmentselect").value;
      document.getElementById("iddepartmen").innerHTML = dept;
    }
    </script>
    <script>
    function myRoom() {
      var rm = document.getElementById("myRoomselect").value;
      document.getElementById("idroom").innerHTML = rm;
    }
    </script>
    

    @push('page-style')
    <!-- Jasny Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('/assets/admin/modules/jasny-bootstrap/4.0.0/css/jasny-bootstrap.min.css')}}">
    @endpush

    @push('page-script')
    <!-- Jasny Bootstrap 4 -->
    <script src="{{ asset('/assets/admin/modules/jasny-bootstrap/4.0.0/js/jasny-bootstrap.min.js')}}"></script>
    @endpush

@stop