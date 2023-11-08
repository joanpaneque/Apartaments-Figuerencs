import FloatingWindow from "./FloatingWindow.js";

// Configure the datepicker widget to use Catalan language
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

// Instances of the datepicker widgets with the proper configuration
$("#date-entry").datepicker({ minDate: 0 });
$("#date-exit").datepicker({ minDate: 0 });

// Set date entry value to today
$("#date-entry").val(currentDate());
$("#date-exit").val(currentDate(1));

// If date-entry is changed, we update the minDate of date-exit plus one day
$("#date-entry").on("change", e => {
    const date = $("#date-entry").datepicker("getDate");
    date.setDate(date.getDate() + 1);
    $("#date-exit").datepicker("option", "minDate", date);
});

const travelers = new FloatingWindow($("#people"));

// All traveler types are treated the same way, but make three if we want
// to change the behavior of one of them in the future
const travelerTypes = [
    { name: "Adults", description: "13 anys o més", adult: true, default: 1 },
    { name: "Nens", description: "De 2 a 12 anys", canGoAlone: false },
    { name: "Nadons", description: "Menys de 2 anys", canGoAlone: false }
];

travelers.setContent(travelerTypes.map(travelerType => `
    <div class="traveler-type" ${travelerType.adult ? "data-adult" : ""} ${travelerType.canGoAlone ? "data-cangoalone" : ""}>
        <div class="traveler-info">
            <div class="traveler-name">${travelerType.name}</div>
            <div class="traveler-description">${travelerType.description}</div>
        </div>
        <div class="traveler-selector">
            <div class="traveler-remove disabled">
                <img src="/assets/svg/minus-small.svg" alt="restar" >
            </div>
            <div class="traveler-number">${travelerType.default ?? 0}</div>
            <div class="traveler-add ${travelerType.canGoAlone || travelerType.adult ? "" : "disabled"}">
                <img src="/assets/svg/plus-small.svg" alt="sumar">
            </div>
        </div>
    </div>
`));

var totalTravelers = 1;
var totalAdults = 1;
var totalChildren = 0;

travelers.event("click", ".traveler-add", e => {
    if ($(e.currentTarget).hasClass("disabled")) return;
    const travelerNumber = $(e.currentTarget).siblings(".traveler-number");
    const number = parseInt(travelerNumber.text());
    travelerNumber.text(number + 1);

    // We remove the disabled class from the remove button
    $(e.currentTarget).siblings(".traveler-remove").removeClass("disabled");

    // We update the total number of travelers
    totalTravelers++;
    travelers.setValue(totalTravelers);
    const isAdult = $(e.currentTarget).parent().parent().attr("data-adult") != undefined;

    // add total adults or children depending on the type of traveler is clicked
    if (isAdult) {
        totalAdults++;
    } else {
        totalChildren++;
        if (totalAdults == 1) {
            travelers.$(".traveler-type[data-adult] .traveler-remove").addClass("disabled");
        }
    }

    if (totalTravelers == 9) {
        // We add the disabled class to all the add buttons
        travelers.$(".traveler-add").addClass("disabled");
        return;
    }

    if (totalAdults > 0) {
        // We remove the disabled class from the children add button
        travelers.$(".traveler-type .traveler-add").removeClass("disabled");
    }

    if (totalAdults == 1) {
        travelers.$(".traveler-type[data-adult] .traveler-remove").addClass("disabled");
    }
});

travelers.event("click", ".traveler-remove", e => {
    if ($(e.currentTarget).hasClass("disabled")) return;

    // We remove all disabled classes from the add buttons
    travelers.$(".traveler-add").removeClass("disabled");

    const travelerNumber = $(e.currentTarget).siblings(".traveler-number");
    const number = parseInt(travelerNumber.text());
    if (number == 0) return;
    travelerNumber.text(number - 1);
    // If the number of travelers is 0, we disable the remove button
    if (number - 1 === 0) {
        $(e.currentTarget).addClass("disabled");
    }

    // We update the total number of travelers
    totalTravelers--;
    travelers.setValue(totalTravelers);
    const isAdult = $(e.currentTarget).parent().parent().attr("data-adult") != undefined;

    // add total adults or children depending on the type of traveler is clicked
    if (isAdult) {
        totalAdults--;
        if (totalAdults == 1 && totalChildren > 0) {
            travelers.$(".traveler-type[data-adult] .traveler-remove").addClass("disabled");
        }
        if (totalAdults == 0) {
            // Add disabled class to the add button of all traveler types that are not adults and can't go alone
            travelers.$(".traveler-type:not([data-adult]):not([data-cangoalone]) .traveler-add").addClass("disabled");
        }
    } else {
        totalChildren--;
        if (totalChildren == 0) {
            // Remove disabled class from the adult remove button only if there is at least one adult on that traveler type
            // Iterate all traveler types that are adults
            travelers.$(".traveler-type[data-adult] .traveler-remove").each((index, element) => {
                // If the traveler type has at least one adult, remove the disabled class
                if ($(element).siblings(".traveler-number").text() > 0) {
                    $(element).removeClass("disabled");
                }
            });
        }
    }

    if (totalAdults == 1) {
        travelers.$(".traveler-type[data-adult] .traveler-remove").addClass("disabled");
    }
});

