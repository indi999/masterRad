@if(auth()->user()->role == 'manager')
    @include('tasks.index')
@else
    @include('tasks.sectorJobs')
@endif
