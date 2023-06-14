<x-dashboard.template>
    <!-- Page Content -->
    <x-slot name="sidemenu">
        <x-dashboard.company.sidemenu></x-dashboard.company.sidemenu>
    </x-slot>
    <x-slot name="header">
        <x-dashboard.company.header></x-dashboard.company.header>
    </x-slot>
    <div class="content">
        <div class="block">
            <div class="block-header">
                @if(session()->has('bulk-message-created'))
                    <div class="alert alert-success alert-dismissable w-100" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h3 class="alert-heading font-size-h4 font-w400">Success</h3>
                        <p class="mb-0">Bulk messages created successfully</p>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-10">
                <form action="{{ route('dashboard.company.chats.bulk-messages.send')  }}" method="post">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-content">
                            <div class="d-flex justify-content-center my-20">
                                <div class="mb-20">
                                    <h2>Create bulk messages</h2>
                                </div>
                            </div>
                            <div class="row px-10">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="pl-0" for="example-text-input">Title</label>
                                        <input class="form-control bg-grey" id="example-text-input" name="title">
                                        <label class="pl-0" for="example-text-input">Message</label>
                                        <textarea class="form-control js-maxlength"  maxlength="100" placeholder="Type your message here.." data-always-show="true" id="example-text-input" name="message"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        @csrf
                        <button type="submit" class="btn btn-rounded btn-hero btn-success">Send to all</button>
                    </div>
                </form>
            </div>
            <div class="col-10">
                <table class="js-table-sections table table-hover">
                    <thead>
                        <tr>
                            <th style="width: 30px;"></th>
                            <th>Title</th>
                            <th style="width: 15%;">Sent to</th>
                            <th class="d-none d-sm-table-cell" style="width: 20%;">Date</th>
                        </tr>
                    </thead>
                    @empty(!$messages)
                        @foreach($messages as $message)
                            <tbody class="js-table-sections-header">
                                <tr>
                                    <td class="text-center">
                                        <i class="fa fa-angle-right"></i>
                                    </td>
                                    <td class="font-w600">
                                        {{ $message->title }}
                                    </td>
                                    <td>
                                        <span class="badge badge-warning">To all</span>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <em class="text-muted">
                                            {{ $message->created_at->format('d M Y H:i:s')}}
                                        </em>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td colspan="4" class="font-w600">
                                        {{ $message->message }}
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    @endempty
                </table>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
    @push('extra-js')
        <script src="{{ asset('assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
        <script>
            jQuery(function () {
                // Init page helpers (Table Tools helper)
                Codebase.helpers('table-tools');
            });
        </script>
        <script src="//unpkg.com/alpinejs" defer></script>
    @endpush

</x-dashboard.template>
