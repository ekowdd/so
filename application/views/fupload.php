<head>
    <title>Upload Gambar (Image), Rename dan Resize</title>

    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap core CSS -->
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet"> <!-- Custom styles for this template -->
    <style>

        body {
            margin: 20px 10%;
        }
    </style>
</head>

<div class="container">
    <!-- Main component for a primary marketing message or call to action -->
    <div class="panel panel-default">
        <div class="panel-heading"><b>Form Upload Image</b></div>
        <div class="panel-body">
            <?= $this->session->flashdata('pesan') ?>
            <form action="<?= base_url() ?>barang/insert" method="post" enctype="multipart/form-data">
                <table class="table table-striped">

                    <tr>
                        <td style="width:15%;">File Foto</td>
                        <td>
                            <div class="col-sm-6">
                                <input type="file" name="filefoto" class="form-control">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:15%;">Product Code</td>
                        <td>
                            <div class="col-sm-6">
                                <input type="text" name="product_code" class="form-control">
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td style="width:15%;">Product Name</td>
                        <td>
                            <div class="col-sm-6">
                                <input type="text" name="product_name" class="form-control">
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td style="width:15%;">Barcode</td>
                        <td>
                            <div class="col-sm-6">
                                <input type="text" name="barcode" class="form-control">
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td style="width:15%;">Store Name</td>
                        <td>
                            <div class="col-sm-6">
                                <input type="text" name="store_name" class="form-control">
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td style="width:15%;">Quntity</td>
                        <td>
                            <div class="col-sm-6">
                                <input type="text" name="quantity" class="form-control">
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td style="width:15%;">Value</td>
                        <td>
                            <div class="col-sm-6">
                                <input type="text" name="value" class="form-control">
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td style="width:15%;">Total</td>
                        <td>
                            <div class="col-sm-6">
                                <input type="text" name="total" class="form-control">
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" class="btn btn-success" value="Simpan">
                            <button type="reset" class="btn btn-default">Batal</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>    <!-- /panel -->

</div> <!-- /container -->
