@if(auth()->user()->role == 'manager')
   @include('tasks.index')
@elseif(auth()->user()->role == 'user')
    @include('tasks.sectorJobs')
@elseif(auth()->user()->role == 'monitor')
    @include('tasks.monitor')
@endif


