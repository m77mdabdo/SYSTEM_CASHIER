<style>
    .avatar-img {
        width: 3em;
        height: 3em;
        object-fit: cover;
        object-position: center center;
        border-radius: 50%;
    }
</style>
<?php require_once('inc/header.php') ?>

<body class="sidebar-mini layout-fixed layout-navbar-fixed text-sm">
    <div class="wrapper">
        <?php require_once('inc/navigation.php') ?>

        <div class="card card-outline rounded-0 card-warning container" style="margin: auto; margin-right: 100px;">
            <div class="card-header">
                <h3 class="card-title">List of Users</h3>
                <div class="card-tools">
                    <a href="javascript:void(0)" id="create_new" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span> Create New</a>
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <table class="table table-hover table-striped table-bordered" id="list">
                        <colgroup>
                            <col width="5%">
                            <col width="15%">
                            <col width="15%">
                            <col width="15%">
                            <col width="10%">
                            <col width="10%">
                            <col width="10%">
                            <col width="10%">
                            <col width="10%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Avatar</th>
                                <th>Full Name</th>
                                <th>Username</th>
                                <th>Last Login</th>
                                <th>Type</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i = 1;
                            foreach($data['users'] as $user) { ?>
                                <tr>
                                    <td class="text-center"><?= $i++ ?></td>
                                    <td class="text-center">
                                        <img src="<?= $user->avatar ?? 'assets/default-avatar.png' ?>" class="avatar-img" />
                                    </td>
                                    <td><?= $user->firstname . ' ' . $user->middlename . ' ' . $user->lastname ?></td>
                                    <td><?= $user->username ?></td>
                                    <td><?= $user->last_login ?: 'Never' ?></td>
                                    <td><?= ucfirst($user->type) ?></td>
                                    <td class="text-center">
                                        <?php if ($user->username): ?>
                                            <span class="badge badge-success px-3 rounded-pill">Active</span>
                                        <?php else: ?>
                                            <span class="badge badge-danger px-3 rounded-pill">Inactive</span>
                                        <?php endif ?>
                                    </td>
                                    <td></td>
                                    <td align="center">
                                        <button type="button" class="btn btn-flat p-1 btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                            Action
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                            <a class="dropdown-item view-data" href="javascript:void(0)" data-username="<?= $user->username ?>"><span class="fa fa-eye text-dark"></span> View</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item edit-data" href="javascript:void(0)" data-username="<?= $user->username ?>"><span class="fa fa-edit text-primary"></span> Edit</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item delete_data" href="javascript:void(0)" data-username="<?= $user->username ?>"><span class="fa fa-trash text-danger"></span> Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php require_once('inc/alert.php') ?>

    <script>
        $(document).ready(function () {
            $('.delete_data').click(function () {
                _conf("Are you sure to delete this User permanently?", "delete_user", [$(this).attr('data-username')])
            })

            $('#create_new').click(function () {
                uni_modal("<i class='far fa-plus-square'></i> Add New User", _base_url_ + "user/makeUser")
            })

            $('.edit-data').click(function () {
                uni_modal("<i class='fa fa-edit'></i> Edit User", _base_url_ + `user/editUser/${username}` + $(this).attr('data-username'))
            })

            $('.view-data').click(function () {
                const username = $(this).attr('data-username');
                setTimeout(() => {
                    window.open(_base_url_ + "user/viewUser/" + username, '_blank', "width=" + ($(window).width() * .8) + ",left=" + ($(window).width() * .1) + ",height=" + ($(window).height() * .8) + ",top=" + ($(window).height() * .1));
                }, 200);
            })

            $('.table').dataTable({
                columnDefs: [{ orderable: false, targets: [8] }],
                order: [0, 'asc']
            });
            $('.dataTable td,.dataTable th').addClass('py-1 px-2 align-middle');
        })

        function delete_user(username) {
            start_loader();
            $.ajax({
                url: _base_url_ + `user/deleteUser/${$username}`,
                method: "POST",
                dataType: "json",
                error: err => {
                    console.log(err);
                    alert_toast("An error occurred.", 'error');
                    end_loader();
                },
                success: function (resp) {
                    location.reload();
                }
            })
        }
    </script>

    <?php require_once('inc/footer.php') ?>
</body>
</html>
