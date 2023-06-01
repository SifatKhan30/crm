<?php
$pa=$_POST["id"];
    $con = new mysqli('localhost', 'root', '', 'crm');
    $data = $con->query('select * from admin where admin.role= "marketing" and `parent`='.$pa);
    ?>
    <select name="" id="mark" style="border:none; outline:none;">
        <option value="">select manager</option>
        <?php
        while($d=$data->fetch_assoc()){
        ?>
        <option value="<?php echo $d['id'] ?>"><?php echo $d['name'] ?></option>
        <?php 
        }
        ?>
    </select>