<?php
/**
 * Header Template
 *
 * This file is loaded by header.php and used for content inside the #header div
 *
 * @package K2
 * @subpackage Templates
 */
?>

  <!-- Use this as header -->
	<header id="ngalemainhead">
		<a href="http://getnightingale.com" title="Home"><img src="http://static.getnightingale.com/img/Nightingale_text.png" id="headlogo" alt="Nightingale. the tune of Life, the tune of yours."></a>
		<nav>
		<ul class="menu">
			<li><a href="http://getnightingale.com" title="Home">Home</a></li>
			<li><a href="http://forum.getnightingale.com" title="Nightingale Forum">Forum</a></li>
			<li><a href="http://addons.getnightingale.com" title="Addons for Nightingale">Addons</a></li>
			<li class="actual"><a href="http://blog.getnightingale.com" title="Development Blog">Blog</a></li>
			<li><a href="http://wiki.getnightingale.com" title="Documentation and Wiki">Wiki</a></li>
		</ul>
		</nav>
	</header>
	<!-- end of header -->
  
<nav id="access" role="navigation">
	<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'k2' ); ?>"><?php _e( 'Skip to content', 'k2' ); ?></a></div>
<?php
	wp_nav_menu( array(
		'theme_location' => 'header',
		'container_class' => 'headermenu',
		'container_id' => 'k2_headermenu',
	) );
?>
</nav>
