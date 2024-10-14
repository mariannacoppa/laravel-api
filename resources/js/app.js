import "./bootstrap";
import "~resources/scss/app.scss";
import "~icons/bootstrap-icons.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**"]);
// recupero i  pulsanti di cancellazione nel view
const deleteButtons = document.querySelectorAll(".delete-project");
// ciclo i pulsanti
deleteButtons.forEach((button) => {
    // aggiungo l'evento click ad ogni pulsante di cancellazione
    button.addEventListener("click", function (event) {
        // in modo da non eseguire l'operazione di default
        event.preventDefault();
        // recero la modale
        const modal = document.getElementById("deleteProjectModal");
        // rendo la modale di bootstrap usandola come template per la classe modal di Bootstrap
        const bootstrapModal = new bootstrap.Modal(modal);
        // mostro la modale
        bootstrapModal.show();
        // recupero il pulsantedi conferma di cancellazione e gli assegno l'evento click
        document
            .querySelector(".confirm-delete")
            .addEventListener("click", function () {
                // invio la form
                button.parentElement.submit();
            });
    });
});
