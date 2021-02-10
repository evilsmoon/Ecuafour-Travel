<?php 
header("Content-Type: text/html;charset=utf-8");
include_once 'includes/templates/header.php'; ?>

<main id="main">
  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact mt-5">
    <div class="container mt-5" data-aos="fade-up">
      <div class="section-title">
        <h2>Contactos</h2>
        <p>Contáctanos</p>
      </div>
    </div>

    <div class="container" data-aos="fade-up">
      <div class="row mt-5">
        <div class="col-lg-4">
          <div class="info">
            <div class="address">
              <i class="icofont-google-map"></i>
              <h4>Dirección Oficina:</h4>
              <p>A1670 Thomas Rosseau, Quito, Sector Las Orquideas</p>
            </div>

            <div class="open-hours">
              <i class="icofont-clock-time icofont-rotate-90"></i>
              <h4>Dia y Hora:</h4>
              <p>
                Monday-Saturday:<br /> 11:00 AM - 18:00 PM
              </p>
            </div>

            <div class="email">
              <i class="icofont-envelope"></i>
              <h4>Email:</h4>
              <p>ecuafourtour@outlook.ec</p>
            </div>

            <div class="phone">
              <i class="icofont-phone"></i>
              <h4>Teléfonos</h4>
              <p>0999843386 </p>
            </div>
          </div>
        </div>

        <div class="col-lg-8 mt-5 mt-lg-0">
          <form action="envio-contactos.php" method="post" role="form" class="php-email-form">
            <div class="form-row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Escribe tu nombre"
                  data-rule="minlen:4" data-msg="Please enter at least 4 chars" required />
                <div class="validate"></div>
              </div>
              <div class="col-md-6 form-group">
                <input type="text" class="form-control" name="cedula" id="cedula" placeholder="Escribe tu cédula"
                  data-rule="minlen:10" data-msg="Please enter a valid email" required />
                <div class="validate"></div>
              </div>
              <div class="col-md-6 form-group">
                <input type="number" class="form-control" name="phone" id="phone" placeholder="Escribe tu teléfono"
                  data-rule="minlen:4" data-msg="Please enter a valid email" required />
                <div class="validate"></div>
              </div>
              <div class="col-md-6 form-group">
                <input type="text" class="form-control" name="direccion" id="direccion"
                  placeholder="Escribe tu dirección" data-rule="minlen:4" data-msg="Please enter a valid email"
                  required />
                <div class="validate"></div>
              </div>
              <div class="col-md-6 form-group">
                <input type="text" class="form-control" name="provincia" id="provincia"
                  placeholder="Escribe tu provincia" data-rule="minlen:4" data-msg="Please enter a valid email"
                  required />
                <div class="validate"></div>
              </div>
              <div class="col-md-6 form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Escribe tu email"
                  data-rule="email" data-msg="Please enter a valid email" required />
                <div class="validate"></div>
              </div>
            </div>

            <div class="form-group">
              <textarea class="form-control" name="msg" id="msg" rows="8" data-rule="required"
                data-msg="Please write something for us" placeholder="Escríbenos..." required></textarea>
              <div class="validate"></div>
            </div>
            <div class="mb-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">
                Your message has been sent. Thank you!
              </div>
            </div>
            <div class="text-center">
              <button type="submit" name="submit">Enviar Mensaje</button>
            </div>
          </form>
        </div>
      </div>

      <div class="row">

        <div class="col">
            <div class="form-group">
              <a href="https://docs.google.com/forms/d/e/1FAIpQLScIvcjmQlxcfw2soMbg8iMi7M_uVN8W7QMoqfFHUQXaP2ggLQ/viewform?usp=sf_link" class="btn btn-info "> Soporte</a>
            </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Contact Section -->
</main>
<!-- End #main -->

<?php include_once 'includes/templates/footer.php'; ?>