<?php
// Vérifie si on est sur une page de taxonomy
if ( is_tax() ) : ?>
  <section id="contact" class="section section-pins section-contact-taxo animate1">
<?php else : ?>
  <section id="contact" class="section section-pins">
<?php endif; ?>

          <h3 class="section__title contact-title revealSectionTitle">contactez <span>Nous</span></h3>
        <div class="contact animate1">
            
            <div class="contact-form">
                <form action="" method="POST">
                  <div class="field">
                    <label for="name">Nom</label>
                    <input id="name" name="name" type="text">
                  </div>            
                  <div class="field">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="text">
                  </div>        
                  <div class="field">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" type="text"></textarea>
                  </div>
                  <input type="hidden" name="action" value="contact">
                  <?php wp_nonce_field( 'ajax_contact_nonce', 'security' ) ?>                   
                  <div class="field">
                    <button id="send-message" type="submit">Envoyer</button>
                  </div>
                </form>
              </div>
      
              <div class="contact-info" id="contact-info">
                <div class="contact-info__item">
                  <i class="contact-info__item__icon fa fa-envelope"></i>
                  <h5 class="contact-info__item__title">E-mail</h5>
                  <a class="contact-info__item__info" href="mailto:chalets-et-caviar@opc.com"><p>chalets-et-caviar@opc.com</p></a>
                </div>     
                <div class="contact-info__item">
                  <i class="contact-info__item__icon fa fa-phone"></i>
                  <h5 class="contact-info__item__title">T&eacute;l&eacute;phone</h5>
                  <a class="contact-info__item__info" href="tel:+33604020810"><p>+33 6 03 02 01 00</p></a>
                </div>          
                <div class="contact-info__item">
                  <i class="contact-info__item__icon fa fa-home"></i>
                  <h5 class="contact-info__item__title">Adresse</h5>
                  <div class="contact-info__item__info">
                    <p>2 Rue du Rocher</p>
                    <p>73120 Saint-Bon-Tarentaise</p>
                  </div>         
                </div>   
              </div>
        </div>

      </section>
