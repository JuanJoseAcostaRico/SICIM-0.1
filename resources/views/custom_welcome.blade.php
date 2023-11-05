<!DOCTYPE html>
<html class="no-js" lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>SICIM</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="manifest" href="site.webmanifest" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/gijgo.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/animated-headline.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
</head>

<body>
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/loder.png" alt="" />
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!--? Header Start -->
        <div class="header-area">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2 col-md-1">
                            <div class="logo">
                                <a href="{{ url('/') }}"><img src="assets/img/logo/logo.png" alt="" /></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10">
                            <div class="menu-main d-flex align-items-center justify-content-end">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="{{ url('/') }}">Inicio</a></li>
                                            <li><a href="#acerca">Sobre Nosotros</a></li>
                                            <li><a href="#departament">Departamentos</a></li>
                                            <li><a href="#objetivo">Objetivo</a></li>
                                            <li><a href="#footer">Contacto</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                @if (Route::has('login'))
                                    <div class="header-right-btn f-right d-none d-lg-block ml-30">
                                        @auth
                                            <a href="{{ url('/home') }}" class="btn header-btn">Dashboard</a>
                                        @else
                                            <a href="{{ route('login') }}" class="btn header-btn">Iniciar Sesion</a>
                                        @endauth
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
    <main>
        <!--? slider Area Start-->
        <div class="slider-area position-relative">
            <div class="slider-active">
                <!-- Single Slider -->
                <div class="single-slider slider-height d-flex align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-7 col-lg-9 col-md-8 col-sm-9">
                                <div class="hero__caption">
                                    <span>Comprometidos con el éxito</span>
                                    <h1 class="cd-headline letters scale">
                                        Nos preocupamos por tu
                                        <strong class="cd-words-wrapper">
                                            <b class="is-visible">Salud</b>
                                            <b>Bienestar</b>
                                            <b>Cuidado</b>
                                        </strong>
                                    </h1>
                                    <p data-animation="fadeInLeft" data-delay="0.1s" align="justify">
                                        En el CDI de Coloncito nos preocupamos por tí. <br /> Porque mejorar la vida, es
                                        nuestra misión
                                    </p>
                                    <a href="#acerca" class="btn hero-btn" data-animation="fadeInLeft"
                                        data-delay="0.5s">Saber más<i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Slider -->
                <div class="single-slider slider-height d-flex align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-7 col-lg-9 col-md-8 col-sm-9">
                                <div class="hero__caption">
                                    <span>Comprometido con el éxito</span>
                                    <h1 class="cd-headline letters scale">
                                        Nos preocupamos por tu
                                        <strong class="cd-words-wrapper">
                                            <b class="is-visible">Salud</b>
                                            <b>Bienestar</b>
                                            <b>Cuidado</b>
                                        </strong>
                                    </h1>
                                    <p data-animation="fadeInLeft" data-delay="0.1s" align="justify">
                                        En el CDI de Coloncito nos preocupamos por tí. <br /> Porque mejorar la vida, es
                                        nuestra misión
                                    </p>
                                    <a href="#acerca" class="btn hero-btn" data-animation="fadeInLeft"
                                        data-delay="0.2s">Saber más<i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->
        <!--? About Start-->
        <div class="about-area section-padding2" id="acerca">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-10">
                        <div class="about-caption mb-50">
                            <!-- Section Tittle -->
                            <div class="section-tittle section-tittle2 mb-35">
                                <span>Acerca del CDI Coloncito</span>
                                <h2>¿Qué es SICIM?</h2>
                            </div>
                            <p align="justify">
                                Bienvenido al Sistema de Control e Inventario Médico (SICIM) del CDI Coloncito. Nuestro
                                propósito es garantizar que los servicios de salud médica se puedan realizar de forma
                                más rápida y eficiente, teniendo en cuenta maximizar el rendimiento y la eficacia con la
                                que se realiza despliegue de material y suministros médicos en este centro médico.
                            </p>
                            <p align="justify">
                                De esta forma, mejoramos la calidad de vida de la población, permitiendo a nuestro
                                personal médico actuar con mayor precisión, con un objetivo fundamental: asegurar el
                                bienestar y la salud de nuestros pacientes.
                            </p>

                            <p align="justify">
                                Conoce más acerca de nuestros servicios y
                                el personal médico del CDI Coloncito, dando clic al botón de la parte inferior:
                            </p>
                            <div class="about-btn1 mb-30">
                                <a href="#departament" class="btn about-btn">Nuestros servicios<i
                                        class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <!-- about-img -->
                        <div class="about-img">
                            <div class="about-font-img d-none d-lg-block">
                                <img src="assets/img/gallery/about2.png" alt="" />
                            </div>
                            <!-- Imagen segundaria
                <div class="about-back-img">
                  <img src="assets/img/gallery/about1.png" alt="" />
                </div>
                -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About  End-->
        <!--? department_area_start  -->
        <div class="department_area section-padding2" id="departament">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center mb-100">
                            <span>Nuestros departamentos</span>
                            <h2>Nuestros servicios médicos</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="depart_ment_tab mb-30">
                            <!-- Tabs Buttons -->
                            <ul class="nav" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                        role="tab" aria-controls="home" aria-selected="true">
                                        <i class="flaticon-teeth"></i>
                                        <h4>Odontología</h4>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                        role="tab" aria-controls="profile" aria-selected="false">
                                        <i class="flaticon-call"></i>
                                        <h4>Hospitalización</h4>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact"
                                        role="tab" aria-controls="Astrology" aria-selected="false">
                                        <i class="flaticon-bone"></i>
                                        <h4>Rayos X</h4>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Astrology-tab" data-toggle="tab" href="#Astrology"
                                        role="tab" aria-controls="contact" aria-selected="false">
                                        <i class="flaticon-customer-service"></i>
                                        <h4>Optometría</h4>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Neuroanatomy-tab" data-toggle="tab" href="#Neuroanatomy"
                                        role="tab" aria-controls="contact" aria-selected="false">
                                        <i class="flaticon-doctor"></i>
                                        <h4>Fisiatría</h4>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Blood-tab" data-toggle="tab" href="#Blood"
                                        role="tab" aria-controls="contact" aria-selected="false">
                                        <i class="flaticon-cell"></i>
                                        <h4>Laboratorio</h4>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="dept_main_info white-bg">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel"
                            aria-labelledby="home-tab">
                            <!-- single_content  -->
                            <div class="row align-items-center no-gutters">
                                <div class="col-lg-7">
                                    <div class="dept_info">
                                        <h3>
                                            Departamento de <br />
                                            Odontología
                                        </h3>
                                        <p>
                                            Atención al público general y personalizada vía cita previa por
                                            profesionales en las siguientes áreas: Odontología general, ortodoncia y
                                            odontopediatría.
                                        </p>
                                        <p>
                                            Contamos con diseños de planes de prevención, exodoncia, profilaxis dental,
                                            detartraje y blanqueamiento profundo.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="dept_thumb">
                                        <img src="assets/img/gallery/1.jpg" alt="" />
                                    </div>
                                </div>
                            </div>
                            <!-- single_content  -->
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <!-- single_content  -->
                            <div class="row align-items-center no-gutters">
                                <div class="col-lg-7">
                                    <div class="dept_info">
                                        <h3>
                                            Departamento de <br />
                                            Hospitalización
                                        </h3>
                                        <p>
                                            El servicio de hospitalización contempla estadías 24 horas para la
                                            recuperación de la salud.

                                            En este sentido, se presta atención médica continuada, de tratamiento
                                            estructurado y múltiple, con trabajo en equipo de varios especialistas para
                                            pacientes con patologías que requieren cuidados diarios y directos.
                                        </p>
                                        <p>
                                            El tiempo de permanencia requerido por cada paciente varia y dependerá del
                                            estado clínico.

                                            De esta forma, se va reduciendo progresivamente en función de la mejoría del
                                            paciente.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="dept_thumb">
                                        <img src="assets/img/gallery/2.png" alt="" />
                                    </div>
                                </div>
                            </div>
                            <!-- single_content  -->
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <!-- single_content  -->
                            <div class="row align-items-center no-gutters">
                                <div class="col-lg-7">
                                    <div class="dept_info">
                                        <h3>
                                            Departamento de <br />
                                            Rayos X
                                        </h3>
                                        <p>
                                            El servicio de imágenes con rayos X (radiografía) constituye un examen
                                            médico no invasivo que ayuda a los médicos a diagnosticar y tratar las
                                            condiciones médicas. La toma de imágenes con rayos X supone la exposición de
                                            una parte del cuerpo a una pequeña dosis de radiación ionizante para
                                            producir imágenes del interior del cuerpo.
                                        </p>
                                        <p>
                                            Los rayos X son la forma más antigua y de uso más frecuente para producir
                                            imágenes médicas. Una radiografía ósea toma imágenes de cualquier hueso en
                                            el cuerpo, incluyendo la mano, muñeca, brazo, codo, hombro, columna, pelvis,
                                            cadera, muslo, rodilla, pierna (espinilla), tobillo o pie.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="dept_thumb">
                                        <img src="assets/img/gallery/3.jpg" alt="" />
                                    </div>
                                </div>
                            </div>
                            <!-- single_content  -->
                        </div>
                        <div class="tab-pane fade" id="Astrology" role="tabpanel" aria-labelledby="Astrology-tab">
                            <!-- single_content  -->
                            <div class="row align-items-center no-gutters">
                                <div class="col-lg-7">
                                    <div class="dept_info">
                                        <h3>
                                            Departamento de <br />
                                            Optometría
                                        </h3>
                                        <p>
                                            Nuestros servicios incluyen una examinación exhaustiva ocular, través del
                                            cual podemos evaluar la agudeza visual, presión intraocular, realizar test
                                            de visión de profundidad, verificar la motilidad ocular, así como la
                                            percepción del color, fondo de ojo para evaluación del nervio óptico y
                                            también formulación de lentes.
                                        </p>
                                        <p>
                                            De esta forma, es posible diagnosticar patologías oculares, algunas de las
                                            cuales podrán ser manejadas por nuestros especialistas y otras que por su
                                            grado de complejidad o porque necesitan tratamientos invasivos serán
                                            remitidas a un oftalmólogo.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="dept_thumb">
                                        <img src="assets/img/gallery/4.jpg" alt="" />
                                    </div>
                                </div>
                            </div>
                            <!-- single_content  -->
                        </div>
                        <div class="tab-pane fade" id="Neuroanatomy" role="tabpanel"
                            aria-labelledby="Neuroanatomy-tab">
                            <!-- single_content  -->
                            <div class="row align-items-center no-gutters">
                                <div class="col-lg-7">
                                    <div class="dept_info">
                                        <h3>
                                            Departamento de <br />
                                            Fisiatría
                                        </h3>
                                        <p>
                                            Nuestra especialidad es tratar todo tipo de lesiones, trastornos o
                                            patologías a nivel músculo-esquelético, cardiovascular, pulmonar y
                                            neurológico.
                                        </p>
                                        <p>
                                            Brindamos una atención integrada e interdisciplinaria, que tiene por
                                            finalidad la recuperación integral del paciente, abordando sus necesidades
                                            físicas a través de distintos procedimientos de rehabilitación.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="dept_thumb">
                                        <img src="assets/img/gallery/5.jpg" alt="" />
                                    </div>
                                </div>
                            </div>
                            <!-- single_content  -->
                        </div>
                        <div class="tab-pane fade" id="Blood" role="tabpanel" aria-labelledby="Blood-tab">
                            <!-- single_content  -->
                            <div class="row align-items-center no-gutters">
                                <div class="col-lg-7">
                                    <div class="dept_info">
                                        <h3>
                                            Laboratorio clínico
                                        </h3>
                                        <p>
                                            Los servicios incluyen: Extracción de sangre, hematologías, provisión de
                                            recipientes para muestras de orina, esputo, heces, cultivo y serología de
                                            hongos.

                                        </p>
                                        <p>
                                            De igual forma, presenta una variedad de servicios de pruebas en el lugar de
                                            atención médica; pruebas de tuberculina; electrocardiogramas; exámenes de la
                                            retina; y recolección de muestras de sudor y aliento y muestras con hisopo.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="dept_thumb">
                                        <img src="assets/img/gallery/6.jpg" alt="" />
                                    </div>
                                </div>
                            </div>
                            <!-- single_content  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- depertment area end  -->



        {{-- <!--? Team Start -->
      <div class="team-area section-padding30" id="especialistas">
        <div class="container">
          <!-- Section Tittle -->
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="section-tittle text-center mb-100">
                <span>Nuestros doctores</span>
                <h2>Nuestros especialistas</h2>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- single Tem -->
            <div class="col-xl-3 col-lg-2 col-md-3 col-sm-">
              <div class="single-team mb-30">
                <div class="team-img">
                  <img src="assets/img/gallery/team3.png" alt="" />
                </div>
                <div class="team-caption">
                  <h3><a href="#">Lorena Aguilar</a></h3>
                  <span>Aseguramiento</span>
                  <!-- Team social -->
                  <div class="team-social">
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fas fa-globe"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-2 col-md-3 col-sm-">
              <div class="single-team mb-30">
                <div class="team-img">
                  <img src="assets/img/gallery/team3.png" alt="" />
                </div>
                <div class="team-caption">
                  <h3><a href="#">Francis Corredor</a></h3>
                  <span>Directora CDI Coloncito</span>
                  <!-- Team social -->
                  <div class="team-social">
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fas fa-globe"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-2 col-md-3 col-sm-">
              <div class="single-team mb-30">
                <div class="team-img">
                  <img src="assets/img/gallery/team3.png" alt="" />
                </div>
                <div class="team-caption">
                  <h3><a href="#">Enny Mendoza</a></h3>
                  <span>Directora docente, administración</span>
                  <!-- Team social -->
                  <div class="team-social">
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fas fa-globe"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-2 col-md-3 col-sm-">
                <div class="single-team mb-30">
                    <div class="team-img">
                    <img src="assets/img/gallery/team3.png" alt="" />
                    </div>
                    <div class="team-caption">
                    <h3><a href="#">Weine León</a></h3>
                    <span>Jefe talento humano, almacenamiento y farmacia</span>
                    <!-- Team social -->
                    <div class="team-social">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fas fa-globe"></i></a>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                    </div>
                    </div>
                </div>
                </div>
            </div>
          </div>
            <div class="row align-items-center">
              <div class="col text-center">
                <a href="#" class="btn btn-primary">Más información sobre otros especialistas<i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
        </div>
      </div>
      <!-- Team End --> --}}

        <!-- GALERIA inicio -->
        {{--   <div class="whole-wrap department_area section-padding2">
		<div class="container box_1170">
				<div class="section-top-border2">

          <div class="row">
            <div class="col-lg-12">
              <div class="section-tittle text-center mb-100">
                <span>Galería de imágenes</span>
                <h2>Galería SICIM</h2>
              </div>
            </div>
          </div>

          </div>
					<div class="row gallery-item">
						<div class="col-md-4">
							<a href="assets/img/elements/g1.jpg" class="img-pop-up">
								<div class="single-gallery-image" style="background: url(assets/img/elements/g1.jpg);"></div>
							</a>
						</div>
						<div class="col-md-4">
							<a href="assets/img/elements/g2.jpg" class="img-pop-up">
								<div class="single-gallery-image" style="background: url(assets/img/elements/g2.jpg);"></div>
							</a>
						</div>
						<div class="col-md-4">
							<a href="assets/img/elements/g3.jpg" class="img-pop-up">
								<div class="single-gallery-image" style="background: url(assets/img/elements/g3.jpg);"></div>
							</a>
						</div>
						<div class="col-md-6">
							<a href="assets/img/elements/g4.jpg" class="img-pop-up">
								<div class="single-gallery-image" style="background: url(assets/img/elements/g4.jpg);"></div>
							</a>
						</div>
						<div class="col-md-6">
							<a href="assets/img/elements/g5.jpg" class="img-pop-up">
								<div class="single-gallery-image" style="background: url(assets/img/elements/g5.jpg);"></div>
							</a>
						</div>
						<div class="col-md-4">
							<a href="assets/img/elements/g6.jpg" class="img-pop-up">
								<div class="single-gallery-image" style="background: url(assets/img/elements/g6.jpg);"></div>
							</a>
						</div>
						<div class="col-md-4">
							<a href="assets/img/elements/g7.jpg" class="img-pop-up">
								<div class="single-gallery-image" style="background: url(assets/img/elements/g7.jpg);"></div>
							</a>
						</div>
						<div class="col-md-4">
							<a href="assets/img/elements/g8.jpg" class="img-pop-up">
								<div class="single-gallery-image" style="background: url(assets/img/elements/g8.jpg);"></div>
							</a>
						</div>
					</div>
				</div>
      </div>
			</div> --}}
        <!-- GALERIA Fin -->


        <!--? All startups Start -->
        <div class="all-starups-area testimonial-area fix">
            <!-- left Contents -->
            <div class="starups" id="objetivo">
                <!--? Testimonial Start -->
                <div class="h1-testimonial-active">
                    <!-- Single Testimonial -->
                    <div class="single-testimonial text-center">
                        <!-- Testimonial Content -->
                        <div class="testimonial-caption ">
                            <div class="testimonial-top-cap">
                                <img src="assets/img/gallery/testimonial.png" alt="">
                                <p>“Nuestro objetivo es garantizar la atención integral a la salud a través del
                                    diagnóstico, tratamiento y rehabilitación oportuna, eficaz y eficiente de las
                                    patologías de mayor repercusión en la población.”</p>
                            </div>
                            <!-- founder -->
                            <div class="testimonial-founder d-flex align-items-center justify-content-center">
                                <div class="founder-img">
                                    <img src="assets/img/gallery/Homepage_testi.png" alt="">
                                </div>
                                <div class="founder-text">
                                    <span>Francis Corredor</span>
                                    <p>Directora del CDI Coloncito</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Testimonial End -->
            </div>
            <!--Right Contents  -->
            <div class="starups-img"></div>
        </div>
        <!--All startups End -->


    </main>
    <footer id="footer">
        <!--? Footer Start-->
        <div class="footer-area section-bg" data-background="assets/img/gallery/footer_bg.jpg">
            <div class="container">
                <div class="footer-top footer-padding">
                    <div class="row d-flex justify-content-between">
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-8">
                            <div class="single-footer-caption mb-50">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <a href="{{ url('/') }}"><img src="assets/img/logo/logo2_footer.png"
                                            alt="" /></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Creadores</h4>
                                    <div class="footer-pera">
                                        <p class="info1">
                                            Acosta R. Juan J. <br />
                                            Caro A. Freddy A.<br />
                                            Gutiérrez S. Cristhian S. <br />
                                            López S. Christian F. <br />

                                        </p>
                                        {{-- <p class="info1">
                        Lorem ipsum dolor sit amet, adipiscing elit.
                      </p> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-8">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Contacto</h4>
                                    <div class="footer-pera">
                                        <p class="info1">
                                            0424-7537848 <br />
                                            0414-3756133<br />
                                            0414-7570754 <br />
                                            0412-1714124 <br />


                                        </p>
                                        {{-- <p class="info1">
                        Lorem ipsum dolor sit amet, adipiscing elit.
                      </p> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-xl-9 col-lg-8">
                            <div class="footer-copy-right">
                                <p>

                                    Copyright &copy;
                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script>
                                    Todos los derechos reservados
                                    por
                                    los creadores del sitio web

                                </p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4">
                            <!-- Footer Social -->
                            <div class="footer-social f-right">
                                <a href="https://twitter.com/JoseMar60177878" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a href="https://maps.app.goo.gl/CCsZJ5xGpSV92S1U9" target="_blank"><i class="fas fa-map"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>
    <!-- Scroll Up -->
    <div id="back-top">
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->
    <script src="{{ asset('assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/animated.headline.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.js') }}"></script>

    <!-- Date Picker -->
    <script src="{{ asset('assets/js/gijgo.min.js') }}"></script>
    <!-- Nice-select, sticky -->
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>

    <!-- counter , waypoint -->
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
    <!-- contact js -->
    <script src="{{ asset('assets/js/contact.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.form.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/mail-script.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
