
    <?php $registros = json_decode($registros, true); 
    if(!isset($registros[0]['codigo'])){$registros[0]['codigo']="0";}

    ?>    
    <script>

    image_1on     = new Image(321,375);
    image_1on.src =  "/EducacionINE/theme/img/sche$sinip/mapas/snmppt$DP1.jpg";
    image_2on     = new Image(321,375);
    image_2on.src =  "/EducacionINE/theme/img/sche$sinip/mapas/snmppt$DP2.jpg";
    image_3on     = new Image(321,375);
    image_3on.src =  "/EducacionINE/theme/img/sche$sinip/mapas/snmppt$DP3.jpg";
    image_4on     = new Image(321,375);
    image_4on.src =  "/EducacionINE/theme/img/sche$sinip/mapas/snmppt$DP4.jpg";
    image_5on     = new Image(321,375);
    image_5on.src =  "/EducacionINE/theme/img/sche$sinip/mapas/snmppt$DP5.jpg";
    image_6on     = new Image(321,375);
    image_6on.src =  "/EducacionINE/theme/img/sche$sinip/mapas/snmppt$DP6.jpg";
    image_7on     = new Image(321,375);
    image_7on.src =  "/EducacionINE/theme/img/sche$sinip/mapas/snmppt$DP7.jpg";
    image_8on     = new Image(321,375);
    image_8on.src =  "/EducacionINE/theme/img/sche$sinip/mapas/snmppt$DP8.jpg";
    image_9on     = new Image(321,375);
    image_9on.src =  "/EducacionINE/theme/img/sche$sinip/mapas/snmppt$DP9.jpg";
    image_10on     = new Image(321,375);
    image_10on.src = "/EducacionINE/theme/img/sche$sinip/mapas/snmppt$DP10.jpg";
    image_11on     = new Image(321,375);
    image_11on.src = "/EducacionINE/theme/img/sche$sinip/mapas/snmppt$DP11.jpg";
    image_12on     = new Image(321,375);
    image_12on.src = "/EducacionINE/theme/img/sche$sinip/mapas/snmppt$DP12.jpg";
    image_13on     = new Image(321,375);
    image_13on.src = "/EducacionINE/theme/img/sche$sinip/mapas/snmppt$DP13.jpg";
    image_14on     = new Image(321,375);
    image_14on.src = "/EducacionINE/theme/img/sche$sinip/mapas/snmppt$DP14.jpg";
    image_15on     = new Image(321,375);
    image_15on.src = "/EducacionINE/theme/img/sche$sinip/mapas/snmppt$DP15.jpg";
    image_16on     = new Image(321,375);
    image_16on.src = "/EducacionINE/theme/img/sche$sinip/mapas/snmppt$DP16.jpg";
    image_17on     = new Image(321,375);
    image_17on.src = "/EducacionINE/theme/img/sche$sinip/mapas/snmppt$DP17.jpg";
    image_18on     = new Image(321,375);
    image_18on.src = "/EducacionINE/theme/img/sche$sinip/mapas/snmppt$DP18.jpg";
    image_19on     = new Image(321,375);
    image_19on.src = "/EducacionINE/theme/img/sche$sinip/mapas/snmppt$DP19.jpg";
    image_20on     = new Image(321,375);
    image_20on.src = "/EducacionINE/theme/img/sche$sinip/mapas/snmppt$DP20.jpg";
    image_21on     = new Image(321,375);
    image_21on.src = "/EducacionINE/theme/img/sche$sinip/mapas/snmppt$DP21.jpg";
    image_22on     = new Image(321,375);
    image_22on.src = "/EducacionINE/theme/img/sche$sinip/mapas/snmppt$DP22.jpg";
    image_off      = new Image(321,375);
    image_off.src  = "/EducacionINE/theme/img/sche$sinip/mapas/snmppt$DP<?php echo $registros[0]['codigo'];?>.jpg";

    function img_act(imgName){
      img_nombre = "mapa_completo"
      img = "image_" + imgName
      imgon = eval(img + "on.src");
      document [img_nombre].src = imgon;
    }

    function img_inact(){
      img_nombre = "mapa_completo"
      imgoff = eval("image_off.src");
      document [img_nombre].src = imgoff;
    }

    function Ejecutar(departamento){
        window.location.replace("/EducacionINE/index.php/matricula/info_depto/"+departamento);
    }
    </script>
                 <div class="row">  
                    <div class="col-sm-4">
                        <p style="margin-top:2px; margin-bottom:0px; margin-left: 20px">
    <map name="FPMap0">
    <area alt="GUATEMALA" onclick="Ejecutar(21)" onmouseover="img_act(1)" onmouseout="img_inact()" shape="polygon" coords="101,229,93,236,93,240,96,241,101,243,99,244,100,245,101,249,99,250,98,254,103,258,102,263,105,266,106,267,109,265,111,264,112,263,113,257,114,253,117,252,119,254,121,251,123,250,122,246,125,244,126,243,126,241,123,240,118,239,118,233,117,231,111,231,110,229,106,229,105,229,101,229">
    <area alt="EL PROGRESO" onclick="Ejecutar(23)" onmouseover="img_act(2)" onmouseout="img_inact()" shape="polygon" coords="143,213,142,215,144,215,141,217,131,219,127,221,122,224,121,226,118,227,116,229,114,229,114,230,114,232,117,232,119,233,117,234,117,236,118,237,119,239,122,240,125,241,125,242,128,240,131,239,132,239,134,239,135,237,137,238,143,232,143,232,148,228,149,228,150,226,147,223,148,222,150,222,151,221,145,214,143,213">
    <area alt="SACATEPEQUEZ" onclick="Ejecutar(18)" onmouseover="img_act(3)" onmouseout="img_inact()" shape="polygon" coords="93,239,92,241,92,242,94,242,91,246,91,248,89,249,86,250,87,252,86,253,86,254,90,260,94,257,95,258,97,256,98,254,98,253,98,252,98,250,101,248,101,245,99,244,101,244,97,240,94,240,93,239">
    <area alt="CHIMALTENANGO" onclick="Ejecutar(6)" onmouseover="img_act(4)" onmouseout="img_inact()" shape="polygon" coords="79,225,77,226,78,229,77,231,76,231,78,232,77,233,76,233,74,235,74,236,73,237,72,240,72,240,72,242,72,243,72,244,72,245,72,249,71,251,71,252,72,254,71,255,71,256,73,255,74,256,73,257,73,258,75,258,79,256,80,257,80,258,80,260,82,260,84,257,86,254,87,252,87,250,90,248,92,246,93,242,93,240,94,239,94,237,96,235,97,235,97,232,98,232,100,231,100,229,98,227,95,227,93,227,92,227,90,227,84,226,83,228,82,228,82,226,79,226,79,225">
    <area alt="ESCUINTLA" onclick="Ejecutar(16)" onmouseover="img_act(5)" onmouseout="img_inact()" shape="polygon" coords="56,260,55,263,52,263,50,265,51,268,52,270,49,275,46,280,50,283,58,286,67,288,75,290,90,289,97,288,101,289,102,287,103,278,104,277,103,276,107,273,103,269,105,267,102,264,103,258,99,255,95,259,95,258,91,260,86,254,81,260,79,255,70,260,70,264,72,264,69,267,58,263,56,260">
    <area alt="SANTA ROSA" onclick="Ejecutar(19)" onmouseover="img_act(6)" onmouseout="img_inact()" shape="polygon" coords="121,251,118,254,117,252,113,255,114,256,112,258,113,260,111,260,112,263,109,264,107,266,105,266,103,269,106,272,104,275,105,276,102,280,101,287,111,291,116,292,122,297,124,295,123,293,124,292,122,291,121,286,121,284,124,284,130,287,131,280,133,279,134,273,130,269,125,267,126,264,131,262,134,259,135,257,133,254,130,252,123,255,121,251">
    <area alt="SOLOLA" onclick="Ejecutar(8)" onmouseover="img_act(7)" onmouseout="img_inact()" shape="polygon" coords="67,228,63,232,58,230,54,233,53,234,53,235,52,238,48,240,47,243,48,245,50,247,51,248,54,243,59,244,64,251,66,249,71,251,73,245,72,240,74,234,67,228">
    <area alt="TOTONICAPAN" onclick="Ejecutar(3)" onmouseover="img_act(8)" onmouseout="img_inact()" shape="polygon" coords="57,207,55,209,56,213,48,213,47,214,46,217,46,220,46,221,45,222,47,223,47,226,50,229,52,227,54,233,58,231,62,232,68,229,62,223,62,215,63,214,57,207">
    <area alt="QUETZALTENANGO" onclick="Ejecutar(12)" onmouseover="img_act(9)" onmouseout="img_inact()" shape="polygon" coords="46,207,44,212,41,212,38,215,39,223,38,224,38,225,32,231,31,238,29,240,27,239,23,241,17,240,12,244,12,245,15,247,16,249,19,251,24,251,30,254,32,249,31,247,37,241,38,241,40,246,42,244,46,244,52,238,54,232,52,227,49,228,47,226,47,215,49,211,46,207">
    <area alt="SUCHITEPEQUEZ" onclick="Ejecutar(15)" onmouseover="img_act(10)" onmouseout="img_inact()" shape="polygon" coords="46,243,43,250,44,256,42,259,40,274,39,275,46,281,52,271,51,264,55,264,57,261,59,261,62,266,69,267,71,264,71,260,72,258,74,256,71,255,72,254,70,249,67,249,63,251,60,244,55,243,52,247,49,248,46,243">
    <area alt="RETALHULEU" onclick="Ejecutar(20)" onmouseover="img_act(11)" onmouseout="img_inact()" shape="polygon" coords="38,240,31,247,33,249,29,253,16,249,11,253,15,259,24,266,38,276,40,275,44,256,44,254,44,250,46,244,41,243,40,246,38,240">
    <area alt="SAN MARCOS" onclick="Ejecutar(9)" onmouseover="img_act(12)" onmouseout="img_inact()" shape="polygon" coords="13,196,6,206,15,218,13,222,11,220,9,223,12,224,11,226,10,228,9,231,8,232,8,237,12,240,5,250,9,253,11,254,16,249,11,245,17,240,25,240,26,238,29,239,32,237,34,229,39,225,38,213,44,211,44,207,42,208,37,201,32,201,31,202,26,199,18,206,15,203,14,198,13,196">
    <area alt="HUEHUETENANGO" onclick="Ejecutar(4)" onmouseover="img_act(13)" onmouseout="img_inact()" shape="polygon" coords="38,154,37,156,30,168,30,171,20,183,19,184,19,186,15,191,13,195,15,198,15,203,17,205,25,200,30,201,32,201,37,201,38,203,45,209,46,208,50,214,54,213,56,209,60,206,61,205,66,204,70,200,67,197,66,199,59,193,62,186,66,181,69,178,82,155,38,154">
    <area alt="QUICHE" onclick="Ejecutar(2)" onmouseover="img_act(14)" onmouseout="img_inact()" shape="polygon" coords="83,154,72,172,70,177,67,181,60,187,59,194,66,199,68,198,69,200,65,204,61,205,59,207,63,214,63,223,75,235,78,230,78,225,83,228,98,227,99,225,88,212,91,208,98,210,106,210,110,204,109,202,100,201,95,198,98,195,101,191,102,187,98,182,92,180,90,178,92,176,90,174,94,169,94,162,98,160,98,158,101,157,104,160,107,162,112,159,112,155,83,154">
    <area alt="BAJA VERAPAZ" onclick="Ejecutar(14)" onmouseover="img_act(15)" onmouseout="img_inact()" shape="polygon" coords="109,204,105,210,103,208,102,210,100,208,90,209,88,212,97,220,100,225,98,227,101,229,105,229,110,228,113,231,121,226,122,224,143,216,143,214,144,213,140,211,142,208,140,206,141,205,140,204,133,207,132,206,131,207,130,206,129,207,124,206,122,203,118,207,116,207,113,205,109,204">
    <area alt="ALTA VERAPAZ" onclick="Ejecutar(5)" onmouseover="img_act(16)" onmouseout="img_inact()" shape="polygon" coords="114,155,107,162,101,158,99,158,97,159,98,161,93,163,94,171,91,172,90,174,91,176,90,177,95,182,100,185,100,186,102,188,99,196,96,197,100,201,109,202,110,204,114,205,116,206,119,207,122,204,124,205,138,205,140,204,142,205,141,210,140,211,141,212,144,214,147,212,151,212,153,214,157,215,161,210,159,195,160,193,161,190,158,187,169,172,173,170,168,168,166,164,159,165,156,162,148,166,137,160,135,160,123,156,114,155">
    <area alt="PETEN" onclick="Ejecutar(7)" onmouseover="img_act(17)" onmouseout="img_inact()" shape="polygon" coords="187,48,79,48,78,83,53,84,98,119,98,124,100,127,107,132,112,135,114,137,111,144,112,147,111,148,112,152,112,156,126,158,136,161,138,160,148,167,156,163,159,165,166,164,167,164,168,168,173,171,175,166,184,166,187,48">
    <area alt="IZABAL" onclick="Ejecutar(10)" onmouseover="img_act(18)" onmouseout="img_inact()" shape="polygon" coords="176,165,174,170,165,175,166,177,157,186,160,191,160,193,159,195,159,196,161,212,170,211,176,205,178,206,181,204,182,204,183,203,187,205,185,213,189,218,195,215,196,215,213,204,227,191,243,179,232,171,223,162,219,163,223,167,226,168,223,172,222,175,219,175,213,171,211,172,208,169,199,167,197,168,191,165,187,167,183,166,176,165">
    <area alt="ZACAPA" onclick="Ejecutar(22)" onmouseover="img_act(19)" onmouseout="img_inact()" shape="polygon" coords="181,203,177,205,168,210,166,212,164,211,162,212,161,211,157,214,150,212,146,212,144,213,150,220,147,222,149,227,145,232,150,235,149,237,152,240,153,239,154,240,157,238,155,233,159,230,166,230,168,231,172,227,176,229,180,228,184,231,188,225,187,221,189,219,186,216,186,205,184,203,183,205,181,203">
    <area alt="CHIQUIMULA" onclick="Ejecutar(13)" onmouseover="img_act(20)" onmouseout="img_inact()" shape="polygon" coords="180,227,175,229,172,227,168,231,166,230,159,231,154,233,159,239,158,245,159,247,157,250,158,251,159,249,162,253,166,252,168,255,167,258,171,259,177,259,176,256,182,249,185,247,186,249,189,247,190,241,188,238,181,229,180,227">
    <area alt="JALAPA" onclick="Ejecutar(11)" onmouseover="img_act(21)" onmouseout="img_inact()" shape="polygon" coords="142,231,136,237,128,239,126,241,125,244,124,244,122,247,124,256,129,253,135,258,137,258,141,255,143,257,146,254,149,251,153,255,158,251,156,249,159,246,158,244,159,239,157,237,155,239,153,239,152,240,149,237,149,235,144,232,143,233,142,231">
    <area alt="JUTIAPA" onclick="Ejecutar(17)" onmouseover="img_act(22)" onmouseout="img_inact()" shape="polygon" coords="159,249,153,255,148,252,143,257,142,255,136,257,134,259,133,261,129,263,126,264,126,267,129,268,134,274,133,279,130,281,130,286,124,284,121,285,122,287,124,293,123,294,124,295,123,296,130,300,132,296,132,292,138,286,147,279,152,282,158,273,164,270,166,268,163,263,163,261,163,260,168,257,168,254,166,252,161,253,159,249">
    <img src="/EducacionINE/theme/img/sche$sinip/mapas/snmppt$DP<?php echo $registros[0]['codigo'];?>.jpg" name="mapa_completo" border="0" usemap="#FPMap0" alt="" width="261" height="340">
    </map>
  
</p>
                    </div>
                    <div class="col-sm-4">
    <h4>
    <b>Periodo: </b><?php echo $registros[0]['periodo'];?><br>
    <b>Departamento: </b><?php echo $registros[0]['departamento'];?><br>
    </h4>

    <table id="maestros" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                                        <th>Nivel</th>
                                        <th>Inscritos</th>
                                        <th>Poblacion</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                                        <th>Nivel</th>
                                        <th>Inscritos</th>
                                        <th>Poblacion</th>
            </tr>
        </tfoot>
        <tbody>
            <?php

                                    foreach ($registros as $row ) { 

                                    ?>
                                    <tr>
                                        <td><?php echo $row['nivel']; ?></td>
                                        <td><?php echo number_format($row['inscritos']); ?></td>
                                        <td><?php echo number_format($row['poblacion']); ?></td>
                                    </tr>
                                    <?php } ?>

        </tbody>
    </table>    
                    </div>
                     <div class="col-sm-2">
                     </div>   
                </div> 