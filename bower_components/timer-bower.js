$('#clock').countdown('2020/10/10').on('update.countdown', function(event) {
   var $this = $(this).html(event.strftime(''
     + '<span>%-w</span> week%!w '
     + '<span>%-d</span> day%!d '
     + '<span>%H</span> hr '
     + '<span>%M</span> min '
     + '<span>%S</span> sec'));
});
