<<<<<<< HEAD
<style>
/* .table-order {
    margin-top: 20px;

    font-family: Arial, Helvetica;
}

table,
th,
td {
    border: 1px solid black;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th,
td {
    text-align: left;
    padding: 23px;

    font-size: 15px;


}

tr:hover {
    background-color: #ddd;
    cursor: pointer;
}

.first-column {
    background-color: #c19b76;
    color: #fff;
} */
.color{
    color:black;
}
</style>
<div class="content my-5">
    <div class="container">
    <table id="table_id" class="display">
    <thead>
        <tr class="first-column">
=======
<div class="content my-5">
    <div class="container">
        <table id="table_id" class="display">
            <thead>
                <tr class="first-column">
>>>>>>> origin/main
                    <th>ID</th>
                    <th>Phone</th>
                    <th>Name Booking</th>
                    <th>Room Name</th>
                    <th>Checkin</th>
                    <th>Checkout</th>
                    <th>Total Price</th>
<<<<<<< HEAD
<<<<<<< HEAD
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

            </tr>
            <?php }?>
    </tbody>
</table>

        </div>
=======
                    <th>thông tin</th>
=======
                    <th>Detail</th>
>>>>>>> origin/main
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
                    <td><button type="submit" class="btn btn-success btn-block" name=""><a style="text-decoration: none; color: #fff;" href="index.php?action=order&id=<?=$data['id']?>">Đơn hàng</a></button></td>

                </tr>
                <?php }?>
            </tbody>
        </table>

>>>>>>> origin/main
    </div>
</div>
</div>