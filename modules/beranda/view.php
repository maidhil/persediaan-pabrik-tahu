  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-home icon-title"></i> Beranda
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda</a></li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-lg-12 col-xs-12">
        <div class="alert alert-info alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <p style="font-size:15px">
            <i class="icon fa fa-user"></i> Selamat datang <strong><?php echo $_SESSION['nama_user']; ?></strong> di Aplikasi Persediaan Pabrik Tahu dan Tempe.
          </p>        
        </div>
      </div>
    </div>
   
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#00c0ef;color:#fff" class="small-box">
          <div class="inner">
            <?php  
            // fungsi query untuk menampilkan data dari tabel Barang
            $query = mysqli_query($mysqli, "SELECT COUNT(kode_Barang) as jumlah FROM is_barang")
                                            or die('Ada kesalahan pada query tampil Data Barang: '.mysqli_error($mysqli));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jumlah']; ?></h3>
            <p>Data Barang</p>
          </div>
          <div class="icon">
            <i class="fa fa-folder"></i>
          </div>
          <?php  
          if ($_SESSION['hak_akses']!='Manajer') { ?>
            <a href="?module=form_barang&form=add" class="small-box-footer" title="Tambah Data" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
          <?php
          } else { ?>
            <a class="small-box-footer"><i class="fa"></i></a>
          <?php
          }
          ?>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#00a65a;color:#fff" class="small-box">
          <div class="inner">
            <?php   
            // fungsi query untuk menampilkan data dari tabel Barang masuk
            $query = mysqli_query($mysqli, "SELECT COUNT(kode_transaksi) as jumlah FROM is_barang_masuk")
                                            or die('Ada kesalahan pada query tampil Data Barang Masuk: '.mysqli_error($mysqli));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jumlah']; ?></h3>
            <p>Data Barang Masuk</p>
          </div>
          <div class="icon">
            <i class="fa fa-sign-in"></i>
          </div>
          <?php  
          if ($_SESSION['hak_akses']!='Manajer') { ?>
            <a href="?module=form_barang_masuk&form=add" class="small-box-footer" title="Tambah Data" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
          <?php
          } else { ?>
            <a class="small-box-footer"><i class="fa"></i></a>
          <?php
          }
          ?>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#972c89;color:#fff" class="small-box">
          <div class="inner">
            <?php   
            // fungsi query untuk menampilkan data dari tabel Barang masuk
            $query = mysqli_query($mysqli, "SELECT COUNT(kode_terpakai) as jumlah FROM is_barang_pakai")
                                            or die('Ada kesalahan pada query tampil Data Barang Pakai: '.mysqli_error($mysqli));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jumlah']; ?></h3>
            <p>Data Barang Terpakai</p>
          </div>
          <div class="icon">
            <i class="fa fa-upload"></i>
          </div>
          <?php  
          if ($_SESSION['hak_akses']!='Manajer') { ?>
            <a href="?module=form_barang_terpakai&form=add" class="small-box-footer" title="Tambah Data" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
          <?php
          } else { ?>
            <a class="small-box-footer"><i class="fa"></i></a>
          <?php
          }
          ?>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#deb887;color:#fff" class="small-box">
          <div class="inner">
            <?php   
            // fungsi query untuk menampilkan data dari tabel Barang masuk
            $query = mysqli_query($mysqli, "SELECT COUNT(kode_eoq) as jumlah FROM is_analisa_eoq")
                                            or die('Ada kesalahan pada query tampil Data Analisa EOQ: '.mysqli_error($mysqli));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jumlah']; ?></h3>
            <p>Data Analisa EOQ</p>
          </div>
          <div class="icon">
            <i class="fa fa-bar-chart"></i>
          </div>
          <?php  
          if ($_SESSION['hak_akses']!='Manajer') { ?>
            <a href="?module=form_analisa_eoq&form=add" class="small-box-footer" title="Tambah Data" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
          <?php
          } else { ?>
            <a class="small-box-footer"><i class="fa"></i></a>
          <?php
          }
          ?>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#f39c12;color:#fff" class="small-box">
          <div class="inner">
            <?php  
            // fungsi query untuk menampilkan data dari tabel Barang
            $query = mysqli_query($mysqli, "SELECT COUNT(kode_Barang) as jumlah FROM is_barang")
                                            or die('Ada kesalahan pada query tampil Data Barang: '.mysqli_error($mysqli));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jumlah']; ?></h3>
            <p>Laporan Stok Barang</p>
          </div>
          <div class="icon">
            <i class="fa fa-file-text-o"></i>
          </div>
          <?php  
          if ($_SESSION['hak_akses']!='Gudang') { ?>
            <a href="?module=lap_stok" class="small-box-footer" title="Cetak Laporan" data-toggle="tooltip"><i class="fa fa-print"></i></a>
          <?php
          } else { ?>
            <a class="small-box-footer"><i class="fa"></i></a>
          <?php
          }
          ?>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#dd4b39;color:#fff" class="small-box">
          <div class="inner">
            <?php   
            // fungsi query untuk menampilkan data dari tabel Barang masuk
            $query = mysqli_query($mysqli, "SELECT COUNT(kode_transaksi) as jumlah FROM is_barang_masuk")
                                            or die('Ada kesalahan pada query tampil Data Barang Masuk: '.mysqli_error($mysqli));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jumlah']; ?></h3>
            <p>Laporan Barang Masuk</p>
          </div>
          <div class="icon">
            <i class="fa fa-file-text-o"></i>
          </div>
          <?php  
          if ($_SESSION['hak_akses']!='Gudang') { ?>
            <a href="?module=lap_barang_masuk" class="small-box-footer" title="Cetak Laporan" data-toggle="tooltip"><i class="fa fa-print"></i></a>
          <?php
          } else { ?>
            <a class="small-box-footer"><i class="fa"></i></a>
          <?php
          }
          ?>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#FF1493;color:#fff" class="small-box">
          <div class="inner">
            <?php   
            // fungsi query untuk menampilkan data dari tabel Barang terpakai
            $query = mysqli_query($mysqli, "SELECT COUNT(kode_terpakai) as jumlah FROM is_barang_pakai")
                                            or die('Ada kesalahan pada query tampil Data Barang Terpakai: '.mysqli_error($mysqli));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jumlah']; ?></h3>
            <p>Laporan Barang Terpakai</p>
          </div>
          <div class="icon">
            <i class="fa fa-file-text-o"></i>
          </div>
          <?php  
          if ($_SESSION['hak_akses']!='Gudang') { ?>
            <a href="?module=lap_barang_terpakai" class="small-box-footer" title="Cetak Laporan" data-toggle="tooltip"><i class="fa fa-print"></i></a>
          <?php
          } else { ?>
            <a class="small-box-footer"><i class="fa"></i></a>
          <?php
          }
          ?>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#FFD700;color:#fff" class="small-box">
          <div class="inner">
            <?php   
            // fungsi query untuk menampilkan data dari tabel Barang terpakai
            $query = mysqli_query($mysqli, "SELECT COUNT(kode_eoq) as jumlah FROM is_analisa_eoq")
                                            or die('Ada kesalahan pada query tampil Data Analisa EOQ: '.mysqli_error($mysqli));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jumlah']; ?></h3>
            <p>Laporan Analisa EOQ</p>
          </div>
          <div class="icon">
            <i class="fa fa-file-text-o"></i>
          </div>
          <?php  
          if ($_SESSION['hak_akses']!='Gudang') { ?>
            <a href="?module=lap_analisa_eoq" class="small-box-footer" title="Cetak Laporan" data-toggle="tooltip"><i class="fa fa-print"></i></a>
          <?php
          } else { ?>
            <a class="small-box-footer"><i class="fa"></i></a>
          <?php
          }
          ?>
        </div>
      </div><!-- ./col -->
    </div><!-- /.row -->
  </section><!-- /.content -->