<?php
    //Mulai Sesion
    session_start();
    if (isset($_SESSION["ses_username"])==""){
		header("location: member.php");
    
    }else{
      $data_id = $_SESSION["ses_id"];
      $data_nama = $_SESSION["ses_nama"];
      $data_user = $_SESSION["ses_username"];
      $data_level = $_SESSION["ses_level"];
    }

	include "inc/koneksi.php";
	include "inc/rupiah.php";
	include "createTagihan.php";
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>KOSAN BU ENDANG</title>
	<link rel="icon" href="dist/img/baca.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="plugins/select2/select2.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>

<body class="hold-transition skin-green sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">

		<header class="main-header">
			<!-- Logo -->
			<a href="index.php" class="logo">
				<span class="logo-lg">
					<marquee>
						<b>KOSAN BU ENDANG</b>
					</marquee>
				</span>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<!-- Messages: style can be found in dropdown.less-->
						<li class="dropdown messages-menu">
							<a class="dropdown-toggle">
								<span>
									<b>
										KOSAN BU ENDANG
									</b>
								</span>
							</a>
						</li>
					</ul>
				</div>
			</nav>
		</header>

		<!-- =============================================== -->

		<!-- Left side column. contains the sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- Sidebar user panel -->
				</<b>
				<div class="user-panel">
					<div class="pull-left image">
						<img src="dist/img/baca.png" class="img-circle" alt="User Image">
					</div>
					<div class="pull-left info">
						<p>
							<?php echo $data_nama; ?>
						</p>
						<span class="label label-warning">
							<?php echo $data_level; ?>
						</span>
					</div>
				</div>
				</br>
				<!-- /.search form -->
				<!-- sidebar menu: : style can be found in sidebar.less -->
				<ul class="sidebar-menu">
					<li class="header">MAIN NAVIGATION</li>

					<!-- Level  -->
					<?php
          if ($data_level=="Administrator"){
        ?>

					<li class="treeview">
						<a href="?page=admin">
							<i class="fa fa-dashboard"></i>
							<span>Dashboard</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>

					<li class="treeview">
						<a href="?page=data-kamar">
							<i class="fa fa-home"></i>
							<span>Data Kamar</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>


					<li class="treeview">
						<a href="?page=data-penghuni">
							<i class="fa fa-users"></i>
							<span>Data Penghuni</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>

					<li class="treeview">
						<a href="?page=buka-tagihan">
							<i class="fa fa-edit"></i>
							<span>Data Tagihan</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>

					<li class="treeview">
						<a href="?page=tagihan">
							<i class="fa fa-money"></i>
							<span>Laporan Pembayaran</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>

					<li class="treeview">
						<a href="?page=uang_masuk">
							<i class="fa fa-money"></i>
							<span>Laporan Keuangan</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>

					<li class="header">OTHER</li>

					<li class="treeview">
						<a href="?page=MyApp/data_pengguna">
							<i class="fa fa-user"></i>
							<span>Pengguna Sistem</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>

					<?php
					} 
					?>

					<li>
						<a href="logout.php" onclick="return confirm('Anda yakin keluar dari aplikasi ?')">
							<i class="fa fa-sign-out"></i>
							<span>Logout</span>
							<span class="pull-right-container"></span>
						</a>
					</li>


			</section>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<!-- Main content -->
			<section class="content">
				<?php 
      if(isset($_GET['page'])){
          $hal = $_GET['page'];
  
          switch ($hal) {
              //Klik Halaman Home Pengguna
              case 'admin':
                  include "home/admin.php";
                  break;
        
              //Pengguna
              case 'MyApp/data_pengguna':
                  include "admin/pengguna/data_pengguna.php";
                  break;
              case 'MyApp/add_pengguna':
                  include "admin/pengguna/add_pengguna.php";
                  break;
              case 'MyApp/edit_pengguna':
                  include "admin/pengguna/edit_pengguna.php";
                  break;
              case 'MyApp/del_pengguna':
                  include "admin/pengguna/del_pengguna.php";
				  break;
              case 'data-kamar':
                  include "admin/kamar/data_kamar.php";
                  break;
              case 'add-kamar':
                  include "admin/kamar/add_kamar.php";
                  break;
              case 'edit-kamar':
                  include "admin/kamar/edit_kamar.php";
                  break;
              case 'del-kamar':
                  include "admin/kamar/del_kamar.php";
				  break;
              case 'data-penghuni':
                  include "admin/penghuni/data_penghuni.php";
                  break;
              case 'add-penghuni':
                  include "admin/penghuni/add_penghuni.php";
                  break;
              case 'edit-penghuni':
                  include "admin/penghuni/edit_penghuni.php";
                  break;
              case 'del-penghuni':
                  include "admin/penghuni/del_penghuni.php";
				  break;
			case 'add-teman':
				  include "admin/penghuni/add_teman.php";
				  break;
              case 'data-tagihan':
                  include "admin/tagihan/data_tagihan.php";
                  break;
              case 'buat-tagihan':
                  include "admin/tagihan/buat_tagihan.php";
				  break;
			case 'buka-tagihan':
                  include "admin/tagihan/buka_tagihan.php";
				  break;
			case 'bayar-tagihan':
                  include "admin/tagihan/bayar_tagihan.php";
				  break;
			case 'lunas-tagihan':
                  include "admin/tagihan/lunas_tagihan.php";
                  break;
			case 'belum-lunas-tagihan':
				  include "admin/tagihan/belum_lunas_tagihan.php";
                  break;
			case 'tagihan':
				  include "admin/tagihan/tagihan.php";
				  break;
			case 'uang_masuk':
				  include "admin/tagihan/uang_masuk.php";
				  break;
			case 'data_laporan':
				  include "admin/tagihan/data_laporan.php";
				  break;
			case 'pengingat-bayar':
				  include "admin/tagihan/pengingat_bayar.php";
				  break;
			
            

              //default
              default:
				  echo "<center><br><br><br><br><br><br><br><br><br>
				  <h1> Halaman tidak ditemukan !</h1></center>";
                  break;    
          }
      }else{
        // Auto Halaman Home Pengguna
          if($data_level=="Administrator"){
              include "home/admin.php";
              }
            }
    		?>



			</section>
			<!-- /.content -->
		</div>

		<!-- /.content-wrapper -->

		<div class="control-sidebar-bg"></div>

		<!-- ./wrapper -->

		<!-- jQuery 2.2.3 -->
		<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
		<!-- Bootstrap 3.3.6 -->
		<script src="bootstrap/js/bootstrap.min.js"></script>

		<script src="plugins/select2/select2.full.min.js"></script>
		<!-- DataTables -->
		<script src="plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>

		<!-- AdminLTE App -->
		<script src="dist/js/app.min.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="dist/js/demo.js"></script>
		<!-- page script -->


		<script>
			$(function() {
				$("#example1").DataTable();
				$('#example2').DataTable({
					"paging": true,
					"lengthChange": false,
					"searching": false,
					"ordering": true,
					"info": true,
					"autoWidth": false
				});
			});
		</script>

		<script>
			$(function() {
				//Initialize Select2 Elements
				$(".select2").select2();
			});
		</script>

		<script>
			// Fungsi untuk memeriksa waktu setiap menit
			function checkTimeAndCreate() {
				const now = new Date();
				const day = now.getDate();
				const hour = now.getHours();
				const minute = now.getMinutes();

				// Mengatur waktu yang diinginkan
				const targetDay = 16;
				const targetHour = 2;
				const targetMinute = 40;

				// Periksa apakah waktu saat ini sesuai dengan target waktu
				if (day === targetDay && hour === targetHour && minute === targetMinute) {
					// Ambil status eksekusi terakhir dari localStorage
					const lastExecution = localStorage.getItem('createNewDataLastExecution');

					// Periksa apakah fungsi belum pernah dijalankan atau sudah berlalu lebih dari 1 menit
					if (!lastExecution || new Date(lastExecution).getMinutes() !== minute) {
						// Panggil fungsi createNewData() menggunakan AJAX
						var xhr = new XMLHttpRequest();
						xhr.open("GET", "createTagihan.php?action=createNewData", true);
						xhr.send();

						// Tandai waktu eksekusi saat ini
						localStorage.setItem('createNewDataLastExecution', now.toISOString());
					}
				}
			}

			// Periksa waktu setiap menit
			setInterval(checkTimeAndCreate, 60000); // 60000 ms = 1 menit

			// Jalankan segera saat halaman dimuat untuk pertama kali
			checkTimeAndCreate();
		</script>
</body>

</html>