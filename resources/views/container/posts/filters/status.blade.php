<?php
use Orchid\Platform\Core\Models\Post;
?>

<div class="form-group">
    <label class="control-label">{{trans('dashboard::common.filters.status')}}</label>
    <select name="status" class="form-control">
        <option></option>
        @foreach($behavior->status() as $key => $status)
            <option value="{{$key}}" @if($key == $request->get('status')) selected @endif>{{$status}}</option>
        @endforeach
        @if (config('platform.posts_safe_delete', true))
            <option value="{{Post::STATUS_ARCHIVE}}"
                    @if(Post::STATUS_ARCHIVE == $request->get('status')) selected @endif>
                {{trans('dashboard::post/base.status_list.archive')}}
            </option>
        @endif
    </select>
</div>
