<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <nav class="main-menu">
        <ul>
            <li>
                <a href="principal">
                    <i class="fa fa-hospital-o fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        HRAE IXTAPALUCA
                    </span>
                </a>

            </li>
            <li class="has-subnav">
                <a href="#">
                    <i class="fa fa-user fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        Mis datos
                    </span>
                </a>

            </li>
            <li>
                <a href="../rh/principal">
                    <i class="fa fa-file-excel-o fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        Evaluación del Desempeño
                    </span>
                </a>

            </li>
            <?php
        if (isset($_SESSION['usuarioJefe'])) {
            $usernameSesion = $_SESSION['usuarioJefe'];
            require '../cisfa/conexion.php';
            $statement = $conexion->prepare("SELECT correo, rol, password FROM usuarioslogeojefes WHERE correo= '$usernameSesion' AND rol = 4");
            $statement->execute(array(
                ':correo' => $usernameSesion
            ));
            $rw = $statement->fetch();
            $admin = $rw['correo'];
            if ($admin == 'drraulguzman@gmail.com') {
                ?>

            <li>
                <a href="cancer">
                    <i class="fa fa-child fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        Cancer de mama
                    </span>
                </a>
                <!--  <ul>
                            <li><a href="#" id="nav-text" data-toggle="modal"
                    data-target="#myModal_cargamedicamento">Cargar paciente</a></li>
                      
                    </ul>-->
            </li>

            <?php
                }elseif($admin == 'antonioflores35@yahoo.com.mx') {
                    ?>
            <li class="has-subnav">
                <a href="../cisfa/principal">
                    <i class="fa fa-medkit fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        Cisfa
                    </span>
                </a>

            </li>
            <?php

        }
    }
            ?>



        </ul>

        <ul class="logout">
            <li>
                <a href="close_sesion">
                    <i class="fa fa-power-off fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        Logout
                    </span>
                </a>
            </li>
        </ul>
    </nav>
</body>

</html>