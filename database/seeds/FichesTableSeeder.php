<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Conseil;
use App\Models\Fiche;

class FichesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $fiche = Fiche::create([

        'name' => 'Monstera',
        'slug' => 'monstera',
        'thumbnail' => 'fiches/monstera.jpg',

        'description' => "A l'état sauvage, les espèces du genre Monstera (ananas du pauvre) sont de vigoureuses plantes grimpantes. Leurs grosses racines aériennes, qui s'accrochent aux troncs et aux branches, leur procurent l'eau et les éléments nutritifs dont elles ont besoin. Une seule espèce, M. deliciosa (ceriman ou monstère), est devenue une plante d'intérieur recherchée. ",
        'description_short' => "A l'état sauvage, les espèces du genre Monstera (ananas du pauvre) sont de vigoureuses plantes grimpantes. Leurs grosses racines aériennes, qui s'accrochent aux troncs et aux branches, leur procurent l'eau et les éléments nutritifs dont elles ont besoin. Une seule espèce, M. deliciosa (ceriman ou monstère), est devenue une plante d'intérieur recherchée. ",
        'content' => "

        <!-- ############ -->
        <!-- Description -->
        <!-- ############ -->

        <section id='description' class='animated slideInUp'>
          <div class='jumbotron rounded-O p-4 p-md-5 text-white bg-dark' style='border-radius:0px !important;'>


              <div class='row px-2'>

                <div class='col-md-12 px-0'>
                  <h3 class='display-4 ml-2 mt-2 fontsize-6 font-italic'>
                  VIGOUREUSES ET GRIMPANTES
                  </h3>

              </div>

              <div class='col-md-6 px-0'>

                <span class='display-6 font-italic'> </span>
                <p class='lead my-3 pl-3'>Ses feuilles vernissées et cordiformes, non découpées
                 lorsqu'elles sont petites, ressemblent à celles du philodendron. Mais avec l'âge, les feuilles présentent de nombreuses perforations et se découpent presque jusqu'à la nervure médiane. Ces deux caractéristiques permettent à la plante dans son habitat naturel de résister aux grands vents tropicaux. Portées sur des pétioles de 30 cm, les feuilles peuvent atteindre 45 cm
                </p>
              </div>

              <div class='col-md-6 px-0'>

                <span class='display-6 font-italic'> </span>
                <p class='lead my-3 pl-3'>Ses feuilles vernissées et cordiformes, non découpées
                 lorsqu'elles sont petites, ressemblent à celles du philodendron. Mais avec l'âge, les
             feuilles présentent de nombreuses perforations et se découpent presque jusqu'à la nervure
              médiane. Ces deux caractéristiques permettent à la plante dans son habitat naturel de résister aux grands vents tropicaux. Portées sur des pétioles de 30 cm, les feuilles peuvent atteindre 45 cm
                </p>
              </div>


            </div> <!--End row-->

          </div> <!--End jumbotron-->

        </section>

        <!-- ############ -->
        <!-- Informations -->
        <!-- ############ -->


        <section class='py-5 px-5 bg-white text-center'>

        <!-- Three columns of text below the carousel -->
        <div class='row'>

          <div class='col-lg-4 mb-4 text-center'>
            <img class='rounded-circle p-4' style='background-color: #6EB6FF;' src='/storage/icons/icon-thermometer.svg' alt='Generic placeholder image' width='140' height='140'>

            <h2 class='my-3'>Température</h2>
            <p>L'atmosphère tempérée d'une pièce leur convient. Mais au-dessus de 21'C, placer les pots sur des gravillons maintenus humides.</p>

          </div>


          <div class='col-lg-4 mb-4 text-center'>
            <img class='rounded-circle p-4' style='background-color: #A69AFE;' src='/storage/icons/icon-water.svg' alt='Generic placeholder image' width='140' height='140'>

            <h2 class='my-3'>Arrosage</h2>
            <p>Humidifier à peine le mélange et en laisser sécher le tiers avant d'arroser de nouveau.
            </p>

          </div><!-- /.col-lg-4 mb-4 -->
          <div class='col-lg-4 mb-4 text-center'>
            <img class='rounded-circle p-4' style='background-color: #85E3FF;' src='/storage/icons/icon-care.svg' alt='Generic placeholder image' width='140' height='140'>
              <h2 class='my-3'>Soins particulier</h2>
              <p>Lumière En période de croissance, exposer les monsteras à une lu lumière vive tamisée, mais, en hiver on peut les placer en plein soleil. Mal éclairées, elles produisent de très longs pétioles et de petites feuilles peu découpées.</p>

          </div><!-- /.col-lg-4 mb-4 -->

          <div class='col-lg-4 mb-4 text-center'>
             <img class='rounded-circle bg-danger p-4' src='/storage/icons/icon-care.svg' alt='Generic placeholder image' width='140' height='140'>
             <h2 class='my-3'>Engrais</h2>
             <p>En période de croissance, enrichir d'engrais liquide ordinaire tous les 15 jours Empotage et rempotage

            </p>


            </div><!-- /.col-lg-4 mb-4 -->
            <div class='col-lg-4 mb-4 text-center'>
              <img class='rounded-circle bg-dark p-4' src='/storage/icons/icon-pot.svg' alt='Generic placeholder image' width='140' height='140'>
              <h2 class='my-3'>Rempotage</h2>
              <p>Utiliser un mélange base de terreau additionné de terreau de feuilles grossier (1/3), Rempoter chaque printemps jusqu'à ce que la plante ait atteint une taille qu'on jugera convenable. Par la suite, renouveler chaque année le mélange en surface  </p>

              <!-- Bouton fenetre -->
              <button type='button' class='btn btn-danger bo-rad-23  my-3' data-toggle='modal' data-target='#exampleModal'>
                      En savoir plus
              </button>

              <!-- Modal -->
              <div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                  <div class='modal-dialog' role='document'>
                    <div class='modal-content'>
                      <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Engrais</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                          <span aria-hidden='true'>×</span>
                        </button>
                      </div>
                      <div class='modal-body'>
                             Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestib.  Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestib. <br> <br>
                              Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestib
                               Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestib<br>
                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestib.
                      </div>
                      <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fermer</button>

                      </div>
                    </div>
                  </div>
                </div>
              </div><!-- /.col-lg-4 mb-4 -->
            </div><!-- /.row -->
        </section>
",
        'arrosage_info' => ' • 1 fois par semaine en été <br> • 1 fois toute les 2 semaines en hiver <br>  • Brumiser régulièrement',
        'entretien_info' => ' • Rempotage annuel <br> • Nettoyer régulièrement les feuilles avec une éponge humide',
        'lumiere_info' => '• Placer la monstera dans un endroit très lumineux <br> • Eviter le contact direct avec soleil',
        'color_code' => '#ee8896',
      ]);


      $fiche = Fiche::create([

        'name' => 'AloeVera',
        'slug' => 'aloevera',
        'thumbnail' => 'fiches/aloevera.jpg',

        'description' => "A l'état sauvage, les espèces du genre Monstera (ananas du pauvre) sont de vigoureuses plantes grimpantes. Leurs grosses racines aériennes, qui s'accrochent aux troncs et aux branches, leur procurent l'eau et les éléments nutritifs dont elles ont besoin. Une seule espèce, M. deliciosa (ceriman ou monstère), est devenue une plante d'intérieur recherchée. ",
        'description_short' => "A l'état sauvage, les espèces du genre Monstera (ananas du pauvre) sont de vigoureuses plantes grimpantes. Leurs grosses racines aériennes, qui s'accrochent aux troncs et aux branches, leur procurent l'eau et les éléments nutritifs dont elles ont besoin. Une seule espèce, M. deliciosa (ceriman ou monstère), est devenue une plante d'intérieur recherchée. ",
        'content' => "

        <!-- ############ -->
        <!-- Description -->
        <!-- ############ -->

        <section id='description' class='animated slideInUp'>
          <div class='jumbotron rounded-O p-4 p-md-5 text-white bg-dark' style='border-radius:0px !important;'>


              <div class='row px-2'>

                <div class='col-md-12 px-0'>
                  <h3 class='display-4 ml-2 mt-2 fontsize-6 font-italic'>
                  VIGOUREUSES ET GRIMPANTES
                  </h3>

              </div>

              <div class='col-md-6 px-0'>

                <span class='display-6 font-italic'> </span>
                <p class='lead my-3 pl-3'>Ses feuilles vernissées et cordiformes, non découpées
                 lorsqu'elles sont petites, ressemblent à celles du philodendron. Mais avec l'âge, les feuilles présentent de nombreuses perforations et se découpent presque jusqu'à la nervure médiane. Ces deux caractéristiques permettent à la plante dans son habitat naturel de résister aux grands vents tropicaux. Portées sur des pétioles de 30 cm, les feuilles peuvent atteindre 45 cm
                </p>
              </div>

              <div class='col-md-6 px-0'>

                <span class='display-6 font-italic'> </span>
                <p class='lead my-3 pl-3'>Ses feuilles vernissées et cordiformes, non découpées
                 lorsqu'elles sont petites, ressemblent à celles du philodendron. Mais avec l'âge, les
             feuilles présentent de nombreuses perforations et se découpent presque jusqu'à la nervure
              médiane. Ces deux caractéristiques permettent à la plante dans son habitat naturel de résister aux grands vents tropicaux. Portées sur des pétioles de 30 cm, les feuilles peuvent atteindre 45 cm
                </p>
              </div>


            </div> <!--End row-->

          </div> <!--End jumbotron-->

        </section>

        <!-- ############ -->
        <!-- Informations -->
        <!-- ############ -->


        <section class='py-5 px-5 bg-white text-center'>

        <!-- Three columns of text below the carousel -->
        <div class='row'>

          <div class='col-lg-4 mb-4 text-center'>
            <img class='rounded-circle p-4' style='background-color: #6EB6FF;' src='/storage/icons/icon-thermometer.svg' alt='Generic placeholder image' width='140' height='140'>

            <h2 class='my-3'>Température</h2>
            <p>L'atmosphère tempérée d'une pièce leur convient. Mais au-dessus de 21'C, placer les pots sur des gravillons maintenus humides.</p>

          </div>


          <div class='col-lg-4 mb-4 text-center'>
            <img class='rounded-circle p-4' style='background-color: #A69AFE;' src='/storage/icons/icon-water.svg' alt='Generic placeholder image' width='140' height='140'>

            <h2 class='my-3'>Arrosage</h2>
            <p>Humidifier à peine le mélange et en laisser sécher le tiers avant d'arroser de nouveau.
            </p>

          </div><!-- /.col-lg-4 mb-4 -->
          <div class='col-lg-4 mb-4 text-center'>
            <img class='rounded-circle p-4' style='background-color: #85E3FF;' src='/storage/icons/icon-care.svg' alt='Generic placeholder image' width='140' height='140'>
              <h2 class='my-3'>Soins particulier</h2>
              <p>Lumière En période de croissance, exposer les monsteras à une lu lumière vive tamisée, mais, en hiver on peut les placer en plein soleil. Mal éclairées, elles produisent de très longs pétioles et de petites feuilles peu découpées.</p>

          </div><!-- /.col-lg-4 mb-4 -->

          <div class='col-lg-4 mb-4 text-center'>
             <img class='rounded-circle bg-danger p-4' src='/storage/icons/icon-care.svg' alt='Generic placeholder image' width='140' height='140'>
             <h2 class='my-3'>Engrais</h2>
             <p>En période de croissance, enrichir d'engrais liquide ordinaire tous les 15 jours Empotage et rempotage

            </p>


            </div><!-- /.col-lg-4 mb-4 -->
            <div class='col-lg-4 mb-4 text-center'>
              <img class='rounded-circle bg-dark p-4' src='/storage/icons/icon-pot.svg' alt='Generic placeholder image' width='140' height='140'>
              <h2 class='my-3'>Rempotage</h2>
              <p>Utiliser un mélange base de terreau additionné de terreau de feuilles grossier (1/3), Rempoter chaque printemps jusqu'à ce que la plante ait atteint une taille qu'on jugera convenable. Par la suite, renouveler chaque année le mélange en surface  </p>

              <!-- Bouton fenetre -->
              <button type='button' class='btn btn-danger bo-rad-23  my-3' data-toggle='modal' data-target='#exampleModal'>
                      En savoir plus
              </button>

              <!-- Modal -->
              <div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                  <div class='modal-dialog' role='document'>
                    <div class='modal-content'>
                      <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Engrais</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                          <span aria-hidden='true'>×</span>
                        </button>
                      </div>
                      <div class='modal-body'>
                             Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestib.  Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestib. <br> <br>
                              Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestib
                               Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestib<br>
                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestib.
                      </div>
                      <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fermer</button>

                      </div>
                    </div>
                  </div>
                </div>
              </div><!-- /.col-lg-4 mb-4 -->
            </div><!-- /.row -->
        </section>
  ",
        'arrosage_info' => ' • 1 fois par semaine en été <br> • 1 fois toute les 2 semaines en hiver <br>  • Brumiser régulièrement',
        'entretien_info' => ' • Rempotage annuel <br> • Nettoyer régulièrement les feuilles avec une éponge humide',
        'lumiere_info' => '• Placer la monstera dans un endroit très lumineux <br> • Eviter le contact direct avec soleil',
        'color_code' => '#ee8896',
      ]);


      $fiche = Fiche::create([

        'name' => 'Yucca',
        'slug' => 'yucca',
        'thumbnail' => 'fiches/yucca.jpg',

        'description' => "A l'état sauvage, les espèces du genre Monstera (ananas du pauvre) sont de vigoureuses plantes grimpantes. Leurs grosses racines aériennes, qui s'accrochent aux troncs et aux branches, leur procurent l'eau et les éléments nutritifs dont elles ont besoin. Une seule espèce, M. deliciosa (ceriman ou monstère), est devenue une plante d'intérieur recherchée. ",
        'description_short' => "A l'état sauvage, les espèces du genre Monstera (ananas du pauvre) sont de vigoureuses plantes grimpantes. Leurs grosses racines aériennes, qui s'accrochent aux troncs et aux branches, leur procurent l'eau et les éléments nutritifs dont elles ont besoin. Une seule espèce, M. deliciosa (ceriman ou monstère), est devenue une plante d'intérieur recherchée. ",
        'content' => "

        <!-- ############ -->
        <!-- Description -->
        <!-- ############ -->

        <section id='description' class='animated slideInUp'>
          <div class='jumbotron rounded-O p-4 p-md-5 text-white bg-dark' style='border-radius:0px !important;'>


              <div class='row px-2'>

                <div class='col-md-12 px-0'>
                  <h3 class='display-4 ml-2 mt-2 fontsize-6 font-italic'>
                  VIGOUREUSES ET GRIMPANTES
                  </h3>

              </div>

              <div class='col-md-6 px-0'>

                <span class='display-6 font-italic'> </span>
                <p class='lead my-3 pl-3'>Ses feuilles vernissées et cordiformes, non découpées
                 lorsqu'elles sont petites, ressemblent à celles du philodendron. Mais avec l'âge, les feuilles présentent de nombreuses perforations et se découpent presque jusqu'à la nervure médiane. Ces deux caractéristiques permettent à la plante dans son habitat naturel de résister aux grands vents tropicaux. Portées sur des pétioles de 30 cm, les feuilles peuvent atteindre 45 cm
                </p>
              </div>

              <div class='col-md-6 px-0'>

                <span class='display-6 font-italic'> </span>
                <p class='lead my-3 pl-3'>Ses feuilles vernissées et cordiformes, non découpées
                 lorsqu'elles sont petites, ressemblent à celles du philodendron. Mais avec l'âge, les
             feuilles présentent de nombreuses perforations et se découpent presque jusqu'à la nervure
              médiane. Ces deux caractéristiques permettent à la plante dans son habitat naturel de résister aux grands vents tropicaux. Portées sur des pétioles de 30 cm, les feuilles peuvent atteindre 45 cm
                </p>
              </div>


            </div> <!--End row-->

          </div> <!--End jumbotron-->

        </section>

        <!-- ############ -->
        <!-- Informations -->
        <!-- ############ -->


        <section class='py-5 px-5 bg-white text-center'>

        <!-- Three columns of text below the carousel -->
        <div class='row'>

          <div class='col-lg-4 mb-4 text-center'>
            <img class='rounded-circle p-4' style='background-color: #6EB6FF;' src='/storage/icons/icon-thermometer.svg' alt='Generic placeholder image' width='140' height='140'>

            <h2 class='my-3'>Température</h2>
            <p>L'atmosphère tempérée d'une pièce leur convient. Mais au-dessus de 21'C, placer les pots sur des gravillons maintenus humides.</p>

          </div>


          <div class='col-lg-4 mb-4 text-center'>
            <img class='rounded-circle p-4' style='background-color: #A69AFE;' src='/storage/icons/icon-water.svg' alt='Generic placeholder image' width='140' height='140'>

            <h2 class='my-3'>Arrosage</h2>
            <p>Humidifier à peine le mélange et en laisser sécher le tiers avant d'arroser de nouveau.
            </p>

          </div><!-- /.col-lg-4 mb-4 -->
          <div class='col-lg-4 mb-4 text-center'>
            <img class='rounded-circle p-4' style='background-color: #85E3FF;' src='/storage/icons/icon-care.svg' alt='Generic placeholder image' width='140' height='140'>
              <h2 class='my-3'>Soins particulier</h2>
              <p>Lumière En période de croissance, exposer les monsteras à une lu lumière vive tamisée, mais, en hiver on peut les placer en plein soleil. Mal éclairées, elles produisent de très longs pétioles et de petites feuilles peu découpées.</p>

          </div><!-- /.col-lg-4 mb-4 -->

          <div class='col-lg-4 mb-4 text-center'>
             <img class='rounded-circle bg-danger p-4' src='/storage/icons/icon-care.svg' alt='Generic placeholder image' width='140' height='140'>
             <h2 class='my-3'>Engrais</h2>
             <p>En période de croissance, enrichir d'engrais liquide ordinaire tous les 15 jours Empotage et rempotage

            </p>


            </div><!-- /.col-lg-4 mb-4 -->
            <div class='col-lg-4 mb-4 text-center'>
              <img class='rounded-circle bg-dark p-4' src='/storage/icons/icon-pot.svg' alt='Generic placeholder image' width='140' height='140'>
              <h2 class='my-3'>Rempotage</h2>
              <p>Utiliser un mélange base de terreau additionné de terreau de feuilles grossier (1/3), Rempoter chaque printemps jusqu'à ce que la plante ait atteint une taille qu'on jugera convenable. Par la suite, renouveler chaque année le mélange en surface  </p>

              <!-- Bouton fenetre -->
              <button type='button' class='btn btn-danger bo-rad-23  my-3' data-toggle='modal' data-target='#exampleModal'>
                      En savoir plus
              </button>

              <!-- Modal -->
              <div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                  <div class='modal-dialog' role='document'>
                    <div class='modal-content'>
                      <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Engrais</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                          <span aria-hidden='true'>×</span>
                        </button>
                      </div>
                      <div class='modal-body'>
                             Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestib.  Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestib. <br> <br>
                              Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestib
                               Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestib<br>
                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestib.
                      </div>
                      <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fermer</button>

                      </div>
                    </div>
                  </div>
                </div>
              </div><!-- /.col-lg-4 mb-4 -->
            </div><!-- /.row -->
        </section>
    ",
        'arrosage_info' => ' • 1 fois par semaine en été <br> • 1 fois toute les 2 semaines en hiver <br>  • Brumiser régulièrement',
        'entretien_info' => ' • Rempotage annuel <br> • Nettoyer régulièrement les feuilles avec une éponge humide',
        'lumiere_info' => '• Placer la monstera dans un endroit très lumineux <br> • Eviter le contact direct avec soleil',
        'color_code' => '#ee8896',
      ]);


      $fiche = Fiche::create([

        'name' => 'Cactus',
        'slug' => 'cactus',
        'thumbnail' => 'fiches/monstera.jpg',

        'description' => "A l'état sauvage, les espèces du genre Monstera (ananas du pauvre) sont de vigoureuses plantes grimpantes. Leurs grosses racines aériennes, qui s'accrochent aux troncs et aux branches, leur procurent l'eau et les éléments nutritifs dont elles ont besoin. Une seule espèce, M. deliciosa (ceriman ou monstère), est devenue une plante d'intérieur recherchée. ",
        'description_short' => "A l'état sauvage, les espèces du genre Monstera (ananas du pauvre) sont de vigoureuses plantes grimpantes. Leurs grosses racines aériennes, qui s'accrochent aux troncs et aux branches, leur procurent l'eau et les éléments nutritifs dont elles ont besoin. Une seule espèce, M. deliciosa (ceriman ou monstère), est devenue une plante d'intérieur recherchée. ",
        'content' => "

        <!-- ############ -->
        <!-- Description -->
        <!-- ############ -->

        <section id='description' class='animated slideInUp'>
          <div class='jumbotron rounded-O p-4 p-md-5 text-white bg-dark' style='border-radius:0px !important;'>


              <div class='row px-2'>

                <div class='col-md-12 px-0'>
                  <h3 class='display-4 ml-2 mt-2 fontsize-6 font-italic'>
                  VIGOUREUSES ET GRIMPANTES
                  </h3>

              </div>

              <div class='col-md-6 px-0'>

                <span class='display-6 font-italic'> </span>
                <p class='lead my-3 pl-3'>Ses feuilles vernissées et cordiformes, non découpées
                 lorsqu'elles sont petites, ressemblent à celles du philodendron. Mais avec l'âge, les feuilles présentent de nombreuses perforations et se découpent presque jusqu'à la nervure médiane. Ces deux caractéristiques permettent à la plante dans son habitat naturel de résister aux grands vents tropicaux. Portées sur des pétioles de 30 cm, les feuilles peuvent atteindre 45 cm
                </p>
              </div>

              <div class='col-md-6 px-0'>

                <span class='display-6 font-italic'> </span>
                <p class='lead my-3 pl-3'>Ses feuilles vernissées et cordiformes, non découpées
                 lorsqu'elles sont petites, ressemblent à celles du philodendron. Mais avec l'âge, les
             feuilles présentent de nombreuses perforations et se découpent presque jusqu'à la nervure
              médiane. Ces deux caractéristiques permettent à la plante dans son habitat naturel de résister aux grands vents tropicaux. Portées sur des pétioles de 30 cm, les feuilles peuvent atteindre 45 cm
                </p>
              </div>


            </div> <!--End row-->

          </div> <!--End jumbotron-->

        </section>

        <!-- ############ -->
        <!-- Informations -->
        <!-- ############ -->


        <section class='py-5 px-5 bg-white text-center'>

        <!-- Three columns of text below the carousel -->
        <div class='row'>

          <div class='col-lg-4 mb-4 text-center'>
            <img class='rounded-circle p-4' style='background-color: #6EB6FF;' src='/storage/icons/icon-thermometer.svg' alt='Generic placeholder image' width='140' height='140'>

            <h2 class='my-3'>Température</h2>
            <p>L'atmosphère tempérée d'une pièce leur convient. Mais au-dessus de 21'C, placer les pots sur des gravillons maintenus humides.</p>

          </div>


          <div class='col-lg-4 mb-4 text-center'>
            <img class='rounded-circle p-4' style='background-color: #A69AFE;' src='/storage/icons/icon-water.svg' alt='Generic placeholder image' width='140' height='140'>

            <h2 class='my-3'>Arrosage</h2>
            <p>Humidifier à peine le mélange et en laisser sécher le tiers avant d'arroser de nouveau.
            </p>

          </div><!-- /.col-lg-4 mb-4 -->
          <div class='col-lg-4 mb-4 text-center'>
            <img class='rounded-circle p-4' style='background-color: #85E3FF;' src='/storage/icons/icon-care.svg' alt='Generic placeholder image' width='140' height='140'>
              <h2 class='my-3'>Soins particulier</h2>
              <p>Lumière En période de croissance, exposer les monsteras à une lu lumière vive tamisée, mais, en hiver on peut les placer en plein soleil. Mal éclairées, elles produisent de très longs pétioles et de petites feuilles peu découpées.</p>

          </div><!-- /.col-lg-4 mb-4 -->

          <div class='col-lg-4 mb-4 text-center'>
             <img class='rounded-circle bg-danger p-4' src='/storage/icons/icon-care.svg' alt='Generic placeholder image' width='140' height='140'>
             <h2 class='my-3'>Engrais</h2>
             <p>En période de croissance, enrichir d'engrais liquide ordinaire tous les 15 jours Empotage et rempotage

            </p>


            </div><!-- /.col-lg-4 mb-4 -->
            <div class='col-lg-4 mb-4 text-center'>
              <img class='rounded-circle bg-dark p-4' src='/storage/icons/icon-pot.svg' alt='Generic placeholder image' width='140' height='140'>
              <h2 class='my-3'>Rempotage</h2>
              <p>Utiliser un mélange base de terreau additionné de terreau de feuilles grossier (1/3), Rempoter chaque printemps jusqu'à ce que la plante ait atteint une taille qu'on jugera convenable. Par la suite, renouveler chaque année le mélange en surface  </p>

              <!-- Bouton fenetre -->
              <button type='button' class='btn btn-danger bo-rad-23  my-3' data-toggle='modal' data-target='#exampleModal'>
                      En savoir plus
              </button>

              <!-- Modal -->
              <div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                  <div class='modal-dialog' role='document'>
                    <div class='modal-content'>
                      <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Engrais</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                          <span aria-hidden='true'>×</span>
                        </button>
                      </div>
                      <div class='modal-body'>
                             Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestib.  Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestib. <br> <br>
                              Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestib
                               Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestib<br>
                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestib.
                      </div>
                      <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fermer</button>

                      </div>
                    </div>
                  </div>
                </div>
              </div><!-- /.col-lg-4 mb-4 -->
            </div><!-- /.row -->
        </section>
    ",
        'arrosage_info' => ' • 1 fois par semaine en été <br> • 1 fois toute les 2 semaines en hiver <br>  • Brumiser régulièrement',
        'entretien_info' => ' • Rempotage annuel <br> • Nettoyer régulièrement les feuilles avec une éponge humide',
        'lumiere_info' => '• Placer la monstera dans un endroit très lumineux <br> • Eviter le contact direct avec soleil',
        'color_code' => '#ee8896',
      ]);


                  $fiche = Fiche::create([

                    'name' => 'Ficus bonsai',
                    'slug' => 'ficus-bonsai',
                    'thumbnail' => 'fiches/ficus-bonsai.png',

                    'description' => "A l'état sauvage, les espèces du genre Monstera (ananas du pauvre) sont de vigoureuses plantes grimpantes. Leurs grosses racines aériennes, qui s'accrochent aux troncs et aux branches, leur procurent l'eau et les éléments nutritifs dont elles ont besoin. Une seule espèce, M. deliciosa (ceriman ou monstère), est devenue une plante d'intérieur recherchée. ",
                    'description_short' => "A l'état sauvage, les espèces du genre Monstera (ananas du pauvre) sont de vigoureuses plantes grimpantes. Leurs grosses racines aériennes, qui s'accrochent aux troncs et aux branches, leur procurent l'eau et les éléments nutritifs dont elles ont besoin. Une seule espèce, M. deliciosa (ceriman ou monstère), est devenue une plante d'intérieur recherchée. ",
                    'content' => "

                    <!-- ############ -->
                    <!-- Description -->
                    <!-- ############ -->

                    <section id='description' class='animated slideInUp'>
                      <div class='jumbotron rounded-O p-4 p-md-5 text-white bg-dark' style='border-radius:0px !important;'>


                          <div class='row px-2'>

                            <div class='col-md-12 px-0'>
                              <h3 class='display-4 ml-2 mt-2 fontsize-6 font-italic'>
                              VIGOUREUSES ET GRIMPANTES
                              </h3>

                          </div>

                          <div class='col-md-6 px-0'>

                            <span class='display-6 font-italic'> </span>
                            <p class='lead my-3 pl-3'>Ses feuilles vernissées et cordiformes, non découpées
                             lorsqu'elles sont petites, ressemblent à celles du philodendron. Mais avec l'âge, les feuilles présentent de nombreuses perforations et se découpent presque jusqu'à la nervure médiane. Ces deux caractéristiques permettent à la plante dans son habitat naturel de résister aux grands vents tropicaux. Portées sur des pétioles de 30 cm, les feuilles peuvent atteindre 45 cm
                            </p>
                          </div>

                          <div class='col-md-6 px-0'>

                            <span class='display-6 font-italic'> </span>
                            <p class='lead my-3 pl-3'>Ses feuilles vernissées et cordiformes, non découpées
                             lorsqu'elles sont petites, ressemblent à celles du philodendron. Mais avec l'âge, les
                         feuilles présentent de nombreuses perforations et se découpent presque jusqu'à la nervure
                          médiane. Ces deux caractéristiques permettent à la plante dans son habitat naturel de résister aux grands vents tropicaux. Portées sur des pétioles de 30 cm, les feuilles peuvent atteindre 45 cm
                            </p>
                          </div>


                        </div> <!--End row-->

                      </div> <!--End jumbotron-->

                    </section>

                    <!-- ############ -->
                    <!-- Informations -->
                    <!-- ############ -->


                    <section class='py-5 px-5 bg-white text-center'>

                    <!-- Three columns of text below the carousel -->
                    <div class='row'>

                      <div class='col-lg-4 mb-4 text-center'>
                        <img class='rounded-circle p-4' style='background-color: #6EB6FF;' src='/storage/icons/icon-thermometer.svg' alt='Generic placeholder image' width='140' height='140'>

                        <h2 class='my-3'>Température</h2>
                        <p>L'atmosphère tempérée d'une pièce leur convient. Mais au-dessus de 21'C, placer les pots sur des gravillons maintenus humides.</p>

                      </div>


                      <div class='col-lg-4 mb-4 text-center'>
                        <img class='rounded-circle p-4' style='background-color: #A69AFE;' src='/storage/icons/icon-water.svg' alt='Generic placeholder image' width='140' height='140'>

                        <h2 class='my-3'>Arrosage</h2>
                        <p>Humidifier à peine le mélange et en laisser sécher le tiers avant d'arroser de nouveau.
                        </p>

                      </div><!-- /.col-lg-4 mb-4 -->
                      <div class='col-lg-4 mb-4 text-center'>
                        <img class='rounded-circle p-4' style='background-color: #85E3FF;' src='/storage/icons/icon-care.svg' alt='Generic placeholder image' width='140' height='140'>
                          <h2 class='my-3'>Soins particulier</h2>
                          <p>Lumière En période de croissance, exposer les monsteras à une lu lumière vive tamisée, mais, en hiver on peut les placer en plein soleil. Mal éclairées, elles produisent de très longs pétioles et de petites feuilles peu découpées.</p>

                      </div><!-- /.col-lg-4 mb-4 -->

                      <div class='col-lg-4 mb-4 text-center'>
                         <img class='rounded-circle bg-danger p-4' src='/storage/icons/icon-care.svg' alt='Generic placeholder image' width='140' height='140'>
                         <h2 class='my-3'>Engrais</h2>
                         <p>En période de croissance, enrichir d'engrais liquide ordinaire tous les 15 jours Empotage et rempotage

                        </p>


                        </div><!-- /.col-lg-4 mb-4 -->
                        <div class='col-lg-4 mb-4 text-center'>
                          <img class='rounded-circle bg-dark p-4' src='/storage/icons/icon-pot.svg' alt='Generic placeholder image' width='140' height='140'>
                          <h2 class='my-3'>Rempotage</h2>
                          <p>Utiliser un mélange base de terreau additionné de terreau de feuilles grossier (1/3), Rempoter chaque printemps jusqu'à ce que la plante ait atteint une taille qu'on jugera convenable. Par la suite, renouveler chaque année le mélange en surface  </p>

                          <!-- Bouton fenetre -->
                          <button type='button' class='btn btn-danger bo-rad-23  my-3' data-toggle='modal' data-target='#exampleModal'>
                                  En savoir plus
                          </button>

                          <!-- Modal -->
                          <div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                              <div class='modal-dialog' role='document'>
                                <div class='modal-content'>
                                  <div class='modal-header'>
                                    <h5 class='modal-title' id='exampleModalLabel'>Engrais</h5>
                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                      <span aria-hidden='true'>×</span>
                                    </button>
                                  </div>
                                  <div class='modal-body'>
                                         Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestib.  Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestib. <br> <br>
                                          Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestib
                                           Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestib<br>
                                            Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestib.
                                  </div>
                                  <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fermer</button>

                                  </div>
                                </div>
                              </div>
                            </div>
                          </div><!-- /.col-lg-4 mb-4 -->
                        </div><!-- /.row -->
                    </section>
                ",
                    'arrosage_info' => ' • 1 fois par semaine en été <br> • 1 fois toute les 2 semaines en hiver <br>  • Brumiser régulièrement',
                    'entretien_info' => ' • Rempotage annuel <br> • Nettoyer régulièrement les feuilles avec une éponge humide',
                    'lumiere_info' => '• Placer la monstera dans un endroit très lumineux <br> • Eviter le contact direct avec soleil',
                    'color_code' => '#ee8896',
                  ]);




                              $fiche = Fiche::create([

                                'name' => 'Ficus',
                                'slug' => 'ficus',
                                'thumbnail' => 'fiches/ficus.png',

                                'description' => "A l'état sauvage, les espèces du genre Monstera (ananas du pauvre) sont de vigoureuses plantes grimpantes. Leurs grosses racines aériennes, qui s'accrochent aux troncs et aux branches, leur procurent l'eau et les éléments nutritifs dont elles ont besoin. Une seule espèce, M. deliciosa (ceriman ou monstère), est devenue une plante d'intérieur recherchée. ",
                                'description_short' => "A l'état sauvage, les espèces du genre Monstera (ananas du pauvre) sont de vigoureuses plantes grimpantes. Leurs grosses racines aériennes, qui s'accrochent aux troncs et aux branches, leur procurent l'eau et les éléments nutritifs dont elles ont besoin. Une seule espèce, M. deliciosa (ceriman ou monstère), est devenue une plante d'intérieur recherchée. ",
                                'content' => "

                                <!-- ############ -->
                                <!-- Description -->
                                <!-- ############ -->

                                <section id='description' class='animated slideInUp'>
                                  <div class='jumbotron rounded-O p-4 p-md-5 text-white bg-dark' style='border-radius:0px !important;'>


                                      <div class='row px-2'>

                                        <div class='col-md-12 px-0'>
                                          <h3 class='display-4 ml-2 mt-2 fontsize-6 font-italic'>
                                          VIGOUREUSES ET GRIMPANTES
                                          </h3>

                                      </div>

                                      <div class='col-md-6 px-0'>

                                        <span class='display-6 font-italic'> </span>
                                        <p class='lead my-3 pl-3'>Ses feuilles vernissées et cordiformes, non découpées
                                         lorsqu'elles sont petites, ressemblent à celles du philodendron. Mais avec l'âge, les feuilles présentent de nombreuses perforations et se découpent presque jusqu'à la nervure médiane. Ces deux caractéristiques permettent à la plante dans son habitat naturel de résister aux grands vents tropicaux. Portées sur des pétioles de 30 cm, les feuilles peuvent atteindre 45 cm
                                        </p>
                                      </div>

                                      <div class='col-md-6 px-0'>

                                        <span class='display-6 font-italic'> </span>
                                        <p class='lead my-3 pl-3'>Ses feuilles vernissées et cordiformes, non découpées
                                         lorsqu'elles sont petites, ressemblent à celles du philodendron. Mais avec l'âge, les
                                     feuilles présentent de nombreuses perforations et se découpent presque jusqu'à la nervure
                                      médiane. Ces deux caractéristiques permettent à la plante dans son habitat naturel de résister aux grands vents tropicaux. Portées sur des pétioles de 30 cm, les feuilles peuvent atteindre 45 cm
                                        </p>
                                      </div>


                                    </div> <!--End row-->

                                  </div> <!--End jumbotron-->

                                </section>

                                <!-- ############ -->
                                <!-- Informations -->
                                <!-- ############ -->


                                <section class='py-5 px-5 bg-white text-center'>

                                <!-- Three columns of text below the carousel -->
                                <div class='row'>

                                  <div class='col-lg-4 mb-4 text-center'>
                                    <img class='rounded-circle p-4' style='background-color: #6EB6FF;' src='/storage/icons/icon-thermometer.svg' alt='Generic placeholder image' width='140' height='140'>

                                    <h2 class='my-3'>Température</h2>
                                    <p>L'atmosphère tempérée d'une pièce leur convient. Mais au-dessus de 21'C, placer les pots sur des gravillons maintenus humides.</p>

                                  </div>


                                  <div class='col-lg-4 mb-4 text-center'>
                                    <img class='rounded-circle p-4' style='background-color: #A69AFE;' src='/storage/icons/icon-water.svg' alt='Generic placeholder image' width='140' height='140'>

                                    <h2 class='my-3'>Arrosage</h2>
                                    <p>Humidifier à peine le mélange et en laisser sécher le tiers avant d'arroser de nouveau.
                                    </p>

                                  </div><!-- /.col-lg-4 mb-4 -->
                                  <div class='col-lg-4 mb-4 text-center'>
                                    <img class='rounded-circle p-4' style='background-color: #85E3FF;' src='/storage/icons/icon-care.svg' alt='Generic placeholder image' width='140' height='140'>
                                      <h2 class='my-3'>Soins particulier</h2>
                                      <p>Lumière En période de croissance, exposer les monsteras à une lu lumière vive tamisée, mais, en hiver on peut les placer en plein soleil. Mal éclairées, elles produisent de très longs pétioles et de petites feuilles peu découpées.</p>

                                  </div><!-- /.col-lg-4 mb-4 -->

                                  <div class='col-lg-4 mb-4 text-center'>
                                     <img class='rounded-circle bg-danger p-4' src='/storage/icons/icon-care.svg' alt='Generic placeholder image' width='140' height='140'>
                                     <h2 class='my-3'>Engrais</h2>
                                     <p>En période de croissance, enrichir d'engrais liquide ordinaire tous les 15 jours Empotage et rempotage

                                    </p>


                                    </div><!-- /.col-lg-4 mb-4 -->
                                    <div class='col-lg-4 mb-4 text-center'>
                                      <img class='rounded-circle bg-dark p-4' src='/storage/icons/icon-pot.svg' alt='Generic placeholder image' width='140' height='140'>
                                      <h2 class='my-3'>Rempotage</h2>
                                      <p>Utiliser un mélange base de terreau additionné de terreau de feuilles grossier (1/3), Rempoter chaque printemps jusqu'à ce que la plante ait atteint une taille qu'on jugera convenable. Par la suite, renouveler chaque année le mélange en surface  </p>

                                      <!-- Bouton fenetre -->
                                      <button type='button' class='btn btn-danger bo-rad-23  my-3' data-toggle='modal' data-target='#exampleModal'>
                                              En savoir plus
                                      </button>

                                      <!-- Modal -->
                                      <div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                          <div class='modal-dialog' role='document'>
                                            <div class='modal-content'>
                                              <div class='modal-header'>
                                                <h5 class='modal-title' id='exampleModalLabel'>Engrais</h5>
                                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                  <span aria-hidden='true'>×</span>
                                                </button>
                                              </div>
                                              <div class='modal-body'>
                                                     Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestib.  Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestib. <br> <br>
                                                      Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestib
                                                       Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestib<br>
                                                        Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestib.
                                              </div>
                                              <div class='modal-footer'>
                                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fermer</button>

                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div><!-- /.col-lg-4 mb-4 -->
                                    </div><!-- /.row -->
                                </section>
                            ",
                                'arrosage_info' => ' • 1 fois par semaine en été <br> • 1 fois toute les 2 semaines en hiver <br>  • Brumiser régulièrement',
                                'entretien_info' => ' • Rempotage annuel <br> • Nettoyer régulièrement les feuilles avec une éponge humide',
                                'lumiere_info' => '• Placer la monstera dans un endroit très lumineux <br> • Eviter le contact direct avec soleil',
                                'color_code' => '#ee8896',
                              ]);

                        $fiche = Fiche::create([

                          'name' => 'Bananier Musa',
                          'slug' => 'bananier-musa',
                          'thumbnail' => 'fiches/bananier-musa.png',

                          'description' => "A l'état sauvage, les espèces du genre Monstera (ananas du pauvre) sont de vigoureuses plantes grimpantes. Leurs grosses racines aériennes, qui s'accrochent aux troncs et aux branches, leur procurent l'eau et les éléments nutritifs dont elles ont besoin. Une seule espèce, M. deliciosa (ceriman ou monstère), est devenue une plante d'intérieur recherchée. ",
                          'description_short' => "A l'état sauvage, les espèces du genre Monstera (ananas du pauvre) sont de vigoureuses plantes grimpantes. Leurs grosses racines aériennes, qui s'accrochent aux troncs et aux branches, leur procurent l'eau et les éléments nutritifs dont elles ont besoin. Une seule espèce, M. deliciosa (ceriman ou monstère), est devenue une plante d'intérieur recherchée. ",
                          'content' => "

                          <!-- ############ -->
                          <!-- Description -->
                          <!-- ############ -->

                          <section id='description' class='animated slideInUp'>
                            <div class='jumbotron rounded-O p-4 p-md-5 text-white bg-dark' style='border-radius:0px !important;'>


                                <div class='row px-2'>

                                  <div class='col-md-12 px-0'>
                                    <h3 class='display-4 ml-2 mt-2 fontsize-6 font-italic'>
                                    VIGOUREUSES ET GRIMPANTES
                                    </h3>

                                </div>

                                <div class='col-md-6 px-0'>

                                  <span class='display-6 font-italic'> </span>
                                  <p class='lead my-3 pl-3'>Ses feuilles vernissées et cordiformes, non découpées
                                   lorsqu'elles sont petites, ressemblent à celles du philodendron. Mais avec l'âge, les feuilles présentent de nombreuses perforations et se découpent presque jusqu'à la nervure médiane. Ces deux caractéristiques permettent à la plante dans son habitat naturel de résister aux grands vents tropicaux. Portées sur des pétioles de 30 cm, les feuilles peuvent atteindre 45 cm
                                  </p>
                                </div>

                                <div class='col-md-6 px-0'>

                                  <span class='display-6 font-italic'> </span>
                                  <p class='lead my-3 pl-3'>Ses feuilles vernissées et cordiformes, non découpées
                                   lorsqu'elles sont petites, ressemblent à celles du philodendron. Mais avec l'âge, les
                               feuilles présentent de nombreuses perforations et se découpent presque jusqu'à la nervure
                                médiane. Ces deux caractéristiques permettent à la plante dans son habitat naturel de résister aux grands vents tropicaux. Portées sur des pétioles de 30 cm, les feuilles peuvent atteindre 45 cm
                                  </p>
                                </div>


                              </div> <!--End row-->

                            </div> <!--End jumbotron-->

                          </section>

                          <!-- ############ -->
                          <!-- Informations -->
                          <!-- ############ -->


                          <section class='py-5 px-5 bg-white text-center'>

                          <!-- Three columns of text below the carousel -->
                          <div class='row'>

                            <div class='col-lg-4 mb-4 text-center'>
                              <img class='rounded-circle p-4' style='background-color: #6EB6FF;' src='/storage/icons/icon-thermometer.svg' alt='Generic placeholder image' width='140' height='140'>

                              <h2 class='my-3'>Température</h2>
                              <p>L'atmosphère tempérée d'une pièce leur convient. Mais au-dessus de 21'C, placer les pots sur des gravillons maintenus humides.</p>

                            </div>


                            <div class='col-lg-4 mb-4 text-center'>
                              <img class='rounded-circle p-4' style='background-color: #A69AFE;' src='/storage/icons/icon-water.svg' alt='Generic placeholder image' width='140' height='140'>

                              <h2 class='my-3'>Arrosage</h2>
                              <p>Humidifier à peine le mélange et en laisser sécher le tiers avant d'arroser de nouveau.
                              </p>

                            </div><!-- /.col-lg-4 mb-4 -->
                            <div class='col-lg-4 mb-4 text-center'>
                              <img class='rounded-circle p-4' style='background-color: #85E3FF;' src='/storage/icons/icon-care.svg' alt='Generic placeholder image' width='140' height='140'>
                                <h2 class='my-3'>Soins particulier</h2>
                                <p>Lumière En période de croissance, exposer les monsteras à une lu lumière vive tamisée, mais, en hiver on peut les placer en plein soleil. Mal éclairées, elles produisent de très longs pétioles et de petites feuilles peu découpées.</p>

                            </div><!-- /.col-lg-4 mb-4 -->

                            <div class='col-lg-4 mb-4 text-center'>
                               <img class='rounded-circle bg-danger p-4' src='/storage/icons/icon-care.svg' alt='Generic placeholder image' width='140' height='140'>
                               <h2 class='my-3'>Engrais</h2>
                               <p>En période de croissance, enrichir d'engrais liquide ordinaire tous les 15 jours Empotage et rempotage

                              </p>


                              </div><!-- /.col-lg-4 mb-4 -->
                              <div class='col-lg-4 mb-4 text-center'>
                                <img class='rounded-circle bg-dark p-4' src='/storage/icons/icon-pot.svg' alt='Generic placeholder image' width='140' height='140'>
                                <h2 class='my-3'>Rempotage</h2>
                                <p>Utiliser un mélange base de terreau additionné de terreau de feuilles grossier (1/3), Rempoter chaque printemps jusqu'à ce que la plante ait atteint une taille qu'on jugera convenable. Par la suite, renouveler chaque année le mélange en surface  </p>

                                <!-- Bouton fenetre -->
                                <button type='button' class='btn btn-danger bo-rad-23  my-3' data-toggle='modal' data-target='#exampleModal'>
                                        En savoir plus
                                </button>

                                <!-- Modal -->
                                <div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog' role='document'>
                                      <div class='modal-content'>
                                        <div class='modal-header'>
                                          <h5 class='modal-title' id='exampleModalLabel'>Engrais</h5>
                                          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                            <span aria-hidden='true'>×</span>
                                          </button>
                                        </div>
                                        <div class='modal-body'>
                                               Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestib.  Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestib. <br> <br>
                                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestib
                                                 Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestib<br>
                                                  Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestib.
                                        </div>
                                        <div class='modal-footer'>
                                          <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fermer</button>

                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div><!-- /.col-lg-4 mb-4 -->
                              </div><!-- /.row -->
                          </section>
                      ",
                          'arrosage_info' => ' • 1 fois par semaine en été <br> • 1 fois toute les 2 semaines en hiver <br>  • Brumiser régulièrement',
                          'entretien_info' => ' • Rempotage annuel <br> • Nettoyer régulièrement les feuilles avec une éponge humide',
                          'lumiere_info' => '• Placer la monstera dans un endroit très lumineux <br> • Eviter le contact direct avec soleil',
                          'color_code' => '#ee8896',
                        ]);

                        $fiche = Fiche::create([

                          'name' => 'Sanseveria',
                          'slug' => 'sanseveria',
                          'thumbnail' => 'fiches/sanseveria.png',

                          'description' => "A l'état sauvage, les espèces du genre Monstera (ananas du pauvre) sont de vigoureuses plantes grimpantes. Leurs grosses racines aériennes, qui s'accrochent aux troncs et aux branches, leur procurent l'eau et les éléments nutritifs dont elles ont besoin. Une seule espèce, M. deliciosa (ceriman ou monstère), est devenue une plante d'intérieur recherchée. ",
                          'description_short' => "A l'état sauvage, les espèces du genre Monstera (ananas du pauvre) sont de vigoureuses plantes grimpantes. Leurs grosses racines aériennes, qui s'accrochent aux troncs et aux branches, leur procurent l'eau et les éléments nutritifs dont elles ont besoin. Une seule espèce, M. deliciosa (ceriman ou monstère), est devenue une plante d'intérieur recherchée. ",
                          'content' => "

                          <!-- ############ -->
                          <!-- Description -->
                          <!-- ############ -->

                          <section id='description' class='animated slideInUp'>
                            <div class='jumbotron rounded-O p-4 p-md-5 text-white bg-dark' style='border-radius:0px !important;'>


                                <div class='row px-2'>

                                  <div class='col-md-12 px-0'>
                                    <h3 class='display-4 ml-2 mt-2 fontsize-6 font-italic'>
                                    VIGOUREUSES ET GRIMPANTES
                                    </h3>

                                </div>

                                <div class='col-md-6 px-0'>

                                  <span class='display-6 font-italic'> </span>
                                  <p class='lead my-3 pl-3'>Ses feuilles vernissées et cordiformes, non découpées
                                   lorsqu'elles sont petites, ressemblent à celles du philodendron. Mais avec l'âge, les feuilles présentent de nombreuses perforations et se découpent presque jusqu'à la nervure médiane. Ces deux caractéristiques permettent à la plante dans son habitat naturel de résister aux grands vents tropicaux. Portées sur des pétioles de 30 cm, les feuilles peuvent atteindre 45 cm
                                  </p>
                                </div>

                                <div class='col-md-6 px-0'>

                                  <span class='display-6 font-italic'> </span>
                                  <p class='lead my-3 pl-3'>Ses feuilles vernissées et cordiformes, non découpées
                                   lorsqu'elles sont petites, ressemblent à celles du philodendron. Mais avec l'âge, les
                               feuilles présentent de nombreuses perforations et se découpent presque jusqu'à la nervure
                                médiane. Ces deux caractéristiques permettent à la plante dans son habitat naturel de résister aux grands vents tropicaux. Portées sur des pétioles de 30 cm, les feuilles peuvent atteindre 45 cm
                                  </p>
                                </div>


                              </div> <!--End row-->

                            </div> <!--End jumbotron-->

                          </section>

                          <!-- ############ -->
                          <!-- Informations -->
                          <!-- ############ -->


                          <section class='py-5 px-5 bg-white text-center'>

                          <!-- Three columns of text below the carousel -->
                          <div class='row'>

                            <div class='col-lg-4 mb-4 text-center'>
                              <img class='rounded-circle p-4' style='background-color: #6EB6FF;' src='/storage/icons/icon-thermometer.svg' alt='Generic placeholder image' width='140' height='140'>

                              <h2 class='my-3'>Température</h2>
                              <p>L'atmosphère tempérée d'une pièce leur convient. Mais au-dessus de 21'C, placer les pots sur des gravillons maintenus humides.</p>

                            </div>


                            <div class='col-lg-4 mb-4 text-center'>
                              <img class='rounded-circle p-4' style='background-color: #A69AFE;' src='/storage/icons/icon-water.svg' alt='Generic placeholder image' width='140' height='140'>

                              <h2 class='my-3'>Arrosage</h2>
                              <p>Humidifier à peine le mélange et en laisser sécher le tiers avant d'arroser de nouveau.
                              </p>

                            </div><!-- /.col-lg-4 mb-4 -->
                            <div class='col-lg-4 mb-4 text-center'>
                              <img class='rounded-circle p-4' style='background-color: #85E3FF;' src='/storage/icons/icon-care.svg' alt='Generic placeholder image' width='140' height='140'>
                                <h2 class='my-3'>Soins particulier</h2>
                                <p>Lumière En période de croissance, exposer les monsteras à une lu lumière vive tamisée, mais, en hiver on peut les placer en plein soleil. Mal éclairées, elles produisent de très longs pétioles et de petites feuilles peu découpées.</p>

                            </div><!-- /.col-lg-4 mb-4 -->

                            <div class='col-lg-4 mb-4 text-center'>
                               <img class='rounded-circle bg-danger p-4' src='/storage/icons/icon-care.svg' alt='Generic placeholder image' width='140' height='140'>
                               <h2 class='my-3'>Engrais</h2>
                               <p>En période de croissance, enrichir d'engrais liquide ordinaire tous les 15 jours Empotage et rempotage

                              </p>


                              </div><!-- /.col-lg-4 mb-4 -->
                              <div class='col-lg-4 mb-4 text-center'>
                                <img class='rounded-circle bg-dark p-4' src='/storage/icons/icon-pot.svg' alt='Generic placeholder image' width='140' height='140'>
                                <h2 class='my-3'>Rempotage</h2>
                                <p>Utiliser un mélange base de terreau additionné de terreau de feuilles grossier (1/3), Rempoter chaque printemps jusqu'à ce que la plante ait atteint une taille qu'on jugera convenable. Par la suite, renouveler chaque année le mélange en surface  </p>

                                <!-- Bouton fenetre -->
                                <button type='button' class='btn btn-danger bo-rad-23  my-3' data-toggle='modal' data-target='#exampleModal'>
                                        En savoir plus
                                </button>

                                <!-- Modal -->
                                <div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog' role='document'>
                                      <div class='modal-content'>
                                        <div class='modal-header'>
                                          <h5 class='modal-title' id='exampleModalLabel'>Engrais</h5>
                                          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                            <span aria-hidden='true'>×</span>
                                          </button>
                                        </div>
                                        <div class='modal-body'>
                                               Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestib.  Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestib. <br> <br>
                                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestib
                                                 Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestib<br>
                                                  Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestib.
                                        </div>
                                        <div class='modal-footer'>
                                          <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fermer</button>

                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div><!-- /.col-lg-4 mb-4 -->
                              </div><!-- /.row -->
                          </section>
                      ",
                          'arrosage_info' => ' • 1 fois par semaine en été <br> • 1 fois toute les 2 semaines en hiver <br>  • Brumiser régulièrement',
                          'entretien_info' => ' • Rempotage annuel <br> • Nettoyer régulièrement les feuilles avec une éponge humide',
                          'lumiere_info' => '• Placer la monstera dans un endroit très lumineux <br> • Eviter le contact direct avec soleil',
                          'color_code' => '#ee8896',
                        ]);
    }
}
