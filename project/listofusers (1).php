<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Users</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<body>
<?php
    // Lưu ý: Đảm bảo file db.php có tồn tại và class DbHelper hoạt động.
    require_once "db.php";
    $db = new DbHelper();
    // Nên thêm ORDER BY để dữ liệu có thứ tự rõ ràng
    $sql = "select * from users ORDER BY date_created DESC"; 
    $st = $db->select($sql);
    ?>
    
    <div class="container p-3">
        <div class="card shadow">
            <div class = "card-header text-center bg-primary text-white">
                <h3 class="mb-0">📋 Danh sách người dùng hệ thống</h3>
            </div>
            <div class="card-body"> 
                
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover align-middle">
                        <thead>
                            <tr> 
                                <th style="width: 5%">ID</th>
                                <th>Tên người dùng</th>
                                <th>Email</th>
                                <th style="width: 15%">Ngày tạo</th>
                                <th style="width: 15%" class="text-center">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        // Kiểm tra xem có dữ liệu không
                        if (empty($st)) {
                            echo '<tr><td colspan="5" class="text-center text-muted">Không có người dùng nào trong cơ sở dữ liệu.</td></tr>';
                        }
                        
                        foreach ($st as $k)
                        {
                        ?>
                        <tr> 
                            <td><?php echo $k->id; ?></td>
                            <td><?php echo htmlspecialchars($k->name); ?></td> <td><?php echo htmlspecialchars($k->email); ?></td>
                            <td><?php echo date('d/m/Y', strtotime($k->date_created)); ?></td>
                            <td class="text-center">
                                <a href="updateUser.php?id=<?php echo $k->id;?>" class="btn btn-sm btn-warning me-2" title="Chỉnh sửa">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                    </svg>
                                </a>
                                
                                <a href="#" class="btn btn-sm btn-danger" title="Xóa"
                                    data-bs-toggle="modal" 
                                    data-bs-target="#deleteConfirmationModal"
                                    data-bs-id="<?php echo $k->id; ?>"
                                    data-bs-name="<?php echo htmlspecialchars($k->name); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                    </svg>
                                </a>

                            </td>
                        </tr>

                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <div>Tổng số user: **<?php echo count($st); ?>**</div>
                <a href="newuserinput.php" class="btn btn-success">➕ Thêm User Mới</a>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel">⚠️ Xác nhận Xóa Người Dùng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn **có chắc chắn** muốn xóa người dùng **<span id="userNameToDelete" class="fw-bold text-danger"></span>**? 
                    Hành động này không thể hoàn tác.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <a id="confirmDeleteButton" href="#" class="btn btn-danger">Xóa Vĩnh Viễn</a>
                </div>
            </div>
        </div>
    </div>
    
    <script src="js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteModal = document.getElementById('deleteConfirmationModal');
            if (deleteModal) {
                deleteModal.addEventListener('show.bs.modal', function (event) {
                    // Lấy nút kích hoạt modal (nút Xóa)
                    const button = event.relatedTarget;
                    
                    // Lấy ID và Tên user từ data-* attributes
                    const userId = button.getAttribute('data-bs-id');
                    const userName = button.getAttribute('data-bs-name');
                    
                    // Cập nhật nội dung trong Modal
                    const modalBodyInput = deleteModal.querySelector('#userNameToDelete');
                    const confirmDeleteButton = deleteModal.querySelector('#confirmDeleteButton');
                    
                    modalBodyInput.textContent = userName;
                    // Cập nhật href của nút 'Xóa Vĩnh Viễn'
                    confirmDeleteButton.href = 'deleteUser.php?id=' + userId;
                });
            }
        });
    </script>
</body>
</html>