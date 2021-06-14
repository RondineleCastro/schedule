<?php

// use yii\helpers\Html;
use yii\helpers\Url;
// use common\widgets\Alert;
use app\assets\CalendarAsset;

CalendarAsset::register($this);

$absoluteHomeUrl = Url::home(true);
$this->title = 'StudantSchedule';

?>

<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div id="calendar-title"></div>
        <div id='calendar'></div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var modal = document.getElementById('MyModal');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            locale: 'pt-br',
            headerToolbar: {
                center: 'title',
                left: 'prev,next today',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            initialDate: new Date(), //'2021-06-25',
            navLinks: true, // can click day/week names to navigate views
            selectable: true,
            height: 'auto',
            selectMirror: true,
            editable: true,
            dayMaxEvents: true, // allow "more" link when too many events
            events: <?= $model ?>,
        });
        calendar.render();
    });
</script>
<script type="text/javascript">
    window.onload = function(){
        var title = document.querySelector('.fc-toolbar-title').innerHTML;
        document.querySelector('.fc-toolbar-title').hidden = true;
        document.querySelector('#calendar-title').innerHTML = "<h3 class='text-center' style='margin-top: 0'>" + title + "</h3>";
        console.log ('chegou aqui ' + title);
    };
</script>