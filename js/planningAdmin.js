/*
 * Nom de fichier : planningAdmin.js
 * Description : Fichier JQuery de la partie "Planning" pour l'administrateur dans l'espace perso
 * Auteur(s) : Maxime DE COSTER
*/

$(document).ready(function() {
      
    // Mise en place du calendrier avec le plugin JQUERY 
    $('#calendar').fullCalendar({
        
        lang: "fr", // On le met en français ( il fallait incorporer le lang-all.js)
        editable: true, // on peut l'éditer (mode admin)
        eventLimit: true, // allow "more" link when too many events
        events: { // on va récupérer les events
                url: 'templates/data.php?action=consulterPlanning',
                error: function() {
                        $('#script-warning').show();
                }
        },
        minTime : "8:00:00",// heure de début
        maxTime : "21:00:00",// heure de la fin
        hiddenDays: [0] ,// cache le dimanche
        //height:  "auto",//hauter auto
        height:  450,//hauter auto
        aspectRatio:3,
        allDaySlot : false,//empeche d'afficher un genre de titre en haut du calendrier
        eventDurationEditable : true,// on peut éditer les durées des events
        //slotDuration:'00:05:00', pour pouvoir afficher tous les 5 minutes : prend trop de place
        snapDuration : '00:05:00',// on peut donc éditer les durées toutes les 5 min
        eventRender: function(event, element) {
            element.bind('dblclick', function() {// permet de supprimer un event lors du double click sur celui-ci
                // supprimer l'élément !
                //console.log("Double click event");
                //console.log(event);
                $.ajax({ // on le retire de la bdd
                       url: "templates/data.php?action=supprimerCreneau&id="+event.id, // Le nom du fichier indiqué dans le formulaire
                       type: "GET", // La méthode indiquée dans le formulaire (get ou post)
                       success:function(result, textStatus, jqXHR){
                           console.log(result);
                       },
                       error : function(jqXHR, textStatus, textErreur){
                           alert("Status :" + textStatus + " \nErreur : " + textErreur);
                       }
                   
                   });
                
                $('#calendar').fullCalendar( 'removeEvents' , event.id );// on le retire également du calendrier
                
            });
        },// fin dbclick
        eventResize: function(event, delta, revertFunc) { // fonction pour le redimensionnement d'une durée d'un event

            //alert(event.title + " end is now " + event.end.format());
            
            //console.log("Test fin de redimensionnement");
            //console.log(event.start.format());
            
            $.ajax({
                url: "templates/data.php?action=modifierHeure&id="+event.id+"&start="+event.start.format()+"&end="+event.end.format(), // Le nom du fichier indiqué dans le formulaire
                type: "GET", // La méthode indiquée dans le formulaire (get ou post)
                success:function(result, textStatus, jqXHR){
                    console.log(result);
                },
                error : function(jqXHR, textStatus, textErreur){
                    alert("Status :" + textStatus + " \nErreur : " + textErreur);
                }
            
            });
            
        },
        eventDrop: function(event, delta, revertFunc) {// Event drag and drop

           // console.log("id="+event.id+"&start="+event.start.format()+"&end="+event.end.format());
            
            // on empeche le changement d'heure en dehors des plages horaires d'affichées
            if (!((event.end.format().substring(11,13) > 21 || (event.end.format().substring(11,13) == 21 && event.end.format().substring(14,16) > 0 )) || (event.start.format().substring(11,13) < 8))) {
                $.ajax({
                    url: "templates/data.php?action=modifierHeure&id="+event.id+"&start="+event.start.format()+"&end="+event.end.format(), // Le nom du fichier indiqué dans le formulaire
                    type: "GET", // La méthode indiquée dans le formulaire (get ou post)
                    success:function(result, textStatus, jqXHR){
                        console.log(result);
                    },
                    error : function(jqXHR, textStatus, textErreur){
                        alert("Status :" + textStatus + " \nErreur : " + textErreur);
                    }
                
                });
            }
            else
            {
                revertFunc(); // comme on a empeche le changement, on revient sur la position de l'event d'avant
            }
        
        }
        
    });

    $('#calendar').fullCalendar( 'today' );// par défaut on affiche à aujourd'hui
    
    // 4 fonctions pour vérifier si l'heure/min du début et bien inférieures à celle de la fin, sinon on les change !!
    $("input[type=number]:eq(0)").change(verifierHeureDebut);
    $("input[type=number]:eq(2)").change(verifierHeureFin);
    $("input[type=number]:eq(1)").change(verifierMinute);
    $("input[type=number]:eq(3)").change(verifierMinute);

    $.datepicker.setDefaults( $.datepicker.regional[ "fr" ] );// date picker en mode francais
    $( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd"}).datepicker("setDate", "0");  // avec la date par défaut à ajourd'hui où le format est francais
    
    
    function verifierHeureDebut() {
        
        if ($(this).val() == "")
            $(this).val(8);
        else
            $(this).val(parseInt($(this).val()));
        
        
        if ($(this).val() > 21) {
            $(this).val(21);
        }
        if ($(this).val() < 8) {
            $(this).val(8);
        }
        
        if (parseInt($("input[type=number]:eq(0)").val()) > parseInt($("input[type=number]:eq(2)").val())) {
            $("input[type=number]:eq(2)").val($("input[type=number]:eq(0)").val());
        }        
    }
    
    function verifierHeureFin()
    {
        if ($(this).val() == "")
            $(this).val(8);
        else
            $(this).val(parseInt($(this).val()));
            
        if ($(this).val() > 21) {
            $(this).val(21);
        }
        if ($(this).val() < 8) {
            $(this).val(8);
        }
        
         if (parseInt($("input[type=number]:eq(0)").val()) > parseInt($("input[type=number]:eq(2)").val())) {
            $("input[type=number]:eq(0)").val($("input[type=number]:eq(2)").val());
        }        
        
    }
    
    function verifierMinute() {
        if ($(this).val() == "")
            $(this).val(0);
        else
            $(this).val(parseInt($(this).val()));
        
        if ($(this).val() > 55) {
            $(this).val(55);
        }
        if ($(this).val() < 0) {
            $(this).val(0);
        }
        
        
        
    }
    
    
    
        
   
    function ajouterPlanning() {
        
        var valForm = $(this).parent(); // L'objet jQuery du formulaire
 
 
        // Je vérifie une première fois pour ne pas lancer la requête AJAX pour encore vérifier la concordance des heures/min
        var hDebut =  parseInt($("input[type=number]:eq(0)").val());
        var hFin =  parseInt($("input[type=number]:eq(2)").val());
        var mDebut =  parseInt($("input[type=number]:eq(1)").val());
        var mFin =  parseInt($("input[type=number]:eq(3)").val());
        
        if(hDebut < 8 || hDebut> 21 || hFin < 8 || hFin > 21 || mDebut < 0 ||mDebut > 55 || mFin< 0 || mFin > 55)
        {
            alert("Veuillez rentrer des heures comprises entre 6 et 21 et la premiere doit etre inferieure à la deuxieme");
            //console.log("Probleme");
        }
        else
        {
            if (( hDebut == hFin && mDebut >= mFin )) {
                alert("Veuillez rentrer des heures et minutes correctes !!");
            }
            else
            {
                // Envoi de la requête AJAX en mode asynchrone
                $.ajax({
                    url: "templates/data.php?action=ajouterPlanning", // Le nom du fichier indiqué dans le formulaire
                    type: "POST", // La méthode indiquée dans le formulaire (get ou post)
                    data: valForm.serialize(), // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
                    success:function(result, textStatus, jqXHR){
                        console.log(result);
                        // ajouter sur le planning !!
                        $('#calendar').fullCalendar( 'refetchEvents' ); // on l'ajoute en le rechargeant
                        
                    },
                    error : function(jqXHR, textStatus, textErreur){
                        alert("Status :" + textStatus + " \nErreur : " + textErreur);
                    }
                
                });
            }
            
        }
    
        //});
    }
    
    // gestion en JQUERY des actions sur les boutons
    $(document).on("click", "input[type=button][value=Ajouter]",ajouterPlanning);
    $(document).on("click", "input[type=button][name=supprimerAll]",function(){
        $.ajax({
            url: "templates/data.php?action=supprimerTout", // Le nom du fichier indiqué dans le formulaire
            type: "GET", // La méthode indiquée dans le formulaire (get ou post)
            success:function(result, textStatus, jqXHR){
                console.log(result);
                // ajouter sur le planning !!
                $('#calendar').fullCalendar( 'refetchEvents' );
            
            },
            error : function(jqXHR, textStatus, textErreur){
                alert("Status :" + textStatus + " \nErreur : " + textErreur);
            }
        
        });
    });
   
    
});