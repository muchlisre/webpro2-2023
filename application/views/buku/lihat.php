<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Buku:</title>
</head>
<body>
    <table width="100%" cellspacing="02" cellpadding="">
        <tr>
            <td>Kode Buku</td><td><?php echo $buku->kode_buku; ?></td>
        </tr>
        <tr>
            <td>Judul Buku</td><td><?php echo $buku->judul_buku; ?></td>
        </tr>
        <tr>
            <td>Kategori Buku</td><td><?php echo $buku->kategori_buku; ?></td>
        </tr>
        <tr>
            <td>Sampul</td><td><?php echo $buku->cover_buku; ?></td>
        </tr>
    </table>
</body>
</html>