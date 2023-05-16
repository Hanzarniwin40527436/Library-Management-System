<?php
include("../vendor/autoload.php");
// use Database\MySQL;
// use Database\Student;
// $table = new Student(new MySQL());
// $student = $table->getAll();

use Helpers\Auth;

$auth = Auth::student();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/student.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- ------------------- Boxicon ------------------ -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <title>Profile</title>

</head>
<style>
.pbox1 {
    margin-top: 40px;
    width: 550px;
    height: 655px;
    margin-left: auto;
    margin-right: auto;

    border: solid 1px;
    border-radius: 8px;
    border-color: #df5e5e;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px,
        rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
}
</style>

<body>
    <div class="pbox1">
        <form action="../actions/update_profile.php" method="POST" enctype="multipart/form-data">
            <img src="../images/<?= $auth->profile_img ?>"
                style="width:120px;height:120px;border:solid 1px;margin-top:10px;margin-left:205px;">
            <div style="padding-top:20px;width:500px;padding-left:50px">
                <div class="input-group mb-3">
                    <input type="file" name="profile" class="form-control">
                    <button class="btn btn-secondary" style="background-color: #df5e5e;">Upload</button>
                </div>
            </div>

            <div style=" float:left;padding-top:5px;padding-left:170px">
                <div>
                    <label class="id">Student ID:&ensp;</label><?= $auth->student_id ?><br /><br />

                </div>
                <div>
                    <label class="sname">
                        Name:&ensp;&ensp;&ensp;&ensp;&ensp;&nbsp;</label><?= $auth->name ?><br /><br />
                </div>
                <div>
                    <label
                        class="sbatch">Batch:&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;</label><?= $auth->batch ?><br /><br />
                </div>
                <div>
                    <label class="syear">Year:&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&nbsp;&nbsp;
                    </label><?= $auth->year ?><br /><br />
                </div>
                <div>
                    <label class="semail">Email:&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                    </label><?= $auth->email ?><br /><br />
                </div>
                <div>
                    <a class="btn w-100" style="background-color: #df5e5e; color: #fff;"
                        href="../student_ui/requestedb.php">
                        View Request Book</a><br /><br />
                    <a class="btn w-100" style="background-color: #df5e5e; color: #fff;"
                        href="../student_ui/issueb.php">
                        View Issued Book</a><br /><br />
                    <a class="btn btn-secondary" style="margin-left:-150px;background-color: #df5e5e;"
                        href="../student_ui/std_cs_view.php">
                        < Back</a><br />
                </div>
        </form>
    </div>


</body>

</html>