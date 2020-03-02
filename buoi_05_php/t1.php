<?php
    $ten='Nguyễn Văn A';
    echo $ten;
    echo '<br>';
    echo "PHP there! ".$ten;

    $num1=12345;
    echo $num1;
?>

<h1>the h1 <?php echo $ten; ?></h1>

<?php
    echo '<h1>the h1 '.$ten.'<br>'.$num1.'</h1>';
?>

<h1>
    Tên: Nguyễn Văn A
    <br>
    Tuổi: 12345
</h1>

<hr>

<?php
    /* echo '<h1>
            Tên: '.$ten.'
            <br>
            Tuổi: '.$num1.'
        </h1>';

    echo '<h1>';
    echo 'Tên: '.$ten;
    echo '<br>';
    echo 'Tuổi: '.$num1;
    echo '</h1>'; */

    $txt1='';
    $txt1=$txt1.'<h1>';
    $txt1=$txt1.'Tên: '.$ten;
    $txt1=$txt1.'<br>';
    $txt1=$txt1.'Tuổi: '.$num1;
    //$txt1=$txt1.'</h1>';
    $txt1.='</h1>';
    echo $txt1;
    
?>