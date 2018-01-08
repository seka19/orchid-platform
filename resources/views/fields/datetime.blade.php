<div class="form-group{{ $errors->has($oldName) ? ' has-error' : '' }}">
    @if(isset($title))
        <label for="{{$id}}">{{$title}}</label>
    @endif
    <div class='input-group date datetimepicker'>
        <input type='text' class="form-control {{$class or ''}}"
               id="{{$id}}"
               value="{{$value or old($oldName)}}"
               placeholder="{{$placeholder or ''}}"
               name="{{$fieldName}}"
               @if(isset($required) && $required) required @endif
               data-date-format="{{$format or "YYYY-MM-DD HH:mm:ss"}}"
        >
        <span class="input-group-addon">
        <span class="fa fa-calendar" aria-hidden="true"></span>
        </span>
    </div>
    @if(isset($help))
        <p class="help-block">{{$help}}</p>
    @endif
</div>
<div class="line line-dashed b-b line-lg"></div>
