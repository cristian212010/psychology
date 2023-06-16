<?php
if (isset($_POST['nuevaPersona'])) {
    $url = "http://localhost/psychology/apirest/controllers/campers.php?op=insert";
    $data = array(
        'nombre' => $_POST['nombre'], 
        'telefono' => $_POST['telefono'], 
        'correo' => $_POST['correo'],
        'documento' => $_POST['documento'],
        'tipo_documento' => $_POST['tipo_documento'],
        'tipo_persona' =>$_POST['tipo_persona']
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST,true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    $response = curl_exec ($ch);
    curl_close($ch);
    print $response;

    echo "<script>alert('Datos guardados');document.location='users'</script>";
}
?>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Crear Persona
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
            <div>
                <label for="">Nombre</label>
                <input type="text" name="nombre">
            </div>
            <div>
                <label for="">Telefono</label>
                <input type="number" name="telefono">
            </div>
            <div>
                <label for="">Correo</label>
                <input type="text" name="correo">
            </div>
            <div>
                <label for="">Documento</label>
                <input type="number" name="documento">
            </div>
            <div>
                <label for="">tipo_documento</label>
                <input type="text" name="tipo_documento">
            </div>
            <div>
                <label for="">tipo_persona</label>
                <input type="text" name="tipo_persona">
            </div>
            <input type="submit" value="enviar" name="nuevaPersona">
        </form>
      </div>
    </div>
  </div>
</div>
