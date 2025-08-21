<?php /* Template Name: Шаблон страницы "Рацион" */ ?>

<?php get_header('main'); ?>

<main>

<section class="razion-start-block">
	<div class="razion-start-block__wrapper max-block-width wrapper-paddings">
		<?php if ( $t = trim( (string) get_field('razion_first_block_title') ) ) : ?>
			<h1 class="razion-start-block__title razion-title"><?php echo esc_html( $t ); ?></h1>
		<?php endif; ?>
		<?php if ( $st = trim( (string) get_field('razion_first_block_subtitle') ) ) : ?>
			<h2 class="razion-start-block__subtitle"><?php echo esc_html( $st ); ?></h2>
		<?php endif; ?>

		<?php
		$ask_title      = trim( (string) get_field('ask_block_title') );
		$ask_link_text  = trim( (string) get_field('ask_block_link_text') );
		$ask_link_url   = trim( (string) get_field('ask_block_link_url') );
		$ask_link_blank = (bool) get_field('ask_block_link_blank');
		$ask_href       = $ask_link_url !== '' ? esc_url( $ask_link_url ) : '#';
		$ask_target_rel = $ask_link_blank ? ' target="_blank" rel="noopener"' : '';

		$person_img = get_field('start_person_image');
		$person_name = trim( (string) get_field('start_person_name') );
		$person_exp  = trim( (string) get_field('start_person_experience') );
		?>

		<div class="razion-start-block__content">
			<div class="razion-start-block__left">
				<?php if ( have_rows('start_lists') ) : ?>
					<div class="razion-start-block__lists">
						<?php while ( have_rows('start_lists') ) : the_row();
							$ltitle = trim( (string) get_sub_field('list_title') );
							$items_html = '';
							if ( have_rows('list_items') ) {
								ob_start();
								while ( have_rows('list_items') ) : the_row();
									$itxt = trim( (string) get_sub_field('item_text') );
									if ( $itxt !== '' ) {
										echo '<li class="razion-start-block__list-item_list-item">'.esc_html( $itxt ).'</li>';
									}
								endwhile;
								$li = ob_get_clean();
								if ( $li !== '' ) {
									$items_html = '<ul class="razion-start-block__list-item_list">'.$li.'</ul>';
								}
							}
							if ( $ltitle === '' && $items_html === '' ) continue; ?>
							<div class="razion-start-block__list-item">
								<?php if ( $ltitle !== '' ) : ?><h3 class="razion-start-block__list-item_title"><?php echo esc_html( $ltitle ); ?></h3><?php endif; ?>
								<?php echo $items_html; ?>
							</div>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>

				<?php if ( $ask_title !== '' || $ask_link_text !== '' ) : ?>
					<div class="razion-start-block__ask ask-block ask-desktop">
						<?php if ( $ask_title !== '' ) : ?><h4 class="ask-block__title"><?php echo esc_html( $ask_title ); ?></h4><?php endif; ?>
						<?php if ( $ask_link_text !== '' ) : ?><a href="<?php echo $ask_href; ?>"<?php echo $ask_target_rel; ?>><?php echo esc_html( $ask_link_text ); ?></a><?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
			<div class="razion-start-block__right">
				<div class="razion-start-block__right_bg-container"></div>
				<?php if ( !empty($person_img) && !empty($person_img['url']) ) : ?>
					<img src="<?php echo esc_url( $person_img['url'] ); ?>" alt="<?php echo esc_attr( $person_name ?: 'person' ); ?>">
				<?php endif; ?>
				<?php if ( $person_name !== '' || $person_exp !== '' ) : ?>
					<div class="razion-start-block__right_info">
						<?php if ( $person_name !== '' ) : ?><h4 class="razion-start-block__right_info-title"><?php echo esc_html( $person_name ); ?></h4><?php endif; ?>
						<?php if ( $person_exp !== '' ) : ?><div class="razion-start-block__right_info-experience"><?php echo esc_html( $person_exp ); ?></div><?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<?php if ( $ask_title !== '' || $ask_link_text !== '' ) : ?>
			<div class="razion-start-block__ask-mobile ask-block ask-mobile">
				<?php if ( $ask_title !== '' ) : ?><h4 class="ask-block__title"><?php echo esc_html( $ask_title ); ?></h4><?php endif; ?>
				<?php if ( $ask_link_text !== '' ) : ?><a href="<?php echo $ask_href; ?>"<?php echo $ask_target_rel; ?>><?php echo esc_html( $ask_link_text ); ?></a><?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
