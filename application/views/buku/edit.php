<section class="content">
<div class="container-fluid">
    <div class="row">
        <h2><?php echo $judul; ?></h2>
    </div>

    <div class="row">
        <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>/buku/simpan_edit" enctype="multipart/form-data">
            <div class="form-group">
                <label>Kode Buku</label>
                <input type="text" class="form-control" value="<?php echo $buku->kode_buku; ?>" name="kode_buku" />
            </div>
            <div class="form-group">
                <label>Judul Buku</label>
                <input type="text" class="form-control" name="judul_buku" value="<?php echo $buku->judul_buku; ?>"/>
            </div>
            <div class="form-group">
                <label>Kategori Buku</label>
                <select class="form-control" name="kategori">
                    <option value="">Pilih</option>
                    <?php 
                    foreach($kategori as $kategori){ ?>
                    <option value="<?php echo $kategori->id_kategori; ?>" <?php if($buku->kategori_buku == $kategori->id_kategori ) echo "selected";?>>
                        <?php echo $kategori->nama_kategori; ?>
                    </option>

                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Sampul Buku</label>
                <input accept=".jpg,.png,.jpeg" type="file" class="form-control" name="sampul" />
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
</section>