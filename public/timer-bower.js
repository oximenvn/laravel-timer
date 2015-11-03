var fiveSeconds = new Date().getTime() + 5000;
 $('#clock').countdownll(fiveSeconds, {elapse: true})
 .on('update.countdown', function(event) {
   var $this = $(this);
   if (event.elapsed) {
     $this.html(event.strftime('After end: <span>%H:%M:%S</span>'));
   } else {
     $this.html(event.strftime('To end: <span>%H:%M:%S</span>'));
   }
 });