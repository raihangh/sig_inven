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
        <div class="row">
          <div class="col-md-6">
            @if (session('pesanBarang'))
            <div class="alert alert-info">
              {{ session('pesanBarang') }}
            </div>
            @endif
            <form action="/dashboard-input-barang" method="POST">
              @csrf
              <div class="form-group">
                <label for="barang-name">Name:</label>
                <input type="text" class="form-control" id="barang-name" name="nama_barang"
                  value="{{ old('nama_barang') }}" placeholder="Enter the name of the item">
                @error('nama_barang')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="category">Kode barang:</label>
                <select class="form-control" id="category" name="kode_barang">
                  @foreach($kode_barang as $b)
                  <option value="{{ $b->kode_barang}}">{{ $b->kode_barang}}</option>
                  @endforeach
                </select>
                @error('kode_barang')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="barang-price">Price:</label>
                <input type="number" class="form-control" id="barang-price" min="0" name="harga" value="{{ old('harga') }}"
                  placeholder="Enter the price of the item">
                @error('harga')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="barang-quantity">Quantity:</label>
                <input type="number" class="form-control" id="barang-quantity" name="quantity" min="0"
                  value="{{ old('quantity') }}" placeholder="Enter the quantity of the item">
                @error('quantity')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="barang-quantity">Stok:</label>
                <input type="number" class="form-control" id="barang_quantity_pack" name="quantity_pack" min="0"
                  value="{{ old('quantity_pack') }}" placeholder="Enter the quantity of the item">
                @error('quantity_pack')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="barang-quantity">Status:</label>
                <input type="text" class="form-control" id="barang_quantity_pack" name="status"
                  value="{{ old('status') }}" placeholder="Enter the quantity of the item">
                @error('status')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
          <div class="col-md-6 bg-light">
            <h5>Daftar kode barang kategori</h5>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Kode Barang</th>
                  <th>Nama</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($kode_barang as $b)
                <tr>
                  <td>{{ $b->kode_barang}}</td>
                  <td>{{ $b->kategori }}</td>
                  <td style="display:flex; justify-content: center; gap: 5px">
                    <a href="/dashboard-barang-edit/{{ $b->id }}" class="btn btn-primary">Edit</a>
                    <form action="/dashboard-barang-delete/{{ $b->id }}" method="POST">
                      @csrf
                      @method("delete")
                      <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">Hapus</button>
                    </form>
                </tr>
                @endforeach
                <!-- Add more rows for additional items -->
              </tbody>
            </table>

          </div>
        </div>

      </div>
    </div>
    @include('components/footer')
  </div>
</div>
@include('partials/footer')