@extends('layout.lay')

@section('content')
	 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Laporan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Transaksi
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No Transaksi</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Total</th>
                                        <th>Profit</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $a)
                                    <tr>
                                        <td>{{ $a->notrans }}</td>
                                        <td>{{ $a->tgltrans }}</td>
                                        <td>{{ $a->total }}</td>
                                        <td>{{ $a->profit }}</td>
                                        <td><a href="#"><button  class="btn btn-success" type="button"><i class="fa fa-search"></i> </button></a>
                                        <a href="#"><button  class="btn btn-danger" type="button"><i class="glyphicon glyphicon-trash"></i> </button></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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