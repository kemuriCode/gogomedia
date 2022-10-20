<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        <?php if( have_rows('slider') ): ?>
        <?php while( have_rows('slider') ) : the_row(); 
            $image = get_sub_field('ikona'); ?>
        <div class="swiper-slide">
            <div class="card">
                <h3><?php echo get_sub_field('naglowek'); ?></h3>
                <p><?php echo get_sub_field('tekst'); ?></p>
                <?php 
                if( $image ):
                // Image variables.
                $url = $image['url'];
                $alt = $image['alt'];

                // Thumbnail size attributes.
                $size = 'thumbnail';
                $thumb = $image['sizes'][ $size ];
                $width = $image['sizes'][ $size . '-width' ];
                $height = $image['sizes'][ $size . '-height' ];
                ?>
                <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" />
                <?php endif; ?>
            </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>