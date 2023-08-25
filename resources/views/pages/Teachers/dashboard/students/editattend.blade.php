<!-- Deleted inFormation Student -->
<div class="modal fade"  id="edit_attendance{{ $student->id  }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
   <div class="modal-dialog">
       <div class="modal-content">
           <div class="modal-header">
               <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel"> {{ trans('dashboardes/teacher.Update') }}
                     : {{$student->name}}</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               <form action="{{ url('teacher/attendance/update') }}" method="post">
                   @csrf
                   <input type="hidden" name="id" value="{{$student->attendances()->where('attendence_date', date('Y-m-d'))->first()->id }}">
                   <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                       <input name="attendences"

                       {{ $student->attendances()->where('attendence_date', date('Y-m-d'))->first()->attendence_status == 1? 'checked': '' }}
                              class="leading-tight" type="radio" value="1">
                       <span class="text-success">{{ trans('dashboardes/teacher.Attendance') }}</span>
                   </label>

                   <label class="ml-4 block text-gray-500 font-semibold">
                       <input name="attendences"
                       {{ $student->attendances()->where('attendence_date', date('Y-m-d'))->first()->attendence_status == 0? 'checked': '' }}
                              class="leading-tight" type="radio" value="0">
                       <span class="text-danger">{{ trans('dashboardes/teacher.Absence') }}</span>
                   </label>
                   <div class="modal-footer">
                       <button  class="btn btn-secondary"
                               data-dismiss="modal">{{ trans('pages/fees.Close') }}</button>
                       <button  type="submit" id="changeActionBtn" class="btn btn-danger">{{ trans('dashboardes/teacher.submit') }}</button>
                   </div>
               </form>
           </div>
       </div>
   </div>
</div>



