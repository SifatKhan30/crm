<?php
$pa=$_POST["id"];
    $con = new mysqli('localhost', 'root', '', 'crm');
    $data = $con->query('select * from admin where role= "dealer" and `parent`='.$pa);
    ?>
    <select name="dealID" id="del" style="border:none; outline:none;">
        <option value="">select dealer</option>
        <?php
        while($d=$data->fetch_assoc()){
        ?>
        <option value="<?php echo $d['id'] ?>"><?php echo $d['name'] ?></option>
        <?php 
        }
        ?>
    </select>