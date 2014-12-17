$(document).ready(function() {
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
			$(this).toggleClass('activated'); // Allow user to show a previous step
			// $title.css("color", "#a8a8a7");
			// $percent.css("background", "#a8a8a7");
		});
	});	

});

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