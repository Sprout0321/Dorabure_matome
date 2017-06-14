<div class="pagination">
    <ul>
		<?php if ( get_previous_posts_link() ) : ?>
            <li class="next">
				<?php previous_posts_link( esc_html__( 'Newer Posts &rarr;', 'the-best-blog' ) ); ?>
            </li>
		<?php endif; ?>
		<?php if ( get_next_posts_link() ) : ?>
            <li class="previous">
				<?php next_posts_link( esc_html__( '&larr; Older Posts', 'the-best-blog' ) ); ?>
            </li>
		<?php endif; ?>
    </ul>
</div>