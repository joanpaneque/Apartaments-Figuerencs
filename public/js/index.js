$.datepicker.regional["ca"] = {
    monthNames: ["gener", "febrer", "març", "abril", "maig", "juny",
        "juliol", "agost", "setembre", "octubre", "novembre", "desembre"],
    monthNamesShort: ["gen", "feb", "març", "abr", "maig", "juny",
        "jul", "ag", "set", "oct", "nov", "des"],
    dayNames: ["diumenge", "dilluns", "dimarts", "dimecres", "dijous", "divendres", "dissabte"],
    dayNamesShort: ["dg", "dl", "dt", "dc", "dj", "dv", "ds"],
    dayNamesMin: ["dg", "dl", "dt", "dc", "dj", "dv", "ds"],
    dateFormat: "dd/mm/yy",
    firstDay: 1,
    showMonthAfterYear: false,
};
$.datepicker.setDefaults($.datepicker.regional['ca']);

$("#date-entry").datepicker({ minDate: 0, maxDate: "+1M +10D" });
$("#date-exit").datepicker({ minDate: 0, maxDate: "+1M +10D" });