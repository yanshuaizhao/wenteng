<div class="form-group">
    <label for="tag" class="col-md-3 control-label">配置名</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="key" id="key" value="{{ empty($editData['key'])?'':$editData['key'] }}" autofocus>
    </div>
</div>

<div class="form-group">
    <label for="tag" class="col-md-3 control-label">内容值</label>
    <div class="col-md-5">
        <textarea name="val" style="width:100%" class="form-control" rows="10" autofocus>{{ empty($editData['val'])?'':$editData['val'] }}</textarea>
    </div>
</div>