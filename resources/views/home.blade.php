@extends('layout.lay')

@section('content')
	 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Beranda</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Penjualan
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th>Kuantitas</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $a)
                                    <tr>
                                        <td id="kdbarang{{$a->id}}">{{ $a->kdbarang }}</td>
                                        <td id="namabrg{{$a->id}}">{{ $a->namabrg }}</td>
                                        <td id="harga{{$a->id}}">{{ $a->harga }}</td>
                                        <td><input id="qty{{$a->id}}" name="qty" class="form-control" maxlength="2" type="number" value="0" min="0"></td>
                                        <td><input id="jumlah{{$a->id}}" type="text"  class="form-control" name="jumlah" value="0" readonly="readonly"></td>
                                        <td><input id="hargabeli{{$a->id}}" name="hargabeli" class="form-control" type="number" value="{{ $a->hargabeli }}"></td>
                                        <td><input id="profit{{$a->id}}" name="profit" class="form-control" type="number" value=""></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                    <div class="col-lg-10">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            Daftar Pembelian
                          </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                <form action="{{ url('/store') }}" method="POST">
                                {{ csrf_field() }}
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Harga Satuan</th>
                                                <th>Kuantitas</th>
                                                <th>Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody  id="tablepembelian">
                                        </tbody>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-right" ><h4><b>Total :</b></h4></td>
                                                <td class="text-right" ><h4><b><input id="total" type="number" name="total" value="0"></b></h4></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-right"><h4><b>Bayar :</b></h4></td>
                                                <td class="text-right"><h4><input id="bayar" type="number" name="bayar" value="0"></h4></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-right"><h4><b>Kembali :</b></h4></td>
                                                <td class="text-right" id="kembali"><h4><b>0</b></h4></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-right"><button type="submit" class="btn btn-success">Simpan</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </form>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
<script>
$(document).ready(function(){
    @foreach($data as $a)
        setChangeJumlah({{$a->id}});
    @endforeach

    $('#bayar').change(function(){
       setKembali();
    });

});


function setChangeJumlah(id){
    $('#qty'+id).change(function(){
    $('#jumlah'+id).val($('#qty'+id).val()*$('#harga'+id).text());
    $('#profit'+id).val(($('#harga'+id).text()-$('#hargabeli'+id).val())*$('#qty'+id).val());
    setTablePembelian(id, $('#qty'+id).val()); 
    });
    
}

function setTablePembelian(id, qty){
     $("#item"+id).remove();
    if(qty!=0){
        var kdbarang= tdText('kdbarang', id);
        var namabrg= tdText('namabrg', id);
        var harga = tdText('harga', id);
        var qty = tdValue('qty',id);
        $("#tablepembelian").append('<tr id="item'+id+'">'+kdbarang+namabrg+harga+
            qty+'<td id="itemjumlah'+id+'" >'+$('#jumlah'+id).val()+'<input type="hidden" name="jumlah[]" value="'+$('#jumlah'+id).val()+'"><input type="hidden" name="profit[]" value="'+$('#profit'+id).val()+'"></td></tr>');
      //  console.log($("#tablepembelian").children().length);
     
    }
        setTotal();
        setKembali();
}


function tdText(itemName, id){
    var text = '<td>'+$('#'+itemName+id).text()+'<input type="hidden" name="'+itemName+'[]" value="'+$('#'+itemName+id).text()+'"></td>';
    return text;
}
function tdValue(itemName, id){
    var value = '<td>'+$('#'+itemName+id).val()+'<input type="hidden" name="'+itemName+'[]" value="'+$('#'+itemName+id).val()+'"></td>';
    return value;
}


function setTotal(){
    var total = 0;
    var id = 0;
    $('#tablepembelian tr').each(function(){
        id =this.id.substring(4);
        total = parseInt($('#itemjumlah'+id).text()) + total;    
    });

    $('#total').text(total);
    $('#total').val(total);
}


function setKembali(){
    var kembali = $('#bayar').val() - parseInt($('#total').text());
     $('#kembali').text(kembali);
}



</script>




    @endsection