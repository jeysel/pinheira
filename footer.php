	</div>

	<div id="footer" style="width;960px; background:yellow;">
	    <ul class="footercol fc-left widgets">
	    	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer A') ) : ?>
	    	    <li>This column is a widget area.<br /><span class="alert">Add widgets to <strong>Footer A</strong> for this one to rock!</span></li>
	    	<?php endif; ?>
	    </ul>
	    <ul class="footercol fc-left widgets">
	    	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer B') ) : ?>
	    		<li>This column is a widget area.<br /><span class="alert">Add widgets to <strong>Footer B</strong> for this one to rock!</span></li>
	    	<?php endif; ?>
	    </ul>
	    <ul class="footercol fc-left widgets">
	    	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer C') ) : ?>
	    		<li>This column is a widget area.<br /><span class="alert">Add widgets to <strong>Footer C</strong> for this one to rock!</span></li>
	    	<?php endif; ?>
	    </ul>
	    <ul class="footercol fc-right widgets">
	    	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer D') ) : ?>
	    		<li>This column is a widget area.<br /><span class="alert">Add widgets to <strong>Footer D</strong> for this one to rock!</span></li>
	    	<?php endif; ?>
	    </ul>
	</div>
	
	<div id="copy">
	    <div class="copycolumnwide">
	    	<p>Copyright &copy; <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a><br /><em><?php bloginfo('description'); ?></em></p>
	    </div>
	    <div class="copycolumn">
	    	<p class="right"><?php _e("Built on", "notesblog");?> <a href="http://notesblog.com" title="Notes Blog">Notes Blog</a> <em><a href="http://notesblog.com/core/" title="Notes Blog Core">Core</a></em><br />Powered by <a href="http://wordpress.org" title="WordPress">WordPress</a></p>
	    </div>
	</div>
	
	<div id="finalword"><span>&uarr;</span> <a href="#top" title="To page top"><?php _e("That's it - back to the top of page!", "notesblog");?></a> <span>&uarr;</span></div>

</div>
</div>

<?php wp_footer(); ?>
</body>
</html>