</section>

<section class="razion-body-system">
	<div class="razion-body-system__wrapper max-block-width wrapper-paddings">
		<?php if ( $bst = trim( (string) get_field('body_system_title') ) ) : ?>
			<h2 class="razion-body-system__title razion-title"><?php echo esc_html( $bst ); ?></h2>
		<?php endif; ?>
		<div class="razion-body-system__content">
			<div class="razion-body-system__left">
				<div class="razion-body-system__left-wrapper">
					<div class="razion-body-system__left-content">
						<div class="razion-body-system__left-arrow-wrapper"><div class="razion-body-system__left-arrow"></div></div>
						<div class="razion-body-system__left-top">
							<?php if ( $btt = trim( (string) get_field('body_system_top_title') ) ) : ?><h3 class="razion-body-system__left-top_title"><?php echo esc_html( $btt ); ?></h3><?php endif; ?>
							<?php if ( $bts = get_field('body_system_top_subtitle') ) : ?><div class="razion-body-system__left-top_subtitle"><?php echo wp_kses_post( $bts ); ?></div><?php endif; ?>
						</div>
						<div class="razion-body-system__left-bottom">
							<?php if ( $bbs = get_field('body_system_bottom_subtitle') ) : ?><div class="razion-body-system__left-bottom_subtitle"><?php echo wp_kses_post( $bbs ); ?></div><?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="razion-body-system__right">
				<?php $bimg = get_field('body_system_right_image'); if ( !empty($bimg) && !empty($bimg['url']) ) : ?>
					<img src="<?php echo esc_url( $bimg['url'] ); ?>" alt="<?php echo esc_attr( $bst ?: 'image' ); ?>" class="razion-body-system__right-image">
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<section class="razion-cases-slider">
    <div class="razion-cases-slider__wrapper max-block-width wrapper-paddings">
        <?php if ( have_rows('cases_slider') ) : ?>
            <?php
            $slides_html = '';
            while ( have_rows('cases_slider') ) : the_row();
                $sc = get_sub_field('case_slide_html'); // WYSIWYG
                if ( ! $sc ) continue;
                // Пропускаем полностью пустой (без текста и без картинок)
                $plain = trim( wp_strip_all_tags( $sc ) );
                if ( $plain === '' && strpos( $sc, '<img' ) === false ) continue;

                $slides_html .= '<div class="swiper-slide js-cases-swiper__slide case-slide"><div class="case-slide__content">'
                    . wp_kses_post( $sc )
                    . '</div></div>';
            endwhile;
            if ( $slides_html !== '' ) : ?>
                <div class="swiper js-cases-swiper max-block-width">
                    <div class="swiper-wrapper">
                        <?php echo $slides_html; ?>
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-prev">
                        <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/razion-page-icons/orange-triangle.svg' ); ?>" alt="prev">
                    </div>
                    <div class="swiper-button-next">
                        <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/razion-page-icons/orange-triangle.svg' ); ?>" alt="next">
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</section>

