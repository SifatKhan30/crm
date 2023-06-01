<?php
$con = new mysqli('localhost', 'root', '', 'crm');
$id=$_POST['id'];
$from_date=$_POST['from'];
$to_date=$_POST['to'];
$data=$con->query("SELECT admin.name,amount,collected_by,created_at FROM `payments` JOIN admin ON admin.id=payments.dealer_id WHERE payments.created_at >='$from_date' AND payments.created_at <='$to_date' AND admin.parent=".$id);
while($d = $data->fetch_assoc()){
    $b=$con->query("select * from admin where id=".$d['collected_by'])->fetch_assoc();
?>
<tr>
    <td><?php echo date("d/m/Y", strtotime($d['created_at'])) ?></td>
    <td><?php echo $d['name'] ?></td>
    <td><?php echo $b['name'] ?></td>
    <td><?php echo $d['amount'] ?></td>
    
    
</tr>
<?php } ?>