@extends('layout.lay')

@section('content')
	 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Barang</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           <td class="text-right"><a href="{{ url('/inputbarang') }}"><button  type="button" class="btn btn-success">Tambah Barang</button></a></td>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Daftar Barang
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table">
                                <thead>
                                    <tr>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th>Harga Beli</th>
                                        <th>Jumlah</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($data as $a)
                                	<tr>
                                		<td>{{ $a->kdbarang }}</td>
                                		<td>{{ $a->namabrg }}</td>
                                        <td>{{ $a->harga }}</td>
                                		<td>{{ $a->hargabeli }}</td>
                                		<td>{{ $a->jumlah }}</td>
                                        <td>
                                        <a href="{{ URL('/barang/edit', ['id' => $a->id]) }}"><button  class="btn btn-warning" type="button"><i class="fa fa-edit"></i> Edit</button></a>
                                        <a href="{{ URL('/barang/destroy', ['id' => $a->id]) }}"><button class="btn btn-danger" type="button"><i class="fa fa-times"></i> Hapus</button></a>
                                        </td>
                                	</tr>
                                	@endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- /#page-wrapper -->

</div>
@endsection