const dateForm = $("#date-form");

dateForm.on("change", e => {
    let entries = {};
    $("#date-form input").each((index, element) => {
        entries[element.name] = element.value;
    });


    entries["date-entry"] = DDMMYYYYToYYYYMMDD(entries["date-entry"]);
    entries["date-exit"] = DDMMYYYYToYYYYMMDD(entries["date-exit"]);

    updateApartments(entries);
});


function DDMMYYYYToYYYYMMDD(DDMMYYYY) {
    return DDMMYYYY.split("/").reverse().join("-");
}


function DDMMYYYY(date) {
    return date.getDate() + "/" + (date.getMonth() + 1) + "/" + date.getFullYear();

}

function currentDate(plusDays = 0) {
    const date = new Date();
    date.setDate(date.getDate() + plusDays);
    return DDMMYYYY(date);
}

updateApartments({ "date-entry": currentDate(), "date-exit": currentDate(1), "people": 1 });

function updateApartments(entries) {
    $.ajax({
        url: "?r=apartments",
        method: "POST",
        data: entries,
        success: data => {
            if (data.error) {
                console.error(data.error);
                return;
            }

            console.log(data);
            const apartments = JSON.parse(data);
            $("#apartments").empty();
            $("#carousel-index").empty();
            apartments.apartments.forEach(apartment => {
                const apartmentElement = $(`
                    <article class="apartment">
                        <div class="apartment-image">
                            <img class="" src="${apartment.images[0]}" alt="Imatge del apartament '${apartment.title}'">
                        </div>
                        <div class="apartment-info">
                            <div class="apartment-line">
                                <div class="apartment-description">${apartment.title}</div>
                            </div>
                            <div class="apartment-line">
                                <div class="apartment-rooms">${apartment.rooms} habitacions</div>
                            </div>
                            <div class="apartment-price">€ ${apartment.price_peak_season}</div>
                        </div>
                    </article>
                `);

                apartmentElement.on("click", e => {
                    window.location.href = `?r=house&id=${apartment.code}&date-entry=${entries["date-entry"]}&date-exit=${entries["date-exit"]}&people=${entries["people"]}`;
                });

                // Test

                $("#apartments").append(apartmentElement);

                var carouselApartment = $("<div class='carousel-item'></div>");
                carouselApartment.html(`
                    <img src="${apartment.images[0]}" class="d-block w-100" alt="Imatge del apartament '${apartment.title}'">                
                `);

                carouselApartment.click(() => {
                    const modalApartment = $(`
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Reserva</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    


                                    <div class="modal-body">

                                        <div class="apartment-image">
                                            <img class="" src="${apartment.images[0]}" alt="Imatge del apartament '${apartment.title}'">
                                        </div>

                                        <div class="apartment-info">
                                            <div class="apartment-title">
                                                <h3>${apartment.title}</h3>
                                            </div>

                                            <div class="apartment-line">
                                                <div class="apartment-rooms">${apartment.rooms} habitacions</div>
                                            </div>
                                            <div class="apartment-price">${apartment.price_peak_season}€</div>
                                            <div class="apartment-meters">${apartment.square_meters} m²</div>
                                        </div>
                                    </div>



                                    <div class="modal-footer">
                                        <a href="?r=house&id=${apartment.code}&date-entry=${entries["date-entry"]}&date-exit=${entries["date-exit"]}&people=${entries["people"]}">
                                        <button type="button" class="btn btn-primary">Completar reserva</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `);

                    // Afegir modalApartment al cos del document
                    modalApartment.appendTo("body");

                    // Mostra el modal
                    modalApartment.modal("show");
                });

                $("#carousel-index").append(carouselApartment);

            });

            $("#carousel-index div:first-child").addClass("active");



        }
    });
}