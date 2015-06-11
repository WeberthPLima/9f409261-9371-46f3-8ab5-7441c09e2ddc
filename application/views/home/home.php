        <section class="bg-search">
            <div class="menu-top container">
                <div class="row">
                    <div class="col-lg-12 ">
                        <ul class="nav nav-pills pull-right">
                          <li role="presentation"><a href="#"> <i class="mdi-social-person"></i>Entrar</a></li>
                        </ul>
                    </div><!-- End coluna 6     -->
                </div>
            </div><!--end menu top -->
            <div class="container space">
                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
                    <form action="<?php echo base_url('player/search') ?>" method="post" class="search-form animated fadeIn">
                        <div class="form-group has-feedback ">
                            <label for="search" class="sr-only">Search</label>
                            <input type="text" class="form-control" name="player" id="search" placeholder="Procurar por Invocador">
                            <div class="submit waves-effect ">
                                <input type="submit">
                            </div>
                        </div>
                    </form>
                    <div class="col-lg-12 text-center">
                        <p>Udyr Ipsun. Animi dolorem maiores iure, quibusdam, labore temporibus saepe. Non suscipit repellendus voluptatem minima? Illum, rem, incidunt?</p>
                    </div>
                </div><!-- end fim coluna 6 -->
            </div>
        </section>
            <footer>
                <div class="container space">
                    <div class="champ-week row text-center">
                        <div class="col-lg-6 col-lg-offset-3">
                            <div class="row">
                                <div class="col-lg-12"> 
                                    <h6>Rotação Semanal Grátis</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="champs">
                                    <?php foreach ($free_week->champions as $key => $value) { ?>
                                        <li><img src="http://lkimg.zamimg.com/shared/riot/images/champions/<?php echo $value->id; ?>.png" class="img-responsive" alt=""></li>
                                    <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- end coluna 6  -->
                    </div>
                </div>
            </footer>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery  || document.write('<script src="assets/js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="<?php echo base_url('assets/js/plugins.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/vendor/bootstrap.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/materialize.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/main.js') ?>"></script>
