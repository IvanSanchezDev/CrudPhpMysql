<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="src/Assets/css/style.css" />
  <title>
    Tecnologia en Desarrollo Sistemas Informaticos - Unidades Tecnológicas de
    Santander
  </title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
</head>

<body>

  <header id="main-header" class="main-header">
    <section class="navbar-uts">
      <img src="img/Logo-UTS-1.png" class="logo" alt="Logo" />
      <nav class="navbar-general">
        <a href="index.html">Estudiantes</a>
        <a href="./Materia/materia.html">Plan de Estudios</a>
        <a href="./matriculas/matriculas.html">Matriculas</a>
        <a href="./ofertaAcademica/ofertaAcademica.html">Oferta Academica</a>
        <a href="./Docente/docentes.html">Docentes</a>
        <a href="./camposDeAccion/camposDeAccion.html">Campos de Accion</a>
      </nav>
      <button class="btn-academic bg-verde">Portal</button>
    </section>
  </header>
  <!--  <section class="hero">
      <img src="img/banner-tec-sistemas-jpg.jpg" alt="Banner" class="banner" />
    </section> -->
  <!-- modal crear estudiantes ini -->
  <!-- <div class="container mt-4 shadow-lg p-3 mb-5 bg-body rounded"> -->
  <section class="modalito">
    <center>
      <button id="btnCrearEstudiante" type="button" class="btn btn-success tamano" data-bs-toggle="modal" data-bs-target="#modalEstudiante" data-bs-whatever="@getbootstrap">
        Agregar Estudiante
      </button>

      <div style="color:white;">Buscar</div>
      <input type="text" id="search">

    </center>

    <div class="modal fade" id="modalEstudiante" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-success text-white">
            <h5 class="modal-title formTam" id="exampleModalLabel">Nuevo Estudiante</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <?php if (!empty($errors['general'])) : ?>
              <div class="error-message">
                <?php echo $errors['general']; ?>
              </div>
            <?php endif; ?>
            <form action="addStudent" id="formulario" method="post">


              <div class="mb-3">
                <label for="nombre" class="col-form-label">Nombres:</label>
                <input type="text" class="form-control form-control-lg formTam" name="nombre_estudiante" />
              </div>

              <div class="mb-3">
                <label for="nombre" class="col-form-label">Foto perfil:</label>
                <input type="text" placeholder="img/federico.jpg" class="form-control form-control-l formTam" name="ruta_foto" />
              </div>


              <div class="row">
                <div class="col mb-3">
                  <label for="cedula" class="form-label">Cedula:</label><br>
                  <input type="text" class="form-control form-control-lg formTam" name="cedula" />
                </div>
                <div class="col mb-3">
                  <label for="nombre" class="col-form-label">Sexo:</label>
                  <input type="text" class="form-control form-control-lg formTam" name="sexo" />
                </div>
              </div>


              <div class="row">

                <div class="col mb-3">
                  <label for="nombre" class="col-form-label">Jornada:</label>
                  <input type="text" class="form-control form-control-lg formTam" name="jornada" />
                </div>
                <div class="col mb-3">
                  <label for="nombre" class="col-form-label">Promedio:</label>
                  <input type="number" class="form-control form-control-lg formTam" name="promedio" />
                </div>

              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary formTam" data-bs-dismiss="modal">
              Close
            </button>
            <button type="submit" class="btn btn-success formTam">Guardar</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!--  </div> -->
  <!-- modal crear Estudiantes final -->


  <header class="heading">
    <h1>Estudiantes</h1>

  </header>
  <section id="modalEstudiante">
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg ">
        <div class="modal-content  ">
          <div class="modal-header bg-dark">
            <h5 class="modal-title text-white" id="exampleModalLabel">
              DETALLE DEL ESTUDIANTE
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body " id="modalBodyStudent">
            <div id="ofertaAcademica">

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              Close
            </button>
            <button type="button" class="btn btn-primary">
              Guardar cambios
            </button>
            -
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- MODAL UPDATE INI-->
  <div class="modal fade" id="updateEstudiante" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h2 class="modal-title" id="exampleModalLabel">Actualizar Estudiante</h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="formularioUpdate" class="form-select-lg mb-3" method="POST">
            <div class="mb-3">
              <label for="cedulaUpdate" class="col-form-label">Cedula:</label>
              <input type="text" class="form-control formTam" id="cedulaUpdate" />
            </div>
            <div class="mb-3">
              <label for="nombre" class="col-form-label">Nombres:</label>
              <input type="text" class="form-control formTam" id="nombreUpdate" />
            </div>
            <div class="mb-3">
              <label for="nombre" class="col-form-label">Foto de perfil:</label>
              <input type="text" class="form-control formTam" id="ruta_fotoUpdate" />
            </div>

            <!-- <div class="mb-3">
               <label for="programa_idUpdate" class="col-form-label">Programa:</label>
               <input type="text" class="form-control formTam" id="programa_idUpdate" />
             </div> -->

            <div class="mb-3">
              <label for="sexoUpdate" class="col-form-label">Sexo:</label>
              <input type="text" class="form-control formTam" id="sexoUpdate" />
            </div>

            <div class="mb-3">
              <label for="jornadaUpdate" class="col-form-label">Jornada:</label>
              <input type="text" class="form-control formTam" id="jornadaUpdate" />
            </div>

            <div class="mb-3">
              <label for="promedioUpdate" class="col-form-label">Promedio:</label>
              <input type="text" class="form-control formTam" id="promedioUpdate" />
            </div>

            <div class="mb-3">
              <label for="listado-programasUpdate" class="col-form-label">Campo:</label>
              <select class="listado-programasUpdate" id="listado-campoUpdate"></select>
            </div>
            <div class="mb-3">
              <label for="listado-programasUpdate" class="col-form-label">Campo:</label>
              <select class="listado-programasUpdate" id="listado-ofertaUpdate"></select>
            </div>

            <input id="idUpdate" name="idUpdate" type="hidden" value="">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">
            Close
          </button>
          <button type="submit" class="btn btn-primary btn-lg">Actualizar</button>
        </div>
        </form>
      </div>
    </div>
  </div>


  <?php
  $students = $this->data['students'];
  ?>

  <div class="students container">
    <table class="table table-success table-striped table-bordered">
      <thead>
        <tr>
          <th>Id</th>
          <th>CEDULA</th>
          <th>NOMBRE</th>
          <th>SEXO</th>
          <th>JORNADA</th>
          <th>PROMEDIO</th>
          <th>EDITAR</th>
          <th>ELIMINAR</th>
        </tr>
      </thead>
      <tbody id="estudiantes" class="listado-estudiantes text-dark">
        <?php foreach ($students as $s) { ?>
          <tr>
            <td><?php echo $s->id; ?></td>
            <td><?php echo $s->cedula; ?></td>
            <td><?php echo $s->nombreEstudiante; ?></td>
            <td><?php echo $s->sexo; ?></td>
            <td><?php echo $s->jornada; ?></td>
            <td><?php echo $s->promedio; ?></td>
            <td><button class="btn btn-warning">Edit</button></td>
            <td>
              <a href="/CrudPhpMysql/deleteStudent/<?php echo $s->id ?>"><button class="btn btn-danger">ELIMINAR</button></a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

  <footer id="pie-pagina" class="bg-verde text-white mt-5 p-5">
    <div class="container">
      <div class="col">
        <p class=" text-center pie">
          Copyright &copy; Unidades Tecnologicas de Santander
        </p>
      </div>
    </div>
  </footer>


  <script src="index.js" type="module"></script>

  <!-- JavaScript Bundle with Popper -->
  <!-- 
    <script src="./index.js" type="module" defer></script> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>