<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\PostCategorie;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


      $post = Post::create([
        'name' => "Protéger vos plantes de votre chat",
        'slug' => "proteger-plantes-chat-felin",
        'description' => "Nos amis les félins peuvent se révéler être de vrai moi-je dans le maison, interview avec El Moup qui nous raconte ses histoires...",

                'content' => "
                <main>

                <!-- Content Page -->
                <!-- Banner video -->
                <section id='description py-3' class=''>


                <div class='jumbotron p-3 p-md-5 text-white rounded-0 bg-dark'>
                <div class='row'>

                 <div class='col-md-6 pl-2'>
                   <h3 class='display-4  font-2b fontsize-6 font-italic px-2 mt-2'>Les bien-faits du gel </h3>
                   <p class='lead my-3 px-3'>
                L’aloe vera est une plante médicinale aux multiples vertues, récupérer son gel s'avère très simple. Pour vous faciliter la tâche nous vous avons préparé une vidéo tuto. Aussi appelé plantes miracle, l’aloe vera est utile pour (entre autres) :
                </p>

                   <div class='wrap-tags flex-w px-2'>
                <span  class='tag-item text-white' data-toggle='tooltip' data-placement='top' title='Adoucit et nourrit la peau après épilation'>
                Adoucit la post-épilation
                </span>
                <span  class='tag-item text-white' data-toggle='tooltip' data-placement='top' title='Adoucit et nourrit la peau après épilation'>
                Régule les peaux grasses
                </span>
                <span  class='tag-item text-white' data-toggle='tooltip' data-placement='top' title='Adoucit et nourrit la peau après épilation'>
                Accélère la cicatrisation
                </span>
                <span  class='tag-item text-white' data-toggle='tooltip' data-placement='top' title='Adoucit et nourrit la peau après épilation'>
                Réduit les vergetures
                </span>
                <span  class='tag-item text-white' data-toggle='tooltip' data-placement='top' title='Adoucit et nourrit la peau après épilation'>
                Soigne les brulures
                </span>
                </div>

                 </div>

                 <div class='col-md-6 px-0'>
                <div class='embed-responsive mt-2 embed-responsive-16by9'>
                   <iframe width='560' height='315' src='https://www.youtube.com/embed/KUyESk8OTFw' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
                </div>
                 </div>

                </div>

                </div>

                </section>


                <section class='py-5 px-5 bg-white text-center'>

                <p class='py-2 lead'>
                 L’aloe vera est une plante médicinale aux multiples vertues, récupérer son gel s'avère très simple. Pour vous faciliter la tâche nous vous avons préparé une vidéo tuto.
                 Aussi appelé plantes miracle, l’aloe vera est utile pour (entre autres) :



                </p>


                <p>			Retrouvez la plante d’intérieur  Aloe Vera au prix de 5€ lors de nos ventes éphémères  à Lyon, Valence, Annecy, Marseille, Grenoble, Toulouse, Clermont Ferrand, ….
                </p>
                </section>

                 </main>
                ",
        'thumbnail' => "storage/posts/proteger-plantes-chat-felin.jpg",
      ]);

      $cat = PostCategorie::find(1);
      $post->postcategorie()->associate(PostCategorie::where('slug','astuces')->firstOrFail()->id);
        $post->save();

      $post = Post::create([
        'name' => "Comment créer son gel Aloe Vera ?",
        'slug' => "comment-creer-son-gel-aloevera",
        'description' => "La plante miracle Aloe vera est utilisées depuis des milliers d'années en médecine douce, voici une astuce pour extraire son gel...",
        'color_code' => '#ee8896',
                'content' => "


        <!-- Content Page -->
        <!-- Banner video -->
             <section id='description py-3' class=''>


             <div class='jumbotron p-3 p-md-5 text-white rounded-0 bg-dark'>
               <div class='row'>

                 <div class='col-md-6 pl-2'>
                   <h3 class='display-4  font-2b fontsize-6 font-italic px-2 mt-2'>Les bien-faits du gel </h3>
                   <p class='lead my-3 px-3'>
L’aloe vera est une plante médicinale aux multiples vertues, récupérer son gel s'avère très simple. Pour vous faciliter la tâche nous vous avons préparé une vidéo tuto. Aussi appelé plantes miracle, l’aloe vera est utile pour (entre autres) :
</p>

                   <div class='wrap-tags flex-w px-2'>
	<span  class='tag-item text-white' data-toggle='tooltip' data-placement='top' title='Adoucit et nourrit la peau après épilation'>
		Adoucit la post-épilation
	</span>
  <span  class='tag-item text-white' data-toggle='tooltip' data-placement='top' title='Adoucit et nourrit la peau après épilation'>
		Régule les peaux grasses
	</span>
  <span  class='tag-item text-white' data-toggle='tooltip' data-placement='top' title='Adoucit et nourrit la peau après épilation'>
		Accélère la cicatrisation
	</span>
  <span  class='tag-item text-white' data-toggle='tooltip' data-placement='top' title='Adoucit et nourrit la peau après épilation'>
		Réduit les vergetures
	</span>
  <span  class='tag-item text-white' data-toggle='tooltip' data-placement='top' title='Adoucit et nourrit la peau après épilation'>
		Soigne les brulures
	</span>
  		</div>

                 </div>

                 <div class='col-md-6 px-0'>
<div class='embed-responsive mt-2 embed-responsive-16by9'>
                   <iframe width='560' height='315' src='https://www.youtube.com/embed/KUyESk8OTFw' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
</div>
                 </div>

               </div>

               </div>

             </section>


             <section class='py-5 px-5 bg-white text-center'>

               <p class='py-2 lead'>
                 L’aloe vera est une plante médicinale aux multiples vertues, récupérer son gel s'avère très simple. Pour vous faciliter la tâche nous vous avons préparé une vidéo tuto.
                 Aussi appelé plantes miracle, l’aloe vera est utile pour (entre autres) :



               </p>


             <p>			Retrouvez la plante d’intérieur  Aloe Vera au prix de 5€ lors de nos ventes éphémères  à Lyon, Valence, Annecy, Marseille, Grenoble, Toulouse, Clermont Ferrand, ….
             </p>
             </section>

                 </main>",
        'thumbnail' => "storage/posts/comment-rempoter-son-aloe-vera.png",
      ]);

      $cat = PostCategorie::find(1);
      $post->postcategorie()->associate(PostCategorie::where('slug','astuces')->firstOrFail()->id);
        $post->save();


        $post = Post::create([
          'name' => "Faire pousser un avocatier facilement",
          'slug' => "art-agencer-vos-especes-de-plantes-d-interieur",
          'description' => "Le rempotage est plutot heureux de vous présenter notre nouveau site internet. Retrouvez ici des choses cools...",
          'color_code' => '#ee8896',
                    'content' => "<main>
                                               <!-- Banner video -->


                              <!-- Content Page -->
                              <!-- Banner video -->
                                   <section id='description py-3' class=''>


                                   <div class='jumbotron p-3 p-md-5 text-white rounded-0 bg-dark'>
                                     <div class='row'>

                                       <div class='col-md-6 pl-2'>
                                         <h3 class='display-4  font-2b fontsize-6 font-italic px-2 mt-2'>Avocatier</h3>
                                         <span id='docs-internal-guid-ff3d198f-7fff-275e-7bcc-4c68aef05d72'><p dir='ltr' style='line-height:1.38;margin-top:0pt;margin-bottom:0pt;'><span style='font-size: 11pt; font-family: Arial; background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;'>Vous venez de manger un avocat et vous ne savez pas quoi faire du noyau de ce succulent fruit. Stop ! Ne le jetez pas. Nous avons ce qu’il vous faut. Avec un peu d’attention et d’amour ce petit noyau peut rapidement devenir un immense avocatier venant compléter votre collection de plantes d’intérieur. @camilia_green une plantes addict Lyonnaise nous montre comment elle procède.</span><span style='font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;'>&nbsp;</span><span style='font-size: 1.25rem; background-color: rgba(0, 0, 0, 0.02);'>&nbsp;:</span></p></span>

                                         <div class='wrap-tags flex-w px-2'>
                        		</div>

                                       </div>

                                       <div class='col-md-6 px-0'>
                      <div class='embed-responsive mt-2 embed-responsive-16by9'>
                                         <iframe src='https://www.youtube.com/embed/KUyESk8OTFw' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen='' width='560' height='315' frameborder='0'></iframe>
                      </div>
                                       </div>

                                     </div>

                                     </div>

                                   </section>


                                   <section class='py-5 px-5 bg-white text-center'>

                                     <p class='py-2 lead'>
                                       L’avocatier est un sublime arbre d'intérieur, le faire pousser devrait vous satisfaire&nbsp; :



                                     </p>


                                   <p>			Faites le plein de plantes d'intérieur lors de nos ventes éphémères  à Lyon, Valence, Annecy, Marseille, Grenoble, Toulouse, Clermont Ferrand, ….
                                   </p>
                                   </section>

                                       </main>",
          'thumbnail' => "storage/posts/faire-pousser-avocatier-facilement.jpg",
        ]);

        $cat = PostCategorie::find(1);
        $post->postcategorie()->associate(PostCategorie::where('slug','astuces')->firstOrFail()->id);
          $post->save();


        $post = Post::create([
          'name' => "Harmonie - Plante et jardin d'intérieur",
          'slug' => "harmonie-plante-jardin-interieur",
          'description' => "Même si les plantes d'intérieur sont douées d'une grande faculté d'adaptation, il faut respect quelques règles de bases...",
          'color_code' => '#ee8896',
                    'content' => "Même si les plantes d'intérieur sont douées d'une grande faculté d'adaptation, il faut toujours les choisir en fonction des conditions d'éclairage et de température qu'on peut leur offrir. C'est là l'un des premiers principes d'harmonie à respecter. Une fois qu'on a choisi les plantes les plus aptes à vivre dans la maison qui va les recevoir, il faut penser à leur trouver la meilleure place. A coup sûr toutes les pièces seront embellies par la présence de quelques plantes, mais à condition d'éviter les excès. Un jardin d'intérieur ne doit pas prendre des allures de jungle exubérante. Pour réussir l'agencement d'un jardin
          d'intérieur, il faut encore respecter les proportions, sans toutefois s'astreindre à une symétrie rigide. Evidemment, on évitera désencombrer une pièce exiguë avec des plantes d'intérieur  de grande taille, mais on pourra déroger à cette règle s'il s'agit de combler un espace perdu ou de dissimuler un objet dis gracieux. Mais en principe on réservera les plantes touffues, les arbustes, les plantes grimpantes ou rampantes aux pièces plus vastes. De même peut-on affirmer à pièces spacieuses, arrangements élaborés.<br><br>
          Qui dit décoration dit couleurs... Dans ce domaine, l'harmonie s'impose. Un mur sombre éteindra le vert soutenu ou les panachures du plus beau feuillage. En revanche, il fera ressortir le vert délicat d'une fougère ou les pâles contours d'une sansevieria.
          Harmoniser son jardin d'intérieur, c’est aussi allier avec bonheur les plantes aux divers éléments du décor. Une table accueillera les jardins miniatures, tandis qu’une étagère ou l’appui d’une fenêtre conviendront aux plantes isolées. De jolis contenants ajouterons à la décoration, mais ils ne doivent pas éclipser les plantes.
          Pour résumer, il faut donc retenir que les plantes et la maison qui les abrite doivent être en accord.
          <br><br>
          La nature vient à vous.<br>
          Elyes<br>
          CEO Plantes Addict<br>
          <hr>
          <div class='flex-m flex-w p-t-20'>
            <span class='s-text20 pr-2'>
              Tags
            </span>

            <div class='wrap-tags flex-w px-2'>
              <a href='#' class='tag-item'>
                Streetstyle
              </a>

              <a href='#' class='tag-item'>
                Crafts
              </a>
            </div>
          </div>
        ",
          'thumbnail' => "storage/posts/harmonie-plante-jardin-interieur.jpg",
        ]);
        $post->postcategorie()->associate(PostCategorie::where('slug','plantes-et-moi')->firstOrFail()->id);

        $post->save();

        $post = Post::create([
          'name' => "Charme et beauté des plantes d'intérieur",
          'slug' => "conseils-septembre-2019",
          'description' => "Qu'il soit grand ou petit, un jardin d'intérieur bien agencé donne de la vie à la maison.",
          'color_code' => '#ee8896',
                    'content' => "
Il suffit même parfois de quelques plantes posées sur l'appui d'une fenêtre pour trans-
former l'aspect d'une pièce. A plus forte raison une maison de ville aura-t-elle besoin
de cette portion de nature qui lui fait défaut. Mais les plantes ne paraîtront pas superflues,
même dans une maison de campagne : elles y seront le reflet du paysage environnant.<br><br>
En matière de choix, tout est permis. Grâce aux patientes recherches des passionnées de de chez plantes addict, l'on peut maintenant se procurer des plantes originaires aussi bien des grandes forêts humides que des zones les plus arides. Le marché regorge d'innombrables variétés, tout aussi intéressantes les unes que les autres. Certains amateurs préféreront se spécialiser dans la culture d'un genre en particulier. D'autres opteront plutôt pour la diversité. Les plus audacieux choisiront parmi les espèces les plus rares, les plus fragiles. Même si les conditions dans lesquelles la plante devra vivre (lumière, espace,
température) sont primordiales, son choix demeure une question d'affinité.
<br><br>
Au moment de choisir, il est toutefois important de se rappeler qu'une plante est un être vivant, donc changeant. Ce petit bégonia est ravissant. Oui, mais gardera-t-il ses attraits lorsqu'il aura poursuivi sa croissance? Ce gracieux palmier, que l'amateur impatient imagine déjà parvenu à maturité, pourra mettre 10 ans à atteindre une taille imposante. De même, certaines plantes embellissent en vieillissant alors que d'autres perdent de leur charme après quelques années. Bien que les plantes à fleurs soient séduisantes, on ne doit pas oublier que l'époque de la floraison n'est pas éternelle et que la plante aura un tout autre aspect une fois la saison des fleurs passée.
<br>
Plantes addict vous invite donc à faire le bon choix lors de l’achat de vos plantes d’intérieur. Aussi pas cher qu’elle soient, nos plantes vertes mérite la plus grande considération de votre part.
<br><br>
<i>La nature vient à vous,</i> <br>
<b>Antoine</b> <br>
<b>CEO Plantes Addict</b> ",
          'thumbnail' => "storage/posts/charme-et-beaute-des-plantes-interieur.jpg",
        ]);

        $post->postcategorie()->associate(PostCategorie::where('slug','astuces')->firstOrFail()->id);

        $post->save();



        $post = Post::create([
          'name' => "L'art d'agencer vos espèces de plantes d'intérieur",
          'slug' => "art-agencer-vos-especes-plantes-interieur",
          'description' => "Certaines plantes à feuillage sont si belles qu'elles se suffisent à elles mêmes...",
          'color_code' => '#',
                    'content' => "

          Certaines plantes à feuillage sont si belles qu'elles se suffisent à elles mêmes. D'autres, au contraire, qui ressortent moins, gagnent à être regroupées.
          Elles prennent alors plus d'éclat et parfois même leur croissance s'améliore. On placera les collections importantes sur un meuble ou par terre, et les petites sur une tablette.
          La façon la plus attrayante d'agencer les plantes consiste à regrouper dans un même pot des espèces différentes.
          <br><br>Dès lors, tous les types d'asso citation deviennent possibles, mais à condition que les plantes réunies exigent les mêmes soins. Ainsi, on combiner des espèces parents les (différents cactus ou différentes broméliacées) ou encore des espèces dont les textures, les couleurs et les formes s'opposent ou s'harmonisent. Le voisinage d'une plante à feuilles vertes pourra tempérer l'éclat d'une plante panachée. Au sein d'un groupe de plantes basses, une plante plus haute produira une asymétrie intéressante.
          <br>On réussira des ensembles plus subtils encore si l'on exploite à bon escient la diversité des textures (des feuilles duveteuses et gaufrées associété, par exemple, à des feuilles unies et vernissées) ou si l'on joue sur la gamme des verts. Mais, pour éviter les contrastes choquants, on décidera d'abord de l'aspect qui devra ressortir : couleurs, formes ou textures.

          ",
          'thumbnail' => "storage/posts/art-agencer-espece-interieur.jpg",
        ]);

        $post->postcategorie()->associate(PostCategorie::where('slug','plantes-et-moi')->firstOrFail()->id);

        $post->save();


    }
}
