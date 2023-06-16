<?php
$url = "http://localhost/psychology/apirest/controllers/campers.php?op=GetAll";
$curl = curl_Init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$output = json_decode(curl_exec($curl));
curl_close($curl);

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
<div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- Button trigger modal -->
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

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Documento</th>
                    <th>Tipo Documento</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        foreach ($output as $out) 
                        {
                    ?>
                  <tr>
                    <td><?php echo $out->nombre; ?></td>
                    <td><?php echo $out->telefono; ?></td>
                    <td><?php echo $out->correo; ?></td>
                    <td><?php echo $out->documento; ?></td>
                    <td><?php echo $out->tipo_documento; ?></td>
                  </tr>
                  <?php } ?>
                  <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 5.0
                    </td>
                    <td>Win 95+</td>
                    <td>5</td>
                    <td>C</td>
                  </tr>
                  <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 5.5
                    </td>
                    <td>Win 95+</td>
                    <td>5.5</td>
                    <td>A</td>
                  </tr>
                  
                  <tr>
                    <td>Other browsers</td>
                    <td>All others</td>
                    <td>-</td>
                    <td>-</td>
                    <td>U</td>
                  </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>