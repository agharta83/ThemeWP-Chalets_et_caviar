require('scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap.js');
require('scrollmagic/scrollmagic/minified/plugins/debug.addIndicators.min.js');
var gsap = require("gsap/dist/gsap").gsap;
var ScrollMagic = require('scrollmagic');

var app = {
  init: function() {
    app.InitScrollMagic();
    app.ScrollMagicSection();
    app.ScrollMagicArticle();
    app.ScrollMagicForm();
    app.ScrollMagixTaxo();
    app.gestionForm();
    
  },

   // Scroll Animation on FrontPage
   InitScrollMagic: function() {
    // Init ScrollMagic
    var globalController = new ScrollMagic.Controller({
      globalSceneOptions: {
        triggerHook: 'onLeave'
      }
    });

    // Create scene section pins
    $(".section-pins").each(function() {
      new ScrollMagic.Scene({
        triggerElement: this
      })
      .setPin(this)
      .addTo(globalController)
    });

    // Sticky navbar
    new ScrollMagic.Scene({
      triggerElement: 'header',
    })
    .setPin('header', {pushFollowers: false})
    .addTo(globalController);
  },

  // Section Animation (ToggleClass and reveal on scroll)
  ScrollMagicSection: function() {
    // Init ScrollMagic
    var SectionController = new ScrollMagic.Controller();

    // Reveal on scroll
    /** SECTIONS */
    var $allSections = $('.section-pins');
    $allSections.each(function(i) {
      // Section title
      new ScrollMagic.Scene({
        triggerElement: this,
        triggerHook: 0.2,
        duration: "80%",
        offset: 50
  
      })
      .setClassToggle($(this).children("h3")[0], 'visible')
      .addTo(SectionController);
    })
  },

  // ARTICLE
  ScrollMagicArticle: function() {
    var ArticleController = new ScrollMagic.Controller();

    var $article = $('.article');
    $article.each(function() {
      // Article border
      new ScrollMagic.Scene({
        triggerElement: this,
        triggerHook: 0.2,
        duration: "80%"
      })
      .setClassToggle(this, 'border-visible')
      .addTo(ArticleController);

      // Section Vente Article Image
      new ScrollMagic.Scene({
        triggerElement: '#ventes',
        triggerHook: 0.2,
        duration: "80%",
      })
      .setClassToggle('.reveal1', 'visible')
      .addTo(ArticleController);

      // Section Vente Text Left
      new ScrollMagic.Scene({
        triggerElement: '#ventes',
        triggerHook: 0.2,
        duration: "80%",
      })
      .setClassToggle('.text-reveal1Left', 'visible')
      .addTo(ArticleController);

      // Section Vente Text Right
      new ScrollMagic.Scene({
        triggerElement: '#ventes',
        triggerHook: 0.2,
        duration: "80%",
      })
      .setClassToggle('.text-reveal1Right', 'visible')
      .addTo(ArticleController);

      // Section Location Article Image
      new ScrollMagic.Scene({
        triggerElement: '#locations',
        triggerHook: 0.2,
        duration: "80%",
      })
      .setClassToggle('.reveal2', 'visible')
      .addTo(ArticleController);

      // Section Location Text Left
      new ScrollMagic.Scene({
        triggerElement: '#locations',
        triggerHook: 0.2,
        duration: "80%",
      })
      .setClassToggle('.text-reveal1Left', 'visible')
      .addTo(ArticleController);

      // Section Location Text Right
      new ScrollMagic.Scene({
        triggerElement: '#locations',
        triggerHook: 0.2,
        duration: "80%",
      })
      .setClassToggle('.text-reveal1Right', 'visible')
      .addTo(ArticleController); 
    })
  },

   // Animation on Contact form
   ScrollMagicForm: function() {
    var formController = new ScrollMagic.Controller();

    new ScrollMagic.Scene({
      triggerElement: ".contact",
      triggerHook: 0.9,
      duration: '80%',
      offset: 50
    })
    .setClassToggle('.animate1', 'visible')
    .addTo(formController)
  },

  // Scroll Animation on Taxo page
  ScrollMagixTaxo: function() {
    var TaxoController = new ScrollMagic.Controller(
      {
        globalSceneOptions: {
          triggerHook: "onEnter",
          duration: "150%"
        }
      }
    );
  
    // Parallax rows
    $('.section-taxo').each(function(i) {
      var $row = $(this).find('.row');

      new ScrollMagic.Scene({
        triggerElement: $row[0],
        triggerHook: 0.5,
        duration: '150%'
      })
      .setTween($row[0], {y: '80%', ease: Linear.easeNone})
      .addTo(TaxoController);
    });
      
    // RevealElements
    var $revealElements = $('.digit');

    $revealElements.each(function(i) {
      new ScrollMagic.Scene({
        triggerElement: $revealElements[i],
        offset: 50,
        reverse: true
      })
      .setClassToggle($revealElements[i], "visible")
      .addTo(TaxoController);
    })
  },

  // Gestion du formulaire
  gestionForm: function() {
    // Change la bordure de l'input et du textarea lors du focus
    $('input').focus(function() {
      $(this).css('border', '3px solid #D4AF37');
    });

    $('textarea').focus(function() {
      $(this).css('border', '3px solid #D4AF37');
    });

    // Enleve la bordure lors de la perte du focus de l'input ou textarea
    $('input').blur(function() {
      $(this).css('border', 'none');
    });

    $('textarea').blur(function() {
      $(this).css('border', 'none');
    });

    // Si une requête est en cours
    var busy = null;
    // Soumission du formulaire
    $('form').submit(function(e) {
      e.preventDefault();

      // Initialisation des variables du formulaire
      var error = false;
      var errorMsg = "<span class='errorMsg'>Le champ est vide</span><br\>";
      var noValidMail = "<span class='errorMsg'>L'adresse mail n'est pas valide</span>";
      var form = $(this);
      var elm = [];
      var inputName = form.find('input[name=name]');
      var inputEmail = form.find('input[name=email]');
      var textarea = form.find('textarea'); 
      elm.push(inputName, inputEmail, textarea);

      // On boucle sur les champs du form
      $(elm).each(function(i) {
        // Vérification au niveau des inputs
        if( $.trim($(this).val() ) == '') {
          $(this).after(' ');
          $(this).css('border', '3px solid #ff0000');
          error = true;
          $(this).after(errorMsg);
          // Verification adresse mail
        } else if (i == '1') {
          if(!app.isEmail($(this).val())) {
            error = true;
            inputEmail.css('border', '3px solid #ff0000')
            inputEmail.after(noValidMail);
          }
        }
      });
      
      // Si pas d'erreur
      if( !error ) {
        // Evite plusieurs soumission du formulaire simultannée
        if (busy) {
          busy.abort();
        }

        // Appel Ajax
        busy = $.ajax({
          url: adminAjax,
          type: 'POST',
          data: form.serialize(),
          success: function(response) {                       
            if( response == 'success') {
              // On vide le formulaire
              form[0].reset();
              // On affiche un message de succès
              // Le form disparait
              $('.contact').children().hide(2000, 'linear');
              $('.contact').html(`<div class='contact-form' style='height: 67vh; text-align:center; color: #EEFCFF; font-size: 2em; font-family: Sulphur Point, sans-serif; padding-top:2em;'>Merci !</br> Votre message a bien été envoyé, nous vous contacterons dans les plus brefs délais.</div>`);
            } else {
              // On affiche un message d'erreur
              $('.contact').children().hide(2000, 'linear');
              $('.contact').html(`<div class='contact-form' style='height: 67vh; text-align:center; color: #EEFCFF; font-size: 2em; font-family: Sulphur Point, sans-serif; padding-top:2em;'>Nous sommes désolé, mais une erreur est survenue lors de l\'envoi de votre message.</div>`);
            }
          }
        });
      }
    });
  },

  isEmail: function(email) {
    var regExp = /^(([^<>()[]\.,;:s@]+(.[^<>()[]\.,;:s@]+)*)|(.+))@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}])|(([a-zA-Z-0-9]+.)+[a-zA-Z]{2,}))$/;
    return regExp.test(email);
  }
}

$(app.init);
