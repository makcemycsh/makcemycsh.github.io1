<ul class="slider">
<?php
foreach ($images as $image) {
  $src = wp_get_attachment_url($image->ID); // ссылка на изображение
  $alt = get_post_meta($image->ID, '_wp_attachment_image_alt', true); // атрибут alt
  $title = $image->post_title; // заголовок изображения
  $caption = $image->post_excerpt; // подпись к изображению
  $description = $image->post_content; // описание изображения
?>
  <li>
    <p><?php echo $title; ?></p>
    <p><img src="<?php echo $src; ?>" alt="<?php echo $alt; ?>" /></p>
    <p><?php echo $caption; ?></p>
    <p><?php echo $description; ?></p>
  </li>
<?php } ?>
</ul>