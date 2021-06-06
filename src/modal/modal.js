$(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
});


const form = document.querySelector(".modal-dialog .modal-content"),
searchBtn = form.querySelector(".modal-body .text-center #search"),
wishesBtn = form.querySelector(".modal-body .text-center #wishes");

searchBtn.onclick =()=>{
  console.log("Hello");
}

wishesBtn.onclick =()=>{
  console.log("Hello wishes");
}
