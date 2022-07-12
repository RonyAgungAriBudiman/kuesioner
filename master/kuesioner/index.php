<?php
if (isset($_POST['isi'])) {
    $formid = date("ymdhi");
    $jumCB    = $_POST["jumCB"];

    //save header
    $sql_header = "INSERT INTO ms_kuesioner (FormID, Tanggal, NamaPerusahaan, Alamat, NoTlp) 
                    VALUES ('" . $formid . "','" . date("Y-m-d") . "', '" . $_POST['nama_perusahaan'] . "' , '" . $_POST['alamat'] . "' , '" . $_POST['notlp'] . "')";
    $save_header = $sqlLib->insert($sql_header);



    if ($save_header == "1") {
        for ($i = 1; $i <= $jumCB; $i++) {
            $cb = $_POST['cb' . $i];
            if ($cb != "") {
                $produk         = $_POST["produk" . $i];

                $sql_1 = "INSERT INTO ms_pakai_produk (FormID, ProdukID) 
                            VALUES ('" . $formid . "','$produk')";
                $run_1 = $sqlLib->insert($sql_1);
            }
        }
    }
}


if (isset($_POST['simpan'])) {

    $formid     = $_POST["formid"];
    $jmlproduk  = $_POST["jmlproduk"];
    $jmljawab   = $_POST["jmljawab"];
    $sukses = false;
    for ($jp = 1; $jp <= $jmlproduk; $jp++) {
        $produkid = $_POST["produkid" . $jp];
        for ($jj = 1; $jj <= $jmljawab; $jj++) {
            $tanyaid = $_POST["tanyaid" . $jj];
            $nilai   = $_POST["soal" . $jp . $jj];

            $sql  = "INSERT INTO tr_kuesioner (FormID, ProdukID, TanyaID, Nilai)
                    VALUES('" . $formid . "','" . $produkid . "',  '" . $tanyaid . "','" . $nilai . "')";
            $data = $sqlLib->insert($sql);
            $sukses = true;
        }
    }
    if ($sukses) {
        $sql_up = "UPDATE ms_kuesioner Set Saran = '" . $_POST["saran"] . "' 
                    WHERE FormID = '" . $formid . "'  ";
        $run_up = $sqlLib->update($sql_up);
        if ($run_up == "1") {
            $alert = 0;
            $note = "Terima kasih telah bersedia mengisi kuesioner kami.";
        }
    }


    unset($_POST);
    $formid = "";
}
?>


<style>
    input[type=radio] {
        margin: 0.1em 0.3em 0em 0.3em;
        transform: scale(1.5, 1.5);
        -moz-transform: scale(1.5, 1.5);
        -ms-transform: scale(1.5, 1.5);
        -webkit-transform: scale(1.5, 1.5);
        -o-transform: scale(1.5, 1.5);
    }
</style>