<section class="razion-faq">
	<div class="razion-faq__wrapper max-block-width wrapper-paddings">
		<?php if ( $faq_t = trim( (string) get_field('faq_title') ) ) : ?><h2 class="razion-faq__title razion-title"><?php echo esc_html( $faq_t ); ?></h2><?php endif; ?>
		<?php if ( $faq_st = trim( (string) get_field('faq_subtitle') ) ) : ?><div class="razion-faq__subtitle"><?php echo esc_html( $faq_st ); ?></div><?php endif; ?>
		<?php if ( $faq_info = trim( (string) get_field('faq_info_message') ) ) : ?><div class="razion-faq__info-message"><?php echo esc_html( $faq_info ); ?></div><?php endif; ?>
		<?php if ( have_rows('faq_items') ) : ?>
			<div class="razion-faq__questions-block">
				<ul class="razion-faq__questions-list">
					<?php while ( have_rows('faq_items') ) : the_row();
						$q = trim( (string) get_sub_field('faq_item_title') );
						$a = get_sub_field('faq_item_text');
						if ( $q === '' && trim( wp_strip_all_tags( (string) $a ) ) === '' ) continue; ?>
						<li class="razion-faq__questions-list-item faq-item-closed">
							<div class="razion-faq__questions-list-item_title-block">
								<?php if ( $q !== '' ) : ?><div class="razion-faq__questions-list-item_title-block-title"><?php echo esc_html( $q ); ?></div><?php endif; ?>
								<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/razion-page-icons/green-arrow.png' ); ?>" alt="green arrow">
							</div>
							<?php if ( $a ) : ?><div class="razion-faq__questions-list-item_description-block"><?php echo wp_kses_post( $a ); ?></div><?php endif; ?>
						</li>
					<?php endwhile; ?>
				</ul>
			</div>
		<?php endif; ?>
		<?php if ( $faq_btn_text = trim( (string) get_field('faq_button_text') ) ) :
			$faq_btn_url = trim( (string) get_field('faq_button_url') );
			$faq_btn_blank = (bool) get_field('faq_button_blank');
			$faq_href = $faq_btn_url !== '' ? esc_url( $faq_btn_url ) : '#';
			$faq_trel = $faq_btn_blank ? ' target="_blank" rel="noopener"' : '';
		?>
			<a class="razion-faq__download-button regular-button" href="<?php echo $faq_href; ?>"<?php echo $faq_trel; ?>><?php echo esc_html( $faq_btn_text ); ?></a>
		<?php endif; ?>
	</div>
</section>

<section class="razion-reviews-slider">
	<div class="razion-reviews-slider__wrapper wrapper-paddings">
		<?php if ( have_rows('reviews_photo_slides') ) : ?>
			<div class="swiper js-reviews-swiper">
				<div class="swiper-wrapper">
					<?php while ( have_rows('reviews_photo_slides') ) : the_row();
						$rimg        = get_sub_field('review_slide_image');
						$rname       = trim( (string) get_sub_field('review_slide_name') );
						$icon_img    = get_sub_field('review_slide_social_icon');
						$social_raw  = trim( (string) get_sub_field('review_slide_social_link') );
						$social_url  = ($social_raw !== '' && $social_raw !== '#') ? esc_url( $social_raw ) : '';
						$rtext = get_sub_field('review_slide_text');
						$rlink_text = trim( (string) get_sub_field('review_slide_link_text') );
						$rlink_url  = trim( (string) get_sub_field('review_slide_link_url') );
						$rlink_blank = (bool) get_sub_field('review_slide_link_blank');
						if ( $rname === '' && trim( wp_strip_all_tags( (string) $rtext ) ) === '' && $rlink_text === '' && empty($rimg) ) continue;
						$href = $rlink_url !== '' ? esc_url( $rlink_url ) : '#';
						$trel = $rlink_blank ? ' target="_blank" rel="noopener"' : '';
					?>
						<div class="swiper-slide photo-review-slide">
							<div class="photo-review-slide__wrapper">
								<div class="photo-review-slide__left">
									<div class="photo-review-slide__left_green-block"></div>
									<?php if ( !empty($rimg) && !empty($rimg['url']) ) : ?><img src="<?php echo esc_url( $rimg['url'] ); ?>" alt="<?php echo esc_attr( $rname ?: 'review' ); ?>" class="photo-review-slide__left_image"><?php endif; ?>
								</div>
								<div class="photo-review-slide__right">
									<div class="photo-review-slide__right_arrow-container"><div class="photo-review-slide__right_arrow-elem"></div></div>
									<div class="photo-review-slide__right_content review-content">
										<?php if ( $rname !== '' ) :
												$tag_open  = $social_url ? '<a href="'.$social_url.'" class="review-content__name" style="background-color: transparent;" target="_blank" rel="noopener nofollow">' : '<div class="review-content__name">';
												$tag_close = $social_url ? '</a>' : '</div>';
												echo $tag_open;
												if ( !empty($icon_img) && !empty($icon_img['url']) ) : ?>
														<img src="<?php echo esc_url( $icon_img['url'] ); ?>" alt="social icon" class="review-content__icon">
												<?php endif; ?>
												<div class="review-content__name-label"><?php echo esc_html( $rname ); ?></div>
												<?php echo $tag_close;
										endif; ?>
										<?php if ( $rtext ) : ?><div class="review-content__review-text"><?php echo wp_kses_post( $rtext ); ?></div><?php endif; ?>
										<?php if ( $rlink_text !== '' ) : ?><a href="<?php echo $href; ?>"<?php echo $trel; ?>><?php echo esc_html( $rlink_text ); ?></a><?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
				<div class="swiper-pagination"></div>
				<div class="swiper-button-prev review-content__prev-button"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/razion-page-icons/orange-triangle.svg' ); ?>" alt="prev"></div>
				<div class="swiper-button-next review-content__next-button"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/razion-page-icons/orange-triangle.svg' ); ?>" alt="next"></div>
			</div>
		<?php endif; ?>
	</div>
