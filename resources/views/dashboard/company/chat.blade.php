<x-dashboard.template>
    <x-slot name="sidemenu">
        <x-dashboard.company.sidemenu></x-dashboard.company.sidemenu>
    </x-slot>
    <x-slot name="header">
        <x-dashboard.company.header></x-dashboard.company.header>
    </x-slot>
    <!-- Page Content -->
    <div class="content" id="chat">
        <div class="row">
            <div class="col-md-6">
                <div class="block block-rounded block-themed">
                    <!-- Chat Header -->
                    <div class="js-chat-head block-content block-content-full block-sticky-options bg-gd-sea text-center">
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="pinned_toggle">
                                <i class="si si-pin"></i>
                            </button>
                        </div>
                        <img class="img-avatar img-avatar-thumb" src="{{ asset('assets/custom/media/avatars/avatar1.jpg') }}" alt="">
                        <div class="font-w600 mt-15 mb-5 text-white">
                            {{ $employee->first_name  }} <span class="font-italic text-white-op">{{ $employee->role }}</span>
                        </div>
                    </div>
                    <!-- END Chat Header -->

                    <!-- Messages (demonstration messages are added with JS code at the bottom of this page) -->
                    <div class="js-chat-talk block-content block-content-full text-wrap-break-word overflow-y-auto" data-chat-id="4" style="height: 296px;">
                       <template v-for="message in messages" v-if="message.is_outbound">
                           <div class="font-size-sm font-italic text-muted text-center mt-20 mb-10">@{{ momentHumanReadable(message.created_at) }}</div>
                           <div class="rounded font-w600 p-10 mb-10 animated fadeIn mr-50 bg-body-light">@{{ message.message }}</div>
                       </template>
                        <template v-else>
                            <div class="font-size-sm font-italic text-muted text-center mt-20 mb-10">@{{ momentHumanReadable(message.created_at) }}</div>
                            <div class="rounded font-w600 p-10 mb-10 animated fadeIn ml-50 bg-primary-lighter text-primary-darker">@{{ message.message }}</div>
                        </template>
                    </div>

                    <!-- Chat Input -->
                    <div class="js-chat-form block-content block-content-full block-content-sm bg-body-light">
                        <form action="be_comp_chat_single.html" method="post"  @submit.prevent="">
                            <div class="d-flex">
                                <input v-model="message" class="js-chat-input form-control" type="text" data-target-chat-id="4" placeholder="Type your message and hit enter..">
                                <button class="btn btn-success" @click="sendMessage" >Send</button>
                            </div>
                        </form>
                    </div>
                    <!-- END Chat Input -->
                </div>
            </div>
            <div class="col-md-6">
                <x-dashboard.employee-details :employee="$employee"></x-dashboard.employee-details>
            </div>
        </div>
    </div>

    @push('extra-js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.3/moment-with-locales.min.js" integrity="sha512-vFABRuf5oGUaztndx4KoAEUVQnOvAIFs59y4tO0DILGWhQiFnFHiR+ZJfxLDyJlXgeut9Z07Svuvm+1Jv89w5g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
            new Vue({
                el: '#chat',
                data: {
                    chat: '',
                    messages: '',
                    message: ''
                },
                created(){
                    // this.messages = this.chat.messages;
                    var vm = this
                    setInterval(()=>{
                        axios.get("{{ route('dashboard.company.chat.employee.messages', [$chat->hash]) }}", {
                            chat_hash: vm.chatHash
                        }).then(response => {
                            vm.messages = response.data;
                            vm.initialState = false;
                        })
                    }, 5000)
                },
                methods: {
                    sendMessage: function ($event) {
                        var vm = this;
                        if(this.message.length > 0){
                            axios.post("{{ route('dashboard.company.chat.send.messages', [$chat->hash]) }}", {
                                chat_hash: "{{ $chat->hash }}",
                                message: vm.message
                            }).then(response => {
                                vm.messages = response.data;
                                vm.message = '';
                            })
                        }
                    },
                    momentHumanReadable(date) {
                        return moment(date).fromNow();
                    }
                }
            })
        </script>
    @endpush
    @push('extra-css')

    @endpush
</x-dashboard.template>
