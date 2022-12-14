<div class="modal-header">
    <h5 class="modal-title" id="myLargeModalLabel">Chỉnh sửa phòng: <?=$info['name'];?></h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <!-- With Controls -->
    <input type="hidden" id="id_room" value="<?=$info['id'];?>">
    <div class="row">
        <div class="col-md-12">
            <div>
                <label class="form-label">Tên phòng</label>
                <input type="text" class="form-control" value="<?=$info['name'];?>">
            </div>
        </div>
        <div class="col-md-12">
            <div>
                <label class="form-label">Giá phòng</label>
                <input type="number" class="form-control" value="<?=$info['price'];?>">
            </div>
        </div>
        <div class="col-md-12">
            <div>
                <label class="form-label">Mô tả</label>
                <textarea id="description" class="form-control ckeditor-classic"><?=$info['description'];?></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div>
                <label class="form-label">Ngày trả</label>
                <input type="text" class="form-control" value="<?=$info['end_date'];?>" readonly>
            </div>
        </div>
        <div class="col-md-12 mt-3">
            <h5 class="fs-17 mb-0">
                Tổng thanh toán :
                <span class="product-line-price"><?=number_format($info['total_price']);?> VNĐ</span>
            </h5>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 my-3">
            <select class="form-select" id="type_approval_detail">
                <option selected>Duyệt</option>
                <option value="1">Đã thanh toán</option>
                <option value="2">Hủy đơn</option>
            </select>
        </div>
        <div class="col-md-12">
            <div id="approval_message"></div>
        </div>
    </div>
</div>