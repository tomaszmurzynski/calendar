<?php
//index.php




?>
<!DOCTYPE html>
<html>
 <head>
  <title>Event Calendar</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script>
   
  $(document).ready(function() {
   //Init plugin
    var calendar = $('#calendar').fullCalendar({
    //Set deflautView 
    defaultView: 'agendaWeek',
    //Set edit option for TRUE
        editable:true,
    //Set header option
        header:{
     left:'prev,next today',
     center:'title',
     right:'month,agendaWeek,agendaDay'
    },
    //Set events option
    events: 'load.php',
    eventRender: function(event, element) {
    if(event.desc || event.place){
        element.find('.fc-title').append("<br/> Desc: <br/>" + event.desc);
        element.find('.fc-title').append("<br/> Place: <br/>" + event.place);
    }
    },
    selectable:true,
    selectHelper:true,
    select: function(start, end, allDay)
    {
     var title = prompt("Enter Event Title");
     if(title)
     {
      var desc = prompt("Enter event desc:");  
      var place =prompt("Enter event localization:");
      var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
      var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
      $.ajax({
       url:"insert.php",
       type:"POST",
       data:{title:title, start:start, end:end, desc:desc, place:place},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Added Successfully");
       }
      })
     }
    },
    eventResize:function(event)
    {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
     var title = event.title;
     var id = event.id;
     var place = event.place;
     var desc = event.desc;
     $.ajax({
      url:"update.php",
      type:"POST",
      data:{title:title, start:start, end:end, desc:desc, place:place, id:id},
      success:function(){
       calendar.fullCalendar('refetchEvents');
       alert('Event Update');
      }
     })
    },
    eventDrop:function(event)
    {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
     var title = event.title;
     var id = event.id;
     var place = event.place;
     var desc = event.desc;
     $.ajax({
      url:"update.php",
      type:"POST",
      data:{title:title, start:start, end:end, desc:desc, place:place, id:id},
      success:function()
      {
       calendar.fullCalendar('refetchEvents');
       alert("Event Updated");
      }
     });
    },
    eventClick:function(event)
    {
     if(confirm("Are you sure you want to remove it?"))
     {
      var id = event.id;
      $.ajax({
       url:"delete.php",
       type:"POST",
       data:{id:id},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Event Removed");
       }
      })
     }
    },
    eventClick:function(event)
{
    if(confirm("Are you want edit event?"))
     {
  var title = prompt("Update Event Title", event.title);
  var desc = prompt("Update Event Description", event.desc);
  var place = prompt("Update Event Place", event.place);

  if(title || desc || place)
  {
    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
    var id = event.id;
    $.ajax({
      url:"update.php",
      type:"POST",
      data:{title:title, desc:desc, place:place, start:start, end:end, id:id},
      success:function()
      {
        calendar.fullCalendar('refetchEvents');
        alert("Event Updated");
      }
    });
  }
}else {
if(confirm("Are you sure you want to remove it?"))
     {
      var id = event.id;
      $.ajax({
       url:"delete.php",
       type:"POST",
       data:{id:id},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Event Removed");
       }
      })
     }
    }
},
   });
  });
  </script>
 </head>
 <body>
  <br />
  <h2 align="center"><a href="#">Event Calendar</a></h2>
  <br />
  <div class="container">
   <div id="calendar"></div>
  </div>
 </body>
</html>