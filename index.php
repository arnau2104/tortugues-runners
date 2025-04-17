<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php include('header.php') ?>

<main>
  
       <!-- contenedor ont hi ha la image principal  -->
    <div id="inici" class="background-img">
        
       <div class="scroll-down">
            <a href="index.php#volta-menorca" class="smooth-scroll"><i class="fa-solid fa-chevron-down mouse-down animate__animated animate__bounce"></i></a>
        </div>

    </div>
    <div class="container">

        <div id="volta-menorca">
        <?php 
            include ('db_connection/db_connection.php');
            include('querys/query_etapa_select.php'); //incluim el fitxer amb la consulta a la base de dades 
            if($etapes){  ?>
                    <div class="contenedor-text-volta-menorca">
                            <h2 class="font-druk-medium">Volta a Menorca</h2>
                            <h3>5a Edició</h3>
                    </div>
                    
                    <div class="slider">
                    
                    <!-- recorrem totes les etapes -->
                <?php 
                $num_etapa = 0;
                foreach($etapes as $etapa) {
                        $num_etapa++;

                        //formatejam la data al sistema habitual utilizat a espanya
                        $data_inici_formatejada = (new DateTime($etapa['data_inici']))->format('d-m-Y');

                    ?>  
                    
                                
                            <div class="etapa">
                                <div class="info-etapa">
                                    <h3><?php echo $num_etapa . 'a'; ?> ETAPA</h3>    
                                </div>
                                <div class="detalls-etapa">
                                    <div class="detall-etapa">
                                        <i class="fa-solid fa-calendar-days font-awesome-icon"></i>
                                        <p><?php echo $data_inici_formatejada; ?></p>
                                    </div>
                                    <div class="detall-etapa">
                                        <i class="fa-solid fa-map-location-dot font-awesome-icon"></i>                    
                                        <div class="ubicacio-etapa">
                                                <p><?php echo strtoupper($etapa['lloc_sortida']); ?> </p>
                                                <div class="foots-icons">
                                                    <i class="fa-solid fa-shoe-prints fa-rotate-90"></i>
                                                    <i class="fa-solid fa-shoe-prints fa-rotate-90"></i>
                                                    <i class="fa-solid fa-shoe-prints fa-rotate-90"></i>
                                                </div>
                                                <p><?php echo strtoupper($etapa['lloc_arribada']); ?></p>
                                        </div> 
                                    </div>

                                    <div class="detall-etapa">
                                        <i class="fa-solid fa-person-hiking font-awesome-icon"></i>
                                        <p><?php echo $etapa['kilometres']; ?> KM</p>
                                    </div>
                            </div>
                            
                            <!-- formulari que envia l'id de la etapa a la pagina etapa-->
                        
                                <a href="pages/etapa.php?etapa_id=<?php echo $etapa['etapa_id']; ?>" name="submit" class="mes-info"> Apuntet! </a>
                        

                            </div>
                        

                    
                        <!-- End foreach de les etapes -->
                        <?php }?> 
                        
                    </div>

                        <!-- Botons del slider -->
                        <div class="slider-nav">
                        <button class="nav-btn" id="prev-btn">◀</button>
                        <button class="nav-btn active" id="current-btn">1</button>
                        <button class="nav-btn" id="next-btn">▶</button>
                        </div>
                <?php } else {
                    echo "No hi ha etapes";
                    }?>
        </div>

        <!-- comensament qui som -->
        <div id="qui-som">
            <h2 class="font-druk-medium">Sobre Nosaltres </h2>
            <hr>

            <div class="contenedor-qui-som">
                <div class="div-imatge-qui-som">
                    <img src="/assets/imgs/quedada-tortugues2.jpeg" alt="imatge sobre qui som">
                </div>

                <div class="qui-som-text">
                
                        <p>Les Tortugues Runners Menorca vam començar la nostra aventura a mitjans del 2018, a raó d'un encontre casual al Camí de Cavalls, on la coincidència va fer que un parell de corredors es creuessin i decidissin córrer junts uns quants quilòmetres. </p>

                        <p>A l'arribada van comentar la idea de formar un grup de corredors, per poder sortir els dissabtes i entrenar junts». D'aquesta manera va ser com va sorgir el somni d'aquest grup d'apassionats pel trail running i que ara, uns set anys després, han decidit constituir-se com a club federat, com a Club Esportiu Trail Tortugues Runners Menorca.</p>

                        <p>Amb el pas del temps, aquell grup de pocs corredors trobats de manera fortuïta mentre corrien va passar a ser de alguns més i poc a poc va anar creixent, «fins a arribar ara a un nombre que supera el mig centenar.</p>

                        <p>Actualment, el club compta amb 70 socis inscrits, dels quals uns 50 estan degudament federats a la Federació d’Atletisme de les Illes Balears», ens detalla el nou col·lectiu, que des d'aquesta nit estarà encapçalat per una junta directiva amb el president, Òscar Abelló, de vicepresident, Raül Rey, els tresorers, Biel Gelabert i Maite Rotger, com a secretaris, Xim Llorens i Damià Díaz, i ja de vocals, Joan Melis, Rubén Alonso, Ester Servera, Dani Salord i Ana Bagur.</p>

                </div>
            </div>

            <div class="contenedor-qui-som contenedor-podcast">
        
                <div class="div-podcast">
                    <div class="audio-wrapper">
                        <audio controls>
                            <source src="/assets/podcast-tortugues.mp3" type="audio/mpeg">
                            El teu navegador no suporta el reproductor d'àudio.
                        </audio>
                    </div>
                </div>

                <div class="podcast-text">
                    <h3>Les Tortugues a la Premsa</h3>
                    <div>
                        <p>L'altre dia les Tortugues Runners hem tingut l'oportunitat d'anar a la ràdio per participar en un podcast/entrevista. </p>

                        <p>Ha estat una experiència genial, on hem pogut explicar el nostre viatge com a grup, compartir les nostres vivències i els reptes que hem superat. Ha estat molt divertit poder parlar amb els oients i deixar-los conèixer una mica més sobre nosaltres, les nostres motivacions i les nostres passió per córrer. </p>
                        
                        <p> Agraïm molt a l'equip de la ràdio per convidar-nos i fer-nos sentir com a casa. Estem emocionas de poder seguir creixent i compartint la nostra història amb tots vosaltres!</p>
                    </div>         
                </div>
            </div>
        
        <!-- end qui som -->
        </div>

        <!-- start contenedor colaboradors -->
        <div id="colaboradors">

        </div>
    </div>
    
</main>

<?php include('footer.php') ?>