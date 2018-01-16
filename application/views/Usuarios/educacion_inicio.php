<!--<script>
             
                  $(document).ready(function(){
                   
                        var altura = $("#barra").offset().top; 
                         
                        $(window).scroll(function(){
                         
                              if($(window).scrollTop() >= altura){
                                     
                                    $("#barra").css("margin-top","0");
                                    $("#barra").css("position","fixed");
                                    $("#barra").css("display","block");
                                    $("#barra").css("width","100%");
                               
                              }
                         
                        });
                   
                  });
                   
</script>-->


<style>

.navbar-brand {
    padding: 5px 15px !important;    
}

</style>
<title>INE</title>
<div id="barra">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><img src="/EducacionINE/theme/img/INE.png" alt="Smiley face" height="40" width="40"></a>

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      </div>
       <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
      <li class=""><a href="#">Inicio</a></li>
      <li><a href="#">Estadísticas de Precios</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Estadísticas Sociales
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="/EducacionINE/index.php/usuario/educacion_menu">Educación</a></li>
          <li><a href="/EducacionINE/index.php/usuario/vitales_menu">Vitales</a></li>
        </ul>
      </li>
      <li><a href="#">Estadísticas Economicas</a></li>
      <li><a href="#">Estadísticas Ambientales</a></li>
      <li><a href="#">Censos y Encuestas</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> User</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
  </div>
</nav>
</div>
