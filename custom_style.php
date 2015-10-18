<?php  $d = $wpmice_theme_settings; ?>
<style type="text/css">
/*----------------------  Header --------------------------*/
.site-header-nav {
	<?php if( @$d['header_nav_top'] != 0	){ ?>
			margin-top:- <?php echo $d['header_nav_top'];?>px; 
	<?php }
		if( @$d['header_nav_bottom'] != 0	){ ?>
			margin-bottom: <?php echo $d['header_nav_bottom'];?>px; 
	<?php }
		if( @$d['header_nav_transparent'] != 0	){ ?>
			background: transparent; <?php
		}
	?>
}


/*---------------------- Global margins ----------------------*/
.widget .widget-title{
	<?php
		if(	@$d['horizontal_margins'] != 0	){
				echo 'padding-left: '.$d['horizontal_margins'].'px;';
				echo 'padding-right: '.$d['horizontal_margins'].'px;';
		}
	?>
}
.widget ul{
	<?php
		if(	@$d['horizontal_margins'] != 0	){
				echo 'padding-left: '.$d['horizontal_margins'].'px;';
				echo 'padding-right: '.$d['horizontal_margins'].'px;';
		}
	?>
}
/* menu internal margins */
.nav>li>a{
	padding-top: 10px;
	padding-bottom: 10px;
	<?php
		if(	@$d['horizontal_margins'] != 0	){
				echo 'padding-left: '.$d['horizontal_margins'].'px;';
				echo 'padding-right: '.$d['horizontal_margins'].'px;';
		}
	?>
}
/* heder text position */
.in-header-left{
	width:25%;
	padding-top: 10px;
	<?php
		if(	@$d['horizontal_margins'] != 0	){
				echo 'padding-left: '.$d['horizontal_margins'].'px;';
				echo 'padding-right: '.$d['horizontal_margins'].'px;';
		}
	?>
}
.tpl-table-row{
	<?php
		if(	$d['horizontal_margins'] != 0	){
				echo 'padding-left: '.($d['horizontal_margins']-15).'px;';
				echo 'padding-right: '.($d['horizontal_margins']-15).'px;';
		}
	?>
</style>