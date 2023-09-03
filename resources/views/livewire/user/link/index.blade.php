<div>
    <div class="container mt-3">
        <div class="mt-1">
            @if (session()->has('message'))
                @include('components.layouts.alert')
            @endif
        </div>
        <div class="row">
            <div class="col-6" x-data="{open: false}">
                <div class="card rounded-4" @click.outside="open = false">
                    <div class="card-body">
                        <strong>Analytics</strong>
                        <svg role="button" x-show="!open" @click="open = true" xmlns="http://www.w3.org/2000/svg" class="icon float-end icon-tabler icon-tabler-caret-down" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M6 10l6 6l6 -6h-12"></path>
                        </svg>
                        <svg role="button" x-show="open" @click="open = false" xmlns="http://www.w3.org/2000/svg" class="icon float-end icon-tabler icon-tabler-caret-up" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M18 14l-6 -6l-6 6h12"></path>
                        </svg>
                    </div>
                </div>
                <div x-show="open" x-transition>
                    <div class="card rounded-4 mt-2">
                        <div class="card-body">
                            <div class="row text-center">
                                <div class="col-4">
                                    <strong>Total Views: {{ $total_views }}</strong>
                                </div>
                                <div class="col-4">
                                    <strong>Total Clicks: {{ $total_clicks }}</strong>
                                </div>
                                <div class="col-4">
                                    <strong>CTR: {{ number_format($ctr) }} %</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <livewire:user.link.create/>
                <livewire:user.link.show/>
            </div>
            <div class="col-1"></div>
            <div class="col-5">
                <livewire:user.link.preview/>
            </div>
        </div>
    </div>
</div>
