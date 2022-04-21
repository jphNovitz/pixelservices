<?php
if ($image_url = esc_attr(get_option('seo_image'))){

?>
<div>
    <img src="<?php echo $image_url ; ?>" style="width: 125px" id="image_preview" />

</div>
<?php } ?>

<input value="<?php echo $image_url ; ?>" type="text" name="image" id="image_url" >
<input type="button" value="Sélectionner" name="upload-button" id="upload-button">
<input type="submit" name="seo-image-submitted" value="Valider"/>