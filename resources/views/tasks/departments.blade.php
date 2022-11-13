@foreach($task->departments as $department)
    @switch([$department->name, $department->pivot->is_active])
        @case(['DIZAJN/PRIPREMA',true])
        <td scope="row" class="active">
            <i class="fa fa-calendar" aria-hidden="true"></i>

            @php echo $department->pivot->is_finish ? date('d M,Y', strtotime($department->pivot->updated_at))."<i class='fa fa-check' aria-hidden='true'></i>" : "" @endphp
            @php echo $department->pivot->is_late ? "<i class='fa fa-close' aria-hidden='true'></i>" : "" @endphp
        </td>
        @break
        @case(['PRODUKCIJA',true])
        <td scope="row" class="active">
            <i class="fa fa-calendar" aria-hidden="true"></i>
            @php echo $department->pivot->is_finish ? date('d M,Y', strtotime($department->pivot->updated_at)). "<i class='fa fa-check' aria-hidden='true'></i>" : "" @endphp
            @php echo $department->pivot->is_late ? "<i class='fa fa-close' aria-hidden='true'></i>" : "" @endphp
        </td>
        @break
        @case(['DORADA',true])
        <td scope="row" class="active">
            <i class="fa fa-calendar" aria-hidden="true"></i>
            @php echo $department->pivot->is_finish ? date('d M,Y', strtotime($department->pivot->updated_at)) . "<i class='fa fa-check' aria-hidden='true'></i>" : "" @endphp
            @php echo $department->pivot->is_late ? $department->pivot->updated_at."<i class='fa fa-close' aria-hidden='true'></i>" : "" @endphp
        </td>
        @break
        @case(['ISPORUKA',true])
        <td scope="row" class="active">
            <i class="fa fa-calendar" aria-hidden="true"></i>
            @php echo $department->pivot->is_finish ? date('d M,Y', strtotime($department->pivot->updated_at)). "<i class='fa fa-check' aria-hidden='true'></i>" : "" @endphp
            @php echo $department->pivot->is_late ? "<i class='fa fa-close' aria-hidden='true'></i>" : "" @endphp
        </td>
        @break

        @default
        <td scope="row" class="inactive"></td>
    @endswitch
@endforeach
