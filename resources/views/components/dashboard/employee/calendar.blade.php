<div id="js-calendar" class=""></div>

@push('extra-js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('js-calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                editable: false,
                droppable: true,
                selectable: true,
                events: [
                    @if(strlen($fixedAvailability) > 0)
{{--                        @foreach(explode(',', $fixedAvailability) as $day)--}}
                            {
                                groupId: 'blueEvents', // recurrent events in this group move together
                                daysOfWeek: [ {{ $fixedAvailability }} ],
                                startTime: '09:00:00',
                                endTime: '16:00:00',
                                backgroundColor: '#80E852FF',
                                title: 'Fixed availabilities'
                                // color: 'red',
                            },
{{--                        @endforeach--}}
                    @endif
                    @foreach($interviews as $interview)
                        {
                            id: "{{ $interview->id }}",
                            title: "{{ $interview->title }}",
                            start: "{{ $interview->date_time }}"
                        },
                    @endforeach
                        @if(count($availabilities) > 0)
                            @foreach($availabilities as $availability)
                                {
                                    id: "{{ $loop->index }}",
                                    title: "Available",
                                    start: "{{ $availability }}"
                                },
                            @endforeach
                        @endif

                ],
                eventColor: '#80e852'
            });
            calendar.render();
        });

    </script>
@endpush
