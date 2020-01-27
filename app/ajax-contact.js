
var app = {
    init: function() {
        app.gestionForm();
    },

    // Gestion du formulaire
    gestionForm: function() {
        // Change la bordure de l'input et du textarea lors du focus
        $('input').focus(function() {
            $(this).css('border', '3px solid #D4AF37');
        });

        $('textarea').focus(function() {
            $(this).css('border', '3px solid #D4AF37');
        });

        // Enleve la bordure lors de la perte du focus de l'input ou textarea
        $('input').blur(function() {
            $(this).css('border', 'none');
        });

        $('textarea').blur(function() {
            $(this).css('border', 'none');
        });

        // Si une requête est en cours
        var busy = null;
        // Soumission du formulaire
        $('form').submit(function(e) {
            e.preventDefault();

            // Initialisation des variables du formulaire
            var error = false;
            var errorMsg = "<span class='errorMsg'>Le champ est vide</span><br\>";
            var noValidMail = "<span class='errorMsg'>L'adresse mail n'est pas valide</span>";
            var form = $(this);
            var elm = [];
            var inputName = form.find('input[name=name]');
            var inputEmail = form.find('input[name=email]');
            var textarea = form.find('textarea'); 
            elm.push(inputName, inputEmail, textarea);

            // On boucle sur les champs du form
            $(elm).each(function(i) {
                // Vérification au niveau des inputs
                if( $.trim($(this).val() ) == '') {
                    $(this).after(' ');
                    $(this).css('border', '3px solid #ff0000');
                    error = true;
                    $(this).after(errorMsg);
                // Verification adresse mail
                } else if (i == '1') {
                    if(!app.isEmail($(this).val())) {
                        error = true;
                        inputEmail.css('border', '3px solid #ff0000')
                        inputEmail.after(noValidMail);
                    }
                }
            });
      
            // Si pas d'erreur
            if( !error ) {
                // Evite plusieurs soumission du formulaire simultannée
                if (busy) {
                    busy.abort();
                }

                // Appel Ajax
                busy = $.ajax({
                    url: adminAjax,
                    type: 'POST',
                    data: form.serialize(),
                    success: function(response) {                       
                        if( response == 'success') {
                            // On vide le formulaire
                            form[0].reset();
                            // Le form disparait
                            $('.contact').children().hide(2000, 'linear');
                            // On affiche un message de succès
                            $('.contact').html(`<div class='contact-form' style='height: 67vh; text-align:center; color: #EEFCFF; font-size: 2em; font-family: Sulphur Point, sans-serif; padding-top:2em;'>Merci !</br> Votre message a bien été envoyé, nous vous contacterons dans les plus brefs délais.</div>`);
                        } else {
                            // On affiche un message d'erreur
                            $('.contact').children().hide(2000, 'linear');
                            $('.contact').html(`<div class='contact-form' style='height: 67vh; text-align:center; color: #EEFCFF; font-size: 2em; font-family: Sulphur Point, sans-serif; padding-top:2em;'>Nous sommes désolé, mais une erreur est survenue lors de l\'envoi de votre message.</div>`);
                        }
                    }
                });
            }
        });
    },

    isEmail: function(email) {
        var regExp = /^(([^<>()[]\.,;:s@]+(.[^<>()[]\.,;:s@]+)*)|(.+))@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}])|(([a-zA-Z-0-9]+.)+[a-zA-Z]{2,}))$/;
        return regExp.test(email);
    }
}

$(app.init);