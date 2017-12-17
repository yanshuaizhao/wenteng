<div class="form-group">
    <label for="tag" class="col-md-3 control-label">翻译语种</label>
    <div class="col-md-5">
        <input type="text" class="form-control" id="title" name="title" value="{{ empty($editData['title'])?'':$editData['title'] }}" autofocus>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">简称</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="code" value="{{ empty($editData['code'])?'':$editData['code'] }}" autofocus>
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
        <textarea class="form-control" name="content" autofocus>{{ empty($editData['content'])?'':$editData['content'] }}</textarea>
    </div>
</div>


<div class="form-group">
    <label for="tag" class="col-md-3 control-label">单价</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="money" value="{{ empty($editData['money'])?'':$editData['money'] }}" autofocus>
    </div>
</div>
