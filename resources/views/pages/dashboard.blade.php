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
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Total Barang
                            </div>
                            <div class="panel-body">
                                70
                                <!-- Replace with dynamic value -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Barang Terjual
                            </div>
                            <div class="panel-body">
                                24
                                <!-- Replace with dynamic value -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Barang Expired
                            </div>
                            <div class="panel-body">
                                5
                                <!-- Replace with dynamic value -->
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Users
                            </div>
                            <div class="panel-body">
                                4
                                <!-- Replace with dynamic value -->
                            </div>
                        </div>
                    </div> --}}
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
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('components/footer')
    </div>
</div>
@include('partials/footer')