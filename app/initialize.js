require('scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap.js');
var gsap = require("gsap/dist/gsap").gsap;
var ScrollMagic = require('scrollmagic');



var app = {
  init: function() {
    app.InitScrollMagic();
  },

  // Scroll Animation
  InitScrollMagic: function() {
    // Init ScrollMagic
    var ctrl = new ScrollMagic.Controller({
      globalSceneOptions: {
        triggerHook: 'onLeave'
      }
    });

    // Create scene section pins
    $("section").each(function() {
      new ScrollMagic.Scene({
        triggerElement: this
      })
      .setPin(this)
      .addTo(ctrl);
    });

    // Sticky navbar
    new ScrollMagic.Scene({
      triggerElement: 'header',
    })
    .setPin('header', {pushFollowers: false})
    .addTo(ctrl);

    // Images Reveal on scroll
    new ScrollMagic.Scene({
      triggerElement: '#ventes',
      triggerHook: 1,
      duration: "80%",

    })
    .setClassToggle('.reveal1', 'visible')
    .addTo(ctrl);

    new ScrollMagic.Scene({
      triggerElement: '#locations',
      triggerHook: 1,
      duration: "80%",
    })
    .setClassToggle('.reveal2', 'visible')
    .addTo(ctrl);
  }

};

$(app.init);

  // Scroll Navbar
  /*scrollHeader: function() {
    $(window).scroll(function(){
      $('.header').toggleClass('scrolled', $(this).scrollTop() > 10);
    });
    
    // Reveal on Scroll
    new ScrollMagic.Scene({
      triggerElement: '#ventes',
      triggerHook: 0.9,
      duration: "80%",
      offset: 50
    })
    .setClassToggle('#reveal1', 'visible')
    .addTo(ctrl);
  },*/