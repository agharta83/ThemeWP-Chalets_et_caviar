<article class="article">
  
  <div class="article__wrap__img reveal2">
    <span class="article__img__icone"><i class="fa fa-gratipay" aria-hidden="true"></i></span>
    <a href="<?php the_post_thumbnail_url(); ?>"><img class="article__img" src="<?php the_post_thumbnail_url(); ?>"></a>
  </div>
  
  <div class="article__content text-reveal2Left">
    <h3 class="article__headline">
      <a href="<?php the_permalink(); ?>"><span><?php the_title(); ?></span></a>
      <span class="article__headline__surface-loc"><?php the_field('places_minimum'); ?> à <?php the_field('places_maximum'); ?> places</span>
    </h3>
    <div class="article__text">
      <div class="article__text__wrapper">
          <p class="article__excerpt"><?php the_excerpt(); ?></p>
          <!--<p class="article__item"><?php the_field('spec'); ?><i class="fa fa-caret-left article__icone-arrow" aria-hidden="true"><span class="article__icone "><i class="fa fa-thumbs-up" aria-hidden="true"></i></span></p>-->
          <p class="article__item"><?php the_field('nb_chambres'); ?><i class="fa fa-caret-left article__icone-arrow" aria-hidden="true"></i><span class="article__icone"><i class="fa fa-bed" aria-hidden="true"></i></span></p>
          <p class="article__item"><?php the_field('nb_sdb'); ?><i class="fa fa-caret-left article__icone-arrow" aria-hidden="true"></i><span class="article__icone"><i class="fa fa-bath" aria-hidden="true"></i></span></p>
          <p class="article__item"><?php the_field('prix_semaine'); ?> / semaine<i class="fa fa-caret-left article__icone-arrow" aria-hidden="true"></i><span class="article__icone"><i class="fa fa-eur" aria-hidden="true"></i></span></p>
      </div>
        
    </div>

  </div>

</article>