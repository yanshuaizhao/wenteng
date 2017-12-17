<div class="form-group">
    <label for="tag" class="col-md-3 control-label">类型</label>
    <div class="col-md-5">
        <select name="type" id="type" class="form-control" autofocus>
            <option value=""> -- 请选择 -- </option>
            @foreach($articleType as $k=>$v)
            <option value="{{$k}}" @if(isset($editData['type']) && $editData['type']==$k) selected="selected" @endif >{{$v}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">文章标题</label>
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
    <label for="tag" class="col-md-3 control-label">简介</label>
    <div class="col-md-5">
        <textarea class="form-control" name="desc" autofocus>{{ empty($editData['desc'])?'':$editData['desc'] }}</textarea>
    </div>
</div>

<div class="form-group">
    <label for="tag" class="col-md-3 control-label">内容</label>
    <div class="col-md-5">
        <textarea style="width:100%" class="form-control" rows="30" name="content" autofocus>{{ empty($editData['content'])?'':$editData['content'] }}</textarea>
    </div>
</div>