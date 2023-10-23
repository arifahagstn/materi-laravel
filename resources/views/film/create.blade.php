@extends('template.master')

@section('content') 
  <!-- Content Header (Page header) -->
  <div class="content-wrapper">
      <section class="content-header">
          <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Film</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">General Form</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Quick Example</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('film.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="judul">Judul</label>
                  <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" placeholder="Masukan Judul Film">
                </div>
                @error('judul')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                <div class="form-group">
                    <label for="genre">Genre</label>
                    {{-- <input type="text" name="genre" id="genre"  class="form-control" placeholder="Enter Genre Anda"> --}}
                    <select name="genre" id="genre" class="form-control @error('genre') is-invalid @enderror">
                          <option disabled selected>--Pilih Salah Satu--</option>
                     @forelse ($genres as $key => $value )
                          <option value="{{ $value->id}}">{{ $value->nama}}</option>
                     @empty
                          <option disabled>--Data Masih Kosong--</option>
                     @endforelse
                  </select>
                  </div>
                  @error('genre')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                <div class="form-group">
                  <label for="tahun">Tahun</label>
                  <input type="number" name="tahun" id="tahun" class="form-control @error('tahun') is-invalid @enderror" placeholder="Masukan Tahun Film">
                </div>
                @error('tahun')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                <div class="form-group">
                  <label for="ringkasan">Ringkasan</label>
                  <textarea name="ringkasan" id="ringkasan" cols="30" rows="10" class="form-control @error('ringkasan') is-invalid @enderror" placeholder="Masukan Ringkasan Film"></textarea>
                </div>
                @error('ringkasan')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="poster">Poster</label>
                    <input type="file" name="poster" id="poster" class="form-control @error('poster') is-invalid @enderror" placeholder="Masukan Poster Film">
                  </div>
                  @error('poster')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
</div>
  <!-- /.content -->
@endsection