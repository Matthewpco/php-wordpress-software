<?php

function load_admin_page() {
?>
    <style>
	.separator {
		width: 20%;
		height: 1px;
		background-color: gray;
	}
	</style>
    <div class="wrap">
        <h1>WebP Image Converter</h1>
        <br>
		<h2>Convert a single image by url or by upload</h2>
		<div class="separator"></div>
        <p>Only jpg, jpeg, or png images should be uploaded</p>
        <form method="post" enctype="multipart/form-data">
            <label for="image_url">Image URL:</label>
            <input type="url" name="image_url" id="image_url">
            <p>OR</p>
            <label for="image_file">Upload Image:</label>
            <input type="file" name="image_file" id="image_file" accept=".jpg,.jpeg,.png">
            <input type="submit" value="Convert to WebP">
        </form>
        <br>
		<h2>Convert all images in the media library</h2>
		<div class="separator"></div>
		<p>Converting all images might cause issues if for example the size of the media library is too large or if it contains unexpected file types. Therefore it is recommended to test this functionality on a local version of the site first.</p>
		<form method="post">
            <input type="hidden" name="convert_all_images" value="1">
            <input type="submit" value="Convert All Images">
        </form>
        <?php
            if ( isset( $_POST['convert_all_images'] ) ) {   
                convert_all_images();
            } elseif ( isset( $_POST['image_url'] ) && ! empty( $_POST['image_url'] ) ) {
                convert_image_from_url();
            } elseif ( isset( $_FILES['image_file'] ) && $_FILES['image_file']['error'] === UPLOAD_ERR_OK ) {
                upload_image();
            } elseif ( isset( $_FILES['image_file'] ) && $_FILES['image_file']['error'] !== UPLOAD_ERR_OK ) {
                echo '<p style="color: red;">Please select an image to upload and try again.</p>';
            }
        ?>
    </div>
<?php
}