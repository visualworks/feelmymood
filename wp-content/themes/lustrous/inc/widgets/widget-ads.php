<?php
##ADS 200*125 ------------------------------------------ #
add_action( 'widgets_init', 'ads200_widget_box' );
function ads200_widget_box() {
	register_widget( 'ads200_widget' );
}
class ads200_widget extends WP_Widget {
	function ads200_widget() {
		$widget_ops = array( 'classname' => 'ads200-widget', 'description' => ''  );
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'ads200-widget' );
		$this->WP_Widget( 'ads200-widget',theme_name .' - Ads 200*125', $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters('widget_title', $instance['title'] ); 
        $tran_bg = $instance['tran_bg'];    
		
		echo $before_widget;
		if( !$tran_bg ){
			
			echo $before_title;
			echo $title ; 
			echo $after_title;
		}?>
		<div class="ads200">
		<?php for($i=1 ; $i<5 ; $i++ ){ ?>
			<?php if(isset( $instance[ 'ads'.$i.'_code' ] )){ ?>
			    <div class="ad-cell mbottom">
				   <?php echo $instance[ 'ads'.$i.'_code' ]; ?>
			    </div>
		    <?php }} ?>
		<div class="clr"></div>
		</div>
	<?php 		
			echo $after_widget;
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['tran_bg'] = strip_tags( $new_instance['tran_bg'] );

		for($i=1 ; $i<5 ; $i++ ){ 
			$instance['ads'.$i.'_code'] =  $new_instance['ads'.$i.'_code'] ;
		}
		return $instance;
	}
		
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => 'Our Sponsors', 'tran_bg' => true, 'ads1_code' => '', 'ads2_code' => '', 'ads3_code' => '', 'ads4_code' => '' ) ); 
				
		$title = format_to_edit( $instance['title'] );
		$tran_bg = format_to_edit( $instance['tran_bg'] );
		$ads1_code = format_to_edit( $instance['ads1_code'] ); 
		$ads1_code = format_to_edit( $instance['ads2_code'] ); 
		$ads1_code = format_to_edit( $instance['ads3_code'] ); 
		$ads1_code = format_to_edit( $instance['ads4_code'] ); ; ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title : </label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'tran_bg' ); ?>">Hide Title :</label>
			<input id="<?php echo $this->get_field_id( 'tran_bg' ); ?>" name="<?php echo $this->get_field_name( 'tran_bg' ); ?>" value="true" <?php if( $instance['tran_bg'] ) echo 'checked="checked"'; ?> type="checkbox" />
			<br /><small>if this active the title will disappear</small>
		</p>
		<?php 
		for($i=1 ; $i<5 ; $i++ ){ ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'ads'.$i.'_code' ); ?>">Ad <?php echo $i; ?> Code </label>
			<textarea id="<?php echo $this->get_field_id( 'ads'.$i.'_code' ); ?>" name="<?php echo $this->get_field_name( 'ads'.$i.'_code' ); ?>" class="widefat" ><?php echo $instance['ads'.$i.'_code']; ?></textarea>
		</p>
		<?php } ?>
	<?php
	}
}
?>