$(document).ready(function() {

	// FIX CONTENT_HEIGHT
	resize();
	$(window).on("resize",function(){
		resize();
	});

	/* FILTERS HELICOPTERS */
	$(".helicopter_type").each(function() {
		$(this).on("click", function() {
			var type = $(this).attr("data-type");
			showHelicoptersOfType(type);
		});
	});

	/* SEARCH BAR HELICOPTERS */
	$("input.search_content").on("keyup", function() {
		var value = $(this).val();
		filterHelicoptersByName(value);
	});

	// CHOIX COURS
	$(".subtheme, .course").each(function() {
		$(this).toggleClass('hide'); 
	});
	$(".subtheme_section, .course_section").slideUp(300);
	$(".theme").each(function() {
		$(this).on("click", function() {
			$(".subtheme_section").slideDown(300);
			$(".course_section").slideUp(300);
			var theme = $(this).attr("data-theme");
			$("li.course").slideUp();
			$("li.subtheme, li.course").removeClass('active');
			$(".theme").removeClass('active');
			$(this).addClass('active');
			showSubthemeOfTheme(theme);
		});
	});
	$(".subtheme").each(function() {
		$(this).on("click", function() {
			$(".course_section").slideDown(300);
			var subtheme = $(this).attr("data-subtheme");
			$(".subtheme").removeClass('active');
			$(this).addClass('active');
			showCourseOfSubtheme(subtheme);
		});
	});

	// Deploy arborescence if hash is present

	var navTheme = $.cookie("navigation-theme");
	var navSubTheme = $.cookie("navigation-subtheme");
	var navigationInCookie = navTheme != undefined || navSubTheme != undefined;

	if (navigationInCookie == true) {

		if (navTheme != undefined) {
			// We have just the themes
			$('.theme[data-theme="' + navTheme + '"]').trigger("click");

			if (navSubTheme != undefined) {
				// We have the subtheme
				$('.theme[data-theme="' + navTheme + '"]').trigger("click");
				$('.subtheme[data-theme="' + navTheme + '"][data-subtheme="' + navSubTheme + '"]').trigger("click");
			}
		}
	}


	/* PERCENT */
	$(".percent").each(function() {
		updatePercentValue($(this).find(".percent-value"));
	});

	/* DEMONSTRATIVE COURSE */
	$(".cd_step").each(function() {
		var $title = $(this).find(".title");
		var $percent = $(this).find(".var");
		$(this).on("click", function() {
			$(this).toggleClass("activated"); // Allow user to show a previous step

			if ($(this).hasClass("activated") == true) {
				immersiveApp.showItem( $(this).attr("data-btn-name"), $(this).attr("data-btn-state") );
			}
		});
	});	

	/* IMMERSIVE MOVIE */
	$(".schema_image_plus").on("click", function() {
		$(this).toggleClass("close", 300, "easeInOutQuad");
		$(".schema_image_wrap").toggleClass("close", 300, "easeInOutQuad");
	});	

	/* PRACTICAL TRAINING */
	$(".ep_list_wrap h3").on("click", function() {
		$(".ep_list_wrap").toggleClass("ep_list_opened", 300, "easeInOutQuad"); // Allow user to show a previous step
	});	


	/* PRACTICAL TRAINING : Check if new users are presents */
	if (typeof checkPilotsUrl !== 'undefined') {

		// Get current pilots
		var currentPilots = [];

		// Fill the array with the if of the pilots currently displayed
		$(".pilot[data-pilot-id]").each(function() {
			currentPilots.push(parseInt($(this).attr("data-pilot-id")));
		});

		var templateEPPilot = $('#template-ep-pilot').html();

		// Each x milliseconds, check for new pilots
		setInterval(function() {
			(function(url, currentPilots, templateEPPilot) {
				// Make the HTTP request to the REST API
				$.ajax(url).done(function(results) {
					var pilots = results.data;
					var pilot;
					var refreshedPilots = []; // used to detect if a pilot has been deleted

					for (i in pilots) {
						pilot = pilots[i];
						refreshedPilots.push(pilot.id);
						if ($.inArray(pilot.id, currentPilots) == -1) { // Pilot has not been currently added
							currentPilots.push(pilot.id);
							addPilotToEP(templateEPPilot, pilot);
						}
					}

					var diff = $(currentPilots).not(refreshedPilots).get();
					for (i in diff) {
						$(".pilot[data-pilot-id=" + diff[i] + "]").slideUp(200, function() {
							$(this).remove();
						});
						currentPilots = currentPilots.splice( $.inArray(diff[i], currentPilots), 1 ); // remove id from current pilots list
					}

					updatePilotsValues(pilots);
					sortPilots();
				});
			})(checkPilotsUrl, currentPilots, templateEPPilot);
		}, 3000);

		sortPilots();

	} // End if checkPilotsUrl

	/* PRACTICAL TRAINING PILOT VIEW */
	$(".favorite").on("click", function() {
		var url = editResultUrl.replace("0", $(this).parent().attr("data-step-id"));
		var $favorite = $(this);
		$.ajax({
		  url: url,
		  type: "PUT",
		  data: { "result[isFavorite]": !$(this).hasClass("is_favorite")  }
		}).done(function(e) {
			$favorite.toggleClass("is_favorite");
			console.log(e, $favorite);
		});
	});

});

function updatePercentValue($el) {
	var percent = $el.attr("data-percent");
	$el.animate({width: percent + "%"}, 200);
	// $el.css("width", percent + "%");
}

