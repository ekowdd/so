<head>
    <title>Upload Gambar (Image), Rename dan Resize</title> <!-- variabel diambil dari controller -->

    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap core CSS -->
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet"> <!-- Custom styles for this template -->
    <style>

        body {
            margin: 20px 10%;
        }
    </style>
</head>

<div class="container-fluid">
    <!-- Main component for a primary marketing message or call to action -->
    <div class="panel panel-default">
        <div class="panel-heading"><b> Daftar File IMage</b></div>
        <div class="panel-body">

            <?= $this->session->flashdata('pesan') ?>
            <p>
                <a href="<?= base_url() ?>barang/add" class="btn btn-success">Tambah</a>
            </p>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Product Code</th>
                    <th>Product Name</th>
                    <th>barcode</th>
                    <th>Store Name</th>
                    <th>Quantity</th>
                    <th>Values</th>
                    <th>Total</th>
                    <th>Tipe File</th>
                    <th>Nama File</th>
                    <th>Gambar File</th>
                </tr>
                <?php foreach ($query as $row) {
                    ?>
                    <tr>
                        <td><?= $row->product_code; ?></td>
                        <td><?= $row->product_name; ?></td>
                        <td><?= $row->barcode; ?></td>
                        <td><?= $row->store_name; ?></td>
                        <td><?= $row->quantity; ?></td>
                        <td><?= $row->value; ?></td>
                        <td><?= $row->total; ?></td>
                        <td><?= $row->type; ?></td>
                        <td><?= $row->nama_file; ?></td>
                        <td><img src="<?= base_url() ?>assets/hasil_resize/<?= $row->nama_file; ?>"></td>
                    </tr>
                <?php } ?>
            </table>

        </div>
    </div>
</div>
