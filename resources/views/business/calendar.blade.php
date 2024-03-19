@if(Auth::user()->userTypeId==1)
    @include('user-web.layouts.head')
    @include('user-web.layouts.header')
@else
    @include('business.layouts.head')
    @include('business.layouts.header')
@endif
<div class="main-content">
    <section class="home">
        <div class="container">
            <div class="row">
                @if(Auth::user()->userTypeId==1)
                    @include('user-web.layouts.sidebar')
                @else
                    @include('business.layouts.sidebar')
                @endif
                <div class="col-lg-9">
                    <div class="card business-single-card">
                        <div class="card-body">
                            <div id='calendar'></div> 
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
</div>
@if(Auth::user()->userTypeId==1)
    @include('user-web.layouts.footer')
@else
    @include('business.layouts.footer')
@endif
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
<script type="text/javascript">
  
$(document).ready(function () {
    var SITEURL = "{{ url('/') }}";
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var calendar = $('#calendar').fullCalendar({
        editable: true,
        events: SITEURL + "/calendar",
        displayEventTime: false,
        editable: true,
        eventRender: function (event, element, view) {
            console.log({event});
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        selectable: true,
        selectHelper: true,
        // select: function (start, end, allDay) {
        //     alert("61");
        //     var title = prompt('Event Title:');
        //     if (title) {
        //         var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
        //         var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
        //         $.ajax({
        //             url: SITEURL + "/fullcalenderAjax",
        //             data: {
        //                 title: title,
        //                 start: start,
        //                 end: end,
        //                 type: 'add'
        //             },
        //             type: "POST",
        //             success: function (data) {
        //                 displayMessage("Event Created Successfully");

        //                 calendar.fullCalendar('renderEvent',
        //                     {
        //                         id: data.id,
        //                         title: title,
        //                         start: start,
        //                         end: end,
        //                         allDay: allDay
        //                     },true);

        //                 calendar.fullCalendar('unselect');
        //             }
        //         });
        //     }
        // },
        // eventDrop: function (event, delta) {
        //     alert("93");
        //     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
        //     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");

        //     $.ajax({
        //         url: SITEURL + '/fullcalenderAjax',
        //         data: {
        //             title: event.title,
        //             start: start,
        //             end: end,
        //             id: event.id,
        //             type: 'update'
        //         },
        //         type: "POST",
        //         success: function (response) {
        //             displayMessage("Event Updated Successfully");
        //         }
        //     });
        // },
        // eventClick: function (event) {
        //     alert("113");
        //     var deleteMsg = confirm("Do you really want to delete?");
        //     if (deleteMsg) {
        //         $.ajax({
        //             type: "POST",
        //             url: SITEURL + '/fullcalenderAjax',
        //             data: {
        //                     id: event.id,
        //                     type: 'delete'
        //             },
        //             success: function (response) {
        //                 calendar.fullCalendar('removeEvents', event.id);
        //                 displayMessage("Event Deleted Successfully");
        //             }
        //         });
        //     }
        // }

    });
 
    });
      
    /*------------------------------------------
    --------------------------------------------
    Toastr Success Code
    --------------------------------------------
    --------------------------------------------*/
    function displayMessage(message) {
        toastr.success(message, 'Event');
    } 
    
</script>
