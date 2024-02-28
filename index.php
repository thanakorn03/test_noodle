<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
    <title>CRUD Customer Information with Enlarge Image</title>
    <style>
        table {
            border-radius: 10px;
        }

        .btn:hover {
            filter: brightness(90%);
        }

        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }

        .btn-danger {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12"> <br>
                <h3>รายชื่อลูกค้า <a href="addfood_dropdown.php" class="btn btn-info float-end">+เพิ่มข้อมูล</a> </h3> <br />
                <table id="customerTable" class="display table table-striped table-bordered">
                    <thead align="center">
                        <tr>
                            <th width="10%">รหัสอาหาร</th>
                            <th width="20%">ชื่ออาหาร</th>
                            <th width="15%">ราคาอาหาร</th>
                            <th width="10%">ภาพ</th>
                            <th width="5%">แก้ไข</th>
                            <th width="5%">ลบ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require 'connect.php';
                        $sql = "SELECT * FROM food";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->fetchAll();
                        foreach ($result as $r) { ?>
                            <tr>
                                <td><?= $r['FoodID'] ?></td>
                                <td><?= $r['FoodName'] ?></td>
                                <td><?= $r['Foodprice'] ?></td>
                                <td><img src="./image/<?= $r['Image']; ?>" width="50px" height="50" alt="image" onclick="enlargeImg() id="img<?= $r['FoodID'] ?>"></td>
                                <td><a href="updatefood.php?FoodID=<?= $r['FoodID'] ?>" class="btn btn-warning btn-sm">แก้ไข</a></td>
                                <td><a href="deletefood.php?FoodID=<?= $r['FoodID'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบข้อมูล !!');">ลบ</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Image Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Enlarged Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="enlargedImage" src="" alt="Enlarged Image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script>
    $(document).ready(function() {
        let table = $('#customerTable').DataTable();
    });

    function enlargeImg(imagePath) {
        $('#enlargedImage').attr('src', imagePath);
        $('#imageModal').modal('show'); // เปิด modal เมื่อคลิกที่รูป
    }
</script>
</body>

</html>