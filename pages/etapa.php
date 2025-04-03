<?php include($_SERVER['DOCUMENT_ROOT'].'/tortugues-runners-web/header.php') ?>

<main> 

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/tortugues-runners-web/querys/query_etapa_select_one.php'); 
    
        if($etapa) {  ?>

           <section id="etapa-individual">
            
               <h1>ETAPA <?php echo strtoupper($etapa['lloc_sortida']. ' - ' . $etapa['lloc_arribada']) ?></h1>
               
                <div class="contenedor-etapa">
                    <!-- div que conte tota l'informacio de l'etapa-->
                        <div> 

                            <div class="icones-informacio-etapa-individual">
                                <div>
                                    <i class="fa-solid fa-map-pin"></i>
                                    <p>Pàrquinkg La Vall</p>
                                </div>

                                <div>
                                    <i class="fa-solid fa-clock"></i>
                                    <p>7:15</p>                                  
                                </div>

                                <div>
                                    <p>Difucultad</p>
                                    <div class="dificultad-etapa">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>                                  
                                </div>

                             </div>

                             <div class="strava-embed-placeholder" data-embed-type="activity" data-embed-id="12377930041" data-style="standard" data-from-embed="false"></div><script src="https://strava-embeds.com/embed.js"></script>


                            <div class="descripcio-etapa">
                                <p><?php echo $etapa['descripcio_etapa']; ?></p>
                            </div>


                    <!-- Final div contingut etapa-->
                        </div>


                        <aside class="inscripcio-etapa">
                            <!-- formular inscripcio etapa -->

                                <form class="modern-form">
                                <div class="form-title">Formulari d'inscripció per l'etapa</div>

                                <div class="form-body">
                                    <div class="input-group">
                                        <div class="input-wrapper">
                                            <svg fill="none" viewBox="0 0 24 24" class="input-icon">
                                            <circle
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                r="4"
                                                cy="8"
                                                cx="12"
                                            ></circle>
                                            <path
                                                stroke-linecap="round"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                d="M5 20C5 17.2386 8.13401 15 12 15C15.866 15 19 17.2386 19 20"
                                            ></path>
                                            </svg>
                                            <input type="text" required="" placeholder="Nom" class="form-input"  />
                                        </div>
                                    </div>

                                    <div class="input-group">
                                        <div class="input-wrapper">
                                            <svg fill="none" viewBox="0 0 24 24" class="input-icon">
                                            <circle
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                r="4"
                                                cy="8"
                                                cx="12"
                                            ></circle>
                                            <path
                                                stroke-linecap="round"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                d="M5 20C5 17.2386 8.13401 15 12 15C15.866 15 19 17.2386 19 20"
                                            ></path>
                                            </svg>
                                            <input type="text" required="" placeholder="Llinatge" class="form-input"  />
                                        </div>
                                    </div>

                                    <div class="input-group">
                                        <div class="input-wrapper">
                                        <svg fill="none" viewBox="0 0 24 24" class="input-icon">
                                            <rect x="3" y="5" width="18" height="14" rx="2" stroke="currentColor" stroke-width="1.5"></rect>
                                            <line x1="3" y1="11" x2="21" y2="11" stroke="currentColor" stroke-width="1.5"></line>
                                            <circle cx="6" cy="8" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                            </svg>

                                            <input type="text" required="" placeholder="Dni" class="form-input"  />
                                        </div>
                                    </div>

                                    <div class="input-group">
                                        <div class="input-wrapper">
                                            <svg fill="none" viewBox="0 0 24 24" class="input-icon">
                                            <path
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                d="M3 8L10.8906 13.2604C11.5624 13.7083 12.4376 13.7083 13.1094 13.2604L21 8M5 19H19C20.1046 19 21 18.1046 21 17V7C21 5.89543 20.1046 5 19 5H5C3.89543 5 3 5.89543 3 7V17C3 18.1046 3.89543 19 5 19Z"
                                            ></path>
                                            </svg>
                                            <input required="" placeholder="Email" class="form-input" type="email"/>
                                        </div>
                                    </div>

                                    

                                <button class="submit-button" type="submit">
                                    <span class="button-text">Inscriuret!</span>
                                    <div class="button-glow"></div>
                                </button>

                                
                                </form>

                        </aside>
                </div>
           </section> 


        <?php }else {
            echo "Error al cargar l'etapa";
        }
        ?>
    
   

</main>

<?php include($_SERVER['DOCUMENT_ROOT'].'/tortugues-runners-web/footer.php') ?>
