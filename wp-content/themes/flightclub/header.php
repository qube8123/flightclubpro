<!doctype html>
<html lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php the_title(); ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initia
    -scale=1">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.png" type="image/gif" sizes="16x16">
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>apple-touch-icon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/slick.css"/>
      <link href="<?php echo get_template_directory_uri(); ?>/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css"> <!-- main -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/responsive.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- main -->
  <?php wp_head(); ?>
</head>
<body> 

<!-- Header Starts --> 
<div id="header">
<header class="posfixed">
	<div class="wrap">
		<div class="nav">
		   <a href="<?php echo home_url(); ?>" class="nav__logo">
		   	<?php $custom_logo_id = get_theme_mod( 'custom_logo' );
$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
?>
			   <img src="<?php echo $image[0];  ?>" alt="">
		   </a>
		   <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#basicExampleNav"
			    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
			     <i class="fa fa-bars"></i>
			  </button>
			    
		    
		   <div class="nav_items">
			   <div class="nav_items--profiles">
			   		<?php get_sidebar('sidebar-1'); ?>
				  
			   </div>

			   <?php 
						wp_nav_menu( array(
					'theme_location' => 'primary',
					 'items_wrap' => '<ul >%3$s</ul>', 
					 'container_class'           => 'nav_items--menu collapse ',
					 'container_id'           => 'basicExampleNav',					 
					'walker' => new Wpse8170_Menu_Walker()
				) ); 
			class Wpse8170_Menu_Walker extends Walker_Nav_Menu {

		

			    function start_lvl( &$output, $depth = 0, $args = array() )
			    {
			        $indent = str_repeat("\t", $depth);
			        $output .= "\n$indent<ul class=\"sub-menu\">\n";
			        $output .= "\n<div class=\"dropdown-menu\" aria-labelledby=\"dropdownMenuLink\">\n";
			    }
			  function end_lvl( &$output, $depth = 0, $args = array() )
			    {
			        $indent = str_repeat("\t", $depth);
			        $output .= "$indent</ul>\n".($depth ? "$indent</div>\n" : "");
			    }


			    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

			        $class_names = $value = '';
			        $childclass=$item->classes;
			       
			        if($childclass[4] == 'menu-item-has-children'){
			        	$dropdown= '<span class="ic-drop-arrow"></span>';
			        	
			        }
			      
			        //$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			       // $classes[] = 'menu-item-' . $item->ID;

			        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

			       // $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

			        if($item->menu_item_parent == 0){
			        	
			        	if($childclass[4] == 'menu-item-has-children'){
				        	$classesdiv ='class="dropdown"';
				        	$output .= $indent . '<li' . $id . $value .'> <div '.$classesdiv.'>';
			        	}else{
			        		$classesdiv ='class="dropdown"';
		        		 	$output .= $indent . '<li' . $id . $value .'><div '.$classesdiv.'>';
		        		}
		        	}else{
		        		
		        		 $output .= $indent . '';
		        	}

			       

			        // add span with number here
			       /* if ( $depth == 0 ) { // remove if statement if depth check is not required
			            $output .= sprintf( '<span>%02s.</span>', $this->number++ );
			        }*/

			        $atts = array();
			        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
			        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
			        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
			        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

			        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

			         if($childclass[4] == 'menu-item-has-children'){
			        	$dropdown= '<span class="ic-drop-arrow"></span>';
			        	$classes[] ='dropdown';
			        	$attributes = ' class="menu__item dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"';

			        }else{
			        	if($item->menu_item_parent == 0){

	        				if($childclass[4] == 'current-menu-ancestor'){
		        				$dropdown= '<span class="ic-drop-arrow"></span>';
				        		$attributes = ' class="menu__item  dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ';
				        		}else{
				        			$attributes = ' class="menu__item  "  ';
				        		}
			        	}else{
			        		if ($childclass[4] == 'current-menu-ancestor') {
			        			$dropdown= '<span class="ic-drop-arrow"></span>';
				        		$attributes = ' class="menu__item  dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ';
			        		}else{
			        			$attributes = ' class="dropdown-item" ';
			        		}			        		
			        	}
			        }		
			        

			        foreach ( $atts as $attr => $value ) {
			            if ( ! empty( $value ) ) {
			                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
			                $attributes .= ' ' . $attr . '="' . $value . '"';
			            }
			        }

			        $item_output = $args->before;
			        $item_output .= '<a'. $attributes .'>';
			        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			        $item_output .= $dropdown.'</a>';
			        $item_output .= $args->after;

			        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
			    }

			}
				?>
				 
		   </div>
	   </div>
	</div>
</header>
</div>