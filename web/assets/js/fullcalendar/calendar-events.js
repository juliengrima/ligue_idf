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

    var initialLocaleCode = 'fr';

    initThemeChooser({

        init: function(themeSystem) {
            $('#calendar').fullCalendar({
                plugins: [ 'interaction', 'dayGrid' ],
                header: {
                    left: 'prevYear,prev,next,nextYear today',
                    center: 'title',
                    right: 'dayGridMonth,dayGridWeek,dayGridDay'
                    // right: 'month,agendaWeek,agendaDay'
                },
                themeSystem: themeSystem,
                locale: initialLocaleCode,
                lang: 'fr-FR',
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
                        window.location = Routing.generate('calendar_index') + '/' + date.format() + '/new';
                    }
                },

                /* ------------------------ FONCTION DU RENDU DE L'EVENEMENT ------------------------------*/

                eventRender: function (event, element) {

                    element.each(function () {

                        element.append(

                            '<p>' +
                            event.category.categoryName +
                            ' -> ' +
                            event.club1.clubName +
                            '<span style=\'color:#8B0000\'> VS </span>' +
                            event.club2.clubName +
                            '</p>'
                        );

                    })
                },

                /* ------------------------- FONCTION DU CLICK SUR EVENT ------------------------------*/
                eventClick: function (calEvent) {

                    var day = moment(calEvent.start._d).format('D / MM / Y');
                    // // .format();
                    // // dddd = jour en charactère
                    // // Do = date du jour en chiffre (fontionne uniquement apres dddd)
                    // // MMMMM = mois en character
                    // // YYYY = année en chiffre

                    // var ponctuation1 = "de";

                    var startTime = moment(calEvent.start._i).format('HH:mm');
                    var category = calEvent.category.categoryName + ' - ' + calEvent.level;
                    var club1 = calEvent.club1.clubName;
                    var club2 = calEvent.club2.clubName;
                    var score = calEvent.score;

                    var editEvent = Routing.generate('calendar_index') + '/' + calEvent.id + '/edit';
                    var deleteEvent = Routing.generate('calendar_index') + '/' + calEvent.id + '/delete';
                    var showEvent = Routing.generate('calendar_usershow') + '/' + calEvent.id + '/show';

                    //Datas to send
                    // console.log('recup des données');

                    // $('#modalTime').html(startTime);
                    // $('#modalImage').html(picture);
                    $('#modalDay').html(day);
                    $('#modalTitle').html(category);
                    $('#modalClub1').html(club1);
                    $('#modalClub2').html(club2);
                    $('#modalScore').html(score);

                    $('#calendarModal').modal({
                        fadeDuration: 300,
                        fadeDelay: 1
                    });

                    //Buttons
                    $('#show_event').show();
                    $('#show_event').attr('href', showEvent);

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

    $.each($.fullCalendar.locales, function(localeCode) {
        $('#locale-selector').append(
            $('<option/>')
                .attr('value', localeCode)
                .prop('selected', localeCode == initialLocaleCode)
                .text(localeCode)
        );
    });

    // when the selected option changes, dynamically change the calendar option
    $('#locale-selector').on('change', function() {
        if (this.value) {
            $('#calendar').fullCalendar('option', 'locale', this.value);
        }
    });

});

/*
// ********************************************************************
// *                        Full MODAL
// ********************************************************************

function modal() {
    $('#fullCalModal').modal({
        fadeDuration: 1000,
        fadeDelay: 0.50
    });
}*/
