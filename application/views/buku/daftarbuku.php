<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Buku</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Daftar Buku</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Buku</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
    
    <a href="/buku/tambah" class="btn btn-primary">Tambah Buku</a>
    
    <table border="1" class="table table-bordered" cellspacing="0" cellpadding="">
        <thead>
            <tr class="bg-yellow">
                <th>No</th>
                <th>Kode Buku</th>
                <th>Judul Buku</th>
                <th>Kategori</th>
                <th>Sampul</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1 ;
            foreach ($daftar_buku as $buku) { ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $buku->kode_buku; ?></td>
                <td><?php echo $buku->judul_buku; ?></td>
                <td><?php echo $buku->nama_kategori; ?></td>
                <td>
                <img src="upload_data/<?php echo $buku->cover_buku; ?>" height="30px" ></td>
                <td>
                    <a class="btn btn-success" href="buku/lihat/<?php echo $buku->kode_buku; ?>"> Lihat </a>
                    <a href="buku/edit/<?php echo $buku->kode_buku; ?>" class="btn btn-info">Edit</a>
                    <a href="buku/hapus/<?php echo $buku->kode_buku; ?>" 
                    onclick="return confirm('Yakin dihapus?')" class="btn btn-danger">Hapus</a> 
                  </td>
            </tr
            <?php } ?>
        </tbody>
    </table>
    
    </div>
      <!-- /.card -->

    </section>

    