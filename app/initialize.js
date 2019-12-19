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
      .addTo(ctrl)

      
    });

    // Sticky navbar
    new ScrollMagic.Scene({
      triggerElement: 'header',
    })
    .setPin('header', {pushFollowers: false})
    .addTo(ctrl);

    // Reveal on scroll
    /** Title section , border article left*/
    var $allSections = $('.section');
    $allSections.each(function(i) {
      // title
      new ScrollMagic.Scene({
        triggerElement: $allSections[i],
        triggerHook: 1,
        duration: "80%",
  
      })
      .setClassToggle('.revealSectionTitle', 'visible')
      .addTo(ctrl);

      // border
      new ScrollMagic.Scene({
        triggerElement: $allSections[i],
        triggerHook: 1,
        duration: "80%"
      })
      .setClassToggle('.article', 'border-visible')
      .addTo(ctrl);
    })

     // change opacity background on scroll
     new ScrollMagic.Scene({
      triggerElement: '#ventes',
      offset: 200,
      triggerHook: 0,
      duration: "100%"
    })
    .setClassToggle('.section', 'visible')
    .addTo(ctrl);

    /** #ventes images */
    new ScrollMagic.Scene({
      triggerElement: '#ventes',
      triggerHook: 1,
      duration: "80%",

    })
    .setClassToggle('.reveal1', 'visible')
    .addTo(ctrl);

    // Text Left
    new ScrollMagic.Scene({
      triggerElement: '#ventes',
      triggerHook: 1,
      duration: "80%",

    })
    .setClassToggle('.text-reveal1Left', 'visible')
    .addTo(ctrl);

    // Text Right
    new ScrollMagic.Scene({
      triggerElement: '#ventes',
      triggerHook: 1,
      duration: "80%",

    })
    .setClassToggle('.text-reveal1Right', 'visible')
    .addTo(ctrl);

    /** #location image*/
    new ScrollMagic.Scene({
      triggerElement: '#locations',
      triggerHook: 1,
      duration: "80%",
    })
    .setClassToggle('.reveal2', 'visible')
    .addTo(ctrl);

    // Text Left
    new ScrollMagic.Scene({
      triggerElement: '#locations',
      triggerHook: 1,
      duration: "80%",

    })
    .setClassToggle('.text-reveal1Left', 'visible')
    .addTo(ctrl);

    // Text Right
    new ScrollMagic.Scene({
      triggerElement: '#locations',
      triggerHook: 1,
      duration: "80%",

    })
    .setClassToggle('.text-reveal1Right', 'visible')
    .addTo(ctrl);

  }
};

$(app.init);
