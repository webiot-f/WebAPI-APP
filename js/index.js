//タブクリック時処理
$(function() {
  $('.tab li').click(function() {
    let Tera = $('.tab li').index(this);
    $('.tab li').removeClass('active');
    $(this).addClass('active');
    $('.area ul').removeClass('show').eq(Tera).addClass('show');
 
  });
});

