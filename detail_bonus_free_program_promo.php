<?php include 'session_login.php';


//memasukkan file session login, header, navbar, db.php
include 'header.php';
include 'navbar.php';
include 'sanitasi.php';
include 'db.php';

$id = stringdoang($_GET['id']);
$nama_program = stringdoang($_GET['nama']);
$kode_program = stringdoang($_GET['kode']);

 ?>

<div class="container">

 <span id="judul_bofree">
   <h3><b>Data Bonus Free produk</b></h3><hr>
 </span>
 <span id="judul_edit_bofree" style="display: none;">
   <h3><b>Edit Bonus Free produk</b></h3><hr>
 </span>

<a href="program_promo.php" class="btn btn-primary" data-toggle="tooltip" accesskey="k" id="kembali" class="btn btn-primary" data-placement='top' title='Klik untuk kembali ke utama.'><i class="fa fa-reply"></i> <u>K</u>embali</a>

<button type="submit" id="tambah_free_produk" class="btn btn-success" style="background-color:#0277bd"><i class="fa fa-plus"> </i> Tambah</button>
<span id="tambh_free_produk" style="display: none;"><!--span untuk tambah produk-->
          <form class="form-inline" role="form" id="formfreeproduk">
          <div class="row armun"><!--div class="row armun"-->
            
            <div class="col-sm-2"><!--/div class="col-sm-2 armun"-->
                <input type="hidden" name="id_program" id="id_program" autocomplete="off" class="form-control" readonly="" value="<?php echo $id ;?>" style="height: 5%; width: 95%;">

                <b><input type="text" name="nama_program" id="nama_program" autocomplete="off" class="form-control" readonly="" value="<?php echo $nama_program ;?>" style="height: 5%; width: 95%; font-size: 125%;" placeholder="Nama Program"></b>
            </div><!--div class="col-sm-2 armun"-->

            <div class="col-sm-2"><!--/div class="col-sm-2 armun"-->
                <input type="text" name="kode_produk" id="kode_produk" autocomplete="off" class="form-control" style="height: 5%; width: 95%;" placeholder="Kode Produk" data-toggle="tooltip" accesskey="k" id="kembali" class="btn btn-primary" data-placement='top' title='Ketikkan kode produk atau nama produk untuk memilih produk.'>

                <input type="hidden" name="id_produk" id="id_produk" autocomplete="off" class="form-control" readonly="" style="height: 5%; width: 95%;">
            </div><!--div class="col-sm-2 armun"-->
            
            <div class="col-sm-2"><!--/div class="col-sm-2 armun"-->
                <input type="text" name="qty" id="qty" autocomplete="off" class="form-control" style="height: 5%; width: 45%;"  placeholder="Qty Free">
            </div><!--div class="col-sm-2 armun"-->

            <div class="col-sm-2"><!--/div class="col-sm-2 armun"--><br>
              <button type="submit" id="tambah_produk" class="btn btn-primary" style="background-color:#0277bd"><i class="fa fa-plus"> </i> Submit</button>
            </div><!--div class="col-sm-2 armun"-->
          </div><!--/div class="row armun"-->
   
          
          </form>
  </span><!--Akhir span untuk tambah produk-->

<!--==============-->
<span id="edit_free_produk" style="display: none;"><!--span untuk EDIT produk-->
          <form class="form-inline" role="form" id="formfreeproduk">
          <div class="row armun"><!--div class="row armun"-->
            
            <div class="col-sm-2"><!--/div class="col-sm-2 armun"-->
                <input type="hidden" name="id_program_edit" id="id_program_edit" autocomplete="off" class="form-control" readonly="" value="<?php echo $id ;?>" style="height: 5%; width: 95%;">

                <b><input type="text" name="nama_program_edit" id="nama_program_edit" autocomplete="off" class="form-control" readonly="" value="<?php echo $nama_program ;?>" style="height: 5%; width: 95%; font-size: 125%;" placeholder="Nama Program"></b>
            </div><!--div class="col-sm-2 armun"-->

            <div class="col-sm-2"><!--/div class="col-sm-2 armun"-->
                <input type="text" name="kode_produk_edit" id="kode_produk_edit" autocomplete="off" class="form-control" style="height: 5%; width: 95%;" placeholder="Kode Produk" data-toggle="tooltip" accesskey="k" id="kembali" class="btn btn-primary" data-placement='top' title='Ketikkan kode produk atau nama produk untuk memilih produk.'>

                <input type="hidden" name="id_produk_edit" id="id_produk_edit" autocomplete="off" class="form-control" readonly="" style="height: 5%; width: 95%;">
            </div><!--div class="col-sm-2 armun"-->
            
            <div class="col-sm-2"><!--/div class="col-sm-2 armun"-->
                <input type="text" name="qty_edit" id="qty_edit" autocomplete="off" class="form-control" style="height: 5%; width: 45%;"  placeholder="Qty Free">

                <input type="hidden" name="id_edit" id="id_edit" autocomplete="off" class="form-control" readonly="" style="height: 5%; width: 95%;">
            </div><!--div class="col-sm-2 armun"-->

            <div class="col-sm-2"><!--/div class="col-sm-2 armun"--><br>
              <button type="submit" id="submit_edit" class="btn btn-primary" style="background-color:#0277bd"><i class="fa fa-edit"> </i> EDIT</button>
            </div><!--div class="col-sm-2 armun"-->
          </div><!--/div class="row armun"-->
   
    </form>
