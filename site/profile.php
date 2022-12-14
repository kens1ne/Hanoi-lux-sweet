<div class="content my-5">
    <div class="container">
        <table id="table_id" class="display">
            <thead>
                <tr class="first-column">
                    <th>ID</th>
                    <th>Phone</th>
                    <th>Name Booking</th>
                    <th>Room Name</th>
                    <th>Checkin</th>
                    <th>Checkout</th>
                    <th>Total Price</th>
                    <th>thông tin</th>
                </tr>
            <tbody class="color">
                <?php foreach( $booking as $data){  ?>
                
                <tr>
                    <td><?=$data['id']?></td>
                    <td><?=$data['phone']?></td>
                    <td><?=$data['name_booking']?></td>
                    <td><?=$data['name']?></td>
                    <td><?=$data['start_date']?></td>
                    <td><?=$data['end_date']?></td>
                    <td><?=$data['total_price']?></td>
                    <th><a href="index.php?action=order&id=<?=$data['id']?>">Đơn hàng</a></th>

                </tr>
                <?php }?>
            </tbody>
        </table>

    </div>
</div>
</div>