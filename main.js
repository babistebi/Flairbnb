   function validate() {
        let psw1 = document.getElementById('psw').value;
        let psw2 = document.getElementById('psw-repeat').value;

        if (psw1 != psw2) 
        {
            alert('Passwords did not match');
            window.location = "index.html";
        }
    }   

 /*// Rufen Sie das Modal-Element ab
let modal = document.getElementById('id01');

// Fügen Sie einen Event-Listener für Klicks auf den Body hinzu
document.body.addEventListener('click', function(event) {
    // Überprüfen Sie, ob das geklickte Element außerhalb des Modals ist
    if (event.target === modal) {
        // Schließen Sie das Modal
        modal.style.display = 'none';
    }
});*/

// Slideshow

