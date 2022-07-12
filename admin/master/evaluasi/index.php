<?php
if ($_POST["tahun"] == "") {
    $_POST["tahun"]  = date("Y");
}

if ($_POST["bulan"] == "") $_POST["bulan"] = date("m");
$bulan = array("", "januari", "februari", "maret", "april", "mei", "juni", "juli", "agustus", "september", "oktober", "november", "desember");

?>



<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    * {
        box-sizing: border-box;
    }

    .form-inline {
        display: flex;
        flex-flow: row wrap;
        align-items: center;
    }

    .form-inline label {
        margin: 5px 10px 5px 0;
    }

    .form-inline input {
        vertical-align: middle;
        margin: 5px 10px 5px 0;
        padding: 10px;
        background-color: #fff;
        border: 1px solid #ddd;
    }

    .form-inline select {
        vertical-align: middle;
        margin: 5px 10px 5px 0;
        padding: 10px;
        background-color: #fff;
        border: 1px solid #ddd;
    }

    .form-inline button {
        padding: 10px 20px;
        background-color: dodgerblue;
        border: 1px solid #ddd;
        color: white;
        cursor: pointer;
    }

    .form-inline button:hover {
        background-color: royalblue;
    }

    .form-inline input:hover {
        background-color: royalblue;
    }

    @media (max-width: 800px) {
        .form-inline input {
            margin: 10px 0;
        }

        .form-inline {
            flex-direction: column;
            align-items: stretch;
        }
    }

    .dtHorizontalVerticalExampleWrapper {
        max-width: 600px;
        margin: 0 auto;
    }

    #dtHorizontalVerticalExample th,
    td {
        white-space: nowrap;
    }

    table.dataTable thead .sorting:after,
    table.dataTable thead .sorting:before,
    table.dataTable thead .sorting_asc:after,
    table.dataTable thead .sorting_asc:before,
    table.dataTable thead .sorting_asc_disabled:after,
    table.dataTable thead .sorting_asc_disabled:before,
    table.dataTable thead .sorting_desc:after,
    table.dataTable thead .sorting_desc:before,
    table.dataTable thead .sorting_desc_disabled:after,
    table.dataTable thead .sorting_desc_disabled:before {
        bottom: .5em;
    }
</style>
<!-- MDBootstrap Datatables -->
<link href="css/addons/datatables2.min.css" rel="stylesheet">

