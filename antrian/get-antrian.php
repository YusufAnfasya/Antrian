<?php
include ('config.php');
$aksi = $_REQUEST['aksi'];
if ($aksi == "tampilloket") {
  //ketahui jumlah total sehari...
	$sql = query("SELECT * FROM antrian_loket WHERE round(DATE_FORMAT(postdate, '%d')) = '$tanggal' AND round(DATE_FORMAT(postdate, '%m')) = '$bulan' AND round(DATE_FORMAT(postdate, '%Y')) = '$tahun' ORDER BY round(noantrian) DESC");
	$result = fetch_assoc($sql);
	$noantrian = $result['noantrian'];
	//nomor antrian, total yang ada + 1
	$next_antrian = $noantrian + 1;
	echo '<div id="nomernya" align="center">';
  echo '<h1 class="display-1">';
  echo $next_antrian;
  echo '</h1>';
  echo '['.$tanggal.'-'.$bulan.'-'.$tahun.']';
  echo '</div>';
  echo '<br>';

	?>

	<script>
	$(document).ready(function(){
		$("#btnKRM").on('click', function(){
			$("#formloket").submit(function(){
				$.ajax({
					url: "get-antrian.php?aksi=simpanloket&noantrian=<?php echo $next_antrian;?>",
					type:"POST",
					data:$(this).serialize(),
					success:function(data){
						setTimeout('$("#loading").hide()',1000);
						window.location.href = "index.php";
						}
					});
				return false;
			});
		});
	})
	</script>
	<?php
	exit();
}

//jika simpan
if ($aksi == "simpanloket") {
	//ambil nilai
	$noantrian = $_GET['noantrian'];
	//cek
	$sql = query("SELECT * FROM antrian_loket WHERE round(DATE_FORMAT(postdate, '%d')) = '$tanggal' AND round(DATE_FORMAT(postdate, '%m')) = '$bulan' AND round(DATE_FORMAT(postdate, '%Y')) = '$tahun' AND noantrian = '$noantrian'");
	if (empty(num_rows($sql))) {
		query("INSERT INTO antrian_loket(kd, noantrian, postdate) VALUES (NULL, '$noantrian', '$date_time')");
	}
	?>
	<?php
	exit();
}

if ($aksi == "tampilcs") {
	  //ketahui jumlah total sehari...
		$sql = query("SELECT * FROM antrian_cs WHERE round(DATE_FORMAT(postdate, '%d')) = '$tanggal' AND round(DATE_FORMAT(postdate, '%m')) = '$bulan' AND round(DATE_FORMAT(postdate, '%Y')) = '$tahun' ORDER BY round(noantrian) DESC");
		$result = fetch_assoc($sql);
		$noantrian = $result['noantrian'];
		//nomor antrian, total yang ada + 1
		$next_antrian = $noantrian + 1;
		echo '<div id="nomernya" align="center">';
	  echo '<h1 class="display-1">';
	  echo $next_antrian;
	  echo '</h1>';
	  echo '['.$tanggal.'-'.$bulan.'-'.$tahun.']';
	  echo '</div>';
	  echo '<br>';

		?>

		<script>
		$(document).ready(function(){
			$("#btnKRMCS").on('click', function(){
				$("#formcs").submit(function(){
					$.ajax({
						url: "get-antrian.php?aksi=simpancs&noantrian=<?php echo $next_antrian;?>",
						type:"POST",
						data:$(this).serialize(),
						success:function(data){
							setTimeout('$("#loading").hide()',1000);
							window.location.href = "index.php";
							}
						});
					return false;
				});
			});
		})
		</script>
		<?php
		exit();
}

//jika simpan
if ($aksi == "simpancs") {
	//ambil nilai
	$noantrian = $_GET['noantrian'];
	//cek
	$sql = query("SELECT * FROM antrian_cs WHERE round(DATE_FORMAT(postdate, '%d')) = '$tanggal' AND round(DATE_FORMAT(postdate, '%m')) = '$bulan' AND round(DATE_FORMAT(postdate, '%Y')) = '$tahun' AND noantrian = '$noantrian'");
	if (empty(num_rows($sql))) {
		query("INSERT INTO antrian_cs(kd, noantrian, postdate) VALUES (NULL, '$noantrian', '$date_time')");
	}
	?>
	<?php
	exit();
}

?>
