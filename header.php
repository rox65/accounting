<h1>Disbursement Voucher</h1>    
<?php
                if(isset($_POST['next'])){
                
                $dv_number = $_POST['dv_number'];
                $generated_by = $_POST['generated_by'];
                $date = $_POST['fund_cluster'];
                $fund_cluster = ['fund_cluster'];
                $or_bus = ['or_bus'];
              
                        $stmt = $mysqli->prepare('SELECT * FROM dv_table WHERE dv_number = ?');

                        $stmt->bind_param("i", $search);
                        $stmt->execute();
                        $result = $stmt->get_result();

                $queryResults = mysqli_num_rows($result);

                 if($queryResults >0){
                    while ($rows = mysqli_fetch_assoc($result)){
                        


    ?>
	
<table class="table-sm">
            <tr>
				<td>DV. No.</td>
                <td><?php echo $row['dv_number']; ?></td>
            </tr>
            <tr>
                <td>By:</td><!--initials-gumawa-->
                <td><?php echo $row['generated_by'];?></td>
            </tr>
            <tr>
                <td>Date</td>
                <td><?php echo $row['date'];?></td>
            </tr>
            <tr>
                <td>Fund Cluster:</td><!--program fund/MOOE-->
                <td><?php echo $row['fund_cluster'];?></td>
            </tr>
            <tr>
                <td>OR/ BUS:</td><!--(option)-->
                <td><?php echo $row['or_bus'];?></td>
            </tr>
</table>
		<?php 
    }
}
}
?>