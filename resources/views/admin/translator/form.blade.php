<div class="form-group">
    <label for="tag" class="col-md-3 control-label">译者姓名</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="name" id="name" value="{{ empty($editData['name'])?'':$editData['name'] }}" autofocus>
    </div>
</div>

<div class="form-group">
    <label for="tag" class="col-md-3 control-label">性别</label>
    <div class="col-md-5">
        <select name="sex" id="sex" class="form-control" autofocus>
            <option value=""> -- 请选择 -- </option>
            @foreach($sexType as $k=>$v)
            <option value="{{$k}}" @if(isset($editData['sex']) && $editData['sex']==$k) selected="selected" @endif >{{$v}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label for="tag" class="col-md-3 control-label">婚姻状态</label>
    <div class="col-md-5">
        <select name="marriage" id="marriage" class="form-control" autofocus>
            <option value=""> -- 请选择 -- </option>
            @foreach($marriageList as $k=>$v)
                <option value="{{$k}}" @if(isset($editData['marriage']) && $editData['marriage']==$k) selected="selected" @endif >{{$v}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label for="tag" class="col-md-3 control-label">出生日期</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="birthday" id="birthday" value="{{ empty($editData['birthday'])?'1990-04-10':$editData['birthday'] }}" autofocus>
    </div>
</div>

<div class="form-group">
    <label for="tag" class="col-md-3 control-label">图片</label>
    <div class="col-md-5">
        <img src="{{ empty($editData['photo_url'])?'/adm/dist/img/not_img.png':$editData['photo_url'] }}" width="100" height="100">
        <input type="file" name="img" class="form-control" id="img">
    </div>
</div>


<div class="form-group">
    <label for="tag" class="col-md-3 control-label">简介</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="introduction" id="introduction" value="{{ empty($editData['introduction'])?'':$editData['introduction'] }}" autofocus>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">院校</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="school" id="school" value="{{ empty($editData['school'])?'':$editData['school'] }}" autofocus>
    </div>
</div>


<div class="form-group">
    <label for="tag" class="col-md-3 control-label">服务地区</label>
    <div class="col-md-5">
        <select name="zone_id" id="zone_id" class="form-control" autofocus>
            <option value=""> -- 请选择 -- </option>
            @foreach($zoneList as $k=>$v)
                <option value="{{$k}}" @if(isset($editData['zone_id']) && $editData['zone_id']==$k) selected="selected" @endif >{{$v}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label for="tag" class="col-md-3 control-label">服务语言</label>
    <div class="col-md-5">
        @foreach($fieldList as $k=>$v)
            <input type="checkbox" name="service_lang[]" value="{{$k}}" @if(isset($editData['service_lang']) && in_array($k, $editData['serviceLang'])) checked="checked" @endif /> {{$v}} &nbsp;&nbsp;
        @endforeach
    </div>
</div>

<div class="form-group">
    <label for="tag" class="col-md-3 control-label">服务领域</label>
    <div class="col-md-5">
        @foreach($fieldList as $k=>$v)
            <input type="checkbox" name="service_field[]" value="{{$k}}" @if(isset($editData['service_field']) && in_array($k, $editData['serviceField'])) checked="checked" @endif /> {{$v}} &nbsp;&nbsp;
        @endforeach
    </div>
</div>

<div class="form-group">
    <label for="tag" class="col-md-3 control-label">口译类型</label>
    <div class="col-md-5">
        @foreach($kouyiType as $k=>$v)
            <input type="checkbox" name="kouyi_type[]" value="{{$k}}" @if(isset($editData['kouyi_type']) && in_array($k, $editData['kouyi_type'])) checked="checked" @endif /> {{$v}} &nbsp;&nbsp;
            <input type="text" name="kouyi_type_price[]" value="@if(isset($editData['service_field']) && in_array($k, $editData['serviceField'])) @endif"  /> {{$v}} &nbsp;&nbsp; <br>
        @endforeach
    </div>
</div>

<div class="form-group">
    <label for="tag" class="col-md-3 control-label">现住址</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="present_address" id="present_address" value="{{ empty($editData['present_address'])?'':$editData['present_address'] }}" autofocus>
    </div>
</div>

<div class="form-group">
    <label for="tag" class="col-md-3 control-label">工作时间</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="work_time" id="work_time" value="{{ empty($editData['work_time'])?'':$editData['work_time'] }}" autofocus>
    </div>
</div>

<div class="form-group">
    <label for="tag" class="col-md-3 control-label">工作经历</label>
    <div class="col-md-5">
        <textarea style="width:100%" class="form-control" rows="30" name="work_experience" autofocus>{{ empty($editData['work_experience'])?'':$editData['work_experience'] }}</textarea>
    </div>
</div>