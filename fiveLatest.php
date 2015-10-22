<div class="docContainer antennacondmedium" style="border-bottom: none;">
<div style="border-bottom: 1px solid #acacb1; width: 100%; font-size: 30px; margin-bottom: 10px;">Norra sidan</div>
<div class="theDocs">
<?php
$plats_omrade = "platsannons";

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = array(
  'posts_per_page' => 50,
  'paged' => $paged,
  'post_type'=>'saljvagg',
  'category'=>$typeOfDoc,
  'tag'=>$region,
  'orderby' => 'title',
  'order' => 'ASC'
);

query_posts($args); 

$imagecount = 1;
while ( have_posts() ) : the_post();
$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
$position = get_post_meta($post->ID, 'plats_position', true);
$plats_enddate = get_post_meta($post->ID, 'plats_last_date', true);
$plats_suffix = get_post_meta($post->ID, 'plats_suffix', true);
$plats_ad = get_post_meta($post->ID, 'plats_ad_img', true);
$plats_url = get_post_meta($post->ID, 'plats_url', true);
$tryurl = substr($plats_url, 0, 4);
if ($tryurl == "http") {
	
} else {
$plats_url = "http://".$plats_url;	
}
$plats_kommun = get_post_meta($post->ID, 'plats_kommun', true);
$plats_kommun = ucfirst($plats_kommun);

$pdfName = get_post_meta($post->ID, 'pdfName', true);

if ($plats_suffix != "") {
	
} else {
	$plats_suffix = "söker";	
}

?>
<!--<div style="padding: 10px 0px; border-top: 1px solid #ccc; border-bottom: 1px solid #ccc;">
<div style="margin-right: 10px; magin-bottom: 10px; float: left; width: 250px; border-right: 1px solid #C5C5C5;">
	<center><img id="image-<?php echo $imagecount; ?>" class="fotoImg" src="<?php echo $feat_image; ?>" style="max-width: 100%;"/></center>
	</div>
	<div style="float: left; width: 380px;">
	<span style="width: 100%;"><?php the_title(); ?> <?php echo $plats_suffix; ?></span><br>
	<span style="font-weight: bold; font-size: 20px; width: 100%;"><?php echo $position; ?></span><br>
	<span style="font-weight: bold; color: #666; font-size: 14px; display: block;"><?php echo $plats_kommun ?></span><br>
	<?php if ($plats_enddate == "") {
		
	} else { ?>
	<span style="margin-bottom: 10px; display: block; font-size: 12px;">Ansök senast <?php echo $plats_enddate; ?></span>
	<?php } 
	?>
	<a href="#<?php echo $plats_ad; ?>" id="<?php echo $plats_ad; ?>_div"><span id="<?php echo $plats_ad; ?>_span" style="padding: 5px; background: #E8605E; color: #fff;">VISA ANNONS</span></a>
	</div>
	<div style="clear: both;"></div>
	<div id="<?php echo $plats_ad; ?>_sub" style="margin-top: 10px; padding: 20px; background: #E6E6E7; border: 1px solid #CDCDCE;">
	<center><img src="/platsannons_ads/<?php echo $plats_ad; ?>-preview.png" style="max-width: 100%; margin: 0px auto;"></center>
	<div style="width: 100%; padding: 10px 0px;">
	<a href="/platsannons_ads/pdf/<?php echo $plats_ad; ?>.pdf" class="filter_buttons antennacondmedium" style="">Visa som pdf</a>
	<?php if ($plats_url == "" || $plats_url == "http://") {
		
	} else { ?>
	<a href="<?php echo $plats_url; ?> " class="filter_buttons antennacondmedium" style="margin-left: 15px; float: right;">gå till arbetsgivaren</a>
	<?php } ?>
	</div>
	</div>
</div>-->

<div class="docImgContainer spacefifteenleft spaceTwentyBottom">
<div><div class="halfCircleBig"></div><span class="priceListTitle"><?php the_title(); ?></span></div>
<a href="/pdf/prislista/<?php echo $pdfName; ?>" target="_blank"><img src="<?php echo $feat_image; ?>" border="0" class="docImg lightgreyborder"></img></a>
</div>
		
<?php
$imagecount++;
	endwhile;			
				?>
				
</div>
</div>
<div style="clear: both;"></div>