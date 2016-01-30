<select name="select" onChange="getstatedetails(this.value)">
<option value="" selected="selected" >Select State</option>
<?php foreach($state as $stt): ?>
<option value="<?php echo $stt->stateID; ?>"><?php echo $stt->stateName; ?></option>
<?php endforeach; ?> 
</select> 