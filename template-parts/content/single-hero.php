<section class="section-hero section single-hero">
    <div class="single-hero__bcg-opacity">
        <div class="single-hero__title-wrapper">
            <h1 class="single-hero__title"><?php the_title(); ?></h1>
            <div class="single-hero__content">
                <div class="single-hero__content-left">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <a href="<?php the_post_thumbnail_url(); ?>"><img class="single-hero__content__img" src="<?php the_post_thumbnail_url(); ?>"></a>
                    <?php endif; ?>
                    <a href="<?php the_field('photo_du_chalet_1'); ?>"><img class="single-hero__content__img" src="<?php the_field('photo_du_chalet_1'); ?>"></a>
                    <a href="<?php the_field('photo_du_chalet_2'); ?>"><img class="single-hero__content__img" src="<?php the_field('photo_du_chalet_2'); ?>"></a>
                    <a href="<?php the_field('photo_du_chalet_3'); ?>"><img class="single-hero__content__img" src="<?php the_field('photo_du_chalet_3'); ?>"></a>    
                </div>

                <div class="single-hero__content-right">
                    <div class="single-hero__col-right">
                        <?php
                  $surface = get_field('surface');
                  $placeMin = get_field('places_minimum');
                  $placeMax = get_field('places_maximum');
                  if ( !empty($surface) ) :
                ?>
                        <span class="single-hero__col-right__surface"><?php the_field('surface'); ?> m²</span>
                        <?php endif; ?>
                        <?php 
                  if ( !empty($placeMin) && !empty($placeMax) ) :
                ?>
                        <span class="single-hero__col-right__surface-loc"><?php the_field('places_minimum'); ?> à
                            <?php the_field('places_maximum'); ?> places</span>
                        <?php endif; ?>

                        <div class="items-wrapper">
                            <p class="single__item"><?php the_field('nb_chambres'); ?>
                                <i class="fa fa-caret-left single__icone-arrow" aria-hidden="true"></i>
                                <span class="single__icone">
                                    <i class="fa fa-bed" aria-hidden="true"></i>
                                </span>
                            </p>

                            <p class="single__item"><?php the_field('nb_sdb'); ?>
                                <i class="fa fa-caret-left single__icone-arrow" aria-hidden="true"></i>
                                <span class="single__icone">
                                    <i class="fa fa-bath" aria-hidden="true"></i>
                                </span>
                            </p>
                        </div>

                        <div class="single__item-prix-wrapper">
                            <?php
                    $prix = get_field('prix');
                    $prixSemaine = get_field('prix_semaine');

                    if ( !empty($prix) ) :
                  ?>
                            <p class="single__item-prix"><?php echo number_format_i18n(get_field('prix')); ?>
                                <span class="single__icone">
                                    <i class="fa fa-eur" aria-hidden="true"></i>
                                </span>
                            </p>
                            <?php endif; ?>
                            <?php 
                    if ( !empty($prixSemaine) ) : ?>
                            <p class="single__item-prix-loc">
                                <?php echo number_format_i18n(get_field('prix_semaine')); ?>
                                <span class="single__icone">
                                    <i class="fa fa-eur" aria-hidden="true"></i>
                                    / semaine
                                </span>
                            </p>
                            <?php endif; ?>
                        </div>


                    </div>


                    <div class="single-hero__col-left">

                        <?php the_field('description'); ?>

                        <p class="single__item-spec">
                            <span class="single__icone">
                                <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                <i class="fa fa-caret-right article__icone-arrow" aria-hidden="true"></i>
                                <?php the_field('spec'); ?>
                            </span>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</section>