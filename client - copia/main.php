<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location:logout.php");
}

?>
<!DOCTYPE doctype html>
<html class="no-js" dir="ltr" lang="en">
    <head>
        <meta charset="utf-8">
            <meta content="ie=edge" http-equiv="x-ua-compatible">
                <meta content="width=device-width, initial-scale=1.0" name="viewport">
                    <title>
                        Agenda
                    </title>
                    <link href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css" rel="stylesheet">
                        <link href="css/foundation.min.css" rel="stylesheet">
                            <link href="css/jquery.ui.timepicker.css" rel="stylesheet">
                                <link href="css/fullcalendar.min.css" rel="stylesheet">
                                    <link href="css/fullcalendar.print.css" rel="stylesheet">
                                        <link href="css/jquery.timepicker.min.css" rel="stylesheet">
                                            <link href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
                                                <link href="css/main.css" rel="stylesheet">
                                                </link>
                                            </link>
                                        </link>
                                    </link>
                                </link>
                            </link>
                        </link>
                    </link>
                </meta>
            </meta>
        </meta>
    </head>
    <body>
        <div id="aca">
        </div>
        <div class="top-bar">
            <div class="top-bar-left">
                <h3>
                    Agenda
                </h3>
            </div>
            <div class="top-bar-right">
                <ul class="menu">
                    <li>
                        <a href="../server/logout.php" id="logout">
                            Cerrar Sesión
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="expanded-row main-container">
            <div class="left-cont">
                <div class="calendario">
                </div>
            </div>
            <div class="right-cont">
                <div class="add-btn">
                    <h5>
                        Nuevo Evento
                    </h5>
                    <form>
                        <div class="row">
                            <div class="small-12 columns">
                                <label>
                                    Título del evento
                                    <input id="titulo" type="text">
                                    </input>
                                </label>
                            </div>
                            <div class="small-8 columns">
                                <label>
                                    Fecha inicio
                                    <input class="datepicker" id="start_date" name="start_date" required="required" type="date">
                                    </input>
                                </label>
                            </div>
                            <fieldset class="large-4 columns" id="dia-set">
                                <input id="allDay" type="checkbox">
                                    <label for="allDay">
                                        Día entero
                                    </label>
                                </input>

                            </fieldset>
                            <div class="small-8 columns">
                                <label>
                                    Fecha fin
                                    <input class="datepicker" id="end_date" name="end_date" required="required" type="date">
                                    </input>
                                </label>
                            </div>
                            <div class="small-6 columns">
                                <label>
                                    Hora de inicio
                                    <input class="timepicker" id="start_hour" type="text">

                                    </input>
                                </label>
                            </div>
                            <div class="small-6 columns">
                                <label>
                                    Hora fin
                                    <input class="timepicker" id="end_hour" type="text">
                                    </input>
                                </label>
                            </div>
                            <div class="small-12 columns btn-cont-enviar">
                                <button class="success button" type="submit">
                                    Añadir
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="delete-btn" id="external-events">
                    <h6>
                        Arrastra aquí un evento que desees eliminar
                    </h6>
                    <img alt="Eliminar" id="eliminar" src="img/trash.png">
                    </img>
                </div>
            </div>
        </div>
        <script src="js/jquery-3.3.1.min.js">
        </script>
        <script crossorigin="anonymous" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js">
        </script>
        <script src="js/vendor/what-input.js">
        </script>
        <script src="js/vendor/foundation.min.js">
        </script>
        <script src="http://momentjs.com/downloads/moment.min.js">
        </script>
        <script src="js/vendor/fullcalendar.min.js">
        </script>
        <script src="js/jquery.timepicker.min.js">
        </script>
        <script src="js/jquery.ui.timepicker.js">
        </script>
        <script src="js/app.js">
        </script>
        <script src="js/creacionEventos.js">
        </script>
        <script src="js/update.js">
        </script>
        <script src="js/borrarEvento.js">
        </script>
    </body>
</html>
