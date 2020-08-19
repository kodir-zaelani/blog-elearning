@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Level Kelas</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-folder"></i> Edit Level Kelas</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.levelclass.update', $levelclass->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Nama Level Kelas</label>
                                <input type="text" name="title" value="{{ old('title', $levelclass->title) }}" placeholder="Masukkan Nama Level Kelas" class="form-control @error('title') is-invalid @enderror">

                                @error('title')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Id Alphabet</label>
                                <input type="text" name="idalphabet" value="{{ old('idalphabet', $levelclass->idalphabet) }}" placeholder="Alphabet (Id)" class="form-control @error('idalphabet') is-invalid @enderror">

                                @error('idalphabet')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>En Alphabet</label>
                                <input type="text" name="enalphabet" value="{{ old('enalphabet', $levelclass->enalphabet) }}" placeholder="Alphabet (En)" class="form-control @error('enalphabet') is-invalid @enderror">

                                @error('enalphabet')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> UPDATE</button>
                            <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop