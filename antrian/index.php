<?php
include ('config.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <title>Antrian Pendaftaran Puskesmas Tunggakjati</title>
  </head>
  <body>
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-2">APAM</h1>
      <h3 class="display-6">Anjungan Pasien Mandiri Pelayanan Rawat Jalan</h3>
      <h2 class="display-5">Puskesmas Tunggakjati Kabupaten Karawang</h2>
    </div>
    <br><br>
    <div class="container">
      <div class="card-deck mb-3 text-center">
        <div class="card mb-4 shadow-sm" data-toggle="modal" data-target="#antrian">
          <div class="card-body btn btn-lg btn-success">
            <ul class="list-unstyled mt-3 mb-4">
              <span style="font-size: 120px; color: white;"><i class="fas fa-question"></i></span>
            </ul>
            <a href="#" style="text-decoration: none; color: white;"><h1 class="display-4">AMBIL ANTRIAN</h1></a>
          </div>
        </div>
      </div>
    </div>
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center text-danger">
      <h3 class="display-6">Silahkan hubungi petugas jika anda mengalami kesulitan.</h3>
    </div>

    <!-- Modal Antrian -->
    <div class="modal fade" id="antrian" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Antrian Pendaftaran</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row justify-content-around">
            <div class="col-4 pt-5 pb-5">
              <div id="printAntrianLoket" style="display: none;" class="cetak">
                  <div style="width: 180px; font-family: Tahoma; margin-top: -13px; margin-right: 5px; margin-bottom: 10px; margin-left: 15px; font-size: 14px !important;">
				      Puskesmas Tunggakjati
                  <div id="print_nomor_loket"></div>
                       Loket Pendaftaran
                </div>
              </div>
              <div id="display_nomor_loket"></div>
              <form role="form" id="formloket" name="formloket">
                <button type="submit" class="btn btn-lg btn-danger btn-block" id="btnKRM" value="Submit" name="btnKRM" onclick="printDiv('printAntrianLoket');">PENDAFTARAN</button>
              </form>
            </div>
            <div class="col-4 pt-5 pb-5">
              <div id="printAntrianCS" style="display: none;" class="cetak">
                  <div style="width: 180px; font-family: Tahoma; margin-top: -13px; margin-right: 5px; margin-bottom: 10px; margin-left: 15px; font-size: 14px !important;">
				      Puskesmas Tunggakjati
                  <div id="print_nomor_cs"></div>
                  Apotek
                </div>
              </div>
              <div id="display_nomor_cs"></div>
              <form role="form" id="formcs" name="formcs">
                <button type="submit" class="btn btn-lg btn-danger btn-block" id="btnKRMCS" value="Submit" name="btnKRMCS" onclick="printDiv('printAntrianCS');">APOTEK</button>
              </form>
            </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>

    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function(){
      $('#getNoRM').on('click',function(){
        var no_rkm_medis = $('#norm').val();
        var kd_poli = $('#kdpoli').val();
        $.ajax({
          type:'POST',
          url:'get-skdp.php',
          dataType: "json",
          data: {no_rkm_medis:no_rkm_medis, kd_poli:kd_poli},
          success:function(data){
            if(data.status == 'ok'){
              $('#no_rkm_medis').text(data.result.no_rkm_medis);
              $('#tanggal_datang').text(data.result.tanggal_datang);
              $('#nm_poli').text(data.result.nm_poli);
              $('#c_no_rkm_medis').text(data.result.no_rkm_medis);
              $('#c_nm_pasien').text(data.result.nm_pasien);
              $('#c_diagnosa').text(data.result.diagnosa);
              $('#c_terapi').text(data.result.terapi);
              $('#c_alasan1').text(data.result.alasan1);
              $('#c_alasan2').text(data.result.alasan2);
              $('#c_rtl1').text(data.result.rtl1);
              $('#c_rtl2').text(data.result.rtl2);
              $('#c_tanggal_datang').text(data.result.tanggal_datang);
              $('#c_tanggal_rujukan').text(data.result.tanggal_rujukan);
              $('#c_no_antrian').text(data.result.no_antrian);
              $('#c_nm_dokter').text(data.result.nm_dokter);
              $('#c_nm_poli').text(data.result.nm_poli);
              $('#c_no_reg').text(data.result.no_reg);
              $('.get-content').slideDown();
            }else{
              $('.get-content').slideUp();
              alert("Surat kontrol tidak ditemukan...");
            }
          }
        });
      });
    });
    </script>
    <script>
    $(document).ready(function() {
      $("#display_nomor_loket").load("get-antrian.php?aksi=tampilloket");
      $("#print_nomor_loket").load("get-antrian.php?aksi=tampilloket");
      $("#display_nomor_cs").load("get-antrian.php?aksi=tampilcs");
      $("#print_nomor_cs").load("get-antrian.php?aksi=tampilcs");
    })
    </script>
    <script>
    function printDiv(eleId){
        var PW = window.open('', '_blank', 'Print content');
        //Use css for print style
        //PW.document.write('<style>.cetak {width: 250px; font-family: Tahoma; margin-top: 10px; margin-right: 5px; margin-bottom: 50px; margin-left: 5px; font-size: 11px !important;}</style>');
        PW.document.write(document.getElementById(eleId).innerHTML);
        PW.document.close();
        PW.focus();
        PW.print();
        PW.close();
        // Redirect after close
        window.location.href = "index.php";
    }
    </script>
  </body>
</html>
