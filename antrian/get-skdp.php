<?php
include ('config.php');
//$_POST['no_rkm_medis'] = '042126';
//$_POST['kd_poli'] = 'U0002';
if(!empty($_POST['no_rkm_medis'])){
    $data = array();

    //create connection and select DB
    $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if($db->connect_error){
        die("Unable to connect database: " . $db->connect_error);
    }

    //get data from the database
    $query = $db->query("SELECT a.*, b.nm_dokter, c.no_reg, d.nm_poli, f.nm_pasien FROM skdp_bpjs a, dokter b, booking_registrasi c, poliklinik d, pasien f WHERE a.no_rkm_medis = {$_POST['no_rkm_medis']} AND a.kd_dokter = b.kd_dokter AND a.no_rkm_medis = c.no_rkm_medis AND a.tanggal_datang = c.tanggal_periksa AND c.kd_poli = '".$_POST['kd_poli']."' AND c.kd_poli = d.kd_poli AND a.no_rkm_medis = f.no_rkm_medis ORDER BY a.tanggal_datang DESC");

    if($query->num_rows > 0){
        $userData = $query->fetch_assoc();
        $data['status'] = 'ok';
        $data['result'] = $userData;
    }else{
        $data['status'] = 'err';
        $data['result'] = '';
    }

    //returns data as JSON format
    echo json_encode($data);
}
?>
