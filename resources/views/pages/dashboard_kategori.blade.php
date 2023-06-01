@include('partials.header')

<div class="wrapper">

  @include('components.sidebar')

  <div class="main-panel">

    @include('components.topbar')
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li><a href="#">Admin</a></li>
              <li class="active">{{ $title }}</li>
            </ol>
          </div>
        </div>
        <form action="/dashboard-kategori" method="POST">
          @csrf
          @if (session('pesanKodeBarang'))
          <div class="alert alert-info">
            {{ session('pesanKodeBarang') }}
          </div>
          @endif
          <div class="form-group">
            <label for="kode-barang">Kode Barang:</label>
            <input type="text" class="form-control" id="kode-barang" name="kode_barang"
              placeholder="Masukkan kode barang">
            @if ($errors->has('kode_barang'))
            <span class="help-block">
              {{ $errors->first('kode_barang') }}
            </span>
            @endif
          </div>
          <div class="form-group">
            <label for="nama-kategori">Nama Kategori:</label>
            <input type="text" class="form-control" id="nama-kategori" name="kategori"
              placeholder="Masukkan nama kategori">
            @if ($errors->has('kategori'))
            <span class="help-block">
              {{ $errors->first('kategori') }}
            </span>
            @endif
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
    @include('components/footer')
  </div>
</div>
@include('partials/footer')