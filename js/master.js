$(function(){

  var wrapper = $('.wrapper');
  var overlay = $('.overlay');
  var cropper = $('.cropper');
  var output = $('.output');
  var crop_tool = $('.crop_tool');

  //Set 'em Draggable and Stretchable
  $('.crop_tool').resizable({containment: ".sec_img"});
  $('.crop_tool').draggable({containment: ".sec_img"});

  var max_w = 450;
  var max_h = 450;
  var img_w = parseInt($('.img').width());
  var img_h = parseInt($('.img').height());

  var scale_ratio = img_w/img_h;
  if ((max_w/max_h) > scale_ratio) {
    max_w = max_h * scale_ratio;
  } else {
    max_h = max_w / scale_ratio;
  }

  $('.img').css("width", max_w+"px");
  $('.img').css('height', max_h+"px");

  $('input[type="file"]').on('change', function(e){
    var file = this.files[0];
    var type = file.type;
    var allowed = ["image/jpeg", "image/png", "image/gif"];
    if (!((type == allowed[0]) || (type == allowed[1]) || (type == allowed[2]))) {
      overlay.hide();
      wrapper.hide();
      $('.img').attr('src', "no_image.jpg");
    } else {
      var reader = new FileReader();
      reader.onload = function(e){
        $('.img').attr('src', e.target.result);
      }
      reader.readAsDataURL(this.files[0]);
      overlay.show();
      wrapper.show();
    }
  });

  $('.overlay, input[value="Cancel"]').on('click', function(e){
    $('input[type="file"]').val('');
    overlay.hide();
    wrapper.hide();
    cropper.hide();
    output.hide();
  });

  $('.form').on('submit', (function(e){
    e.preventDefault();

    $.ajax({
      url: "needs/process.php",
      method: "POST",
      cache: false,
      dataType: 'json',
      processData: false,
      contentType: false,
      data: new FormData(this),
      success: function(data) {

        var img_name = data.name;
        var img_fldr = data.folder;
        wrapper.hide();
        $('.folder').val(img_fldr);
        $('.name').val(img_name);
        $('.sec_img').attr('src', 'processed/resized/Resized_'+img_name);
        cropper.show();

        $('.final').on('click', function(e){
          var name = $('.sec_img').attr('src');
          var top = $('.crop_tool').position().top;
          var left = $('.crop_tool').position().left;
          var width = $('.crop_tool').width();
          var height = $('.crop_tool').height();
          $.ajax({
            url: "needs/tool.php",
            method: "POST",
            data: {
              top: top,
              left: left,
              width: width,
              height: height,
              name: name
            },
            success: function(data){

              console.log(data);
              output.html(data);
              cropper.hide();
              output.show();

              $('.done').on('click', function(e){
                output.hide();
                overlay.hide();
                $('input[type="file"]').val('');
              });

            }
          });

        });
      }
    });

  }));



});
