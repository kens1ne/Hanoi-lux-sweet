<div class="content mt-5">
    <div class="container">
        <table style="border-radius: 4px;" id="table_id" class="display">
            <thead>
                <tr class="first-column">
                    <th>ID</th>
                    <th>Phone</th>
                    <th>Name Booking</th>
                    <th>Room Name</th>
                    <th>Checkin</th>
                    <th>Checkout</th>
                    <th>Total Price</th>
                    <th>Detail</th>
                </tr>
            <tbody class="color">
                <?php foreach( $booking as $data){  ?>
                
                <tr style="background-color: #ccc; color: #000; border-radius: 5px;">
                    <td><?=$data['id']?></td>
                    <td><?=$data['phone']?></td>
                    <td><?=$data['name_booking']?></td>
                    <td><?=$data['name']?></td>
                    <td><?=$data['start_date']?></td>
                    <td><?=$data['end_date']?></td>
                    <td><?=number_format($data['total_price'])?> VNĐ</td>
                    <td><button type="submit" class="btn btn-success btn-block" name=""><a style="text-decoration: none; color: #fff;" href="index.php?action=order&id=<?=$data['id']?>">Đơn hàng</a></button></td>

                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>
</div>