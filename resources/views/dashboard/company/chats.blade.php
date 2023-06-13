<x-dashboard.template>
    <x-slot name="sidemenu">
        <x-dashboard.company.sidemenu></x-dashboard.company.sidemenu>
    </x-slot>
    <x-slot name="header">
        <x-dashboard.company.header></x-dashboard.company.header>
    </x-slot>
    <!-- Page Content -->
    <div class="content mt-30">
        <div class="row">
            <div class="block-content">
{{--                <p>The second way is to use <a href="be_ui_grid.html#cb-grid-rutil">responsive utility CSS classes</a> for hiding columns in various screen resolutions. This way you can hide less important columns and keep the most valuable on smaller screens. At the following example the <strong>Access</strong> column isn't visible on small and extra small screens and <strong>Email</strong> column isn't visible on extra small screens.</p>--}}
                <table class="table table-striped table-vcenter">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 100px;"><i class="si si-user"></i></th>
                        <th>Name</th>
{{--                        <th class="d-none d-md-table-cell" style="width: 15%;">Access</th>--}}
                        <th class="text-center" style="width: 100px;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @empty(!$chats)
                        @foreach($chats as $chat)
                            <tr>
                                <td class="text-center">
                                    <img class="img-avatar img-avatar48" src="{{ asset('assets/custom/media/avatars/avatar14.jpg') }}" alt="">
                                </td>
                                <td class="font-w600"><a href="{{ route('dashboard.company.chat.employee', [$chat->hash]) }}">{{ $chat->employee?->name }}</a> </td>
                                {{--                                <td class="d-none d-md-table-cell">--}}
                                {{--                                    <span class="badge badge-warning">Trial</span>--}}
                                {{--                                </td>--}}
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endempty
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('extra-js')
        <script src="https://unpkg.com/js-datepicker"></script>
        <script>
            // function showModal(id){
            //     document.querySelector('#talent_id').value = id;
            //     jQuery('#modal-slideright').modal('show');
            // }
            const picker = datepicker(document.querySelector('#calendar'), {
                alwaysShow: true,noWeekends: true,
                events: [
                    new Date()
                ],
                formatter: (input, date, instance) => {
                    input.value = moment(date).format('YYYY-MM-DD') // => '1/1/2099'
                }
            })
        </script>
    @endpush
    @push('extra-css')
        <link rel="stylesheet" href="https://unpkg.com/js-datepicker/dist/datepicker.min.css">
        <style>
            .qs-datepicker-container{
                position: relative;
            }
        </style>
    @endpush
</x-dashboard.template>