</span><!--Akhir span untuk EDIT produk-->
<!--============-->

<!-- Modal Hapus data -->
<div id="modal_hapus" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Konfirmsi Hapus Data User</h4>
      </div>

      <div class="modal-body">
   
   <p>Apakah Anda yakin Ingin Menghapus Data ini ?</p>
   <form >
    <div class="form-group">
    <label> Nama Program :</label>
     <input type="text" id="nama_program_hapus" class="form-control" readonly=""> 
    </div>

    <div class="form-group">
    <label> Nama Produk :</label>
     <input type="text" id="nama_produk_hapus" class="form-control" readonly=""> 
     <input type="hidden" id="id_hapus" class="form-control" > 
    </div>
   
   </form> 

     </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-info" id="btn_jadi_hapus"><span class='glyphicon glyphicon-ok-sign'> </span> Ya</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class='glyphicon glyphicon-remove-sign'> </span> Batal</button>
      </div>
    </div>

  </div>
</div><!-- end of modal hapus data  -->

<br>
<span id="table_le_kui">
  <div class="table-responsive"><!--membuat agar ada garis pada tabel disetiap kolom-->
  <table id="table_free_produk" class="table table-bordered table-sm">
    <thead>
      <th style="background-color: #4CAF50; color: white;"> Nama Produk</th>
      <th style="background-color: #4CAF50; color: white;"> Qty </th>
      <th style="background-color: #4CAF50; color: white;"> Nama Program </th>
      <th style="background-color: #4CAF50; color: white;"> Edit </th>
      <th style="background-color: #4CAF50; color: white;"> hapus </th>
    </thead>
  </table>
  </div> <!--/ responsive-->
</span>


</div> <!--/ container-->

<script type="text/javascript">
    $(document).ready(function(){
    // Tooltips Initialization
    $(function () {
    $('[data-toggle="tooltip"]').tooltip()
    });
    });
</script>

<!--====AWAL TAMBAH =====-->

<script type="text/javascript">
//untuk memasukan perintah javascript autocomplete tambah
  $(function() {
    $( "#kode_produk" ).autocomplete({
        source: 'kode_produk_program_promo_autocomplete.php'
    });
});
  //untuk memasukan perintah javascript autocomplete tambah
</script>

<script type="text/javascript">
        $(document).ready(function(){
        $("#kode_produk").blur(function(){

          var kode_produk = $(this).val();
          var kode_produk = kode_produk.substr(0, kode_produk.indexOf('('));
          
          if (kode_produk != '')
          {
                $.getJSON('lihat_nama_produk_promo.php',{kode_produk:kode_produk}, function(json){
                
                if (json == null)
                {
                  
                  $('#id_produk').val('');
                 
                }

                else 
                {
                  $('#id_produk').val(json.id);
                  
                }

                var id_produk = $("#id_produk").val();

                $.post('cek_kode_bonus_free_produk.php',{id_produk:id_produk}, function(data){
            
              if(data == 1){
              alert("Anda Tidak Bisa Menambahkan Barang Yang Sudah Ada, Silakan Edit atau Pilih Barang Yang Lain !");
              $("#kode_produk").focus();
              $("#kode_produk").val('');
              $("#id_produk").val('');
              }//penutup if
              
              });////penutup function(data)
                                                        
                }); 
          }

        });
        });     
</script>

<!-- untuk memasukan perintah javascript -->
<script type="text/javascript">

// jika dipilih, nim akan masuk ke input dan modal di tutup
  $(document).on('click', '.pilih', function (e) {
  document.getElementById("kode_produk").value = $(this).attr('data-kode');
  document.getElementById("nama_produk").value = $(this).attr('nama-barang');
  document.getElementById("id_produk").value = $(this).attr('id-barang');
  
  $('#myModal').modal('hide');
  });