function sortPilots() {
	var $Ul = $('.pilot_list');
	$Ul.css({position:'relative',height:$Ul.height(),display:'block'});
	var iLnH;
	var $Li = $('.pilot_list > a');

	$Li.each(function(i,el){
		var iY = $(el).position().top;
		$.data(el,'h',iY);
		if (i===1) iLnH = iY;
		// console.log($(el).find('.pilot').attr('data-pilot-id'));
	});


	$LiSorted = $Li.sort(function(a,b){ 
		var aId = $(a).find("*[data-call-time]").attr('data-call-time');
		var bId = $(b).find("*[data-call-time]").attr('data-call-time');

		var aActive = $(a).find("*[data-call-time]").hasClass("active");
		var bActive = $(b).find("*[data-call-time]").hasClass("active");

		var returnValue = null;

		if (aActive == true && bActive == false) {
			returnValue = -1;
		}
		if (aActive == false && bActive == true) {
			returnValue = 1;
		}
		if (aActive == false && bActive == false) {
			returnValue = 0;
		}
		// console.log($(a).find('.pilot').attr("data-pilot-id"), aId, aActive, $(b).find('.pilot').attr("data-pilot-id"), bId, bActive, returnValue == null ? bId - aId : returnValue );
		return returnValue == null ? aId - bId : returnValue;
	});


	$LiSorted.each(function(i,el){
		var $El = $(el);
		var iFr = $.data(el,'h');
		var iTo = i*iLnH;
		$El.css({position:'absolute',top:iFr, left:0, right:0}).animate({top:iTo},1000);
		// console.log($El.find('.pilot').attr('data-pilot-id'));
	});

	setTimeout(function() {
		$Ul.empty();
		$Ul.append($LiSorted);
		// $LiSorted.css({position: 'static', top:'auto', left: 'auto'});
	}, 1000);
}

function updatePilotsValues(pilots) {
	for (var i in pilots) {
		updatePilotValues(pilots[i]);
	}
}

function updatePilotValues(pilot) {
	var $ul = $(".pilot_list");
	var $a = $ul.find("*[data-pilot-id=" + pilot.id + "]").parent();

	var $percentProgression = $a.find(".step .percent-value");
	var $stepName = $a.find(".step .title");
	var $pilotSuccess = $a.find(".success span");
	var $pilotErrors = $a.find(".errors span");
	var $call = $a.find(".call span");

	if (pilot.current_step == null) {
		$percentProgression.attr("data-percent", 0);
		$stepName.html("Pilot has not started");
	} else {
		$percentProgression.attr("data-percent", pilot.current_step.percent_in_course);
		updatePercentValue($percentProgression);
		$stepName.html(pilot.current_step.name);
	}

	$pilotSuccess.html(pilot.nb_success);
	$pilotErrors.html(pilot.nb_errors);

	if (pilot.is_calling == true) {
		$call.addClass("active");
		$call.attr("data-call-time", new Date(pilot.date_calling).getTime());
	} else {
		$call.removeClass("active");
	}
}

function addPilotToEP(template, pilot) {
	var rendered = Mustache.render(template, {
		"pilotId": pilot.id,
		"pilotName": pilot.name,
		"pilotCenteredPath": viewPilotUrl.replace("pilotId", pilot.id),
		"pilotSuccess": pilot.nb_success,
		"pilotErrors": pilot.nb_errors,
		"percentProgression": pilot.current_step == null ? 0 : pilot.current_step.percent_in_course,
		"stepName": pilot.current_step == null ? "Pilot has not started" : pilot.current_step.name,
		"callIsActive": pilot.is_calling == true ? 'class="active"' : '',
		"callTime": pilot.date_calling,
	});

  	var $rendered = $(rendered).insertAfter($('.pilot_list a:last-of-type'));
  	$rendered.find(".pilot").css("display", "none");
  	$rendered.find(".pilot").slideDown(200);

	updatePercentValue($rendered.find('.percent-value'));

}

function resize() {
	var header_height = $("#header").height();
	var total_height = $("body").height();
	$("#content").height(total_height - header_height);
	$(".cm_embed").height(total_height - header_height);
}


function showHelicoptersOfType(type) {
	$("a[data-type]").each(function() {
		if ($(this).attr("data-type") == type) {
			showHelicopter($(this));
		} else {
			hideHelicopter($(this));
		}
	});
}

function showHelicopter($helicopter) {
	$helicopter.css("display", "block");
}

function hideHelicopter($helicopter) {
	$helicopter.css("display", "none");
}

function filterHelicoptersByName(name) {
	$("a[data-type]").each(function() {
		if ($(this).attr("data-name").toLowerCase().indexOf(name.toLowerCase()) > -1) {
			showHelicopter($(this));
		} else {
			hideHelicopter($(this));
		}
	});
}

function showSubthemeOfTheme(theme) {

	$.cookie("navigation-theme", theme);

	$("li.subtheme[data-theme]").each(function() {
		if ($(this).attr("data-theme") == theme) {
			$(this).slideDown(300);
		}
		else {
			$(this).slideUp(300);
		}
	});
}
function showCourseOfSubtheme(subtheme) {
	
	$.cookie("navigation-subtheme", subtheme);

	$("li.course[data-subtheme]").each(function() {
		if ($(this).attr("data-subtheme") == subtheme) {
			$(this).slideDown(300);
		}
		else {
			$(this).slideUp(300);
		}
	});
}

var IAClass = function() {
	this.showItem = function(name, state) {


		console.log("On immersive app, show", name, "on position", state);

		u.getUnity().SendMessage("NETWORK", "SetAsInstructor", "");
		u.getUnity().SendMessage("NETWORK", "SetActive", name);

	};
};

var immersiveApp = new IAClass();