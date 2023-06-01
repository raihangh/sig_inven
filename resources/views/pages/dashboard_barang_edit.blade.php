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
            <form action="/dashboard-barang-edit/{{ $barang->id }}" method="POST">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="barang-name">Name:</label>
                <input type="text" class="form-control" id="barang-name" name="nama_barang"
                  value="{{ $barang->nama_barang }}" placeholder="Enter the name of the item">
                @error('nama_barang')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="category">Kode barang:</label>

                <input type="text" class="form-control" id="kode_barang" name="kode_barang"
                  value="{{ $barang->kode_barang }}" required>

                @error('kode_barang')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="barang-price">Price:</label>
                <input type="text" class="form-control" id="barang-price" name="harga" value="{{ $barang->harga }}"
                  placeholder="Enter the price of the item">
                @error('harga')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="barang-quantity">Quantity:</label>
                <input type="text" class="form-control" id="barang-quantity" name="quantity"
                  value="{{ $barang->quantity}}" placeholder="Enter the quantity of the item">
                @error('quantity')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="barang-quantity">Stok:</label>
                <input type="text" class="form-control" id="barang_quantity_pack" name="quantity_pack"
                  value="{{ $barang->quantity_pack  }}" placeholder="Enter the quantity of the item">
                @error('quantity_pack')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="barang-quantity">Status:</label>
                <input type="text" class="form-control" id="barang_quantity_pack" name="status"
                  value="{{ $barang->status  }}" placeholder="Enter the quantity of the item">
                @error('status')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>

        </div>
      </div>
    </div>
    @include('components/footer')
  </div>
</div>
@include('partials/footer')