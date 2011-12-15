<?php
/**
 * Footer Template.
 *
 * This file is loaded by footer.php and used for content inside the #footer div.
 *
 * @package WordPress
 * @subpackage K2
 * @since K2 unknown
 */
?>

<?php
	wp_register('<div class="siteadmin">','</div>'); // Admin & Register Button
?>


<p class="footerpoweredby">
	<?php
		/* translators: 1: WordPress, 2: K2 */
		printf( __('Powered by %1$s and %2$s', 'k2'),
			'<a href="http://wordpress.org/">WordPress</a>',
			'<a href="http://getk2.com/" title="' . __('Loves you like a kitten.', 'k2') . '">K2</a>'
		);
	?>
</p>

<?php if ( get_k2info('style_footer') != '' ): ?>
	<p class="footerstyledwith">
		<?php k2info('style_footer'); ?>
	</p>
<?php endif; ?>

<p class="footerfeedlinks">
	<?php
		/* translators: 1: entries feed, 2: comments feed */
		printf( __('%1$s and %2$s', 'k2'),
			'<a href="' . get_bloginfo('rss2_url') . '">' . __('Entries Feed', 'k2') . '</a>',
			'<a href="' . get_bloginfo('comments_rss2_url') . '">' . __('Comments Feed', 'k2') . '</a>'
		);
	?>
</p>

<p class="footerstats">
	<?php printf( __('%d queries. %s seconds.', 'k2'), get_num_queries(), timer_stop(0, 3) ); ?>
</p>
    
<div id="blogfooter">
	  <div id="lgradient"></div>
		<ul id="footerwrapper" class="clearfix">
			<li><img src="//static.getnightingale.com/img/footergale.png" alt="Nightingale logo" id="outlinedngale">
			  <div id="license">
			  <b>License</b>
			  Site content licensed under the GNU GPL. More info on the <a href="//wiki.getnightingale.com" title="license">licenses page</a>.
			  </div></li>
			<li><nav>
			<ul id="double" class="clearfix">
			  <li><b>Content</b>
			  <ul id="links">
				<li><a href="//blog.getnightingale.com" title="Development Blog">Blog</a></li>
				<li><a href="//forum.getnightingale.com" title="Nightingale Forum">Forum</a></li>
				<li><a href="//addons.getnightingale.com" title="Addons for Nightingale">Addons</a></li>
				<li><a href="all-versions.php" title="Download Nightingale">Download</a></li>
			  </ul></li>
			  <li><b>Developer</b>
			  <ul>
				<li><a href="//wiki.getnightingale.com" title="Documentation and Wiki">Wiki</a></li>
				<li><a href="//locales.getnightingale.com" title="Translate Nightingale">Translate</a></li>
				<li><a href="https://github.com/nightingale-media-player" title="GitHub">Source Code</a></li>
				<li><a href="//bugs.getnightingale.com" title="Bugzilla">Bugs</a></li>
			  </ul></li>
			</ul>
		  </nav></li>
			<li id="buttons">
			<nav>
			  <b>Social</b>
			  <ul>
				<li><a href="//twitter.com/getnightingale" title="Nightingale on twitter">Follow @getnightingale on Twitter</a></li>
				<li><a href="//www.facebook.com/pages/Nightingale/210174055669535" title="Nightingale on facebook">Like Nightingale on Facebook</a></li>
			  </ul>
			</nav>
			</li>
		</ul>
</div>    
