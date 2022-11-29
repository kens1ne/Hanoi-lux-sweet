<main class="app-content">
    <div class="app-title">
       
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item active"><a href="#"><b>Biểu đồ thống kê</b></a></li>
      </ul>
      <div id="clock"></div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h6 class="tile-title">Đã thống kê</h6>

          <div class="row mb10">
                <a class="btn btn-pink btn-sm " href="index.php?act=listtk" title="Thêm">
                  Quay lại</a>
            </div>

          <div class="tile-body">
            <div class="row element-button">

<div class="hop">
    <div style= "text-align: center;" class="">
    <div class="row frmtitle">
        </div>
        <div id="piechart"></div>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <script type="text/javascript">
            // Load google charts
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            // các giá trị của biểu đồ
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Loại hàng', 'Số lượng sản phẩm'],
                    <?php
                    $tongloai=count($listthongke);
                    $i=1;
                        foreach ($listthongke as $thongke) {
                            extract($thongke);
                            if($i==$tongloai) $dauphay=""; else $dauphay=",";
                            echo "['".$thongke['name']."',".$thongke['so_luong']."]".$dauphay;
                            $i+=1;
                        }
                    ?>
                ]);

                // tiêu đề và chiều cao và độ rộng của biểu đồ
                var options = {
                    'title': 'Thông kê sản phẩm theo loại phòng khách sạn',
                    'width': 850,
                    'height': 700
                };

                // Display the chart inside the <div> element with id="piechart"
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                chart.draw(data, options);
            }
        </script>

    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</main>
