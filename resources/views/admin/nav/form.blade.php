<div class="form-group">
    <label for="tag" class="col-md-3 control-label">类型</label>
    <div class="col-md-5">
        <select name="type" id="type" class="form-control" autofocus>
            <option value=""> -- 请选择 -- </option>
            @foreach($navType as $k=>$v)
            <option value="{{$k}}" @if(isset($editData['type']) && $editData['type']==$k) selected="selected" @endif >{{$v}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">上一级</label>
    <div class="col-md-5">
        <select name="pid" id="pid" class="form-control" autofocus>
            <option value=""> -- 请选择 -- </option>
            @foreach($navType as $k=>$v)
                <option value="{{$k}}" @if(isset($editData['pid']) && $editData['pid']==$k) selected="selected" @endif >{{$v}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label for="tag" class="col-md-3 control-label">名称</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="title" id="title" value="{{ empty($editData['title'])?'':$editData['title'] }}" autofocus>
    </div>
</div>

<div class="form-group">
    <label for="tag" class="col-md-3 control-label">链接</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="link" id="link" value="{{ empty($editData['link'])?'':$editData['link'] }}" autofocus>
    </div>
</div>

<div class="form-group">
    <label for="tag" class="col-md-3 control-label">排序</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="orderby" id="orderby" value="{{ empty($editData['orderby'])?'':$editData['orderby'] }}" autofocus>
    </div>
</div>
