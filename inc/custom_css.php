<?php  
	global $wpmaterialdesign_theme_settings;
	$d = $wpmaterialdesign_theme_settings; 

	if(@$d['left-sidebar-percentage'] == null){
		@$d['left-sidebar-percentage'] = 25;
	}
	if(@$d['horizontal_margins']==NULL){
		@$d['horizontal_margins'] = 40;
	}
	if(@$d['color_scheme']==NULL){
		$d['color_scheme'] = 'color_schema_gray_blue';
	}
	if(@$d['header_nav_align']==NULL){
		$d['header_nav_align'] = 'center';
	}
	if(@$d['header_branding_align']==NULL){
		$d['header_branding_align'] = '1';
	}

	$colors = array(
		'color_schema_indigo'=> array(
			'50' => '#E8EAF6',
			'100' => '#C5CAE9',
			'300' => '#7986CB',
			'500' => '#3F51B5',
			'700' => '#303F9F',
			'900' => '#1A237E'			
		),
		'color_schema_pink'=> array(
			'50' => '#FCE4EC',
			'100' => '#F8BBD0',
			'300' => '#F06292',
			'500' => '#E91E63',
			'700' => '#C2185B',
			'900' => '#880E4F'			
		),
		'color_schema_gray_blue'=> array(
			'50' => '#ECEFF1',
			'100' => '#CFD8DC',
			'300' => '#90A4AE',
			'500' => '#607D8B',
			'700' => '#455A64',
			'900' => '#263238'			
		),
		'color_schema_teal'=> array(
			'50' => '#E0F2F1',
			'100' => '#B2DFDB',
			'300' => '#4DB6AC',
			'500' => '#009688',
			'700' => '#00796B',
			'900' => '#004D40'			
		),
		'color_schema_deep_purple'=> array(
			'50' => '#EDE7F6',
			'100' => '#D1C4E9',
			'300' => '#9575CD',
			'500' => '#673AB7',
			'700' => '#512DA8',
			'900' => '#311B92'			
		),
		'color_schema_brown'=> array(
			'50' => '#EFEBE9',
			'100' => '#D7CCC8',
			'300' => '#A1887F',
			'500' => '#795548',
			'700' => '#5D4037',
			'900' => '#3E2723'			
		)
	);
?>
<style type="text/css">

/*----------------------  Colors --------------------------*/
a{
	color:<?php echo $colors[$d['color_scheme']]['700'];?>;
}
a:hover, .page-numbers{
	color:<?php echo $colors[$d['color_scheme']]['900'];?>;
}
#masthead .site-title a, .site-footer a, #left-sidebar-menu-button{
	color:<?php echo $colors[$d['color_scheme']]['50'];?>;
}
#masthead .site-description{
	color:<?php echo $colors[$d['color_scheme']]['100'];?>;
}
#masthead .site-header-main{
	background-color: <?php echo $colors[$d['color_scheme']]['300'];?>;   
}
#masthead .site-header-nav{
	background-color: <?php echo $colors[$d['color_scheme']]['500'];?>;   
}
.site-footer{
	background-color: <?php echo $colors[$d['color_scheme']]['500'];?>;
	color:#fff;
}
.widget .table tr td a{
	background-color: <?php echo $colors[$d['color_scheme']]['50'];?>;
}
.widget .current-cat{
	background-color: <?php echo $colors[$d['color_scheme']]['50'];?>;
	outline: <?php echo $colors[$d['color_scheme']]['50'];?> solid 4px;
}

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
.widget .widget-title, .widget ul, .page-header .page-title, .page-header .taxonomy-description, .site-branding, .tagcloud,  .widget_search
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
	
/* post-wraper margins */
<?php if( ( @$d['template-part-box-margins'] != 0 ) && ( @$d['template-part-box-margins'] != NULL ) ){ 
	
	$x = $d['template-part-box-margins'];
	?>
	.post-wraper{
		margin-top: <?php echo ($x); ?>%;
	}

	.tpl-content{
		margin-left: <?php echo ($x*2); ?>%; 
		margin-right: <?php echo ($x*2); ?>%; 
	}

	.tpl-promo1 .image-side{
		width: <?php echo (66.666666)-($x*3); ?>%;
		margin-left: <?php echo ($x*2); ?>%; 
		margin-right: <?php echo ($x); ?>%;
	}	

	.tpl-promo1 .content-side{
		width: <?php echo (33.333333)-($x*2); ?>%;
		margin-right: <?php echo ($x*2); ?>%; 
	}	

	.tpl-three{
		width: <?php echo (33.333333) - (($x*2)/3)*3; ?>%;
		margin-right: <?php echo ($x); ?>%; 
	}
	.tpl-three.first-tpl-child {
		margin-left: <?php echo ($x*2); ?>%; 
	}	
	
<?php } ?>




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
	margin-left:-<?php echo @$d['left-sidebar-percentage']; ?>%;
	cursor:pointer;
	opacity:0;
}


</style>