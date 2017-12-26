<div class="form-group">
    <label for="tag" class="col-md-3 control-label">类型</label>
    <div class="col-md-5">
        <select name="type" id="type" class="form-control" autofocus>
            <option value=""> -- 请选择 -- </option>
            @foreach($adType as $k=>$v)
            <option value="{{$k}}" @if(isset($editData['type']) && $editData['type']==$k) selected="selected" @endif >{{$v}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">标题</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="title" id="title" value="{{ empty($editData['title'])?'':$editData['title'] }}" autofocus>
    </div>
</div>

<div class="form-group">
    <label for="tag" class="col-md-3 control-label">简介</label>
    <div class="col-md-5">
        <textarea class="form-control" name="description" autofocus>{{ empty($editData['description'])?'':$editData['description'] }}</textarea>
    </div>
</div>

<div class="form-group">
    <label for="tag" class="col-md-3 control-label">关键字</label>
    <div class="col-md-5">
        <textarea class="form-control" name="keywords" autofocus>{{ empty($editData['keywords'])?'':$editData['keywords'] }}</textarea>
    </div>
</div>