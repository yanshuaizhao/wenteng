<div class="form-group">
    <label for="tag" class="col-md-3 control-label">角色名称</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="name" id="tag" value="{{ $name }}" autofocus>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">角色简述</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="description" id="tag" value="{{ $description }}" autofocus>
    </div>
</div>

<div class="form-group">
    <label for="tag" class="col-md-3 control-label">拥有权限</label>
    <div class="col-md-4">
        <select name="ttt">
            @foreach($permissionAll as $k=>$v)
                <option value="{{$v['id']}}">{{$v['name']}}-{{$v['label']}}</option>
            @endforeach


        </select>

    </div>

</div>