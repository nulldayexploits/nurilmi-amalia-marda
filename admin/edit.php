<?php 

  include('config/connect-db.php'); 
  include('config/base-url.php'); 
  include('template/atas.php'); 

  
  $id = $_GET['id'];

  $result = mysqli_query($mysqli, "SELECT * FROM tb_uud where id = $id");
  $data = mysqli_fetch_array($result);

?>
  <script src="assets/ckeditor/ckeditor.js"></script>
    
  <!-- Login -->
  <div class="w3-container" id="login" style="margin-top:75px">
    <h1 class="w3-xxxlarge judul-content"><b>Edit</b></h1>
    <hr class="w3-round garis-judul-content">

    <form action="" method="post">
      
      <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

      <div class="w3-section">
        <label>Halaman Ke</label>
        <input class="w3-input w3-border" type="input" name="judul" value="<?php echo $data['halaman_ke']; ?>">
      </div>
      

      <div class="w3-section">
        <label>Isi</label>
        <textarea name="isi" id="input_1" class="w3-input w3-border"><?php echo $data['isi']; ?></textarea>
      </div>     
      <script>
          var editor = CKEDITOR.replace( 'input_1', {
                  height: 400,
                  wordcount: {
                      maxWordCount: 1300,
                  },
                  title: 'Rich Text Editor'
              } );    
          editor.on( 'change', function( evt ) { $('#input_1').val(evt.editor.getData()); }); 
      </script>


      <button type="submit" class="w3-button w3-block w3-padding-large w3-red w3-margin-bottom" name="Update">EDIT</button>
    </form>  
  </div>


  
  
<!-- End page content -->
</div>

<br><br><br><br>


<?php 

include('template/bawah.php'); 

// Keadeaan Ketika Di Submit atau mengirim data
if(isset($_POST['Update'])) {

  // Memasukkan Data Inputan ke Varibael
  $id         = $_POST['id'];
  $halaman_ke = $_POST['halaman_ke'];
  $isi        = $_POST['isi'];
  
  // Memasukkan data kedatabase berdasarakan variabel tadi
  $result = mysqli_query($mysqli, "UPDATE tb_uud SET 
                                   halaman_ke='$halaman_ke',
                                   isi='$isi'
                                   WHERE id=$id");
  
  // Cek jika proses simpan ke database sukses atau tidak   
  if($result){ 
       // Jika Sukses, redirect halaman menggunakan javascript
    echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/view.php" </script>';
  }else{
      // Jika Gagal, Lakukan :
      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
      //echo "<br><a href='tambah_tok.php'>Kembali Ke Form</a>";
  }


}

?>