<section class="py-9">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto text-center mb-4">

                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </symbol>
                    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                    </symbol>
                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </symbol>
                </svg>


                <?php
                if ($alert == "0") {
                ?>
                    <div class="alert alert-primary d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                            <use xlink:href="#check-circle-fill" />
                        </svg>
                        <div>
                            <?php echo $note ?>
                        </div>
                    </div>
                <?php
                } else if ($alert == "1") {
                ?>
                    <div class="alert alert-warning d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
                            <use xlink:href="#exclamation-triangle-fill" />
                        </svg>
                        <div>
                            <?php echo $note ?>
                        </div>
                    </div>
                <?php
                } ?>


                <h5 class="fw-light fs-3 fs-lg-5 lh-sm mb-4">Kuesioner</h5>
                <p class="mb-0">Kami sangat berterima kasih atas kepercayaan Saudara dalam menggunakan produk Smart Meter. Kami menghargai partisipasi Saudara untuk memberikan masukan dan feedback dalam rangka peningkatan mutu produk dan pelayanan kami.

                </p>
            </div>
        </div>

        <div class="row flex-center h-100">
            <div class="col-xl-9 mb-8">
                <div class="row justify-content-center">
                    <form method="post" autocomplete="off">
                        <div class="form-group row mb-3">
                            <label for="nama_perusahaan" class="col-sm-4 col-form-label">Nama Perusahaan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" style="background-color: #FFF;" id="nama_perusahaan" name="nama_perusahaan" value="<?php echo $_POST['nama_perusahaan'] ?>" required="required">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" style="background-color: #FFF;" id="alamat" name="alamat" value="<?php echo $_POST['alamat'] ?>" required="required">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="notlp" class="col-sm-4 col-form-label">No Tlp</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" style="background-color: #FFF;" id="notlp" name="notlp" value="<?php echo $_POST['notlp'] ?>" required="required">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="keandalan" class="mb-2">Produk apa yang anda gunakan?</label>
                                <input type="hidden" name="formid" id="formid" value="<?php echo $formid; ?>">
                            </div>

                            <div class="col-md-12 mb-2">
                                <?php
                                $nop = 0;
                                $sql_produk = "SELECT a.ProdukID, a.Produk,
                                                (SELECT COUNT(b.ProdukID) FROM ms_pakai_produk b WHERE b.ProdukID = a.ProdukID AND b.FormID = '" . $formid . "') as Pilih
                                                FROM ms_produk a WHERE a.ProdukID !='' Order By a.Urut Asc ";
                                $data_produk = $sqlLib->select($sql_produk);
                                foreach ($data_produk as $row_produk) {
                                    $nop++;
                                ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1<?php echo  $nop ?>" value="1" name="cb<?php echo $nop; ?>" <?php if ($row_produk["Pilih"] > 0) {
                                                                                                                                                                            echo "checked";
                                                                                                                                                                        } ?> />
                                        <input type="hidden" name="produk<?php echo $nop ?>" id="produk<?php echo $nop ?>" value="<?php echo $row_produk['ProdukID'] ?>" />
                                        <label class="form-check-label" for="inlineCheckbox1"><?php echo $row_produk['Produk'] ?></label>
                                    </div>
                                <?php
                                }
                                ?>
                                <input type="hidden" name="jumCB" id="jumCB" value="<?php echo $nop; ?>">
                            </div>
                        </div>

                        <?php
                        if ($formid != "") {
                            //cek pakai produk
                            $p = 1;
                            $sql_pakai_produk = "SELECT a.ProdukID, b.Produk 
                                                    FROM ms_pakai_produk a 
                                                    LEFT JOIN ms_produk b on b.ProdukID = a.ProdukID 
                                                    WHERE a.FormID = '" . $formid . "' order by b.Urut  Asc";
                            $data_pakai       = $sqlLib->select($sql_pakai_produk);
                            foreach ($data_pakai as $row_pakai) {
                        ?>
                                <div class="form-group">
                                    <div class="col-md-12 mt-3">
                                        <h3 style="font-weight:bold; font-size:18px"><?php echo strtoupper($row_pakai['Produk']) ?> </h3>
                                        <input type="hidden" name="produkid<?php echo $p ?>" value="<?php echo $row_pakai["ProdukID"] ?>">
                                    </div>
                                </div>



                                <div class="form-group">
                                    <?php
                                    $i = 1;
                                    $sql_tanya = "SELECT a.TanyaID, a.Pertanyaan 
                                                                        FROM ms_pertanyaan a 
                                                                        WHERE a.TanyaID != '' order by a.urut  Asc";
                                    $data_tanya = $sqlLib->select($sql_tanya);
                                    foreach ($data_tanya as $row_tanya) {
                                    ?>
                                        <div class="col-md-12">
                                            <input type="hidden" name="tanyaid<?php echo $i ?>" value="<?php echo $row_tanya["TanyaID"] ?>">
                                            <label for="keandalan" class="mb-0"><?php echo $row_tanya['Pertanyaan'] ?></label>
                                        </div>

                                        <div class="col-md-12 mb-2">

                                            <div class="form-check">
                                                <input class="custom-control-input" type="radio" name="soal<?php echo $p ?><?php echo $i ?>" id="soal<?php echo $p ?><?php echo $i ?>" value="5" required="required">
                                                <label for="soal<?php echo $p ?><?php echo $i ?>" class="custom-control-label">Sangat Baik</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="custom-control-input" type="radio" name="soal<?php echo $p ?><?php echo $i ?>" id="soal<?php echo $p ?><?php echo $i ?>" value="4" required="required">
                                                <label for="soal<?php echo $p ?><?php echo $i ?>" class="custom-control-label">Baik</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="custom-control-input" type="radio" name="soal<?php echo $p ?><?php echo $i ?>" id="soal<?php echo $p ?><?php echo $i ?>" value="3" required="required">
                                                <label for="soal<?php echo $p ?><?php echo $i ?>" class="custom-control-label">Sedang</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="custom-control-input" type="radio" name="soal<?php echo $p ?><?php echo $i ?>" id="soal<?php echo $p ?><?php echo $i ?>" value="2" required="required">
                                                <label for="soal<?php echo $p ?><?php echo $i ?>" class="custom-control-label">Kurang</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="custom-control-input" type="radio" name="soal<?php echo $p ?><?php echo $i ?>" id="soal<?php echo $p ?><?php echo $i ?>" value="1" required="required">
                                                <label for="soal<?php echo $p ?><?php echo $i ?>" class="custom-control-label">Sangat Kurang</label>
                                            </div>
                                        </div>
                                    <?php $i++;
                                    } ?>
                                    <input type="hidden" name="jmljawab" value="<?php echo ($i - 1) ?>">
                                </div>



                            <?php

                                $p++;
                            }
                            ?><input type="hidden" name="jmlproduk" value="<?php echo ($p - 1) ?>">

                            <div class="form-group">
                                <div class="col-md-12 mb-5">
                                    <h3 style="font-weight:bold; font-size:18px">Saran dan masukan anda untuk keandalan produk, harga, pengiriman, service/pelayanan dan pengembangan produk kami <h3>
                                            <textarea name="saran" class="form-control" style="font-size:14px; background-color: #FFF;" rows="5" required="required"></textarea>
                                </div>
                            </div>
                        <?php

                        }

                        ?>

                        <?php
                        if ($formid != "") {
                        ?>
                            <div class="form-group row mb-3">
                                <div class="col-sm-10">
                                    <input type="submit" name="simpan" value="Simpan Kuesioner" class="btn btn-primary">
                                </div>
                            </div>
                        <?php } else {
                        ?>
                            <div class="form-group row mb-3">
                                <div class="col-sm-10">
                                    <input type="submit" name="isi" value="Isi Kuesioner" class="btn btn-primary">
                                </div>
                            </div>
                        <?php
                        } ?>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>