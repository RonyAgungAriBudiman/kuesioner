<?php
if(isset($_POST['masuk']))
{
  
  header("location:index.php?m=<?php echo acakacak('encode','masuk/siswa')?>");  
  //cek email
  // $sql_email = "SELECT Email FROM ms_user WHERE Email = '".$_POST['email']."' ";
  // $data_email= $sqlLib->select($sql_email);
  // if(count($data_email)>0)
  // {
  //     //cek password
  //     $sql_pass = "SELECT Email, Nama, Password FROM ms_user WHERE Password = '".$_POST['password']."' ";
  //     $data_pass= $sqlLib->select($sql_pass);
  //     if(count($sql_pass)>0)
  //     {
  //       $_SESSION["nama"] = $datapass[0]["Nama"];
  //       $_SESSION["email"]   = $datapass[0]["Email"];
        
  //       setcookie("email", $datapass[0]["Email"], time() + (3600 * 24 * 30 * 12));
  //       setcookie("nama", $datapass[0]["Nama"], time() + (3600 * 24 * 30 * 12));
  //       header("location:master/masuk/home.php");
  //     }
  //     else
  //     {
  //       $alert = 1;
  //       $note  = "Maaf, Password tidak sesuai.";
  //     } 
  // }
  // else
  // {
  //   $alert = 1;
  //   $note  = "Email tidak ditemukan, Silahkan registrasi dahulu.";
  // }  
}
?>


<section class="py-9">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 mx-auto text-center mb-2">

            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
              <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
              </symbol>
              <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
              </symbol>
              <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </symbol>
            </svg>


              <?php
              if ($alert == "0") 
              {
                  ?>
                  <div class="alert alert-primary d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div>
                      <?php echo $note ?>
                    </div>
                  </div>
                  <?php 
              } 
              else if ($alert == "1") 
              {
                  ?>
                  <div class="alert alert-warning d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div>
                      <?php echo $note ?>
                    </div>
                  </div>
                  <?php 
              } ?>    


              <h5 class="fw-light fs-3 fs-lg-5 lh-sm mb-2">Silahkan Masuk</h5>
              <!-- <p class="mb-0">Pada sesi pendaftaran ini anda dipersilahkan mengisi email dan nama pengguna yang nanti akan menjadi akun anda, pastikan email yang anda input adalah aktif</p> -->
            </div>
          </div>

          <div class="row flex-center h-100">
            <div class="col-sm-6 mb-10">
              <div class="row justify-content-center">
                <form method="post"  autocomplete="off">
                  <div class="form-group row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" style="background-color: #FFF;" id="email" name="email" required="required" >
                    </div>
                  </div>
                  <div class="form-group row mb-3">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" style="background-color: #FFF;" id="myInput" name="password" required="required"><br>
                      <input type="checkbox" onclick="myFunction()"> Tampilkan Password
                    </div>
                    
                    
                  </div>
                  
                  <div class="form-group row mb-3">
                    <div class="col-sm-10">
                      <!-- <button type="submit" name="buatakun" class="btn btn-primary">Buat Akun</button> -->
                      <input type="submit" name="masuk" value="Masuk" class="btn btn-primary">
                    </div>
                  </div>
                </form>

              </div>
            </div>
          </div>      
        </div>  
</section>   


<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

</script>