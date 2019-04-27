function initNumericValidation() {
	$(".numeric").numeric();
	$(".integer").numeric(false, function() { alert("Integers only"); this.value = ""; this.focus(); });
	$(".positive").numeric({ negative: false }, function() { alert("No negative values"); this.value = ""; this.focus(); });
	$(".positive-integer").numeric({ decimal: false, negative: false }, function() { alert("Positive integers only"); this.value = ""; this.focus(); });
	$(".decimal-2-places").numeric({ negative: false, decimalPlaces: 2 });
	$(".alternative-decimal-separator").numeric({ altDecimal: "," });
	$(".alternative-decimal-separator-reverse").numeric({ altDecimal: ".", decimal : "," });
}

initNumericValidation();