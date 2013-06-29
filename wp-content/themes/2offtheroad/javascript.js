$(document).ready(function(){
    $('.modal').delegate('.next_pic', 'click', function(){
        show_next_image();
    });
    $('.modal').delegate('.prev_pic', 'click', function(){
        show_previous_image();
    });

    $(document).keydown(function(e){
        key_enter = 13;
        key_escape = 27;
        key_spacebar = 32;
        key_left = 37;
        key_right = 39;
    	if (e.keyCode == key_left) { 
          show_previous_image()
    	}
        if (e.keyCode == key_right || e.keyCode == key_enter || e.keyCode == key_spacebar) {
          show_next_image()
        }
        if (e.keyCode == key_escape) {
          $('.modal').modal('hide');
        }
    });

    $('.storywrapper').bind('click', function(){
        var modal_target = $(this).attr('data-target');
        show_image(modal_target);
    });
});


function show_next_image(){
        var next_modal_target = $('.modal.in').next().attr('data-target');
        show_image(next_modal_target);
}
function show_previous_image(){
        var prev_modal_target = $('.modal.in').prev('.storywrapper').prev('.modal').prev('.storywrapper').attr('data-target');
        show_image(prev_modal_target);
}

function show_image(modal_target){
        $('.modal').modal('hide');
        var padding = 40;
        var maxwidth = $(document).width() - padding;
        var maxheight = $(window).height() - padding;

        var image_src = $(modal_target).find('.pic_url').text();

        $(modal_target).find('.modal-body').html('<div class="loading center">Bezig met laden</div>');
        $(modal_target).modal().css({
          'background-color': '#2F4F4F',
          'height': '150px'
        });
        $(modal_target).find('.modal-body').css({
            'max-height': '100%'
        });
        var img = $('<img src='+  image_src +'>').load(function(){
          $(modal_target).find('img').remove();

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
        });

}

