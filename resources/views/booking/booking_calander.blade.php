<x-app-layout>
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>


    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        <div class="leftsidebar">

            @include('layouts.leftsidebar')
        </div>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('layouts.mainnavbar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div id="calendar"></div>

                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <!-- footer   -->

                <!-- End Footer  -->
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek'
                },
                events: function(fetchInfo, successCallback, failureCallback) {
                    fetch('/booking-calander')
                        .then(response => response.json())
                        .then(data => {
                            const events = data.bookingRecords.map(item => {
                                const endDate = new Date(item.return_date);
                                endDate.setDate(endDate.getDate() + 1); // Add 1 day to show end date inclusively

                                return {
                                    title: item.vehicle_no,
                                    start: item.book_start_date,
                                    end: endDate.toISOString().split('T')[0],
                                    color: '#101010'
                                };
                            });
                            successCallback(events);
                        })
                        .catch(error => {
                            console.error('Error loading events:', error);
                            failureCallback(error);
                        });
                }
            });

            calendar.render();
        });
    </script>
</x-app-layout>