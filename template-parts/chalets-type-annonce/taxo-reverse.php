<section class="section-taxo section--image">
    <div class="container">
        <div class="row row-reverse">
            <div class="col left">
                <div class="image-wrap digit">
                <?php if ( has_post_thumbnail() ) : ?>
                    <img class="image digit" src="<?php the_post_thumbnail_url(); ?>" >
                <?php endif; ?>
                </div>
            </div>

            <div class="col right">
                <h3 class="headline digit">
                    <span><?php the_title(); ?></span>
                    
                    <?php if( !empty(get_field('surface')) ) : ?>
                        <span class="article__headline__surface digit"><?php the_field('surface'); ?> m²</span>
                    <?php endif; ?>

                    <?php if (!empty(get_field('places_minimum')) ) : ?>
                        <span class="article__headline__surface-loc"><?php the_field('places_minimum'); ?> à <?php the_field('places_maximum'); ?> places</span>
                    <?php endif; ?>

                    </h3>
                <div class="content digit">
                    <p><?php the_excerpt(); ?></p>
                    <p class="article__item"><span class="article__icone"><i class="fa fa-bed" aria-hidden="true"></i></span></i><i class="fa fa-caret-right article__icone-arrow" aria-hidden="true"></i><?php the_field('nb_chambres'); ?></p>
                    <p class="article__item"><span class="article__icone"><i class="fa fa-bath" aria-hidden="true"></i></span><i class="fa fa-caret-right article__icone-arrow" aria-hidden="true"></i><?php the_field('nb_sdb'); ?></p>
                    <p class="article__item"><span class="article__icone"><i class="fa fa-thumbs-up" aria-hidden="true"></i></span><i class="fa fa-caret-right article__icone-arrow" aria-hidden="true"></i><?php the_field('spec'); ?></p>
                    <?php if( !empty(get_field('prix')) ) : ?>
                        <p class="article__item"><span class="article__icone"><i class="fa fa-eur" aria-hidden="true"></i></span><i class="fa fa-caret-right article__icone-arrow" aria-hidden="true"></i><?php the_field('prix'); ?></p>
                    <?php endif; ?>

                    <?php if (!empty(get_field('prix_semaine')) ) : ?>
                        <p class="article__item"><span class="article__icone"><i class="fa fa-eur" aria-hidden="true"></i></span><i class="fa fa-caret-right article__icone-arrow" aria-hidden="true"></i><?php the_field('prix_semaine'); ?> / semaine</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="digit taxo-link article__wrapper__link">
                <a href="<?php the_permalink(); ?>" class="article__link__more" title="En savoir plus"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</section>