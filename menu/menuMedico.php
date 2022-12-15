<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <nav class="main-menu">
        <ul>
            <li class="has-subnav">
                <a href="principal">
                    <i class="fa fa-hospital-o fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        HRAE IXTAPALUCA
                    </span>
                </a>

            </li>
            <hr>
            <li class="has-subnav">
                <a href="misDatos">
                    <i class="fa fa-user fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        Mis datos
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
            <hr>
            <li class="has-subnav">
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
            <hr>
            <?php
                }
        }
            ?>
            <!--
            <li class="has-subnav">
                <a href="infarto">
                    <i class="fa fa-ambulance fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        Infarto Agudo al Miocardio
                    </span>
                </a>
                <ul>
                            <li><a href="#" id="nav-text" data-toggle="modal"
                    data-target="#myModal_cargamedicamento">Cargar paciente</a></li>
                
                    </ul>
            </li>
    -->
            <li>
                <a href="../rh/principal">
                    <i class="fa fa-file-excel-o fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        Evaluación del Desempeño
                    </span>
                </a>

            </li>




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