<h3>Cargar Departamentos</h3>
<?php
   // echo form_open();
    /*echo form_label('Archivo', 'archivo');
    $datos = array();
    echo form_upload($datos);echo '<br>';
    echo form_submit('botonSubmit', 'Enviar');*/
    ?>
    <form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="archivo">
    <input type="submit" value="Enviar" />
    </form>

    <?php
    //echo form_submit('botonSubmit', 'Enviar');
    //echo form_close();

?>