
<?php
extract($booking);
?>
<style>
    .table-order{
    margin-top:20px;    
    
    font-family:Arial,Helvetica;
}
table, th, td{
            border:1px solid black;
        }
        table{
            border-collapse:collapse;
            width:100%;
        }
        th, td{
            text-align:left;
            padding:23px;
            
            font-size:15px; 
            

        }
        tr:hover{
            background-color:#ddd;
            cursor:pointer;
        }
.first-column{
    background-color: #c19b76;
    color: #fff;
}
</style>

<table>
    
        <tr class="first-column">
            <th>ID</th>
            <th>User Name</th>
            <th>Phone</th>
            <th>Name Booking</th>
            <th>Room Name</th>
            <th>Checkin</th>
            <th>Checkout</th>
            <th>Total Price</th>
        </tr>
        <?php foreach( $booking as $data){  ?>
            
            <tr>
                <td><?=$data['id_booking']?></td>
                <td><?=$data['username']?></td>
                <td><?=$data['phone']?></td>
                <td><?=$data['name_booking']?></td>
                <td><?=$data['name']?></td>
                <td><?=$data['check_in']?></td>
                <td><?=$data['check_out']?></td>
                <td><?=$data['total_price']?></td>
                
            </tr>
            <?php }?>
        

    </table>