</section>

<section class="razion-reviews-video">
	<div class="razion-reviews-video__wrapper max-block-width wrapper-paddings">
		<?php
			$v_main_url = trim( (string) get_field('reviews_video_main_link_url') );
			$v_main_blank = (bool) get_field('reviews_video_main_link_blank');
			$v_img = get_field('reviews_video_main_image');
			$v_sub = trim( (string) get_field('reviews_video_subtitle') );
			$v_name = trim( (string) get_field('reviews_video_name') );
			$v_btn_text = trim( (string) get_field('reviews_video_button_text') );
			$v_btn_url  = trim( (string) get_field('reviews_video_button_url') );
			$v_btn_blank = (bool) get_field('reviews_video_button_blank');
			$v_more_text = trim( (string) get_field('reviews_video_more_link_text') );
			$v_more_url  = trim( (string) get_field('reviews_video_more_link_url') );
			$v_more_blank = (bool) get_field('reviews_video_more_link_blank');
		?>
		<div class="razion-reviews-video__content">
			<?php if ( !empty($v_img) && !empty($v_img['url']) ) :
				$mhref = $v_main_url !== '' ? esc_url( $v_main_url ) : '#';
				$mtrel = $v_main_blank ? ' target="_blank" rel="noopener"' : '';
			?>
				<a href="<?php echo $mhref; ?>" class="razion-reviews-video__left"<?php echo $mtrel; ?>>
					<img src="<?php echo esc_url( $v_img['url'] ); ?>" alt="video-review">
				</a>
			<?php endif; ?>
			<div class="razion-reviews-video__right">
				<div class="razion-reviews-video__right_wrapper">
					<?php if ( $v_sub !== '' ) : ?><div class="razion-reviews-video__subtitle"><?php echo esc_html( $v_sub ); ?></div><?php endif; ?>
					<?php if ( $v_name !== '' ) : ?><div class="razion-reviews-video__name"><?php echo esc_html( $v_name ); ?></div><?php endif; ?>
					<?php if ( $v_btn_text !== '' ) :
						$b_href = $v_btn_url !== '' ? esc_url( $v_btn_url ) : '#';
						$b_trel = $v_btn_blank ? ' target="_blank" rel="noopener"' : '';
					?>
						<a class="razion-reviews-video__button regular-button" href="<?php echo $b_href; ?>"<?php echo $b_trel; ?>><?php echo esc_html( $v_btn_text ); ?></a>
					<?php endif; ?>
				</div>
				<div class="razion-reviews-video__right_green-bg"></div>
			</div>
		</div>
		<?php if ( $v_more_text !== '' ) :
			$more_href = $v_more_url !== '' ? esc_url( $v_more_url ) : '#';
			$more_trel = $v_more_blank ? ' target="_blank" rel="noopener"' : '';
		?>
			<div class="razion-reviews-video__button-wrapper">
				<a class="regular-button" href="<?php echo $more_href; ?>"<?php echo $more_trel; ?>><?php echo esc_html( $v_more_text ); ?></a>
			</div>
		<?php endif; ?>
	</div>
