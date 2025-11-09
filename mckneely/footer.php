<?php global $qode_options_passage; ?>
		</div>
	</div>
		<footer>
            <div class="arrow_container"><span class="home_arrow">&nbsp;</span></div>
			<div class="footer_holder clearfix">
						<?php
						$display_footer_widget = false;
						if ($qode_options_passage['footer_widget_area'] == "yes") $display_footer_widget = true;
						if($display_footer_widget): ?>
						<div class="footer_top_holder">
					    <!-- add Contact bar -->
                        <div class="footer_top_bar">
                        	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('interior-bottom-panel') ) : ?><?php endif; ?>
                       	</div>
                            <div class="footer_top">
									<?php
										$header_in_grid = false;
										if ($qode_options_passage['header_in_grid'] == "yes") $header_in_grid = true;
									?>
									<?php if($header_in_grid){ ?>
										<div class="container">
											<div class="container_inner clearfix">
									<?php } ?>
									<div class="footer_top_inner">
                                       <h3>Contact Michael McKneely, Criminal Defense Lawyer</h3>
										<div class="two_columns_50_50 clearfix">
											<div class="column1">
												<div class="column_inner">
													<?php dynamic_sidebar( 'footer_column_1' ); ?>
												</div>
											</div>
											<div class="column2">
												<div class="column_inner">
													<?php dynamic_sidebar( 'footer_column_2' ); ?>
												</div>
											</div>
										</div>
									</div>
									<?php if($header_in_grid){ ?>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
						<?php endif; ?>
						<?php
						$display_footer_text = false;
						if (isset($qode_options_passage['footer_text'])) {
							if ($qode_options_passage['footer_text'] == "yes") $display_footer_text = true;
						}
						if($display_footer_text): ?>
						<div class="footer_bottom_holder">
							<div class="footer_bottom container_inner">
								<?php dynamic_sidebar( 'footer_text' ); ?>
							</div>
						</div>
						<?php endif; ?>
			</div>
		</footer>
</div>
<?php
global $qode_toolbar;
if(isset($qode_toolbar)) include("toolbar.php")
?>
	<?php wp_footer(); ?>
</body>
</html>
