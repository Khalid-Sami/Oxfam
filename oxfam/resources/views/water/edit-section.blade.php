<div class="modal-header" style="background-color: lightgreen">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Edit</h4>
</div>

<div class="modal-body">

{!! Form::open(['method'=>'POST', 'action'=>'AdminController@getPostSectionUpdate']) !!}


    <div class="form-group">
    {!! Form::label('sec_id','Section:') !!}

    {!! Form::select('sec_id', [''=>$section] + $sec , null,[]) !!}
    </div>


<div class="form-group">
    {!! Form::submit('Save',['class'=>'btn  btn-default']) !!}
    <button class="btn btn-default" href="{{ route('view-two') }}">Cancel</button>

    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}"/>
    <input type="hidden" name="ben_id" value="{{ $ben_id }}"/>

</div>


{!! Form::close() !!}

</div>
