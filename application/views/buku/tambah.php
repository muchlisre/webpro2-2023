<section class="content">
<div class="container-fluid">
    <div class="row">
        <h2><?php echo $judul; ?></h2>
    </div>

    <div class="row">
    <div class="col-6">
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Tambah Buku</h3>
        </div>


        <div class="card-body">

        <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>/buku/simpan" enctype="multipart/form-data">
            <!-- <div class="form-group">
                <label>Kode Buku</label>
                <input type="text" class="form-control" name="kode_buku" />
            </div> -->
            <div class="form-group">
                <label>Judul Buku</label>
                <input type="text" class="form-control" name="judul_buku" />
            </div>
            <div class="form-group">
                <label>Kategori Buku</label>
                <select class="form-control" name="kategori">
                    <option value="">Pilih</option>
                    <?php 
                    foreach($kategori as $kategori){ ?>
                    <option value="<?php echo $kategori->id_kategori; ?>">
                        <?php echo $kategori->nama_kategori; ?>
                    </option>

                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label>Sampul Buku</label>
                <input accept=".jpg,.png,.jpeg" type="file" class="form-control" name="sampul" />
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        </div>
    </div>
    </div>
</div>
</section>