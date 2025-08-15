			<section class="screen-other" style="background-color:#f5f5f5;">
				<div class="advantages">
					<div class="ast-container" style="text-align:center;">
						<h2 style="font-size:32px;font-weight:bold;margin-bottom:30px;color:#333;">Вопросы - Ответы</h2>
						<div class="page-questanswers" style="max-width:990px;width:100%;display:inline-block;text-align:left;">
								<?php
								global $post;
								$post = get_post( 842 );
								setup_postdata( $post );
								if (have_rows('blocks')): while (have_rows('blocks')) : the_row(); ?>
								<div class="block">
									<div class="title">
										<h2><?php the_sub_field('question'); ?></h2>
									</div>
									<div class="desc">
										<p><?php the_sub_field('answer'); ?></p>
									</div>
								</div>
								<?php endwhile; endif; wp_reset_postdata(); ?>
						</div>
					</div>
				</div>
			</section>