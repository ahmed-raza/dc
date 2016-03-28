$(document).ready(function(){
  $('.thumb .overlay .remove').each(function(){
    $(this).click(function(){
      var imgName = $(this).parents('.thumb').find('img').attr('src').split('/');
      var removeImage = imgName[4].split('t-');
      var oldVal = $('#removeImages').val();
      if (oldVal) {
        $('#removeImages').val(oldVal+","+removeImage[1]);
      }else{
        $('#removeImages').val(removeImage[1]);
      }
      $(this).parents('.thumb').remove();
    });
  });
});
