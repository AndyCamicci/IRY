$(document).ready(function() {

	// Members page

	/* Display members on click on pole */
	var $poleTitle = $(".pole-title");
	var $poleCitation = $(".pole-citation");
	var $poleCitationAuteur = $poleCitation.find("cite");

	var pole, title, citation, citationAuteur;
	$(".poles .pole").on("click", function(e) {
		$(".poles .pole").removeClass("active");
		pole = $(this).attr("data-pole");
		$(".poles-membres .pole").addClass("hide");
		$(".poles-membres .pole." + pole).removeClass("hide");
		$(this).addClass("active");

		$poleTitle.html($(this).attr("data-title"));
		$poleCitation.html($(this).attr("data-citation"));
		$poleCitationAuteur.html($(this).attr("data-citation-auteur")).appendTo($poleCitation);

		$(".poles-membres .pole." + pole).find(".membre:first-child").trigger("click");
	});

	/* Display member informations on click */
	var $membreSelectionne = $(".membre-selectionne");
	var $mS_name = $membreSelectionne.find("h2");
	var $mS_formation = $membreSelectionne.find(".formation");
	var $mS_description = $membreSelectionne.find(".description");

	var name, promo, description;
	$(".poles-membres .membre").on('click', function(e) {
		name = $(this).attr("data-name");
		promo = $(this).attr("data-promo");
		description = $(this).attr("data-description");
		$mS_name.html(name);
		$mS_formation.html(promo);
		$mS_description.html(description);
		$(".poles-membres .membre").removeClass("active");
		$(this).addClass("active");
	});

	// Initialisation 
	$(".poles .pole.pole-gestion").trigger("click");
	$(".poles-membres .pole.pole-gestion").find(".membre:first-child").trigger("click");


	// Remerciements page

	var $goToAirbus = $(".remerciements-globaux .airbus");
	var $goToIngemedia = $(".remerciements-globaux .ingemedia");
	var $backToGlobal = $(".remerciements .back-btn");

	var $sectionContainer = $(".remerciements");
	var $sectionGlobal = $(".remerciements-globaux");
	var $sectionAirbus = $(".remerciements-airbus");
	var $sectionIngemedia = $(".remerciements-ingemedia");

	$goToAirbus.bind("click", function(e) {
		$sectionGlobal.addClass("hide");
		$sectionAirbus.removeClass("hide");
		$sectionContainer.removeClass('bg-ingemedia');
		$sectionContainer.addClass('bg-airbus');
		e.preventDefault();
	});

	$goToIngemedia.bind("click", function(e) {
		$sectionGlobal.addClass("hide");
		$sectionIngemedia.removeClass("hide");
		$sectionContainer.removeClass('bg-airbus');
		$sectionContainer.addClass('bg-ingemedia');
		e.preventDefault();
	});

	$backToGlobal.bind("click", function(e) {
		$sectionIngemedia.addClass("hide");
		$sectionAirbus.addClass("hide");
		$sectionGlobal.removeClass("hide");
		$sectionContainer.removeClass('bg-ingemedia');
		$sectionContainer.removeClass('bg-airbus');
		e.preventDefault();
	});


});