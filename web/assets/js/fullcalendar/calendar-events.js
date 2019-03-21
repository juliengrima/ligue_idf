/**
 * Created by juliengrima on 06/12/2016.
 */

// ********************************************************************
// *                       Appel Fonction
// ********************************************************************
jQuery(document).ready(function($) {

    // APPEL DE FULL CALENDAR
    //  calendar();
     // modal();


});

// ********************************************************************
// *                        Full Calendar
// ********************************************************************

$(document).ready(function() {

    initThemeChooser({

        init: function(themeSystem) {
            $('#calendar').fullCalendar({
                themeSystem: themeSystem,
                // defaultDate: '2019-03-12',
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                lang: 'fr',
                navLinks: true, // Peut cliquer sur jour/semaine pour avoir une vue
                selectable: true, // Permet de cliquer sur la case pour envoyer au new
                selectHelper: true,

                firstDay: 1, // jour ou l'agenda commentce 1 = lundi, 2 = mardi , etc...
                weekNumbers: true, // affichage du numéro de la semaine en cour
                businessHours: { // heure de travail
                    start: '09:00',
                    end: '23:00',
                    dow: [1, 2, 3, 4, 5]
                },
                handleWindowResize: true, // redimensionne auto du calendrier en fonction de la width du navigateur
                weekends: true, // affichage des weekends
                slotLabelFormat: 'HH:mm', // format de l'heure sur les slots
                timeFormat: 'HH:mm',
                minTime: "08:00:00", // heure de début du calendar
                slotEventOverlap: false, // Les évènements ne se chevauchent pas

                editable: true,
                eventLimit: true, // allow "more" link when too many events

                events: Routing.generate('calendarJson_index'),

                dayClick: function (date) {

                    /* VERIFICATION QUE LA DATE NE SOIT PAS INFERIRIEUR A LA SELECTION / DEFINITION DES ROLES */
                    if (date._d >= current_date_time && roles.indexOf("ROLE_SUPER_ADMIN")) {
                        // lors du click sur la case il renvoie la date vers la page new
                        window.location = Routing.generate('calendar_index') + date.format() + '/new';
                    }
                },

                /* ------------------------ FONCTION DU RENDU DE L'EVENEMENT ------------------------------*/

                eventRender: function (event, element) {

                    element.each(function () {
                        element.append(
                            '<p>' +
                            event.club1.categories.categoryName +
                            '</p>' +
                            '<p>' +
                            event.club1.club.clubName + ' : ' + event.club2.club.clubName +
                            '</p>'
                        );
                    })
                },

                /* ------------------------- FONCTION DU CLICK SUR EVENT ------------------------------*/
                eventClick: function (calEvent) {

                    window.location = Routing.generate('calendar_index') + event.id + '/show';
                    var day = moment(calEvent.start._d).format("dddd Do MMMM YYYY");
                    // // .format();
                    // // dddd = jour en character
                    // // Do = date du jour en chiffre (fontionne uniquement apres dddd)
                    // // MMMMM = mois en character
                    // // YYYY = année en chiffre

                    // var ponctuation1 = "de";
                    var ponctuation2 = "à";
                    var startTime = moment(calEvent.start._i).format('HH:mm');
                    // var endTime = moment(calEvent.end._i).format("HH:mm");
                    var category = event.club1.categories.categoryName;
                    var clubs = calEvent.club1.club.clubName + ' : ' + calEvent.club2.club.clubName;
                    var picture = '<img src="'+(calEvent.media)+'" alt="'+(calEvent.media)+'">';

                    var editEvent = Routing.generate('calendar_index') + calEvent.id + '/edit';
                    var deleteEvent = Routing.generate('calendar_index') + calEvent.id + '/delete';


                    console.log('recup des données');

                    // $('#modalTime').html(startTime);
                    // $('#modalImage').html(picture);
                    $('#modalTitle').html(category);
                    $('#modalTexte').html(clubs);

                    $('#calendarModal').modal({
                        fadeDuration: 100
                    });

                    $('#edit_event').show();
                    $('#edit_event').attr('href', editEvent);

                    $('#delete_event').show();
                    $('#delete_event').attr('href', deleteEvent);
                }


            });
        },

        change: function(themeSystem) {
            $('#calendar').fullCalendar('option', 'themeSystem', themeSystem);
        }

    });

});

// ********************************************************************
// *                        Full MODAL
// ********************************************************************

function modal() {
    $('#fullCalModal').modal({
        fadeDuration: 1000,
        fadeDelay: 0.50
    });
}