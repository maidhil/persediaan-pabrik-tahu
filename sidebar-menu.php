<?php 
// fungsi pengecekan level untuk menampilkan menu sesuai dengan hak akses
// jika hak akses = Super Admin, tampilkan menu
if ($_SESSION['hak_akses']=='Super Admin') { ?>
	<!-- sidebar menu start -->
    <ul class="sidebar-menu">
        <li class="header">MAIN MENU</li>

	<?php 
	// fungsi untuk pengecekan menu aktif
	// jika menu beranda dipilih, menu beranda aktif
	if ($_GET["module"]=="beranda") { ?>
		<li class="active">
			<a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
	<?php
	}
	// jika tidak, menu home tidak aktif
	else { ?>
		<li>
			<a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
	<?php
	}

  // jika menu data barang dipilih, menu data barang aktif
  if ($_GET["module"]=="barang" || $_GET["module"]=="form_barang") { ?>
    <li class="active">
      <a href="?module=barang"><i class="fa fa-folder"></i> Data Barang </a>
      </li>
  <?php
  }
  // jika tidak, menu data barang tidak aktif
  else { ?>
    <li>
      <a href="?module=barang"><i class="fa fa-folder"></i> Data Barang </a>
      </li>
  <?php
  }

  // jika menu data barang masuk dipilih, menu data barang masuk aktif
  if ($_GET["module"]=="barang_masuk" || $_GET["module"]=="form_barang_masuk") { ?>
    <li class="active">
      <a href="?module=barang_masuk"><i class="fa fa-clone"></i> Data Barang Masuk </a>
      </li>
  <?php
  }
  // jika tidak, menu data barang masuk tidak aktif
  else { ?>
    <li>
      <a href="?module=barang_masuk"><i class="fa fa-clone"></i> Data Barang Masuk </a>
      </li>
  <?php
  }

  // jika menu data barang terpakai dipilih, menu data barang terpakai aktif
  if ($_GET["module"]=="barang_terpakai" || $_GET["module"]=="form_barang_terpakai") { ?>
    <li class="active">
      <a href="?module=barang_terpakai"><i class="fa fa-book"></i> Data Barang Terpakai </a>
      </li>
  <?php
  }
  // jika tidak, menu data barang terpakai tidak aktif
  else { ?>
    <li>
      <a href="?module=barang_terpakai"><i class="fa fa-book"></i> Data Barang Terpakai </a>
      </li>
  <?php
  }

  // jika menu data barang terpakai dipilih, menu analisa eoq terpakai aktif
  if ($_GET["module"]=="analisa_eoq" || $_GET["module"]=="form_analisa_eoq") { ?>
    <li class="active">
      <a href="?module=analisa_eoq"><i class="fa fa-bar-chart"></i> Analisa EOQ </a>
      </li>
  <?php
  }
  // jika tidak, menu data barang terpakai tidak aktif
  else { ?>
    <li>
      <a href="?module=analisa_eoq"><i class="fa fa-bar-chart"></i> Analisa EOQ </a>
      </li>
  <?php
  }

	// jika menu Laporan Stok barang dipilih, menu Laporan Stok barang aktif
	if ($_GET["module"]=="lap_stok") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Barang </a></li>
        		<li><a href="?module=lap_barang_masuk"><i class="fa fa-circle-o"></i> Barang Masuk </a></li>
            <li><a href="?module=lap_barang_terpakai"><i class="fa fa-circle-o"></i> Barang Terpakai </a></li>
            <li><a href="?module=lap_analisa_eoq"><i class="fa fa-circle-o"></i> Analisa EOQ </a></li>
      		</ul>
    	</li>
    <?php
	}
	// jika menu Laporan barang Masuk dipilih, menu Laporan barang Masuk aktif
	elseif ($_GET["module"]=="lap_barang_masuk") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Barang </a></li>
        		<li class="active"><a href="?module=lap_barang_masuk"><i class="fa fa-circle-o"></i> Barang Masuk </a></li>
            <li><a href="?module=lap_barang_terpakai"><i class="fa fa-circle-o"></i> Barang Terpakai </a></li>
            <li><a href="?module=lap_analisa_eoq"><i class="fa fa-circle-o"></i> Analisa EOQ </a></li>
      		</ul>
    	</li>
    <?php
  }

  // jika menu Laporan barang Masuk dipilih, menu Laporan barang terpakai aktif
	elseif ($_GET["module"]=="lap_barang_terpakai") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Barang </a></li>
        		<li><a href="?module=lap_barang_masuk"><i class="fa fa-circle-o"></i> Barang Masuk </a></li>
            <li class="active"><a href="?module=lap_barang_terpakai"><i class="fa fa-circle-o"></i> Barang Terpakai </a></li>
            <li><a href="?module=lap_analisa_eoq"><i class="fa fa-circle-o"></i> Analisa EOQ </a></li>
      		</ul>
    	</li>
    <?php
	}

  // jika menu Laporan barang Masuk dipilih, menu Laporan analisa eoq aktif
	elseif ($_GET["module"]=="lap_analisa_eoq") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=lap_stok">
            <i class="fa fa-circle-o"></i> Stok Barang </a></li>
        		<li><a href="?module=lap_barang_masuk"><i class="fa fa-circle-o"></i> Barang Masuk </a></li>
            <li><a href="?module=lap_barang_terpakai"><i class="fa fa-circle-o"></i> Barang Terpakai </a></li>
            <li class="active"><a href="?module=lap_analisa_eoq"><i class="fa fa-circle-o"></i> Analisa EOQ</a></li>
      		</ul>
    	</li>
    <?php
	}

	// jika menu Laporan tidak dipilih, menu Laporan barang tidak aktif
	else { ?>
		<li class="treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Barang </a></li>
        		<li><a href="?module=lap_barang_masuk"><i class="fa fa-circle-o"></i> Barang Masuk </a></li>
            <li><a href="?module=lap_barang_terpakai"><i class="fa fa-circle-o"></i> Barang Terpakai </a></li>
            <li><a href="?module=lap_analisa_eoq"><i class="fa fa-circle-o"></i> Analisa EOQ </a></li>
      		</ul>
    	</li>
    <?php
	}
  

	// jika menu user dipilih, menu user aktif
	if ($_GET["module"]=="user" || $_GET["module"]=="form_user") { ?>
		<li class="active">
			<a href="?module=user"><i class="fa fa-user"></i> Manajemen User</a>
	  	</li>
	<?php
	}
	// jika tidak, menu user tidak aktif
	else { ?>
		<li>
			<a href="?module=user"><i class="fa fa-user"></i> Manajemen User</a>
	  	</li>
	<?php
	}

	// jika menu ubah password dipilih, menu ubah password aktif
	if ($_GET["module"]=="password") { ?>
		<li class="active">
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	// jika tidak, menu ubah password tidak aktif
	else { ?>
		<li>
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	?>
	</ul>
	<!--sidebar menu end-->
<?php
}
// jika hak akses = Manajer, tampilkan menu
elseif ($_SESSION['hak_akses']=='Manajer') { ?>
	<!-- sidebar menu start -->
    <ul class="sidebar-menu">
        <li class="header">MAIN MENU</li>

	<?php 
	// fungsi untuk pengecekan menu aktif
	// jika menu beranda dipilih, menu beranda aktif
	if ($_GET["module"]=="beranda") { ?>
		<li class="active">
			<a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
	<?php
	}
	// jika tidak, menu beranda tidak aktif
	else { ?>
		<li>
			<a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
	<?php
	}

	// jika menu Laporan Stok barang dipilih, menu Laporan Stok barang aktif
  if ($_GET["module"]=="lap_stok") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li class="active"><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Barang </a></li>
            <li><a href="?module=lap_barang_masuk"><i class="fa fa-circle-o"></i> Barang Masuk </a></li>
            <li><a href="?module=lap_barang_terpakai"><i class="fa fa-circle-o"></i> Barang Terpakai </a></li>
            <li><a href="?module=lap_analisa_eoq"><i class="fa fa-circle-o"></i> Analisa EOQ </a></li>
          </ul>
      </li>
    <?php
  }
  // jika menu Laporan barang Masuk dipilih, menu Laporan barang Masuk aktif
  elseif ($_GET["module"]=="lap_barang_masuk") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Barang </a></li>
            <li class="active"><a href="?module=lap_barang_masuk"><i class="fa fa-circle-o"></i> Barang Masuk </a></li>
            <li><a href="?module=lap_barang_terpakai"><i class="fa fa-circle-o"></i> Barang Terpakai </a></li>
            <li><a href="?module=lap_analisa_eoq"><i class="fa fa-circle-o"></i> Analisa EOQ </a></li>
          </ul>
      </li>
    <?php
  }
  // jika menu Laporan barang Masuk dipilih, menu Laporan barang terpakai aktif
	elseif ($_GET["module"]=="lap_barang_terpakai") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Barang </a></li>
        		<li><a href="?module=lap_barang_masuk"><i class="fa fa-circle-o"></i> Barang Masuk </a></li>
            <li class="active"><a href="?module=lap_barang_terpakai"><i class="fa fa-circle-o"></i> Barang Terpakai </a></li>
            <li><a href="?module=lap_analisa_eoq"><i class="fa fa-circle-o"></i> Analisa EOQ </a></li>
      		</ul>
    	</li>
    <?php
	}

  // jika menu Laporan barang Masuk dipilih, menu Laporan analisa eoq aktif
	elseif ($_GET["module"]=="lap_analisa_eoq") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Barang </a></li>
        		<li><a href="?module=lap_barang_masuk"><i class="fa fa-circle-o"></i> Barang Masuk </a></li>
            <li><a href="?module=lap_barang_terpakai"><i class="fa fa-circle-o"></i> Barang Terpakai </a></li>
            <li class="active"><a href="?module=lap_analisa_eoq"><i class="fa fa-circle-o"></i> Analisa EOQ </a></li>
      		</ul>
    	</li>
    <?php
	}

  // jika menu Laporan tidak dipilih, menu Laporan tidak aktif
  else { ?>
    <li class="treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Barang </a></li>
            <li><a href="?module=lap_barang_masuk"><i class="fa fa-circle-o"></i> Barang Masuk </a></li>
            <li><a href="?module=lap_barang_terpakai"><i class="fa fa-circle-o"></i> Barang Terpakai </a></li>
            <li><a href="?module=lap_analisa_eoq"><i class="fa fa-circle-o"></i> Analisa EOQ </a></li>
          </ul>
      </li>
    <?php
  }

	// jika menu ubah password dipilih, menu ubah password aktif
	if ($_GET["module"]=="password") { ?>
		<li class="active">
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	// jika tidak, menu ubah password tidak aktif
	else { ?>
		<li>
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	?>
	</ul>
	<!--sidebar menu end-->
<?php
}
// jika hak akses = Gudang, tampilkan menu
if ($_SESSION['hak_akses']=='Gudang') { ?>
	<!-- sidebar menu start -->
    <ul class="sidebar-menu">
        <li class="header">MAIN MENU</li>

	<?php 
	// fungsi untuk pengecekan menu aktif
	// jika menu beranda dipilih, menu beranda aktif
  if ($_GET["module"]=="beranda") { ?>
    <li class="active">
      <a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
      </li>
  <?php
  }
  // jika tidak, menu home tidak aktif
  else { ?>
    <li>
      <a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
      </li>
  <?php
  }

  // jika menu data barang dipilih, menu data barang aktif
  if ($_GET["module"]=="barang" || $_GET["module"]=="form_barang") { ?>
    <li class="active">
      <a href="?module=barang"><i class="fa fa-folder"></i> Data barang </a>
      </li>
  <?php
  }
  // jika tidak, menu data barang tidak aktif
  else { ?>
    <li>
      <a href="?module=barang"><i class="fa fa-folder"></i> Data barang </a>
      </li>
  <?php
  }

  // jika menu data barang masuk dipilih, menu data barang masuk aktif
  if ($_GET["module"]=="barang_masuk" || $_GET["module"]=="form_barang_masuk") { ?>
    <li class="active">
      <a href="?module=barang_masuk"><i class="fa fa-clone"></i> Data barang Masuk </a>
      </li>
  <?php
  }
  // jika tidak, menu data barang masuk tidak aktif
  else { ?>
    <li>
      <a href="?module=barang_masuk"><i class="fa fa-clone"></i> Data barang Masuk </a>
      </li>
  <?php
  }

  // jika menu data barang terpakai dipilih, menu data barang terpakai aktif
  if ($_GET["module"]=="barang_terpakai" || $_GET["module"]=="form_barang_terpakai") { ?>
    <li class="active">
      <a href="?module=barang_terpakai"><i class="fa fa-book"></i> Data Barang Terpakai </a>
      </li>
  <?php
  }
  // jika tidak, menu data barang terpakai tidak aktif
  else { ?>
    <li>
      <a href="?module=barang_terpakai"><i class="fa fa-book"></i> Data Barang Terpakai </a>
      </li>
  <?php
  }

  // jika menu data barang terpakai dipilih, menu analisa eoq terpakai aktif
  if ($_GET["module"]=="analisa_eoq" || $_GET["module"]=="form_analisa_eoq") { ?>
    <li class="active">
      <a href="?module=analisa_eoq"><i class="fa fa-bar-chart"></i> Analisa EOQ </a>
      </li>
  <?php
  }
  // jika tidak, menu data barang terpakai tidak aktif
  else { ?>
    <li>
      <a href="?module=analisa_eoq"><i class="fa fa-bar-chart"></i> Analisa EOQ </a>
      </li>
  <?php
  }

  /*// jika menu Laporan Stok barang dipilih, menu Laporan Stok barang aktif
  if ($_GET["module"]=="lap_stok") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li class="active"><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Barang </a></li>
            <li><a href="?module=lap_barang_masuk"><i class="fa fa-circle-o"></i> Barang Masuk </a></li>
            <li><a href="?module=lap_barang_terpakai"><i class="fa fa-circle-o"></i> Barang Terpakai </a></li>
            <li><a href="?module=lap_analisa_eoq"><i class="fa fa-circle-o"></i> Analisa EOQ </a></li>
          </ul>
      </li>
    <?php
  }
  // jika menu Laporan barang Masuk dipilih, menu Laporan barang Masuk aktif
  elseif ($_GET["module"]=="lap_barang_masuk") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Barang </a></li>
            <li class="active"><a href="?module=lap_barang_masuk"><i class="fa fa-circle-o"></i> Barang Masuk </a></li>
            <li><a href="?module=lap_barang_terpakai"><i class="fa fa-circle-o"></i> Barang Terpakai </a></li>
            <li><a href="?module=lap_analisa_eoq"><i class="fa fa-circle-o"></i> Analisa EOQ </a></li>
          </ul>
      </li>
    <?php
  }

  // jika menu Laporan barang Masuk dipilih, menu Laporan analisa eoq aktif
	elseif ($_GET["module"]=="lap_analisa_eoq") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Barang </a></li>
        		<li><a href="?module=lap_barang_masuk"><i class="fa fa-circle-o"></i> Barang Masuk </a></li>
            <li><a href="?module=lap_barang_terpakai"><i class="fa fa-circle-o"></i> Barang Terpakai </a></li>
            <li class="active"><a href="?module=lap_analisa_eoq"><i class="fa fa-circle-o"></i> Analisa EOQ </a></li>
      		</ul>
    	</li>
    <?php
	}
  
  // jika menu Laporan barang Masuk dipilih, menu Laporan barang terpakai aktif
	elseif ($_GET["module"]=="lap_barang_terpakai") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Barang </a></li>
        		<li><a href="?module=lap_barang_masuk"><i class="fa fa-circle-o"></i> Barang Masuk </a></li>
            <li class="active"><a href="?module=lap_barang_terpakai"><i class="fa fa-circle-o"></i> Barang Terpakai </a></li>
            <li><a href="?module=lap_analisa_eoq"><i class="fa fa-circle-o"></i> Analisa EOQ </a></li>
      		</ul>
    	</li>
    <?php
	}
  // jika menu Laporan tidak dipilih, menu Laporan tidak aktif
  else { ?>
    <li class="treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Barang </a></li>
            <li><a href="?module=lap_barang_masuk"><i class="fa fa-circle-o"></i> Barang Masuk </a></li>
            <li><a href="?module=lap_barang_terpakai"><i class="fa fa-circle-o"></i> Barang Terpakai </a></li>
            <li><a href="?module=lap_analisa_eoq"><i class="fa fa-circle-o"></i> Analisa EOQ </a></li>
          </ul>
      </li>
    <?php
  }*/

	// jika menu ubah password dipilih, menu ubah password aktif
	if ($_GET["module"]=="password") { ?>
		<li class="active">
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	// jika tidak, menu ubah password tidak aktif
	else { ?>
		<li>
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	?>
	</ul>
	<!--sidebar menu end-->
<?php
}
?>