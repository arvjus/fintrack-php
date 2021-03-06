{{ Form::open(['route'=>['expense.list'], 'method' => 'get', 'class' => 'form-vertical']) }}
<div class="control-group">
    <label class="control-label">Date from<br>
        <input type="text" class="date-pick input-small" name="date_from" value="{{{ $date_from }}}"/>
    </label>
    <label class="control-label">Date to<br>
        <input type="text" class="date-pick input-small" name="date_to" value="{{{ $date_to }}}"/>
    </label>

    <label class="control-label">Categories<br>
        @foreach($categories as $category)
        <label class="checkbox">{{{ $category->name_short }}}
            {{ Form::checkbox('category_ids[]', $category->category_id, in_array($category->category_id, $category_ids), ['title' => $category->descr]) }}
        </label>
        @endforeach
    </label>
    <label class="control-label">User<br>
        {{ Form::select('user_id', $users, $user_id, ['class' => 'input-medium sidebar-limited']) }}
    </label>
</div>
<div class="controls">
    {{ Form::submit('Refresh', ['class' => 'btn btn-small btn-primary']) }}
    {{ Form::reset('Reset', ['class' => 'btn btn-small']) }}
</div>
{{ Form::close() }}
