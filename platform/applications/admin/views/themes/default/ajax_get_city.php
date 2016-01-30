<select name="select" onChange="getcitydetails(this.value)">
<option value="" selected="selected" >Select City</option>
<?php foreach($city as $ct): ?>
<option value="<?php echo $ct->cityID; ?>"><?php echo $ct->cityName; ?></option>
<?php endforeach; ?> 
</select>