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

    // Animation article section ventes
    // Image
    var $imageWrap = $('#ventes .article').find('.article__wrap__img');
    var $image = $('#ventes .article').find('.article__img');

    const leftArticleTimeline = gsap.timeline()
      .fromTo($imageWrap, 
        {opacity: 0, height: 0},
        {duration: 1.5, opacity: 1, height: $imageWrap.height()}, 
      )
      .fromTo($image,
        {width: 0},
        {duration: 0.5, width: '100%'},
      )
      .to($imageWrap,
        {height: 'auto'},
        {duration: 0}
      )
      
      new ScrollMagic.Scene({
        triggerElement: '#ventes',
        triggerHook: 0.9
      })
      .setTween(leftArticleTimeline)
      .addTo(ctrl);

    // Content
    var $headline = $('#ventes .article').find('.article__headline');
    var $headlineText = $headline.find('.article__headline__text');
    var $headlineSurface = $headline.find('.article__headline__surface');
    var $headlineBar = $headline.find('.article__headline__bar');
    var $content = $('#ventes .article').find('.article__text');

    var rightArticleTimeline = gsap.timeline()
      .to($headlineBar, // target (object)
        0.25, // duration (number)
        {left: 0}, // vars (object)
        '+=0.75' // position dans la timeline aprés la fin
      )
      .to($headlineBar,
        0.25,
        {right: '100%'}
      )
      .to($headline,
        0,
        {height: 'auto'},
        1.75
      )
      .fromTo($headlineText,
        0.1,
        {opacity:0},
        {opacity: 1},
        1
      )
      .fromTo($content,
        0.5,
        {opacity: 0, x: -25},
        {opacity: 1, x: 0, ease: "power2.inOut"},
        '-=0.5'
      )
      .fromTo($headlineSurface,
        {opacity: 0},
        {duration: 2, opacity: 1}
      );

      new ScrollMagic.Scene({
        triggerElement: "#ventes",
        triggerHook: 0.9
      })
      .setTween(rightArticleTimeline)
      .addTo(ctrl);
    
    // Animation article--reverse section ventes
    // Image Reverse
    var $imageReverseWrap = $('#ventes .article--reverse').find('.article__wrap__img--reverse');
    var $imageReverse = $(' #ventes .article--reverse').find('.article__img--reverse');

    const leftArticleReverseTimeline = gsap.timeline()
      .fromTo($imageReverseWrap, 
        {opacity: 0, height: 0},
        {duration: 1.5, opacity: 1, height: $imageReverseWrap.height()}, 
      )
      .fromTo($imageReverse,
        {width: 0},
        {duration: 0.5, width: '100%'},
      )
      .to($imageReverseWrap,
        {y: 'auto'},
        {duration: 0}
      )
      
      new ScrollMagic.Scene({
        triggerElement: '#ventes',
        triggerHook: 0.9
      })
      .setTween(leftArticleReverseTimeline)
      .addTo(ctrl);
      
    // Content Reverse
    var $headlineReverse = $('#ventes .article--reverse').find('.article__headline--reverse');
    var $headlineTextReverse = $headline.find('.article__headline__text--reverse');
    var $headlineSurfaceReverse = $headline.find('.article__headline__surface');
    var $headlineBarReverse = $headline.find('.article__headline__bar--reverse');
    var $contentReverse = $('#ventes .article--reverse').find('.article__text--reverse');

    var rightArticleReverseTimeline = gsap.timeline()
      .to($headlineBarReverse, // target (object)
        0.25, // duration (number)
        {left: 0}, // vars (object)
        '+=0.75' // position dans la timeline aprés la fin
      )
      .to($headlineBarReverse,
        0.25,
        {right: '100%'}
      )
      .to($headlineReverse,
        0,
        {height: 'auto'},
        1.75
      )
      .fromTo($headlineTextReverse,
        0.1,
        {opacity:0},
        {opacity: 1},
        1
      )
      .fromTo($contentReverse,
        0.5,
        {opacity: 0, x: -25},
        {opacity: 1, x: 0, ease: "power2.inOut"},
        '-=0.5'
      )
      .fromTo($headlineSurfaceReverse,
        {opacity: 0},
        {duration: 2, opacity: 1}
      );

      new ScrollMagic.Scene({
        triggerElement: "#ventes",
        triggerHook: 0.9
      })
      .setTween(rightArticleReverseTimeline)
      .addTo(ctrl);
    
  }

};

$(app.init);

/*
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
    */