</script> <!--tag penutup perintah java script-->


<script type="text/javascript">
// MENAMPILKAN FORM
  $(document).ready(function(){
    $("#tambah_free_produk").click(function(){
      $("#tambh_free_produk").show();
      $("#tambah_free_produk").hide();
    });
  });
// /MENAMPILKAN FORM
</script>

<script type="text/javascript">
// MENAMPILKAN FORM
  $(document).ready(function(){
    $("#tambah_produk").click(function(){

     var id_program = $("#id_program").val();
     var id_produk = $("#id_produk").val();
     var qty = $("#qty").val();
      if (id_program == '') {
        alert("Silakan isikan program promo terlebih dahulu.");
        $("#nama_program").val('');
      }     
      else if (id_produk == '') {
        alert("Silakan isikan kode produk promo terlebih dahulu.");
        $("#kode_produk").val('');
        $("#kode_produk").focus();
      } 
      else if (qty == '') {
        alert("Silakan isikan qty free terlebih dahulu.");
        $("#qty").focus();
      } 
      else
      {
        $.post("proses_detail_bonus_free_program_promo.php",{id_program:id_program,id_produk:id_produk,qty:qty},function(info) {
          $("#tambh_free_produk").hide();
          $("#tambah_free_produk").show();

          $('#table_free_produk').DataTable().destroy();
                  
                  var dataTable = $('#table_free_produk').DataTable( {
                    "processing": true,
                    "serverSide": true,
                    "ajax":{
                      url :"datatable_free_produk.php", // json datasource
                      type: "post",  // method  , by default get
                      error: function(){  // error handling
                        $(".tbody").html("");
                        $("#table_free_produk").append('<tbody class="tbody"><tr ><td colspan="3">No data found in the server</td></tr></tbody>');
                        $("#table_ri_processing").css("display","none");
                        
                      }
                    },

                     "fnCreatedRow": function( nRow, aData, iDataIndex ) {
                        $(nRow).attr('class','tr-id-'+aData[5]+'');
                },
                });

              $("#nama_program").val('');
              $("#nama_produk").val('');
              $("#qty").val('');
       });
      }
      $("#formfreeproduk").submit(function(){
      return false;
      }); 

    });// end $("#tambh_program_promo").click(function()
  });// end $(document).ready(function()

// /MENAMPILKAN FORM
</script>
<!--====AKHIR TAMBAH =====-->


<!--========AWAL EDIT ====-->
<script type="text/javascript">
// MENAMPILKAN FORM Edit
  $(document).ready(function(){
$(document).on('click', '.edit', function (e) {

      var nama_program_edit = $(this).attr("data-kode_program");
      var id_program_edit = $(this).attr("data-id_program");
      var kode_produk_edit = $(this).attr("data-nama_produk");
      var id_produk_edit = $(this).attr("data-id_produk");
      var id_edit = $(this).attr("data-id");
      var qty_edit = $(this).attr("data-qty");

    $("#nama_program_edit").val(nama_program_edit);
    $("#id_program_edit").val(id_program_edit);
    $("#kode_produk_edit").val(kode_produk_edit);
    $("#id_produk_edit").val(id_produk_edit);
    $("#id_edit").val(id_edit);
    $("#qty_edit").val(qty_edit);

      $("#edit_free_produk").show();
      $("#judul_edit_bofree").show();
      $("#judul_bofree").hide();
      $("#tambah_free_produk").hide();
      $("#table_le_kui").hide();


    });

    $("#submit_edit").click(function(){

    var id_program = $("#id_program_edit").val();
    var id_produk = $("#id_produk_edit").val();
    var id = $("#id_edit").val();
    var qty = $("#qty_edit").val();
    if (id_program == '') {
        alert("Silakan isikan program promo terlebih dahulu.");
        $("#id_program_edit").val('');
      }     
      else if (id_produk == '') {
        alert("Silakan isikan kode produk promo terlebih dahulu.");
        $("#id_produk_edit").focus();
      }
      else if (qty == '') {
        alert("Silakan isikan qty terlebih dahulu.");
        $("#harga_free_edit").focus();
      } 
      else
      {
        $.post("edit_detail_bonus_free_program_promo.php",{id:id,id_program:id_program,id_produk:id_produk,qty:qty},function(info) {
          $("#edit_free_produk").hide();
          $("#tambah_free_produk").show();
          $("#table_le_kui").show();

          $('#table_free_produk').DataTable().destroy();
                  
                  var dataTable = $('#table_free_produk').DataTable( {
                    "processing": true,
                    "serverSide": true,
                    "ajax":{
                      url :"datatable_free_produk.php", // json datasource
                      type: "post",  // method  , by default get
                      error: function(){  // error handling
                        $(".tbody").html("");
                        $("#table_free_produk").append('<tbody class="tbody"><tr ><td colspan="3">No data found in the server</td></tr></tbody>');
                        $("#table_ri_processing").css("display","none");
                        
                      }
                    },

                     "fnCreatedRow": function( nRow, aData, iDataIndex ) {
                        $(nRow).attr('class','tr-id-'+aData[6]+'');
                },
                });

              $("#nama_program_edit").val('');
              $("#nama_produk_edit").val('');
              $("#qty_max_edit").val('');
       });
      }
      $("#formfreeproduk").submit(function(){
      return false;
      }); 
  });
  });
