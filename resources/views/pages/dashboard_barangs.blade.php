@include('partials.header')
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Barang Keluar</h4>
        </div>
        <div class="modal-body">
          <p><form method="POST" action="simpan_barang.php">
            <div>
                <label for="nama">Nama Barang:</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div>
                <label for="nama">Kode Barang:</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div>
                <label for="harga">Stok:</label>
                <input type="number" id="harga" name="harga" required>
            </div>
        </form></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  
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
                <div class="row" style="margin-top: 20px;">
                    <div class="col-lg-12 table-barang">
                        <table id="example" class="table table-striped table-bordered " style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama barang</th>
                                    <th>Kode barang</th>
                                    <th>Harga</th>
                                    <th>Isi pcs</th>
                                    <th>Stok</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $counter = 1;
                                @endphp
                                @foreach($barang as $b)
                                <tr>
                                    <td>{{ $counter }}</td>
                                    <td>{{ $b->nama_barang }}</td>
                                    <td>{{ $b->kode_barang }}</td>
                                    <td>{{ $b->harga }}</td>
                                    <td>{{ $b->quantity }}</td>
                                    <td>{{ $b->quantity_pack }}</td>
                                    @if ($b->status == 1)
                                    <td><span class="badge">Masuk</span></td>
                                    @endif
                                    <td style="display:flex; justify-content: center; gap: 5px">
                                        <a href="/dashboard-barang-edit/{{ $b->id }}" class="btn btn-primary">Edit</a>
                                        <form action="/dashboard-barang-delete/{{ $b->id }}" method="POST">
                                            @csrf
                                            @method("delete")
                                            <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">Hapus</button>
                                        </form>
                                        <button  class="btn btn-success" data-toggle="modal" data-target="#myModal">Out</button>
                                    </td>
                                </tr>
                                @php
                                $counter++;
                                @endphp
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('components/footer')
    </div>
    @include('components.modal.modal_barangKeluar')
</div>
@include('partials/footer')