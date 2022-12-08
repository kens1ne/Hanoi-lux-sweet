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
.color {
    color: black;
}
.profile .add-p {
    padding: 100px 0 0 72px;
}
.content {
    padding: 100px 80px;
}
.profile {
    margin-top: 104px;
}
.sub-profile li {
    list-style-type: none;
    text-align: center;

    background-color: #c19b76;
    color: #fff;
    padding: 10px 20px;
    border: none;
    margin: 10px 40px;
}
.sub-profile {
    background-color: #fff;
    box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
    padding: 10px;
    margin-bottom: 20px;
}
.sub-profile h1 {
    text-align: center;
    font-size: 30px;
    padding: 10px 0;
    margin: 0;
    font-weight: bold;
}
.sub-profile h2 {
    text-align: center;
    font-size: 20px;
    padding: 10px 0;
    margin: 0;
    font-weight: bold;
}
.container {
    padding: 50px 0;
}
</style>
        <div class="content profile">
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
        </div>
        </div>
    