<br/>
<label>Street</label>
<div class="form-group">
    <input name="{{ $row->field }}[street]" class="form-control" value="{{ old($row->field.'.street', $dataTypeContent->{$row->field}['street'] ?? '') }}"/>
</div>