$(document).ready(function() {
    
    $('#calendar').fullCalendar({// calendrier non editable 
        
        lang: "fr",
        editable: false,
        eventLimit: true, // allow "more" link when too many events
        events: {
                url: 'templates/data.php?action=consulterPlanning',
                error: function() {
                        $('#script-warning').show();
                }
        },
        minTime : "8:00:00",
        maxTime : "21:00:00",
        hiddenDays: [0] ,// cache le dimanche
        height:  500,
        allDaySlot : false,
        eventDurationEditable : false
    });

    $('#calendar').fullCalendar( 'today' );
   
    
});