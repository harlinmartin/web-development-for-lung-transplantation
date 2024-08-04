<?php
session_start();

if (isset($_SESSION['client_id']) && isset($_SESSION['email'])) {
    $c_id = $_SESSION['client_id'];
    $c_em = $_SESSION['email'];
} else {
    // Redirect to the login page or handle the situation where the user is not logged in
    header("Location: ../login.php");
    exit();
}
?>

<div id="ordersBtn">
    <h2>Requests</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Date</th>
                <th>Description</th>
                <th>Client ID</th>
                <th>Nurse ID</th>
                <th>Options</th>
                <th>Status</th>
            </tr>
        </thead>
        <?php
        include_once "../config/dbconnect.php";
        $sql = "SELECT *
                FROM booking
                JOIN client ON booking.client_id = client.client_id..........................................
                JOIN nurse ON booking.nurse_id = nurse.nurse_id
                WHERE booking.client_id='$c_id'";
        $result = $conn->query($sql);

        if ($result !== false && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?= $row["booking_id"] ?></td>
                    <td><?= $row["date"] ?></td>
                    <td><?= $row["description"] ?></td>
                    <td><?= $row["client_id"] ?></td>
                    <td><?= $row["nurse_id"] ?></td>
                    <td><button class="btn btn-danger" style="height:40px"
                                onclick="itemDeleteRequests('<?= $row['booking_id'] ?>')">Delete
                        </button></td>
                    <?php
                    if ($row["status"] == "Pending") {
                        ?>
                        <td><button class="btn btn-danger">Pending</button></td>
                        <?php
                    } else if ($row["status"] == "Accepted") {
                        ?>
                        <td>
                            <form id="paymentForm" method="POST" action='../payment1.php'>
                                <input type="hidden" name="booking_id" value="<?= $row['booking_id'] ?>">
                                <input type="submit" name="submit" class="btn btn-success" value="Pay">
                            </form>
                        </td>
                        <?php
                    } else if ($row["status"] == "Paid") {
                        ?>
                        <td><button class="btn btn-danger">Paid</button></td>
                        <?php
                    }
                    if ($row["status"] == 0) {
                        ?>
                        <td><button class="btn btn-danger"
                                    onclick="ChangePay('<?= $row['booking_id'] ?>')">Unpaid
                            </button></td>
                        <?php
                    } else if ($row["status"] == 1) {
                        ?>
                        <td><button class="btn btn-success"
                                    onclick="ChangePay('<?= $row['booking_id'] ?>')">Paid
                            </button></td>
                        <?php
                    }
                    ?>
                </tr>
                <?php
            }
        }
        ?>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="viewModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Order Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="order-view-modal modal-body">
            </div>
        </div><!--/ Modal content-->
    </div><!-- /Modal dialog-->
</div>
<script>
    //for view order modal
    $(document).ready(function () {
        $('.openPopup').on('click', function () {
            var dataURL = $(this).attr('data-href');

            $('.order-view-modal').load(dataURL, function () {
                $('#viewModal').modal({show: true});
            });
        });
    });
</script>
