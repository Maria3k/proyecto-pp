function fecthAsks(e, page) {
    window.localStorage.setItem("page", page)

    let cant = 1;
    $.ajax({
        url: "asks.php",
        type: "POST",
        data: { e, page: page * 10 },
        success: response => {
            let plantilla = '';

            cant = JSON.parse(response).pages;
            JSON.parse(response).rtas.forEach(ask => {
                plantilla += `
                    <img src="${ask.avatar}" alt="${ask.avatarName}" title="${ask.nombre} ${ask.apellido}" width="50px" height="50px">${ask.nickname} || ${ask.fecha}
                    <h5>${ask.asunto}</h5>
                    <p>${ask.contenido}</p>

                    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight${ask.id}" aria-controls="offcanvasRight${ask.id}"><i class="fa-solid fa-plus"></i></button><?= $ad; ?><br>

                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight${ask.id}" aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body" style="overflow:hidden;">
                        <img src="${ask.avatar}" alt="${ask.avatarName}" title="${ask.nombre} ${ask.apellido}" width="50px" height="50px">
                        <h5>${ask.asunto}</h5>
                        <p>${ask.contenido}</p>
                        <form id="rta-form${ask.id}">
                        <input id="preguntaId${ask.id}" type="hidden" value="${ask.id}">
                        <textarea id="content${ask.id}" class="form-control my-2" placeholder="Dejar un comentario" required></textarea>
                        </form>
                        <button class="btn btn-primary submitRta" value="${ask.id}">Enviar</button>
                        <div id="rtasDiv${ask.id}" class="rtasDiv"></div>
                    </div>
                    </div>
                    
                `
                fecthRtas(ask.id);
            });
            $("#ask").html(plantilla);


            if (cant > 1) {
                let pagination = `
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center py-2">
                `;
                for (let i = 1; i <= cant; i++) {
                    pagination += `
                        <li class="page-item"><a class="page-link" href="#${i}" value="${i}">${i}</a></li>
                `
                }
                pagination += `
                    </ul>
                </nav>
                `
                document.getElementById("pages").innerHTML = pagination;
            }


        }
    })
}

function searchAsks(clave, e) {
    let cant = 1;
    $.ajax({
        url: "asks.php",
        type: "POST",
        data: {
            e,
            clave
        },
        success: response => {
            cant = JSON.parse(response).pages;
            let plantilla = '';
            console.log(response);
            if (JSON.parse(response).rtas.length != 0) {
                JSON.parse(response).rtas.forEach(ask => {
                    plantilla += `
                        <img src="${ask.avatar}" alt="${ask.avatarName}" title="${ask.nombre} ${ask.apellido}" width="50px" height="50px">${ask.nickname} || ${ask.fecha}
                        <h5>${ask.asunto}</h5>
                        <p>${ask.contenido}</p>
    
                        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight${ask.id}" aria-controls="offcanvasRight${ask.id}"><i class="fa-solid fa-plus"></i></button><?= $ad; ?><br>
    
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight${ask.id}" aria-labelledby="offcanvasRightLabel">
                        <div class="offcanvas-header">
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body" style="overflow:hidden;">
                            <img src="${ask.avatar}" alt="${ask.avatarName}" title="${ask.nombre} ${ask.apellido}" width="50px" height="50px">
                            <h5>${ask.asunto}</h5>
                            <p>${ask.contenido}</p>
                            <form id="rta-form${ask.id}">
                            <input id="preguntaId${ask.id}" type="hidden" value="${ask.id}">
                            <textarea id="content${ask.id}" class="form-control my-2" placeholder="Dejar un comentario" required></textarea>
                            </form>
                            <button class="btn btn-primary submitRta" value="${ask.id}">Enviar</button>
                            <div id="rtasDiv${ask.id}" class="rtasDiv"></div>
                        </div>
                        </div>
                        
                    `
                    fecthRtas(ask.id);
                });
            } else {
                plantilla += `<h1>Ninguna coincidencia encontrada para: ${clave}</h1>`;
            }
            $("#ask").html(plantilla);


            if (cant > 1) {

                let pagination = `
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center py-2">
                        <li class="page-item prev">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                        </li>
                `;
                for (let i = 1; i <= cant; i++) {
                    pagination += `
                        <li class="page-item"><a class="page-link" href="#">${i}</a></li>
                `
                }
                pagination += `
                        <li class="page-item">
                            <a class="page-link next" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                `
                document.getElementById("pages").innerHTML = pagination;
            } else {
                document.getElementById("pages").innerHTML = null;
            }

        }
    })

}

function fecthRtas(id) {
    $.ajax({
        url: "rtas.php",
        type: "POST",
        data: { id },
        success: response => {
            let plantilla = '';
            JSON.parse(response).forEach(rta => {
                plantilla += `
                    <div id="rta${rta.id}">
                        <img src="${rta.avatar}" alt="${rta.avatarName}" title="${rta.nombre} ${rta.apellido}" width="50px" height="50px">
                        ${rta.nickname} || ${rta.fecha}
                        <p>${rta.contenido}</p>
                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#subrtaCollapse${rta.id}" aria-expanded="false" aria-controls="collapseExample">
                        +
                        </button>
                        <div class="collapse" id="subrtaCollapse${rta.id}">
                        <div id="subRtaDiv${rta.id}" class="card card-body">
                        </div>
                        </div>
                    </div>
                `;
                fecthsubRtas(rta.id);
            });
            $("#rtasDiv" + id).html(plantilla);
        }
    })
}

function fecthsubRtas(id) {
    $.ajax({
        url: "subrtas.php",
        type: "POST",
        data: { id },
        success: response => {
            let plantilla = '';
            JSON.parse(response).forEach(subrta => {
                plantilla += `
          <div id="subrta${subrta.id}">
            <img src="${subrta.avatar}" alt="${subrta.avatarName}" title="${subrta.nombre} ${subrta.apellido}" width="50px" height="50px">
            ${subrta.nickname} || ${subrta.fecha}
            <p>${subrta.contenido}</p>
          </div>
          `;
            });
            $("#subRtaDiv" + id).html(plantilla);
        }
    })
}

function submitRta(userState) {
    let rtaData = {
        e: 1,
        pregunta: $(this).siblings("#rta-form" + $(this).val()).children("#preguntaId" + $(this).val()).val(),
        respuesta: $(this).siblings("#rta-form" + $(this).val()).children("#content" + $(this).val()).val()
    };

    console.log($(this).siblings("#rta-form" + $(this).val()).children("#preguntaId" + $(this).val()).val());
    console.log($(this).siblings("#rta-form" + $(this).val()).children("#content" + $(this).val()).val());
    if ($("#content" + $(this).val()).val() == '') {
        alert("ESTA VACIO");
    } else {
        if (userState == 1) {
            $.post("respuesta.php", rtaData, () => {
                notification();
                fecthAsks();
                $("#rta-form").trigger("reset");
            });

        } else {
            window.location.href = "login.php";
        }
    }
}

function submitAsk(e) {
    let postData = {
        asunto: $("#asunto").val().trim(),
        pregunta: $("#contenido").val().trim()
    };

    $.post("computacion.php", postData, response => {
        fecthAsks();
        $("#ask-form").trigger('reset');
    }); 

}