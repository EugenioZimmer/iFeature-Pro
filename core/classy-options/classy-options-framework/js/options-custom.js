/**
 * Prints out the inline javascript needed for the colorpicker and choosing
 * the tabs in the panel.
 */

jQuery(document).ready(function($) {

	 /*
      Progressive enhancement.  If javascript is enabled we change the body class.  Which in turn hides the checkboxes with css.
    */
    $('body').attr("class","js");
    
    /*
      Add toggle switch after each checkbox.  If checked, then toggle the switch.
    */
     $('.checkbox').after(function(){
       if ($(this).is(":checked")) {
         return "<a href='#' class='toggle checked' ref='"+$(this).attr("id")+"'></a>";
       }else{
         return "<a href='#' class='toggle' ref='"+$(this).attr("id")+"'></a>";
       }
       
       
     });
     
     /*
      When the toggle switch is clicked, check off / de-select the associated checkbox
     */
    $('.toggle').click(function(e) {
       var checkboxID = $(this).attr("ref");
       var checkbox = $('#'+checkboxID);

       if (checkbox.is(":checked")) {
         checkbox.removeAttr("checked").change();
       }else{
         checkbox.attr("checked","checked").change();
       }
       $(this).toggleClass("checked");

       e.preventDefault();

    });

    /*
      For demo purposes only....shows/hides checkboxes.
    */
    $('#showCheckboxes').click(function(e) {
     $('.checkbox').toggle()
     e.preventDefault();
    });

	
	// Fade out the save message
	$('.fade').delay(1000).fadeOut(1000);
	
	// Color Picker
	$('.colorSelector').each(function(){
		var Othis = this; //cache a copy of the this variable for use inside nested function
		var initialColor = $(Othis).next('input').attr('value');
		$(this).ColorPicker({
		color: initialColor,
		onShow: function (colpkr) {
		$(colpkr).fadeIn(500);
		return false;
		},
		onHide: function (colpkr) {
		$(colpkr).fadeOut(500);
		return false;
		},
		onChange: function (hsb, hex, rgb) {
		$(Othis).children('div').css('backgroundColor', '#' + hex);
		$(Othis).next('input').attr('value','#' + hex);
	}
	});
	}); //end color picker
	
	// Switches option sections
	$('.group').hide();
	var activetab = '';
	if (typeof(localStorage) != 'undefined' ) {
		activetab = localStorage.getItem("activetab");
	}
	if (activetab != '' && $(activetab).length ) {
		$(activetab).fadeIn();
	} else {
		$('.group:first').fadeIn();
	}
	$('.group .collapsed').each(function(){
		$(this).find('input:checked').parent().parent().parent().nextAll().each( 
			function(){
				if ($(this).hasClass('last')) {
					$(this).removeClass('hidden');
						return false;
					}
				$(this).filter('.hidden').removeClass('hidden');
			});
	});
	
	if (activetab != '' && $(activetab + '-tab').length ) {
		$(activetab + '-tab').parent('li').addClass('current');
	}
	else {
		$('#of-nav li:first').addClass('current');
	}
	$('#of-nav li a').click(function(evt) {
		$('#of-nav li').removeClass('current');
		$(this).parent().addClass('current');
		var clicked_group = $(this).attr('href');
		if (typeof(localStorage) != 'undefined' ) {
			localStorage.setItem("activetab", $(this).attr('href'));
		}
		$('.group').hide();
		$(clicked_group).fadeIn();
		evt.preventDefault();
	});
           					
	$('.group .collapsed input:checkbox').click(unhideHidden);
				
	function unhideHidden(){
		if ($(this).attr('checked')) {
			$(this).parent().parent().parent().nextAll().removeClass('hidden');
		}
		else {
			$(this).parent().parent().parent().nextAll().each( 
			function(){
				if ($(this).filter('.last').length) {
					$(this).addClass('hidden');
					return false;		
					}
				$(this).addClass('hidden');
			});
           					
		}
	}
	
	// Image Options
	$('.of-radio-img-img').click(function(){
		$(this).parent().parent().find('.of-radio-img-img').removeClass('of-radio-img-selected');
		$(this).addClass('of-radio-img-selected');		
	});
		
	$('.of-radio-img-label').hide();
	$('.of-radio-img-img').show();
	$('.of-radio-img-radio').hide();
		 		
	$('.subsection-items').hide();
	$('.subsection > h3').click(function() {
		$(this).siblings('div').fadeToggle();
	});

  $("#section-if_font").change(function() {
    if($(this).find(":selected").val() == 'custom') {
      $('#section-if_custom_font').show();
    } else {
      $('#section-if_custom_font').hide();
    }
  }).change();
  $("#if_show_excerpts").change(function() {
    var toShow = $("#section-if_excerpt_link_text, #section-if_excerpt_length");
    if($(this).is(':checked')) {
      toShow.show();
    } else {
      toShow.hide();
    }
  }).change();

  $("#if_hide_slider_blog").change(function() {
    var toShow = $("#section-if_hide_slider_blog").siblings();
    if($(this).is(':checked')) {
      toShow.hide();
    } else {
      toShow.show();
    }
  }).change();
  $("#if_slider_type").change(function(){
    var val = $(this).val(),
      post = $("#section-if_slider_posts_category"),
      custom = $("#section-if_slider_custom_category");
    if(val == 'custom') {
      post.hide(); custom.show();
    } else {
      post.show(); custom.hide();
    }
  }).change();

  $("#of-option-header div.section-text").each(function(){
    var $this = $(this), $next = $(this).next();
    $this.find(".controls").css({float: 'left', clear: 'both'});
    $next.find(".controls").css({float: 'right', width: 80});
    $next.hide();
    $this.find('.option').before($next.find(".option"));
    $this.find("input[type='checkbox']").change(function() {
      if($(this).is(":checked")) {
        $(this).closest('.option').next().show();
      } else {
        $(this).closest('.option').next().hide();
      }
    }).change();
  });
});	
