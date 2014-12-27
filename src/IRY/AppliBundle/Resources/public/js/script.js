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

	/* PERCENT */
	$(".percent").each(function() {
		var $element = $(this).find("span");
		var percent = $element.attr("data-percent");
		$element.css("width", percent + "%");
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

	/* PRACTICAL TRAINING */
	$(".ep_list_wrap").on("click", function() {
		$(this).toggleClass("ep_list_opened"); // Allow user to show a previous step
	});	

	/* PRACTICAL TRAINING : Check if new users are presents */

	// Get current pilots
	var currentPilots = [];

	$(".pilot[data-pilot-id]").each(function() {
		currentPilots.push(parseInt($(this).attr("data-pilot-id")));
	});

	var templateEPPilot = $('#template-ep-pilot').html();

	setInterval(function() {

		(function(url, currentPilots, templateEPPilot) {

			$.ajax(url).done(function(results) {
				var pilots = results.data;
				var pilot;
				var refreshedPilots = []; // used to detect if a pilot has been deleted

				for (i in pilots) {
					pilot = pilots[i];

					refreshedPilots.push(pilot.id);
					
					if ($.inArray(pilot.id, currentPilots) == -1) { // Pilot has not been currently
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

			});

		})(checkPilotsUrl, currentPilots, templateEPPilot);

	}, 1000);



});

function addPilotToEP(template, pilot) {
	var rendered = Mustache.render(template, {
		"pilotId": pilot.id,
		"pilotName": pilot.name,
		"pilotCenteredPath": viewPilotUrl.replace("pilotId", pilot.id),
	});

  	var $rendered = $(rendered).insertAfter($('.pilot_list .pilot:last-of-type'));
  	$rendered.find(".pilot").css("display", "none");
  	$rendered.find(".pilot").slideDown(200);
}

function resize() {
	var header_height = $("#header").height();
	var total_height = $("body").height();
	$("#content").height(total_height - header_height);
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