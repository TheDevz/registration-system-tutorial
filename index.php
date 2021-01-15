<?php
session_start();

require 'inc/utils.php';
require 'db/utils.php';

$tab_title = "Admin panel";
$logged = $_SESSION['logged'] ?? false;

if (!$logged) {
	redirect('login.php');
}

$db_data = get_db();
$users_data = $db_data['users'];
?>

<?php include 'components/heading.php';?>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-8" style="margin-top: 100px">
            <div class="card p-4">
                <div class="card-header">Admin panel</div>
                    <?php if (count($users_data) > 0): ?>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Firstname</th>
                                <th scope="col">Lastname</th>
                                <th scope="col">email</th>
                                <th scope="col">picture</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users_data as $key => $user):?>
                                    <tr>
                                        <th scope="row"><?php echo ++$key ?></th>
                                        <td><?php echo $user['firstname'] ?></td>
                                        <td><?php echo $user['lastname'] ?></td>
                                        <td><?php echo $user['email'] ?></td>
                                        <td><a href="<?php echo sanitize($user['picture']) ?>">uploaded picture</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <h5 class="p-3 text-center">Hey, there are no users</h5>
                    <?php endif; ?>
                </div>
            </div>
		</div>
	</div>
</div>

<?php include 'components/ending.php';?>
