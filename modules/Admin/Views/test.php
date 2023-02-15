<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url();?>/public/assets/user/bootstrap/css/bootstrap.min.css">
    
    <title>testing with database</title>
</head>

<body>


    <div class="card">
        <div class="card-header">
            <h4>Data</h4>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th >sno</th>
                        <th >Id</th>
                        <th >Name</th>
                        <th >Email</th>
                        <th >password</th>
                        <th >Mobile</th>
                        <th >Role</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php $sno=1; foreach( $info as $key){ ?>
                    <tr>
                        <td><?php echo $sno?></td>
                        <td><?php echo $key['user_id']?></td>
                        <td><?php echo $key['user_name']?></td>
                        <td><?php echo $key['user_email']?></td>
                        <td><?php echo $key['user_password']?></td>
                        <td><?php echo $key['user_mobile']?></td>
                        <td><?php echo $key['user_role']?></td>
                    </tr>
                   <?php $sno++;} ?> 
                </tbody>
            </table>

        </div>
        <div class="card-footer">

        </div>
    </div>


    <script src="<?php echo base_url();?>/public/assets/user/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>