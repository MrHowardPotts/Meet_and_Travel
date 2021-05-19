$('#picker').daterangepicker({
  opens:'left'
}, function(start, end, label){
  $('#start').text(start.format('YYYY-MM-DD'))
  $('#end').text(end.format('YYYY-MM-DD'))
});