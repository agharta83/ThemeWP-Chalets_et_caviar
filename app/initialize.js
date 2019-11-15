const anime = require('animejs');

document.addEventListener('DOMContentLoaded', function() {
  // Animation hero
  var
    words = ['Ventes de chalets d\'exceptions','Location de rêves dans un chalet','Venez visiter la station "Les 3 Vallées" et sa vallée de la Tarentaise'],
    part,
    i = 0,
    offset = 0,
    len = words.length,
    forwards = true,
    skip_count = 0,
    skip_delay = 5,
    speed = 100;

  var wordflick = function(){
    setInterval(function(){
      if (forwards) {
        if(offset >= words[i].length){
          ++skip_count;
          if (skip_count == skip_delay) {
            forwards = false;
            skip_count = 0;
          }
        }
      }
      else {
         if(offset == 0){
            forwards = true;
            i++;
            offset = 0;
            if(i >= len){
              i=0;
            } 
         }
      }
      part = words[i].substr(0, offset);
      if (skip_count == 0) {
        if (forwards) {
          offset++;
        }
        else {
          offset--;
        }
      }
    	$('.hero__word').text(part);
  },speed);
};

  console.log('Initialized app');
  wordflick();
});
