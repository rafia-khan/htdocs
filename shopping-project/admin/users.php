<?php
// include header file
include 'header.php'; ?>
<div class="admin-content-container">
    <h2 class="admin-heading">All Users</h2>
    <?php
    $limit = 2;
    $db = new Database();
    $db->select('user', '*', null, null, 'user_id DESC', $limit);
    $result = $db->getResult();
    if (count($result) > 0) { ?>
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <th>Full Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>City</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php foreach ($result as $row) { ?>
                    <tr>
                        <td><?php echo $row['f_name'] . ' ' . $row['l_name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['mobile']; ?></td>
                        <td><?php echo $row['city']; ?></td>
                        <td>
                            <a href="" class="btn btn-xs btn-primary user-view" data-id="<?php echo $row['user_id']; ?>" data-toggle="modal" data-target="#user-detail"><i class="fa fa-eye"></i></a>
                            <?php
                            if ($row['user_role'] == '1') { ?>
                                <a href="" class="btn btn-xs btn-danger user-status" data-id="<?php echo $row['user_id']; ?>" data-status="<?php echo $row['user_role'] ?>" data-toggle="tooltip" data-placement="left" title="Block!"><i class="fa fa-ban" aria-hidden="true"></i>
                                </a>
                            <?php } else { ?>
                                <a href="" class="btn btn-xs btn-success user-status" data-id="<?php echo $row['user_id']; ?>" data-status="<?php echo $row['user_role'] ?>" data-toggle="tooltip" data-placement="top" title="Unblock"><i class="fa fa-unlock" aria-hidden="true"></i>
                                </a>
                            <?php   } ?>
                            <a class="btn btn-xs btn-danger delete_user" href="javascript:void();" data-id="<?php echo $row['user_id']; ?>" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <div class="not-found clearfix">!!! No Users Found !!!</div>
    <?php  }  ?>
    <div class="pagination-outer">
        <?php echo $db->pagination('user', null, null, $limit); ?>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="user-detail" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>
<!-- /Modal -->
<?php
//    include footer file
include "footer.php";
?>