<section class="py-9">
    <div class="container">
        <div class="row">

            <form class="form-inline" method="POST" autocomplete="off">
                <label for="tahun">Tahun:</label>
                <select name="tahun" id="tahun">
                    <option value=""></option>
                    <?php
                    for ($i = 2020; $i <= (date("Y") + 1); $i++) { ?>
                        <option value="<?php echo $i ?>" <?php if ($_POST["tahun"] == $i) {
                                                                echo "selected";
                                                            } ?>><?php echo $i ?></option>
                    <?php } ?>
                </select>
                <label for="periode">Bulan:</label>
                <select name="daribulan">
                    <?php
                    for ($i = 1; $i <= 12; $i++) { ?>
                        <option value="<?php echo $i ?>" <?php if ($_POST["daribulan"] == $i) {
                                                                echo "selected";
                                                            } ?>>
                            <?php echo ucwords($bulan[$i]) ?></option>
                    <?php } ?>
                </select>

                <label for="periode">Sampai:</label>
                <select name="sampaibulan">
                    <?php
                    for ($i = 1; $i <= 12; $i++) { ?>
                        <option value="<?php echo $i ?>" <?php if ($_POST["sampaibulan"] == $i) {
                                                                echo "selected";
                                                            } ?>>
                            <?php echo ucwords($bulan[$i]) ?></option>
                    <?php } ?>
                </select>

                <label for="periode">Produk:</label>
                <select name="produkid">
                    <option value="">Pilih Produk</option>
                    <?php
                    $sql_p = "SELECT a.ProdukID, a.Produk FROM ms_produk a WHERE ProdukID !='' ";
                    $data_p = $sqlLib->select($sql_p);
                    foreach ($data_p as $row_p) { ?>
                        <option value="<?php echo $row_p['ProdukID'] ?>" <?php if ($_POST["produkid"] == $row_p['ProdukID']) {
                                                                                echo "selected";
                                                                            } ?>>
                            <?php echo $row_p['Produk'] ?></option>
                    <?php } ?>
                </select>

                <input type="submit" name="view" value="View" style="padding: 10px 20px; background-color: dodgerblue; border: 1px solid #ddd; color: white; cursor: pointer;">
                <!-- <button type="submit" name="view">View</button> -->
            </form>

        </div>
        <div class="row">
            <div class="table-responsive">
                <table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm " cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Perusahaan</th>
                            <th>Produk</th>
                            <th>Mutu</th>
                            <th>Fitur</th>
                            <th>Harga</th>
                            <th>Pengiriman</th>
                            <th>Service dan Pelayanan</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($_POST['view']) {
                            $no = 1;
                            $sql_data = "SELECT a.FormID, a.Tanggal, a.NamaPerusahaan, c.Produk, c.ProdukID, a.Saran 
                                        FROM ms_kuesioner a 
                                        LEFT JOIN ms_pakai_produk b on b.FormID = a.FormID 
                                        LEFT JOIN ms_produk c on c.ProdukID = b.ProdukID
                                        WHERE YEAR(a.Tanggal) = '" . $_POST['tahun'] . "' AND MONTH(a.Tanggal) >='" . $_POST['daribulan'] . "' AND MONTH(a.Tanggal) <='" . $_POST['sampaibulan'] . "' AND c.ProdukID = '" . $_POST['produkid'] . "' ";
                            $data = $sqlLib->select($sql_data);
                            foreach ($data as $row) {

                                $sql_tr = "SELECT COUNT(a.FormID) as jml FROM tr_kuesioner a WHERE a.FormID = '" . $row['FormID'] . "' ";
                                $data_tr = $sqlLib->select($sql_tr);
                                if ($data_tr[0]['jml'] > 0) {

                                    $sql_nilai = "SELECT a.Nilai FROM tr_kuesioner a  
                                                        LEFT JOIN ms_pertanyaan b on b.TanyaID = a.TanyaID WHERE a.FormID='" . $row['FormID'] . "'  AND a.ProdukID = '" . $row['ProdukID'] . "'
                                                        Order by b.Urut Asc ";
                                    $data_nilai = $sqlLib->select($sql_nilai);
                        ?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $row['NamaPerusahaan'] ?></td>
                                        <td><?php echo $row['Produk'] ?> </td>

                                        <?php
                                        foreach ($data_nilai as $row_nilai) {
                                        ?>
                                            <td><?php echo $row_nilai['Nilai'] ?></td>
                                        <?php } ?>

                                        <td><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo $row['FormID'] ?>">Detail</button></td>
                                    </tr>
                                <?php $no++;
                                }   ?>

                                <!-- Modal -->
                                <div class="modal fade" id="myModal<?php echo $row['FormID'] ?>" role="dialog">
                                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                                                <h4 class="modal-title" style="text-align: left;"><?php echo $row['NamaPerusahaan'] ?>, Produk : <?php echo $row['Produk'] ?></h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <?php
                                                    $i;
                                                    1;


                                                    $sql_soal = "SELECT a.*, b.Pertanyaan FROM tr_kuesioner a 
                                                                    LEFT JOIN ms_pertanyaan b on b.TanyaID = a.TanyaID

                                                                    WHERE a.FormID = '" . $row['FormID'] . "' AND a.ProdukID = '" . $row['ProdukID'] . "' 
                                                                    Order By b.Urut Asc";
                                                    $data_soal = $sqlLib->select($sql_soal);
                                                    foreach ($data_soal as $row_soal) {
                                                    ?>
                                                        <div class="col-md-12">
                                                            <input type="hidden" name="tanyaid<?php echo $i ?>" value="<?php echo $row_soal["TanyaID"] ?>">
                                                            <label for="keandalan" class="mb-0"><?php echo $row_soal['Pertanyaan'] ?></label>
                                                        </div>

                                                        <div class="col-md-12 mb-2">

                                                            <div class="form-check">
                                                                <input class="custom-control-input" type="radio" name="soal<?php echo $i ?>" id="soal<?php echo $i ?>" value="5" <?php if ($row_soal['Nilai'] == "5") {
                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                    } ?>>
                                                                <label for="soal<?php echo $i ?>" class="custom-control-label">Sangat Baik</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="custom-control-input" type="radio" name="soal<?php echo $i ?>" id="soal<?php echo $i ?>" value="4" <?php if ($row_soal['Nilai'] == "4") {
                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                    } ?>>
                                                                <label for="soal<?php echo $i ?>" class="custom-control-label">Baik</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="custom-control-input" type="radio" name="soal<?php echo $i ?>" id="soal<?php echo $i ?>" value="3" <?php if ($row_soal['Nilai'] == "3") {
                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                    } ?>>
                                                                <label for="soal<?php echo $i ?>" class="custom-control-label">Sedang</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="custom-control-input" type="radio" name="soal<?php echo $i ?>" id="soal<?php echo $i ?>" value="2" <?php if ($row_soal['Nilai'] == "2") {
                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                    } ?>>
                                                                <label for="soal<?php echo $i ?>" class="custom-control-label">Kurang</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="custom-control-input" type="radio" name="soal<?php echo $i ?>" id="soal<?php echo $i ?>" value="1" <?php if ($row_soal['Nilai'] == "1") {
                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                    } ?>>
                                                                <label for="soal<?php echo $p ?><?php echo $i ?>" class="custom-control-label">Sangat Kurang</label>
                                                            </div>
                                                        </div>

                                                    <?php $i++;
                                                    }

                                                    ?>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12 mb-5">
                                                        <h3 style="font-weight:bold; font-size:18px">Saran dan masukan anda untuk keandalan produk, harga, pengiriman, service/pelayanan dan pengembangan produk kami <h3>
                                                                <textarea name="saran" class="form-control" style="font-size:14px; background-color: #FFF;" rows="5"><?php echo $row['Saran'] ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>

                                        </div>

                                    </div>
                                </div>
            </div>
        <?php }

                            $sql_1 = "SELECT DISTINCT a.FormID
                                        FROM tr_kuesioner a 
                                        LEFT JOIN ms_kuesioner b on b.FormID = a.FormID 
                                        LEFT JOIN ms_produk c on c.ProdukID = a.ProdukID 
                                        WHERE YEAR(b.Tanggal) = '" . $_POST['tahun'] . "' AND MONTH(b.Tanggal) >='" . $_POST['daribulan'] . "' AND MONTH(b.Tanggal) <='" . $_POST['sampaibulan'] . "' AND c.ProdukID = '" . $_POST['produkid'] . "'  ";
                            $data_1 = $sqlLib->select($sql_1);

                            $sql_tanya = "SELECT a.TanyaID FROM ms_pertanyaan a";
                            $data_tanya = $sqlLib->select($sql_tanya);
        ?>
        <tr>
            <td colspan="3" style="text-align: center;">Rata-rata</td>
            <?php
                            foreach ($data_tanya as $row_t) {
                                $sql_2 = "SELECT SUM(a.Nilai) as Nilai
                                                FROM tr_kuesioner a 
                                                LEFT JOIN ms_kuesioner b on b.FormID = a.FormID 
                                                LEFT JOIN ms_produk c on c.ProdukID = a.ProdukID 
                                                WHERE YEAR(b.Tanggal) = '" . $_POST['tahun'] . "' AND MONTH(b.Tanggal) >='" . $_POST['daribulan'] . "' AND MONTH(b.Tanggal) <='" . $_POST['sampaibulan'] . "' 
                                                        AND c.ProdukID = '" . $_POST['produkid'] . "' AND a.TanyaID = '" . $row_t['TanyaID'] . "'   ";
                                $data_2 = $sqlLib->select($sql_2);
                                $average = round($data_2[0]['Nilai'] / count($data_1), 2);

            ?>
                <td><?php echo $average ?></td>
            <?php } ?>
            <td></td>
        </tr>
    <?php
                        }
    ?>

    </tbody>
    </table>
        </div>
    </div>


</section>
<!--Section: Live preview-->
</div>
</div>
</section>

<script type="text/javascript">
    $(document).ready(function() {
        $('#dtHorizontalVerticalExample').DataTable({
            "scrollX": true,
            "scrollY": 200,
        });
        $('.dataTables_length').addClass('bs-select');
    });
</script>

<!-- 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->

<!-- jQuery  -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- Bootstrap tooltips  -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!-- Bootstrap core JavaScript  -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- MDB core JavaScript  -->
<script type="text/javascript" src="js/mdb.min.js"></script>
<!-- Your custom scripts (optional) 
<script type="text/javascript"></script>
<!-- MDBootstrap Datatables  -->
<script type="text/javascript" src="js/addons/datatables2.min.js"></script>
<!-- 
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script> -->