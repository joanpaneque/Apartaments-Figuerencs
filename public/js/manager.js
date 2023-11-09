// Select all elements that has section attribute with jquery
$('[section]').on('click', e => {
    update();
    console.log(e.target.getAttribute('section'));
    // Hide all elements with sectionid attribute
    $('[sectionid]').hide();
    // Show element with sectionid attribute that matches the section attribute of the clicked element
    $('[sectionid="' + e.target.getAttribute('section') + '"]').show();
});

// Show the first element with sectionid attribute
$('[sectionid]').first().show();

$("#manager-add-user").click(e => {
    // Remove all alerts
    $(".alert").remove();
    const form = $("#manager-user-registration");

    // send POST to ?r=register with form data
    console.log(form.serialize());
    $.get("?r=register", form.serialize(), data => {
        if (data) {
            form.trigger("reset");
            form.prepend("<div class='alert alert-success'>User added successfully!</div>");
        } else {
            form.prepend("<div class='alert alert-danger'>User could not be added!</div>");
        }
        update();
    });
});

update();




function update() {
    $("#manager-users").empty();
    $("#manager-users").append(`
    <table id="manager-users-table" class="table table-striped table-bordered table-hover">
        <thead> <!-- Use thead tag for table header -->
            <tr>
                <th>Nom</th>
                <th>Cognoms</th>
                <th>Correu</th>
                <th>Telefon</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    `);
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "?r=users",
        data: {},
        success: users => {
            console.log(users);
            users.forEach(user => {
                $("#manager-users tbody").append(`
                <tr>
                    <td>${user.name}</td>
                    <td>${user.surname}</td>
                    <td>${user.email}</td>
                    <td>${user.phone}</td>
                </tr>
                `);
            });
            $("#manager-users-table").DataTable({
                "language": {
                    "decimal": "",
                    "emptyTable": "No hi ha dades disponibles a la taula",
                    "info": "Mostrant _START_ a _END_ de _TOTAL_ entrades",
                    "infoEmpty": "Mostrant 0 a 0 de 0 entrades",
                    "infoFiltered": "(filtrades d'un total de _MAX_ entrades)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ entrades",
                    "loadingRecords": "Carregant...",
                    "processing": "Processant...",
                    "search": "Cerca:",
                    "zeroRecords": "No s'han trobat registres coincidents",
                    "paginate": {
                        "first": "Primer",
                        "last": "Darrer",
                        "next": "Següent",
                        "previous": "Anterior"
                    },
                    "aria": {
                        "sortAscending": ": activar per ordenar la columna ascendentment",
                        "sortDescending": ": activar per ordenar la columna descendentment"
                    }
                }
            });
        }
    })


    $("#manager-apartments").empty();
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "?r=managerApartments",
        data: {},
        success: data => {
            console.log(data);
            data.forEach(apartment => {
                $("#manager-apartments").append(`

                <div class="card" style="width: 18rem;">
                    <img src="${apartment.images[0]}" class="card-img-top apartment-image" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">${apartment.title}</h5>
                        <p class="card-text">${apartment.short_description}</p>
                        <a href="#" class="btn btn-primary">Editar</a>
                        <a href="?r=deleteApartment&apartment_code=${apartment.code}" class="btn btn-primary">Eliminar</a>
                    </div>
                </div>
                `);
            });
        },
        error: error => {
            console.log(error.responseText);
        }
    });
}
