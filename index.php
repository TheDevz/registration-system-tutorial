<?php
session_start();

require_once 'inc/utils.php';
require 'db/utils.php';
require 'db/models/User.php';

if (isset($_SERVER['PATH_INFO']) && strlen($_SERVER['PATH_INFO']) > 0) {
    $request_path = explode('/', $_SERVER['PATH_INFO']);
    if ($request_path[1] === 'api') {
        header('Content-Type: application/json');

        if (count($request_path) > 2) {

            $request_instance = $request_path[2];

            if ($request_instance === 'users'){
                $users = User::get_all();
                echo json_encode(['data' => $users]);
            } else {
                echo "{\"error\": \"No such instance supported\"}";
            }
        } else {
            header('Content-Type: application/json');
            echo '{"error": "No instance requested"}';
        }
        exit;
    }
}

$tab_title = "Admin panel";

$user_index = $_SESSION['user_id'] ?? null;

$user = new User($user_index);

if ($user->firstname === 'guest'){
    redirect('login.php');
}

$users_data = $user->get_all();
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
