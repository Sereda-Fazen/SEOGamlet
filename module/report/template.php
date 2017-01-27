<!DOCTYPE html>
<html>
<head>
    <title>VisualCeption Report</title>
</head>
<body>

<style>
    p{
        font-weight: bold;
        text-align: center;
        margin: 25px 0 20px 0;
        font-size: 22px;
    }
    .top-img{
        margin: 0 auto;
        display: block;
    }
    div > img{
        width: 100%;
        max-width:450px;
        display: block;
    }

    div{
        display: inline-block;
        width: 30%;
        margin-right: 10px;
        border: 2px solid #333;
        margin-bottom: 10px;
        vertical-align: top;
        border: 2px solid rgba(150,150,150, 0.4);
    }


</style>

<img class="top-img" src="http://www.thewebhatesme.com/wp-content/uploads/visualception.png" />

<?php foreach ($failedTests as $failedTest): ?>


    <div class="currentimage">
        <p>Reference Image</p>
        <img src='data:image/png;base64,<?php echo base64_encode(file_get_contents($failedTest->getExpectedImage())); ?>' />
    </div>

    <div class="expectedimage">
        <p>Expected Image</p>
        <img src='data:image/png;base64,<?php echo base64_encode(file_get_contents($failedTest->getCurrentImage())); ?>' />
    </div>

    <div class="deviationimage">
        <p>Deviation Image</p>
        <img src='data:image/png;base64,<?php echo base64_encode(file_get_contents($failedTest->getDeviationImage())); ?>' />
    </div>

<?php endforeach; ?>

</body>
</html>