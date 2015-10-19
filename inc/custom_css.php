<?php  
	global $wpmaterialdesign_theme_settings;
	$d = $wpmaterialdesign_theme_settings; 

	if(@$d['left-sidebar-percentage'] == null){
		@$d['left-sidebar-percentage'] = 25;
	}
	if(@$d['horizontal_margins']==NULL){
		@$d['horizontal_margins'] = 40;
	}
?>
<style type="text/css">


/*----------------------  Header --------------------------*/
#masthead .site-header-nav {
	<?php 
		if( @$d['header_nav_top'] != 0	){ ?>
			margin-top: -<?php echo $d['header_nav_top'];?>px; <?php
	 	}
		if( @$d['header_nav_bottom'] != 0	){ ?>
			margin-bottom: <?php echo $d['header_nav_bottom'];?>px; <?php
	 	}
		if( @$d['header_nav_transparent'] != 0	){ ?>
			background: transparent; <?php
		}
		if( @$d['header_nav_slice_by_left_sidebar'] != 0	){ ?>
			padding-left:<?php echo @$d['left-sidebar-percentage']; ?>%; <?php
		}
		if( @$d['header_nav_align'] != NULL	){ ?>
			text-align: <?php echo $d['header_nav_align'];?>; <?php
		}
	?>
}
.site-branding {
	<?php 
		if( @$d['header_nav_slice_by_left_sidebar'] != 0){ 
			?>width:<?php echo @$d['left-sidebar-percentage']; ?>%; <?php
		}		
		if( @$d['header_nav_slice_by_left_sidebar'] != 0){ 
			?>width:<?php echo @$d['left-sidebar-percentage']; ?>%; <?php
		}

		if(	@$d['header_branding_align'] != 0	){
			?>text-align: center; <?php				
		}		
	?>
}
.site-branding .site-title{
	<?php 
		if(	@$d['header_branding_letter_spacing'] != 0	){
				echo 'letter-spacing: '.($d['header_branding_letter_spacing']*2).'px;';
		}
	?>
}
.site-branding .site-description{
	<?php 
		if(	@$d['header_branding_letter_spacing'] != 0	){
				echo 'letter-spacing: '.$d['header_branding_letter_spacing'].'px;';
		}
	?>
}

/*---------------------- Global margins ----------------------*/
<?php 
$output = 'padding-left: '.$d['horizontal_margins'].'px;';
$output .= 'padding-right: '.$d['horizontal_margins'].'px;';
?> 
.widget .widget-title, .widget ul, .page-header .page-title, .page-header .taxonomy-description, .site-branding, .tagcloud
	{
	<?php
		if(	@$d['horizontal_margins'] != 0	){
			echo $output;	
		}
	?>
}
article, .tpl-table-row , footer .site-info{
	<?php
		if(	@$d['horizontal_margins'] != 0	){
				echo 'padding-left: '.($d['horizontal_margins']-15).'px;';
				echo 'padding-right: '.($d['horizontal_margins']-15).'px;';
		}
	?>
}
.widget .table tr td:last-child, .widget .table tr th:last-child{
	
	<?php
	if(	@$d['sidebar_left_align'] != 0	){
		echo 'padding-right:15%;';
	}else{
		
	} 
	if(	@$d['horizontal_margins'] != 0	){
		echo 'padding-right:'.$d['horizontal_margins'].'px;';
	} 
	?>
}
.widget .table tr td:first-child, .widget .table tr th:first-child, .widget .table caption{
	<?php
	if(	@$d['sidebar_left_align'] != 0	){
		echo 'padding-left:15%;';
	}else{
		
	} 

	if(	@$d['horizontal_margins'] != 0	){
		echo 'padding-left:'.$d['horizontal_margins'].'px;';
	} 
	?>
}
.widget .current-cat{<?php
		if(	@$d['horizontal_margins'] != 0	){
				echo 'margin-left:-'.($d['horizontal_margins']-4).'px;';
				echo 'margin-right:-'.($d['horizontal_margins']-4).'px;';
				echo 'padding-left:'.($d['horizontal_margins']-4).'px;';
				echo 'padding-right:'.($d['horizontal_margins']-4).'px;';
		}
	?>}
/* menu internal margins */
.nav>li>a{
	padding-top: 10px;
	padding-bottom: 10px;
	<?php
		if(	@$d['horizontal_margins'] != 0	){
				echo $output;
		}
	?>
}
/* heder text position */
.in-header-left{
	padding-top: 10px;
	<?php
		if(	@$d['horizontal_margins'] != 0	){
				echo $output;
		}
	?>
}

#sidebar-left{
	z-index: 1000;
	width:<?php echo @$d['left-sidebar-percentage']; ?>%;
	<?php
		if(	@$d['sidebar_left_align'] != 0	){
			echo 'text-align: center;';
				
		}
	?>
}
#primary{
	width: <?php echo @(100-$d['left-sidebar-percentage']); ?>%;	
}

/* LEFT SIDEBAR ANIMATIONS */ 
/* move left */
#sidebar-left.sidebar-close{
	margin-left:-<?php echo @$d['left-sidebar-percentage']; ?>% !important;
	cursor:pointer;
	opacity:0;
}
</style>