<?php
/**
 * Extend the WP_Widget class for recent_post with Thumbnail.
 * Learn more about Widgets_API : https://codex.wordpress.org/Widgets_API
 *
 * @package Xcode
 * @since 1.0
 */
class Xcode_Recent_Posts_Widget extends WP_Widget {

	/**
	 * Set up the Widget Handle, Name and Args
	 */
	public function __construct() {
		$widget_meta = array(
		'classname' => 'xcode-recent-post-widget',
		'description' => __( 'Site&#8217;s Most Recent Posts.', 'xcode' ),
		);
		parent::__construct( 'xcode-recent-posts-widget', __( 'Thumbnails Posts', 'xcode' ), $widget_meta );
		$this->alt_option_name = 'xcode-recent-post-widget';

		add_action( 'save_post', 		array( $this, 'widgetCacheFlush' ) );
		add_action( 'deleted_post', array( $this, 'widgetCacheFlush' ) );
		add_action( 'switch_theme', array( $this, 'widgetCacheFlush' ) );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param [array] $args [arg].
	 * @param [array] $instance [ins].
	 */
	public function widget( $args, $instance ) {

		$cache = array();
		if ( ! $this->is_preview() ) {
			$cache = wp_cache_get( 'xcode-recent-posts-widget', 'widget' );
		}

		if ( ! is_array( $cache ) ) {
			$cache = array();
		}

		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

		ob_start();

		$widget_title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts', 'xcode' );

		$widget_title = apply_filters( 'widget_title', $widget_title, $instance, $this->id_base );

		$posts_number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;

		$post_date 		= isset( $instance['show_date'] ) ? $instance['show_date'] : false;

		/**
		 * Get recent posts for widget
		 *
		 * @var WP_Query
		 */
		$recent = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => $posts_number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true,
		) ) );

		if ( $recent->have_posts() ) :
		?>
		<?php echo $args['before_widget']; ?>
		<?php if ( $widget_title ) {
			echo $args['before_title'] . $widget_title . $args['after_title'];
} ?>
		<ul class="sw-postthumb">
		<?php while ( $recent->have_posts() ) : $recent->the_post(); ?>
			<li>
				<a href="<?php the_permalink(); ?>">
                	<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'xcode-widget-thumb' ); } ?>
                    <div class="sw-image">
    				<p><?php get_the_title() ? the_title() : the_ID(); ?></p>
                    <?php if ( $post_date ) : ?>
        				<span class="post-date"><i class="fa fa-calendar"></i><?php echo get_the_date(); ?></span>
        			<?php endif; ?>
                    </div>
				</a>
			</li>
		<?php endwhile; ?>
		</ul>
		<?php echo $args['after_widget']; ?>
		<?php
		// Reset the global $the_post as this query will have stomped on it.
		wp_reset_postdata();

		endif;

		if ( ! $this->is_preview() ) {
			$cache[ $args['widget_id'] ] = ob_get_flush();
			wp_cache_set( 'xcode_recent_posts', $cache, 'widget' );
		} else {
			ob_end_flush();
		}
	}

	/**
	 * Processing widget options on save
	 *
	 * @param [array] $new_instance [The new options].
	 * @param [array] $old_instance [The previous options].
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title']     = sanitize_text_field( $new_instance['title'] );
		$instance['number']    = absint( $new_instance['number'] );
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		$this->widgetCacheFlush();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset( $alloptions['xcode-recent-post-widget'] ) ) {
			delete_option( 'xcode-recent-post-widget' ); }

		return $instance;
	}

	/**
	 * Public function for recent Posts
	 */
	public function widgetCacheFlush() {
		wp_cache_delete( 'xcode_recent_posts', 'widget' );
	}

	/**
	 * [Outputs the options form on admin]
	 *
	 * @param [array] $instance [The widget options].
	 */
	public function form( $instance ) {

		$widget_title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : __( 'Recent Posts', 'xcode' );
		$posts_number = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$post_date 	 	= isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
	?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'xcode' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $widget_title ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of posts to show:', 'xcode' ); ?></label>
			<input id="<?php echo  esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr(  $this->get_field_name( 'number' ) ); ?>" type="number" value="<?php echo esc_attr( $posts_number ); ?>" size="2s" />
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked( $post_date ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_date' ) ); ?>" />
			<label for="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>"><?php esc_html_e( 'Display post date?', 'xcode' ); ?></label>
		</p>
	<?php
	}
}

?>
