@extends('layout.lay')

@section('content')
	 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Input Barang</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Input Barang
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <form action="{{ url('/inputbarang/store') }}" method="POST">
                        {{ csrf_field() }}
                            <table width="100%" class="table">
                                <thead>
                                    <tr>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Harga Beli</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" class="form-control" name="kdbarang" value=""></td>
                                        <td><input type="text" class="form-control" name="namabrg" value=""></td>
                                        <td><input type="text" class="form-control" name="hargabeli" value=""></td>
                                        <td><input type="text" class="form-control" name="harga" value=""></td>
                                        <td><input name="jumlah" class="form-control" type="text" value="" min="0"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                        <a href="{{ URL::route('barang') }}"><button type="button" class="btn btn-danger">kembali</button></a>
                                        </td>
                                        <td>
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
    </div>
        <!-- /#page-wrapper -->

</div>
@endsection