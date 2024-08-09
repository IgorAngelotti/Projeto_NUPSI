
<?php
session_start();

if (isset($_SESSION['usuario_perfil'])){
  $perfil = $_SESSION['usuario_perfil'];
}else{
  $perfil = "";
}


?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#007bff">
    <title>Nupsi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/sidebar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/logoBranca.png" type="image/x-icon">
</head>
<body>
    <header id="header">
      <nav class="navbar navbar-expand-lg border-bottom border-body fixed-top" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="assets/logoBranca.png" alt="logo nupsi" id="logo-navbar"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link" onclick="scrollToTop()" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#sobre">Sobre</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="#h3-projetos">Projetos</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    O NUPSI
                  </a>
                  <ul class="dropdown-menu dropdown-menu-dark">
                    <li><a class="dropdown-item nav-link" href="#h3-fundamentos">Fundamentos</a></li>
                    <li><a class="dropdown-item nav-link" href="#h3-conheca">Conheça</a></li>
                    <li><a class="dropdown-item nav-link" href="#h3-comunidade">Comunidade</a></li>
                    <?php if ($perfil == "admin"): ?>
                      <hr>
                      <li><a class="dropdown-item " href="admin_projetos.php">ADMIN</a></li>
                    <?php endif; ?>
                    <?php if ($perfil == "cliente"): ?>
                      <hr>
                      <li><a class="dropdown-item " href="clientes.php">CLIENTES</a></li>
                    <?php endif; ?>
                  </ul>
                </li>
            </ul>
            <div class="d-flex" role="search">
              <?php if ($perfil == ""): ?>
                <a class="btn btn-outline-light mx-2 bg-primary" href="login.php">Login</a>
                <a class="btn btn-outline-light bg-success" href="cadastro.html" >Cadastre-se</a>

              <?php elseif ($perfil == "cliente"): ?>
                <a class="btn btn-outline-light bg-success" href="clientes.php" >Acessar perfil</a>
                <a class="btn btn-outline-light mx-2 bg-danger" href="dao/logout.php">Logout</a>

              <?php elseif ($perfil == "admin"): ?>
                <a class="btn btn-outline-light bg-success" href="admin_projetos.php" >Gerenciamento</a>
                <a class="btn btn-outline-light mx-2 bg-danger" href="dao/logout.php">Logout</a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </nav>
    </header>

    <section id="carousel-1" class="mb-4">
        <div id="carouselExampleDark" class="carousel slide carousel-fade" data-bs-touch="true">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/nupsi4.jpeg" class="d-block w-100 parallax" alt="...">
                <div class="carousel-caption d-none d-md-block ">
                  <h5>NUPSI</h5>
                  <p>Núcleo de Práticas em Sistemas de Informação</p>
                </div>
            </div>
            
            <div class="carousel-item"> <!-- animate__animated animate__fadeIn -->
                <img src="assets/pessoas3.jpeg" class="d-block w-100 parallax" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Comunidade</h5>
                  <p>Densevolvimento e aprendizado mútuo</p>
                </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
          </button>
        </div>
    </section>


    <main>

      <section class="secoes">
        <HR></HR>
        <h3 class="h3" id="sobre">Núcleo de Práticas em Sistemas de Informação</h3>
        <div class="sobre-area"> <!-- class="animate__animated animate__fadeInUp" -->
          <div class="sobre-texto">
            <p>Este projeto pedagógico prevê um Projeto de Ensino que envolve a manutenção de um Núcleo de
              Prática em Sistemas de Informação. Os objetivos deste núcleo são: complementar a formação do estudante
              e contribuir para o desenvolvimento das competências e habilidades esperadas. Todas as atividades
              desenvolvidas no núcleo são integradas ao currículo do estudante como formação complementar.</p>
            <p> As
              principais atividades que serão desenvolvidas no núcleo compreendem a gestão, análise, projeto,
              desenvolvimento e implantação de sistemas de informação, com enfoque na experimentação de técnicas,
              processos, modelos, entre outros.</p>
            <p>Os resultados esperados incluem software e outras soluções com base em TI para atender às
              demandas internas e da comunidade, material de ensino, e publicações científicas sobre experimentos e
              estudos de caso desenvolvidos</p>
              
          </div>
         
        </div>
      </section>

      <section class="secoes">
        <HR></HR>
        <div id="fundamentos">
          <h3 class="h3" id="h3-fundamentos">Fundamentos</h3>
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <i class="fa-solid fa-bullseye" style="margin-right: 10px;"></i> Missão
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Qui nemo ea ad saepe nostrum atque, non quos voluptatem, assumenda at inventore, iusto vel eligendi vero officiis sit. Eligendi, mollitia voluptatibus.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <i class="fa-regular fa-eye" style="margin-right: 10px;"></i> Visão
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corporis vitae possimus quisquam est provident. Minus fuga iure quos. Deleniti quia harum accusamus perferendis, eum ea. Mollitia quo sequi tenetur molestias.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  <i class="fa-solid fa-hand-holding-heart" style="margin-right: 10px;"></i> Valores
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                 Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum maxime minima facilis aut, perferendis consectetur mollitia veniam itaque soluta quo. Saepe perferendis nulla delectus maxime id deserunt nam ratione! Sunt?
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="secoes">
        <HR></HR>
        <div>
        <h3 class="h3" id="h3-conheca">Conheça o NUPSI</h3>
          <div id="video">
            <iframe width="100%" height="500px"  src="https://www.youtube.com/embed/mWZ9jlheimI?si=ZER6G7QivMFXkano"
            title="YouTube video player"
            frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
            referrerpolicy="strict-origin-when-cross-origin" 
            allowfullscreen></iframe>
          </div>
      </div>
      </section>

      <section class="secoes" id="section-pessoas">
        <HR></HR>
        <h3 class="h3" id="h3-comunidade">Comunidade</h3>
        <div id="pessoas">
          <div>
            <img src="assets/pessoas.jpeg" alt="logo NUPSI">
          </div>
          <a href="pessoas.php">
            <div id="pessoas-texto">
              <p>Conheça a comunidade, seus integrantes e ex-integrantes, bem como os autores e seus projetos desenvolvidos durante o NUPSI. <u style="color: blue;">Clique aqui para acessar.</u></p>
            </div>
          </a>
          
        </div>
      </section>

      <section class="secoes">
        <HR></HR>
        <div id="cards-teste " class="container mb-4">
          <h3 class="h3" id="h3-projetos">Projetos do NUPSI</h3>
          <div class="cards-container row gap-4">
              <div class="card" style="width: 18rem;">
                  <img src="assets/nupsi3.jpeg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Solicitações Secretaria</h5>
                    <p class="card-text">Sistema para controle e envio de solicitações de alunos (Ex: trancamento, troca de turno) para a secretaria da UEMG - Frutal.</p>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">HTML, CSS, Bootstrap</li>
                    <li class="list-group-item">JavaScript, PHP</li>
                    <li class="list-group-item">MySQL</li>
                  </ul>
                  <div class="card-body">
                    <a href="https://github.com/UEMGNUPSI/SistemaSolicitacoesSecretaria" target="_blank" class="btn btn-primary">Acesse aqui</a>
                  </div>
              </div>
              <div class="card" style="width: 18rem;">
                  <img src="assets/cadastro-tcc.png" style="height: 170px; width: 170px; margin: auto;" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Cadastro-TCC</h5>
                    <p class="card-text">Programa utilizado para cadastro e consulta de TCCs entregues na Universidade do Estado de Minas Gerais, unidade Frutal.</p>
                  </div>
                  <ul class="list-group list-group-flush">
                      <li class="list-group-item">HTML</li>
                      <li class="list-group-item">Java</li>
                      <li class="list-group-item">MySQL</li>
                  </ul>
                  <div class="card-body">
                    <a href="https://github.com/UEMGNUPSI/Cadastro-TCC/tree/master" class="btn btn-primary" target="_blank">Acesse aqui</a>
                  </div>
              </div>
              <div class="card" style="width: 18rem;">
                  <img src="assets/patrimonio.png" style="height: 170px; width: 170px; margin: auto;" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Patrimônio</h5>
                    <p class="card-text">Software para gerenciamento de patrimonio.</p>
                  </div>
                  <ul class="list-group list-group-flush">
                      <li class="list-group-item">HMTL</li>
                    <li class="list-group-item">Java</li>
                    <li class="list-group-item">MySQL</li>
                  </ul>
                  <div class="card-body">
                    <a href="https://github.com/UEMGNUPSI/Patrimonio/tree/master" target="_blank" class="btn btn-primary">Acesse aqui</a>
    
                  </div>
              </div>
              <div class="card" style="width: 18rem;">
                  <img src="assets/eventos.png" style="height: 170px; width: 170px; margin: auto;" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">UEMG Eventos</h5>
                    <p class="card-text">Sistema de Eventos da UEMG.</p>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">HTML, CSS, Bootstrap</li>
                    <li class="list-group-item">JavaScript, PHP</li>
                    <li class="list-group-item">MySQL</li>
                  </ul>
                  <div class="card-body">
                    <a href="https://github.com/UEMGNUPSI/UemgEventos"  target="_blank" class="btn btn-primary">Acesse aqui</a>
                  </div>
              </div>
              <?php
                require_once('dao/conexao.php');
                $sql = $pdo->prepare("SELECT titulo, descricao, linguagens, link, imagem FROM projetos ORDER BY data_inclusao DESC");
                $sql->execute();

                $info = $sql->fetchAll(PDO::FETCH_ASSOC);

                foreach ($info as $key => $value) {
                  echo '<div class="card" style="width: 18rem;">';
                  echo '  <img src="fotos-projetos/'.$value['imagem'].'" style="height: 170px; width: 100%; margin: auto;" class="card-img-top" alt="Imagem projeto">';
                  echo '  <div class="card-body">';
                  echo '    <h5 class="card-title">'.$value['titulo'].'</h5>';
                  echo '    <p class="card-text">'.$value['descricao'].'</p>';
                  echo '  </div>';
                  echo '  <ul class="list-group list-group-flush">';
                  echo '    <li class="list-group-item">'.$value['linguagens'].'</li>';
                  echo '  </ul>';
                  echo '  <div class="card-body">';
                  echo '    <a href="'.$value['link'].'"  target="_blank" class="btn btn-primary">Acesse aqui</a>';
                  echo '  </div>';
                  echo '</div>';
              }


              ?>

            </div>
        </div>
    </section>

    <section class="secoes">
      <HR></HR>
      <h3 class="h3" id="h3-contato">Entre em Contato</h3>
      <div class="contatos">
        <div id="contato-maps">
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14995.070818762402!2d-48.951712!3d-20.0182619!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94bcb1376ccca8af%3A0x172ce9f9acb8e30f!2sUniversidade%20do%20Estado%20de%20Minas%20Gerais%2C%20Unidade%20Frutal!5e0!3m2!1spt-BR!2sbr!4v1722440053090!5m2!1spt-BR!2sbr" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div id="contato-texto">
          <h4>Mande-nos uma mensagem</h4>
          <p>Possui alguma dúvida ou tem interesse em participar do NUPSI? Entre em contato!</p>
          <form action="" method="post">
            <div class="nome-email">
              <div>
                <input type="text" name="nome" id="nome" placeholder="Nome" autocomplete="off" required>
              </div>

              <div>
                <input type="email" name="email" id="email" placeholder="Email" autocomplete="off" required>
              </div>
            </div>
            <div class="textarea">
              <textarea name="mensagem" id="mensagem" placeholder="Mensagem" required></textarea>
              <button type="submit" class="btn btn-primary" name="enviar-mensagem">Enviar</button>
            </div>
          </form>
        </div>
      </div> 
    </section>
    
    <hr>
    </main>

    <footer>
      <div class="footer-content">
        <div class="footer-card">
          <h3>NUPSI</h3>
          <p>Av. ESCÓCIA, 1001 - Cidade das Águas, Frutal - MG, 38202-436</p>
          <p><b>Telefone: </b>(012 34) 3429-3470</p>
          <p><b>Email: </b>testesteste.gmail.com</p>
        </div>
        <div class="footer-card">
          <h3><b>Links úteis</b></h3>
          <a href="https://github.com/UEMGNUPSI" target="_blank">
            <p>GitHub</p>
          </a>
          
        </div>
        
        <div class="footer-card">
          <h3><b>Siga-nos!</b></h3>
          <a href="https://www.facebook.com/NupsiUemgFrutal/photos_by?locale=pt_BR" target="_blank">
            <p>Nos siga no facebook e fique por dentro de tudo que acontece no NUPSI</p>
          </a>
        </div>
      </div>

      <div class="hr"></div>

      <div class="rights">
        <p>&#174; Todos os direitos reservados. 2024</p>
      </div>
    </footer>
  
    <script src="script/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/5086c6dc28.js" crossorigin="anonymous"></script>
    <script> 
      
      const navbarLinks = document.querySelectorAll('.nav-link');
      const navbarCollapse = document.querySelector('.navbar-collapse');
      
      function scrollToTop(){
        $('html, body').animate({ //animate jquery
          scrollTop: 0
        }, 0.1);
                
        if (window.innerWidth < 992) {
          navbarCollapse.classList.remove('show');
        }
      }

        $('.btn-outline-light.bg-primary').on('click', function() { // evento click usando jquery para puxar o botão de login
        alert('Você será redirecionado para a tela de login!');
      });

        $('.nav-link').on('mouseover', function() { // mudar o background-color dos links do navbar usando função com jquery
          $(this).css('background-color', '#0056b3');
      }).on('mouseout', function() {
          $(this).css('background-color', '');
      });

      $('.dropdown-toggle').on('mouseover', function() { // mudar o background-color do dropdown do navbar usando função com jquery
          $(this).css('background-color', '#0056b3');
      }).on('mouseout', function() {
          $(this).css('background-color', '');
      });

      

      document.addEventListener('DOMContentLoaded', function() {
        if (window.innerWidth < 992) {
            navbarCollapse.classList.remove('show');
        
      }

      })

      // para cada link do navbar scrollar para a seção específica, considerando o tamanho do navbar já que ele é fixo.
      navbarLinks.forEach((link) => {
        link.addEventListener('click', (e) => {
          e.preventDefault();
          const href = link.getAttribute('href');
          const target = document.querySelector(href);
          const headerHeight = document.querySelector('#header').offsetHeight;
          const offset = target.offsetTop - 100; //o número representa o tamanho do header, número esse no olhômetro
          console.log(href)
          console.log(target)
          console.log(headerHeight)
          console.log(offset)

          window.scrollTo({
            top: offset,
            behavior: 'smooth',
          });

          if (window.innerWidth < 992) {
            navbarCollapse.classList.remove('show');
          }
        });
      });
      

      /*
      // efeito de fade up no scroll
      const animate = document.querySelectorAll('.animate');

      document.addEventListener('scroll', function(){
        animate.forEach(container => {
          if (isInView(container)){
            container.classList.add("animate--visible")
          }
        });
      });

      function isInView(element){
        const rect = element.getBoundingClientRect();

        return ( rect.botton > 0 && rect.top < 
          (window.innerHeight - 150 || document.documentElement.clientHeight - 150)
        );
      }

    
      */

      /* // efeito parallax nas imagens do carrossel (no celular nao fica legal)
      const parallaxImage = document.querySelectorAll('.parallax');

      parallaxImage.forEach((image) => {
          window.addEventListener('scroll', () => {
          const scrollPosition = window.scrollY;
          image.style.transform = `translateY(${scrollPosition}px)`;
        });
      })
      */
      
      
    </script>
</body>
</html>