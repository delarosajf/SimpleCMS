$(function(){
  $('.colapsar').on('click', function(){
    $(this).find('i').toggleClass('fa-chevron-circle-left').toggleClass('fa-chevron-circle-right');
    $('body').toggleClass('closed');
  });
});
