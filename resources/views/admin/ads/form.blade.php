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
    <label for="tag" class="col-md-3 control-label">图片</label>
    <div class="col-md-5">
        <img src="{{ empty($editData['img'])?'/adm/dist/img/not_img.png':$editData['img'] }}" width="100" height="100">
        <input type="file" name="img" class="form-control" id="img">
    </div>
</div>

<div class="form-group">
    <label for="tag" class="col-md-3 control-label">链接地址</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="url" id="url" value="{{ empty($editData['url'])?'':$editData['url'] }}" autofocus>
    </div>
</div>

<div class="form-group">
    <label for="tag" class="col-md-3 control-label">排序</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="orderby" id="orderby" value="{{ empty($editData['orderby'])?'':$editData['orderby'] }}" autofocus>
    </div>
</div>

<div class="form-group">
    <label for="tag" class="col-md-3 control-label">简介</label>
    <div class="col-md-5">
        <textarea class="form-control" name="introduction" autofocus>{{ empty($editData['introduction'])?'':$editData['introduction'] }}</textarea>
    </div>
</div>

<div class="form-group">
    <label for="tag" class="col-md-3 control-label">显示状态</label>
    <div class="col-md-5">
        <select name="status" id="status" class="form-control" autofocus>
            @foreach($showStatus as $k=>$v)
                <option value="{{$k}}" @if(isset($editData['status']) && $editData['status']==$k) selected="selected" @endif >{{$v}}</option>
            @endforeach
        </select>
    </div>
</div>