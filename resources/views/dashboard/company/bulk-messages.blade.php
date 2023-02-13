<x-dashboard.template>
    <!-- Page Content -->
    <x-slot name="sidemenu">
        <x-dashboard.company.sidemenu></x-dashboard.company.sidemenu>
    </x-slot>
    <x-slot name="header">
        <x-dashboard.company.header></x-dashboard.company.header>
    </x-slot>
    <div class="content bg-light">
        <div class="row py-20">
            <div class="col-md-12 col-xl-12">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn-lg btn-secondary mr-2" data-toggle="modal" data-target="#modal-slideright">New bulk message</button>
                </div>
            </div>
        </div>
        <div class="block">
            <div class="block-header block-header-default">
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
            <div class="block-content tab-content">
                <table class="table table-striped table-vcenter" id="btabs-internal">
                    <thead>
                    <tr>
                        <th>Messages</th>
                        <th class="d-none d-sm-table-cell" style="width: 40%;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @empty(!$messages)
                        @foreach($messages as $message)
                            <tr>
                                <td>
                                    <p class="font-w600 mb-10">
                                        {{ $message->message }}
                                    </p>
                                </td>
                                <td class="d-none d-sm-table-cell">
{{--                                    <em class="text-muted">{{ $message->role }}</em>--}}
                                </td>
                            </tr>
                        @endforeach
                    @endempty
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
    <!-- Slide Right Modal -->
    <div class="modal fade" id="modal-slideright" tabindex="-1" role="dialog" aria-labelledby="modal-slideright" aria-hidden="true">
        <div class="modal-dialog modal-dialog-slideright modal-lg" role="document">
            <div class="modal-content">
                <form action="{{ route('dashboard.company.chats.bulk-messages.send')  }}" method="post">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-content">
                            <div class="d-flex justify-content-center my-20">
                                <div class="mb-20">
                                    <h2>Create new bulk message</h2>
                                </div>
                            </div>
                            <div class="row px-10">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="pl-0" for="example-text-input">Email</label>
                                        <textarea class="form-control bg-grey" id="example-text-input" name="message"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                        @csrf
                        <button type="submit" class="btn btn-success">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END Slide Right Modal -->

</x-dashboard.template>
