<article class="article--reverse">

            <div class="article__wrap__img--reverse reveal1">
              <span class="article__img__icone--reverse"><i class="fa fa-gratipay" aria-hidden="true"></i></span>
              <a href="<?php the_post_thumbnail_url(); ?>"><img class="article__img--reverse" src="<?php the_post_thumbnail_url(); ?>"></a>    
            </div>
            
            <div class="article__content--reverse text-reveal1Right">
              <h3 class="article__headline--reverse">
                <a href="<?php the_permalink(); ?>"><span class="article__headline__text--reverse"><?php the_title(); ?></span></a>
                <span class="article__headline__surface"><?php the_field('surface'); ?> m²</span>
              </h3>
              <div class="article__text--reverse">
                <div class="article__text__wrapper">
                    <p class="article__excerpt"><?php the_excerpt(); ?></p>
                    <p class="article__item"><span class="article__icone"><i class="fa fa-bed" aria-hidden="true"></i></span></i><i class="fa fa-caret-right article__icone-arrow" aria-hidden="true"></i><?php the_field('nb_chambres'); ?></p>
                    <p class="article__item"><span class="article__icone"><i class="fa fa-bath" aria-hidden="true"></i></span><i class="fa fa-caret-right article__icone-arrow" aria-hidden="true"></i><?php the_field('nb_sdb'); ?></p>
                    <p class="article__item"><span class="article__icone"><i class="fa fa-eur" aria-hidden="true"></i></span><i class="fa fa-caret-right article__icone-arrow" aria-hidden="true"></i><?php the_field('prix'); ?></p>
                    <p class="article__item"><span class="article__icone"><i class="fa fa-thumbs-up" aria-hidden="true"></i></span><i class="fa fa-caret-right article__icone-arrow" aria-hidden="true"></i><?php the_field('spec'); ?></p>
                    
                </div>
                  
              </div>
              
            </div>
  
          </article>