</section>

<section class="razion-team">
	<div class="razion-team__wrapper max-block-width wrapper-paddings">
		<?php if ( $team_title = trim( (string) get_field('team_title') ) ) : ?><h2 class="razion-team__title"><?php echo esc_html( $team_title ); ?></h2><?php endif; ?>
		<?php if ( have_rows('team_members') ) : ?>
			<ul class="razion-team__content">
				<?php while ( have_rows('team_members') ) : the_row();
					$tm_avatar = get_sub_field('team_member_avatar');
					$tm_name = trim( (string) get_sub_field('team_member_name') );
					$tm_post = trim( (string) get_sub_field('team_member_post') );
					$tm_desc = get_sub_field('team_member_description');
					if ( empty($tm_avatar) && $tm_name === '' && $tm_post === '' && trim( wp_strip_all_tags( (string) $tm_desc ) ) === '' ) continue; ?>
					<li class="razion-team__item team-item">
						<div class="team-item__avatar-wrapper">
							<?php if ( !empty($tm_avatar) && !empty($tm_avatar['url']) ) : ?><img src="<?php echo esc_url( $tm_avatar['url'] ); ?>" alt="<?php echo esc_attr( $tm_name ?: 'member' ); ?>" class="team-item__avatar-image"><?php endif; ?>
						</div>
						<div class="team-item__content-wrapper">
							<?php if ( $tm_name !== '' ) : ?><div class="team-item__content-wrapper_member-name"><?php echo esc_html( $tm_name ); ?></div><?php endif; ?>
							<?php if ( $tm_post !== '' ) : ?><div class="team-item__content-wrapper_post"><?php echo esc_html( $tm_post ); ?></div><?php endif; ?>
							<?php if ( $tm_desc ) : ?><div class="team-item__content-wrapper_description"><?php echo wp_kses_post( $tm_desc ); ?></div><?php endif; ?>
						</div>
					</li>
				<?php endwhile; ?>
			</ul>
		<?php endif; ?>
	</div>
</section>

<section class="razion-pricing">
	<div class="razion-pricing__wrapper max-block-width wrapper-paddings">
		<div class="razion-pricing__content">
			<div class="razion-pricing__green-bg"></div>
			<div class="razion-pricing__white-bg"></div>
			<?php if ( $pr_title = trim( (string) get_field('pricing_title') ) ) : ?><h2 class="razion-pricing__title razion-title"><?php echo esc_html( $pr_title ); ?></h2><?php endif; ?>
			<?php if ( have_rows('pricing_cards') ) : ?>
				<div class="razion-pricing__cards">
					<?php while ( have_rows('pricing_cards') ) : the_row();
						$pc_sub = trim( (string) get_sub_field('pricing_card_subtitle') );
						$pc_price = trim( (string) get_sub_field('pricing_card_price') );
						$pc_ltext = trim( (string) get_sub_field('pricing_card_link_text') );
						$pc_lurl  = trim( (string) get_sub_field('pricing_card_link_url') );
						$pc_blank = (bool) get_sub_field('pricing_card_link_blank');
						if ( $pc_sub === '' && $pc_price === '' && $pc_ltext === '' ) continue;
						$pc_href = $pc_lurl !== '' ? esc_url( $pc_lurl ) : '#';
						$pc_trel = $pc_blank ? ' target="_blank" rel="noopener"' : '';
					?>
						<div class="razion-pricing__card">
							<div class="razion-pricing__card_top">
								<?php if ( $pc_sub !== '' ) : ?><div class="razion-pricing__card_subtitle"><?php echo esc_html( $pc_sub ); ?></div><?php endif; ?>
								<?php if ( $pc_price !== '' ) : ?><div class="razion-pricing__card_price"><?php echo esc_html( $pc_price ); ?></div><?php endif; ?>
							</div>
							<?php if ( $pc_ltext !== '' ) : ?><a href="<?php echo $pc_href; ?>"<?php echo $pc_trel; ?>><?php echo esc_html( $pc_ltext ); ?></a><?php endif; ?>
						</div>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>