// /MENAMPILKAN FORM Edt
</script>

<!---->
<script type="text/javascript">
//untuk memasukan perintah javascript autocomplete saat edit
  $(function() {
    $( "#kode_produk_edit" ).autocomplete({
        source: 'kode_produk_program_promo_autocomplete.php'
    });
});
  // /untuk memasukan perintah javascript autocomplete saat edit
</script>

<script type="text/javascript">
        $(document).ready(function(){
        $("#kode_produk_edit").blur(function(){

          var kode_produk = $(this).val();
          var kode_produk = kode_produk.substr(0, kode_produk.indexOf('('));
          
          if (kode_produk != '')
          {
                $.getJSON('lihat_nama_produk_promo.php',{kode_produk:kode_produk}, function(json){
                
                if (json == null)
                {
                  
                  $('#id_produk').val('');
                 
                }

                else 
                {
                  $('#id_produk').val(json.id);
                  
                }

                var id_produk = $("#id_produk").val();

                $.post('cek_kode_bonus_free_produk.php',{id_produk:id_produk}, function(data){
            
              if(data == 1){
              alert("Anda Tidak Bisa Menambahkan Barang Yang Sudah Ada, Silakan Edit atau Pilih Barang Yang Lain !");
              $("#kode_produk").focus();
              $("#kode_produk_edit").val('');
              $("#id_produk_edit").val('');
              }//penutup if
              
              });////penutup function(data)
                                                        
                }); 
          }

        });
        });     
</script>
<!--========AKHIR EDIT ====-->

<script type="text/javascript">
  //fungsi hapus data 
$(document).on('click', '.delete', function (e) {
    var nama_program = $(this).attr("data-nama_program");
    var nama_produk = $(this).attr("data-nama_produk");
    var id = $(this).attr("data-id");
    $("#nama_program_hapus").val(nama_program);
    $("#nama_produk_hapus").val(nama_produk);
    $("#id_hapus").val(id);
    $("#modal_hapus").modal('show');
    
    $(document).on('click', '#btn_jadi_hapus', function (e) {
    
    var id = $("#id_hapus").val();
    $.post("detail_free_produk_hapus.php",{id:id},function(data){
    if (data != "") {
    
    $("#modal_hapus").modal('hide');

        $('#table_free_produk').DataTable().destroy();
        
        var dataTable = $('#table_free_produk').DataTable( {
          "processing": true,
          "serverSide": true,
          "ajax":{
            url :"datatable_free_produk.php", // json datasource
            type: "post",  // method  , by default get
            error: function(){  // error handling
              $(".tbody").html("");
              $("#table_free_produk").append('<tbody class="tbody"><tr ><td colspan="3">No data found in the server</td></tr></tbody>');
              $("#table_ri_processing").css("display","none");
              
            }
          },

           "fnCreatedRow": function( nRow, aData, iDataIndex ) {
              $(nRow).attr('class','tr-id-'+aData[5]+'');
      },
       });
    }

    });
    
    });

    });
</script>



<!--DATA TABLE MENGGUNAKAN AJAX-->
<script type="text/javascript" language="javascript" >
      $(document).ready(function() {

          var dataTable = $('#table_free_produk').DataTable( {
          "processing": true,
          "serverSide": true,
          "ajax":{
            url :"datatable_free_produk.php", // json datasource
           
            type: "post",  // method  , by default get
            error: function(){  // error handling
              $(".employee-grid-error").html("");
              $("#table_free_produk").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
              $("#employee-grid_processing").css("display","none");
            }
        },
            
            "fnCreatedRow": function( nRow, aData, iDataIndex ) {
                $(nRow).attr('class','tr-id-'+aData[5]+'');
            },
        });

        $("form").submit(function(){
        return false;
        });
        

      } );
</script>


<?php include 'footer.php'; ?>