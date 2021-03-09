<?php include '../header.php'; ?>
<?php
    $id = $_POST['id'];
    $sql = "SELECT * FROM reservation WHERE id = $id";
        $result = mysqli_query($db,$sql);
        if(!$result){
            echo 'Error: ' . mysql_error($db);
            exit();
        }
        ?>
        <?php while($recording = mysqli_fetch_assoc($result)) : 
        $time = $recording['time_s'];
        $date = $recording['date_s'];
        $phone = $recording['phone'];
        $name = $recording['fullname'];
        $guests_count = $recording['guests_count'];
        $email = $recording['email'];
        $created_at = $recording['created_at'];
    endwhile
    ?>
?>
<div class="container text-center mt60 pb80">
    <h1>Reserve your table</h1>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <img src="https://via.placeholder.com/559x334" alt="559X334 IMAGE">
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <form action="/admin/reservation-insert.php?update=1" method="post" enctype="multipart/form-data">
            <div class="row row-cols-2">
                <div class="col p15v">
                    <input type="text" hidden="" value="<?php echo $id; ?>" name="id">
                    <input type="text" class="inputs" required="" value="<?php echo $name; ?>" name="name" placeholder="Name*">    
                </div>
                <div class="col p15v">
                    <input type="date" class="inputs" required="" value="<?php echo $date; ?>" name="date" placeholder="Date*">    
                </div>
                <div class="col p15v">
                    <input type="time" class="inputs" required="" value="<?php echo $time; ?>" name="time" placeholder="Time*">    
                </div>
                <div class="col p15v">
                    <input type="email" class="inputs" required="" value="<?php echo $email; ?>" name="email" placeholder="Email Adress*">
                </div>
                <div class="col p15v">
                    <input type="number" class="inputs" required="" value="<?php echo $guests_count; ?>" name="guests" placeholder="Guests**">    
                </div>
                <div class="col p15v">
                    <input type="tel" class="inputs" required="" value="<?php echo $phone; ?>" name="tel-num" pattern="1-[0-9]{3}-[0-9]{3}-[0-9]{3}" placeholder="Phone number*">
                </div>
            </div>
            <div class="row row-cols-3">
                <div class="col">
                <button class="btn btn-warning text-uppercase white fs-14" type="submit">make reservation</button>
            </form>
        </div>
        <div class="col">
            <p class="d-inline-block text-uppercase font-weight-bolder pr15 br-lightgrey fs-12">
                You can also call <br> <span class='pink'>for a reservation</span>
            </p>
       </div>
        <div class="col">
            <h4>1-007 006 005</h4>
        </div>
    </div>
</div>