<section class="razion-text-block">
	<div class="razion-text-block__wrapper max-block-width wrapper-paddings">
		<div class="razion-text-block__left">
			<div class="razion-text-block__left_content-wrapper">
				<div class="razion-text-block__left_top">
					<?php if ( $tb_title = trim( (string) get_field('text_block_left_title') ) ) : ?><h3 class="razion-text-block__left_top-title"><?php echo esc_html( $tb_title ); ?></h3><?php endif; ?>
					<?php if ( $tb_top = get_field('text_block_left_top_text') ) : ?><div class="razion-text-block__left_top-text"><?php echo wp_kses_post( $tb_top ); ?></div><?php endif; ?>
				</div>
				<div class="razion-text-block__left_bottom">
					<?php if ( $tb_bottom = get_field('text_block_left_bottom_text') ) : ?><div class="razion-text-block__left_bottom-text"><?php echo wp_kses_post( $tb_bottom ); ?></div><?php endif; ?>
				</div>
				<div class="razion-text-block__left_arrow-container"><div class="razion-text-block__left_arrow"></div></div>
			</div>
		</div>
		<div class="razion-text-block__right">
			<?php $tb_img = get_field('text_block_right_image'); if ( !empty($tb_img) && !empty($tb_img['url']) ) : ?>
				<img src="<?php echo esc_url( $tb_img['url'] ); ?>" alt="<?php echo esc_attr( $tb_title ?: 'image' ); ?>">
			<?php endif; ?>
		</div>
	</div>
</section>
			
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

<section class="razion-final-question">
	<div class="razion-final-question__wrapper max-block-width wrapper-paddings">
		<div class="razion-final-question__left">
			<div class="razion-final-question__left_green-bg"></div>
			<div class="razion-final-question__left_content">
				<?php $fq_img = get_field('final_question_left_image'); if ( !empty($fq_img) && !empty($fq_img['url']) ) : ?>
					<img src="<?php echo esc_url( $fq_img['url'] ); ?>" alt="<?php echo esc_attr( get_field('final_question_person_name') ?: 'person' ); ?>" class="razion-final-question__left_image">
				<?php endif; ?>
				<?php if ( $fqn = trim( (string) get_field('final_question_person_name') ) || $fqs = trim( (string) get_field('final_question_person_subtitle') ) ) : ?>
					<div class="razion-final-question__left_info">
						<?php if ( $fqn ) : ?><div class="razion-final-question__left_info-title"><?php the_field('final_question_person_name') ?></div><?php endif; ?>
						<?php if ( $fqs = trim( (string) get_field('final_question_person_subtitle') ) ) : ?><div class="razion-final-question__left_info-subtitle"><?php echo esc_html( $fqs ); ?></div><?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="razion-final-question__right">
			<div class="razion-final-question__right_content">
				<div class="razion-final-question__right_green-bg"></div>
				<div class="razion-final-question__right_white-bg"></div>
				<?php if ( $fqt = trim( (string) get_field('final_question_right_title') ) ) : ?><h3 class="razion-final-question__right_title"><?php echo esc_html( $fqt ); ?></h3><?php endif; ?>
				<?php if ( $fqt2 = get_field('final_question_right_text') ) : ?><div class="razion-final-question__right_text"><?php echo wp_kses_post( $fqt2 ); ?></div><?php endif; ?>
				<?php if ( $fb_text = trim( (string) get_field('final_question_right_button_text') ) ) :
					$fb_url = trim( (string) get_field('final_question_right_button_url') );
					$fb_blank = (bool) get_field('final_question_right_button_blank');
					$fb_href = $fb_url !== '' ? esc_url( $fb_url ) : '#';
					$fb_trel = $fb_blank ? ' target="_blank" rel="noopener"' : '';
				?>
					<a href="<?php echo $fb_href; ?>" class="razion-final-question__right_button"<?php echo $fb_trel; ?>><?php echo esc_html( $fb_text ); ?></a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

</main>

<?php get_footer(); ?>