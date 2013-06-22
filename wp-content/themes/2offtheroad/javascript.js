$(document).ready(function(){
    $('.storywrapper').bind('click', function(){
        var modal_target = $(this).attr('data-target');
        var padding = 40;
        var maxwidth = $(document).width() - padding;
        var maxheight = $(window).height() - padding;

        var image_src = $(modal_target).find('.pic_url').text();

        $(modal_target).find('.modal-body').html('<div class="loading center">Bezig met laden</div>');
        $(modal_target).modal().css({
          'background-color': '#2F4F4F',
          'height': '100px'
        });
        $(modal_target).find('.modal-body').css({
            'max-height': '100%'
        });
        var img = $('<img src='+  image_src +'>').load(function(){
          $(modal_target).find('img').remove();

          return;
          $(modal_target).find('.modal-body').html(img);
          var image_width = this.width
          var image_height = this.height
          var ratio = image_width / image_height;

          var height = 20;
          var width = 20;

          if (maxheight){
              height = maxheight;
          } 

          if (maxwidth){
              width = maxheight * ratio;
          }
          $(modal_target).css({
 	        'width': width + 'px',
                'height': height + 'px',
                'max-height': height + 'px',
                'padding-bottom': '10px',
                'top': padding / 2,
  	        'margin-left': function () {return -($(this).width() / 2);}
          })
          return
  	  $(modal_target).modal('toggle').css({
                'background-color': '#2F4F4F',
 	        'width': width + 'px',
                'height': height + 'px',
                'max-height': height + 'px',
                'padding-bottom': '10px',
                'top': padding / 2,
  	        'margin-left': function () {return -($(this).width() / 2);}
  	  });
          $(modal_target).find('.modal-body').css({
              'max-height': '100%'
          });
        });
    });
});
