<x-dashboard.template>
    <x-slot name="sidemenu">
        <x-dashboard.company.sidemenu></x-dashboard.company.sidemenu>
    </x-slot>
    <x-slot name="header">
        <x-dashboard.company.header></x-dashboard.company.header>
    </x-slot>
    <!-- Page Content -->
    <div class="content" id="chat">
        <div class="block">
            
        </div>
        <!-- END Block Tabs Alternative Style -->

        <div class="col-md-12">
            <!-- Simple Wizard 2 -->
            <div class="js-wizard-simple block">
                <!-- Step Tabs -->
                <ul class="nav nav-tabs nav-tabs-alt nav-fill" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#wizard-simple2-step1" data-toggle="tab">1. Overview</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#wizard-simple2-step2" data-toggle="tab">2. Edit Profile</a>
                    </li>
                </ul>
                <!-- END Step Tabs -->

                <!-- Form -->
                <form action="be_forms_wizard.html" method="post">
                    <!-- Steps Content -->
                    <div class="block-content block-content-full tab-content" style="min-height: 267px;">
                        <!-- Step 1 -->
                        <div class="tab-pane active" id="wizard-simple2-step1" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="block block-rounded block-themed">
                                        <!-- Chat Header -->
                                        <div class="js-chat-head block-content block-content-full block-sticky-options bg-gd-sea text-center">
                                            <img class="img-avatar img-avatar-thumb" src="{{ asset('assets/custom/media/avatars/avatar1.jpg') }}" alt="">
                                            <div class="font-w600 mt-15 mb-5 text-white">
                                                {{ $employee->first_name  }} {{ $employee->last_name  }} <br><span class="font-italic text-white-op">{{ $employee->role }}</span>
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
                                            <form action="#" method="post"  @submit.prevent="">
                                                <div class="d-flex">
                                                    <input v-model="message" class="js-chat-input form-control" type="text" data-target-chat-id="4" placeholder="Type your message and hit enter..">
                                                    <button class="btn btn-success" @click="sendMessage" >Send</button>
                                                </div>
                                            </form>
                                        </div>
                    
                                        <!-- Chat Input -->
                                        <div class="js-chat-form block-content block-content-full block-content-sm bg-body-light">
                                            <form action="#" method="post"  @submit.prevent="sendFile">
                                                <div class="d-flex">
                                                    <input  class="js-chat-input form-control" type="file" data-target-chat-id="4" id="file" required>
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
                        <!-- END Step 1 -->

                        <!-- Step 2 -->
                        <div class="tab-pane" id="wizard-simple2-step2" role="tabpanel">
                            
                        </div>
                        <!-- END Step 2 -->
                    </div>
                    <!-- END Steps Content -->
                </form>
                <!-- END Form -->
            </div>
            <!-- END Simple Wizard 2 -->
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
                    },
                    sendFile: function ($event) {
                        var vm = this;
                        const formData = new FormData();
                        const imagefile = document.querySelector('#file');
                        formData.append("file", imagefile.files[0]);
                        formData.append("chat_hash", "{{ $chat->hash }}");
                        formData.append("message", "File attachment");
                        axios.post("{{ route('dashboard.company.chat.send.messages', [$chat->hash]) }}", formData, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        }).then(response => {
                            vm.messages = response.data;
                            document.querySelector('#file').value = '';
                        })
                    },
                }
            })
        </script>
    @endpush
    @push('extra-css')

    @endpush
</x-dashboard.template>
