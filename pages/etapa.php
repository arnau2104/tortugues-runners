<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php include('../header.php') ?>

<main> 

    <?php 
        include ('../db_connection/db_connection.php');
        include('../querys/query_etapa_select_one.php');
    ?>

           <section id="etapa-individual">

           



            <?php

            if(isset($etapa)) {
       
           $polyline = $etapa['polyline'];
           $coordInici = explode(',', $etapa['latitud_inicial']);
           $coordFinal = explode(',', $etapa['latitud_final']);
          

            
    ?>
    
                <div class="etapa-banner">
                    <h1 class="titol-etapa font-druk-medium">ETAPA <?php echo strtoupper($etapa['lloc_sortida']. ' - ' . $etapa['lloc_arribada']) ?></h1>
                </div>
               
                <div class="contenedor-etapa">
                    <!-- div que conte tota l'informacio de l'etapa-->
                        <div> 

                            <div class="icones-informacio-etapa-individual">
                                <div>
                                    <i class="fa-solid fa-map-pin"></i>
                                    <p><?php echo ucwords($etapa['lloc_arribada']) ?></p>
                                </div>

                                <div>
                                    <i class="fa-solid fa-clock"></i>
                                    <p>7:15</p>                                  
                                </div>

                                <div>
                                <i class="fa-solid fa-chart-line"></i>
                                    <p>401 m</p>                               
                                </div>

                             </div>

                             <div id="map"></div>



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
                
        <?php }else {
            echo "Error al cargar l'etapa";
        }
        ?>
           </section> 


    
   

</main>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>  <!-- Leaflet -->

<script src="https://unpkg.com/@mapbox/polyline"></script>



<script>
  // Reemplaza con tu propia summary_polyline
  const encodedPolyline ="<?php echo $polyline; ?>"; //afegim addslashes perque no ens llevi els caracters especials que conte el polyline
  // Coordenadas de inicio y fin (reemplaza por las reales)
  const startLatLng = [ <?php echo $coordInici[0];?>, <?php echo $coordInici[1];?>]; // afegim les coordenades de l'inici de la etapa, que estan auna variable php
  const endLatLng = [<?php echo $coordFinal[0];?>, <?php echo $coordFinal[1];?>];  // afegim les coordenades del final de la etapa, que estan auna variable php

  // Decodificar polyline
  const latlngs = polyline.decode(encodedPolyline);

  // Crear mapa centrado en el primer punto
  const map = L.map('map').setView(latlngs[0], 13);

  // Agregar capa base
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
  }).addTo(map);

  // Dibujar la ruta
  const ruta = L.polyline(latlngs, {
    color: '#383732',
    weight: 4,
    opacity: 0.8
  }).addTo(map);

  // Marcadores de inicio y fin
  L.marker(startLatLng).addTo(map)
  .bindPopup("Inici")
  .bindTooltip("Inici", { permanent: true, direction: "top" });

L.marker(endLatLng).addTo(map)
  .bindPopup("Final")
  .bindTooltip("Final", { permanent: true, direction: "top" });

  // Ajustar la vista para que todo se vea bien
  map.fitBounds(ruta.getBounds());
</script>




<?php include('../footer.php') ?>