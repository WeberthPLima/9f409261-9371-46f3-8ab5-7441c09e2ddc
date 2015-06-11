<section class="container ">
    <div class="row menu">
        <div class="col-lg-12 no-padding teal lighten-1">
            <nav class="menu-standard z-depth-2">
                <ul>
                    <li class="waves-effect">
                        <a href="<?php echo base_url('/player/resume/'.$this->uri->segment(3)) ?>">Resumo</a>
                    </li>
                    <li class="waves-effect">
                        <a href="<?php echo base_url('/player/history/'.$this->uri->segment(3)) ?>">Histórico de partidas</a></li> 
                    <li class="waves-effect">
                        <a href="#this">Campeões</a>
                    </li>
                    <li class="waves-effect">
                        <a href="#this">Liga</a>
                    </li>
                    <li class="waves-effect">
                        <a href="#this">Runas</a>
                    </li>
                    <li class="waves-effect">
                        <a href="#this">Talentos</a>
                    </li>
                    <li class="waves-effect right  search">
                        <a href="#this" class="show">
                            <i class="icon-search glyphicon "></i>
                        </a>
                    </li>
                </ul>
            </nav><!-- end menu top -->
            <nav class="search-standard slideOutUp">
                <div class="nav-wrapper">
                  <form action="<?php echo base_url('player/search') ?>" method="post">
                    <div class="input-field ">
                        <div class="form-group">
                           <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                            <input type="search" class="form-control" name="player" placeholder="Procurar por Invocador">
                            <button type="submit" class="btn btn-primary btn-sm">Procurar</button>
                        </div>
                    </div>
                  </form>
                </div>
            </nav><!-- end campo pesquisa -->
        </div>
    </div>
</section>