<?php 
$id_player = $this->uri->segment(3);
$tier_imprime = '';
$qtd_partida = 0;
$percent_vitoria = 0;

foreach ($player as $key_player => $data_player) {
    $name_player = $data_player->name;
    $summonerLevel = $data_player->summonerLevel;
}

function percentage ($nCur, $nTot)
{
    return number_format((($nCur / $nTot) * 100), 0);
}

if($tier == NULL):
    $tier_imprime = "Unranked";
    $image_tier = "UNRANKED";
    $value_tier = "UNRANKED";

else:
    foreach ($tier as $key => $value) {
        $tier_resgate = $value[0]->tier;
        foreach ($value[0]->entries as $key_entries => $value_entries) {
            if($value_entries->playerOrTeamId == $id_player):
                $value_tier_resgate = $value_entries->division;
                $qtd_partida = $value_entries->wins + $value_entries->losses;
                $percent_vitoria =  percentage($value_entries->wins, $qtd_partida);
            endif;
        }
    } 
    switch ($tier_resgate) {
        case 'BRONZE':
            $value_tier = 'Bronze';
            $tier_imprime = $value_tier . " - " . $value_tier_resgate;
            $image_tier = $value_tier."_".$value_tier_resgate;
            break;
        case 'SILVER':
           $value_tier = 'Prata';
           $tier_imprime = $value_tier . " - " . $value_tier_resgate;
           $image_tier = $value_tier."_".$value_tier_resgate;
            break;
        case 'GOLD':
            $value_tier = 'Ouro';
            $tier_imprime = $value_tier . " - " . $value_tier_resgate;
            $image_tier = $value_tier."_".$value_tier_resgate;
            break;
        case 'PLATINUM':
            $value_tier = 'Platinum';
            $tier_imprime = $value_tier . " - " . $value_tier_resgate;
            $image_tier = $value_tier."_".$value_tier_resgate;
            break;
        case 'DIAMOND':
            $value_tier = 'Diamante';
            $tier_imprime = $value_tier . " - " . $value_tier_resgate;
            $image_tier = $value_tier."_".$value_tier_resgate;
            break;
        case 'MASTER':
            $value_tier = 'Mestre';
            $tier_imprime = $value_tier . " - " . $value_tier_resgate;
            $image_tier = $value_tier."_".$value_tier_resgate;
            break;
        case 'CHALLENGER':
           $value_tier = 'Challenger';
           $tier_imprime = $value_tier . " - " . $value_tier_resgate;
           $image_tier = $value_tier."_".$value_tier_resgate;
            break;
        
        default:
            $value_tier = 'Unranked';
            $tier_imprime = $value_tier . " - " . $value_tier_resgate;
            $image_tier = $value_tier."_".$value_tier_resgate;
            break;
    }
endif;


?>
    <?php $this->load->view('estrutura/menu_player'); ?>

    <div class="container">
        <div class="row ">
            <!-- profile -->
            <div class="col-lg-3   no-padding">
                <div class="card-panel box-profile">
                <!-- banner -->
                   <div class="banner-sland">
                        <img src="http://lkimg.zamimg.com/shared/images/champion_headers/<?php echo $result->games[0]->championId; ?>_0.jpg" class="img-responsive " alt="">
                   </div>
                <!-- imagem campeao -->
                   <div class="picture ">
                       <img src="http://lkimg.zamimg.com/shared/riot/images/champions/<?php echo $result->games[0]->championId; ?>.png" class="circle " alt="">
                   </div>
                <!-- Informações -->
                   <div class="info">
                        <!-- nome do usuario -->
                        <h5><?php echo  $name_player; ?></h5>
                        <!-- Level -->
                        <h6>Level - <?php echo $summonerLevel ?></h6>
                        <hr>
                        <div class="col-lg-4 ">
                        <!-- quantos matou -->
                            <span class=" ico ico-abatidos"></span>
                            <p class="p.abates"><?php echo (isset($result->games[0]->stats->championsKilled)) ? $result->games[0]->stats->championsKilled : '0' ?></p> 
                        </div>
                        <div class="col-lg-4 ">
                        <!-- morreu-->
                           <span class=" ico ico-mortes"></span>
                           <p class="p.abates"> <?php echo $result->games[0]->stats->numDeaths ?> </p> 
                        </div>
                        <div class="col-lg-4 ">
                        <!-- quantas assistencias-->
                           <span class=" ico ico-assistencias"></span>
                           <p class="p.abates"> <?php echo $result->games[0]->stats->assists ?>  </p> 
                        </div>
                   </div>
                </div>
            </div>
            <!-- profile -->
            <!-- ultimas partidas -->
            <div class="col-lg-6  ">
                <div class="card-panel partidas-recentes">
                    <h6>Partidas Recentes</h6>
                    <?php 
                        $historico = $result->games;
                        //arsort($historico);
                        $limit = 0;
                        foreach ($historico as $key => $value) { 

                            switch ($result->games[$key]->subType) {
                                case "CUSTOM":
                                    $tipo_partida = "Customisada";
                                    break;
                                case "NORMAL_5x5_BLIND":
                                    $tipo_partida = "Normal game 5x5 Blind";
                                    break;
                                case "RANKED_SOLO_5x5":
                                    $tipo_partida = "Ranked solo 5x5";
                                    break;
                                case "RANKED_PREMADE_5x5":
                                    $tipo_partida = "Ranked Premade 5x5";
                                    break;
                                case "BOT_5x5":
                                    $tipo_partida = "Bot 5x5";
                                    break;
                                case "NORMAL_3x3":
                                    $tipo_partida = "Normal game 3x3";
                                    break;
                                case "RANKED_PREMADE_3x3":
                                    $tipo_partida = "Ranked Premade 3x3";
                                    break;
                                case "NORMAL_5x5_DRAFT":
                                    $tipo_partida = "Normal Game 5x5 draft";
                                    break;
                                case "ODIN_5x5_BLIND":
                                    $tipo_partida = "Odin 5x5 blind";
                                    break;
                                case "ODIN_5x5_DRAFT":
                                    $tipo_partida = "Odin 5x5 draft";
                                    break;
                                case "BOT_ODIN_5x5":
                                    $tipo_partida = "Bot Odin 5x5";
                                    break;
                                case "BOT_5x5_INTRO":
                                    $tipo_partida = "Bot 5x5 Intro";
                                    break;
                                case "BOT_5x5_BEGINNER":
                                    $tipo_partida = "Bot 5x5 Beginner";
                                    break;
                                case "BOT_5x5_INTERMEDIATE":
                                    $tipo_partida = "Bot 5x5 Intermediário";
                                    break;
                                case "RANKED_TEAM_3x3":
                                    $tipo_partida = "Time Rankeado 3x3";
                                    break;
                                case "RANKED_TEAM_5x5":
                                    $tipo_partida = "Time Rankeado 5x5";
                                    break;
                                case "BOT_TT_3x3":
                                    $tipo_partida = "Bot TT 3x3";
                                    break;
                                case "GROUP_FINDER_5x5":
                                    $tipo_partida = "Grupo Finder 5x5";
                                    break;
                                case "ARAM_5x5":
                                    $tipo_partida = "Aram 5x5";
                                    break;
                                case "ONEFORALL_5x5":
                                    $tipo_partida = "Oneforall 5x5";
                                    break;
                                case "FIRSTBLOOD_1x1":
                                    $tipo_partida = "Firt Blood 1x1";
                                    break;
                                case "FIRSTBLOOD_2x2":
                                    $tipo_partida = "First Blood 2x2";
                                    break;
                                case "SR_6x6":
                                    $tipo_partida = "Sr 6x6";
                                    break;
                                case "URF_5x5":
                                    $tipo_partida = "Ultra Rápido e Furioso 5x5";
                                    break;
                                case "ONEFORALL_MIRRORMODE_5x5":
                                    $tipo_partida = "ONEFORALL_MIRRORMODE_5x5";
                                    break;
                                case "BOT_URF_5x5":
                                    $tipo_partida = "Bot Ultra Rápido e Furioso 5x5 ";
                                    break;
                                case "NIGHTMARE_BOT_5x5_RANK1":
                                    $tipo_partida = "Nightmare Bot 5x5 Rank 1";
                                    break;
                                case "NIGHTMARE_BOT_5x5_RANK2":
                                    $tipo_partida = "Nightmare Bot 5x5 Rank 2";
                                    break;
                                case "NIGHTMARE_BOT_5x5_RANK5":
                                    $tipo_partida = "Nightmare Bot 5x5 Ranks";
                                    break;
                                case "ASCENSION_5x5":
                                    $tipo_partida = "Ascenção 5x5";
                                    break;
                                case "HEXAKILL":
                                    $tipo_partida = "Hexakill";
                                    break;
                                case "KING_PORO_5x5":
                                    $tipo_partida = "King Poro 5x5";
                                    break;
                                case "COUNTER_PICK":
                                    $tipo_partida = "Counter Pick";
                                    break;
                                case "CAP_5x5":
                                    $tipo_partida = "Formador de Equipes 5x5";
                                    break;
                                case "NONE":
                                    $tipo_partida = "Personalizado";
                                    break;
                                
                                default:
                                    $tipo_partida = $result->games[$key]->subType;
                                    break;
                            } 
                        

                           // if($key != 0):
                                if($limit <= 3): ?>
                                    <!-- lista partida -->
                                    <div class="home-recentes ">
                                        <div class="box-list <?php echo ($result->games[$key]->stats->win == 1) ? 'vitoria' : 'derrota' ?> card-panel ">
                                            <img src="http://lkimg.zamimg.com/shared/riot/images/champions/<?php echo $result->games[$key]->championId; ?>.png" class="img-list teal" alt="">
                                            <div class="info">
                                                <p ><strong>
                                                        <?php echo (isset($result->games[$key]->stats->championsKilled)) ? $result->games[$key]->stats->championsKilled : '0'; ?> / 
                                                        <?php echo (isset($result->games[$key]->stats->numDeaths)) ? $result->games[$key]->stats->numDeaths : '0'; ?> / 
                                                        <?php echo (isset($result->games[$key]->stats->assists)) ? $result->games[$key]->stats->assists : '0'; ?> 
                                                    </strong>
                                                </p>
                                                <p><?php echo $tipo_partida; ?></p>
                                            </div>
                                        </div>
                                    </div> 
                                <?php 
                                $limit++;
                                endif;
                            //endif;
                        }
                     ?>

                    <!-- lista partida -->
                    <div class="row no-margin">
                        <div class="col-lg-12 space-top-1 clearfix text-right">
                            <p><a  class="waves-effect waves-circle " href="partidas.html">Ver mais</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ultimas partidas -->

            <!-- ELO  -->           
            <div class="col-lg-3  text-center elo-jogador no-padding ">
                <div class="grey lighten-5">
                    <img src="<?php echo base_url('assets/img/summoner-spell/'.$image_tier); ?>.png" class="animated flipInY" height="192" width="192" alt="">
                    <div class="card-panel <?php echo strtolower($value_tier); ?> accent-3 info">
                        <h4><?php echo $tier_imprime; ?></h4>
                        <p><?php echo $qtd_partida; ?> Partidas</p>
                        <p><?php echo $percent_vitoria; ?>% de Vitórias</p>
                        <p></p>
                    </div>
                </div>
            </div>
            <!-- fim ELO  -->
        </div>
        <div class="row card-panel z-depth-1">
        <!-- estatisticas -->
            <div class="col-lg-5 no-padding">
                <div class=" s">
                    <h6>ESTATÍSTICAS</h6>
                    <!-- tabela -->
                    <table class="striped responsive-table  panel-static">
                        <tbody>
                        <!-- linha td -->
                            <tr>
                            <!-- bloco td conteudo -->
                                <td>
                                    <div class="content-static">
                                        <span>
                                        9
                                        </span>
                                        <p> Penta Kills</p>
                                    </div>
                                </td>
                                <!-- fim bloco td conteudo -->
                            <!-- bloco td conteudo -->
                                <td>
                                    <div class="content-static">
                                        <span>
                                       11
                                        </span>
                                        <p> Quadra  Kills</p>
                                    </div>
                                </td>
                                <!-- fim bloco td conteudo -->
                                <!-- bloco td conteudo -->
                                <td>
                                    <div class="content-static">
                                        <span>
                                        19
                                        </span>
                                        <p> Triplo  Kills</p>
                                    </div>
                                </td>
                                <!-- fim bloco td conteudo -->
                            </tr>
                            <!-- fim linha td -->
                            <!-- linha td -->
                            <tr>
                            <!-- bloco td conteudo -->
                                <td>
                                    <div class="content-static">
                                        <span>
                                        19
                                        </span>
                                        <p> Duplo   Kills</p>
                                    </div>
                                </td>
                                <!-- fim bloco td conteudo -->
                            <!-- bloco td conteudo -->
                                <td>
                                    <div class="content-static">
                                        <span>
                                        119
                                        </span>
                                        <p> total   Kills</p>
                                    </div>
                                </td>
                                <!-- fim bloco td conteudo -->
                                <!-- bloco td conteudo -->
                                <td>
                                    <div class="content-static">
                                        <span>
                                        39
                                        </span>
                                        <p>Assistências</p>
                                    </div>
                                </td>
                                <!-- fim bloco td conteudo -->
                            </tr>
                            <!-- fim linha td -->
                            <!-- linha td -->
                            <tr>
                            <!-- bloco td conteudo -->
                                <td>
                                    <div class="content-static">
                                        <span>
                                        19
                                        </span>
                                        <p>Vitórias</p>
                                    </div>
                                </td>
                                <!-- fim bloco td conteudo -->
                            <!-- bloco td conteudo -->
                                <td>
                                    <div class="content-static">
                                        <span>
                                        119
                                        </span>
                                        <p>total  bates</p>
                                    </div>
                                </td>
                                <!-- fim bloco td conteudo -->
                                <!-- bloco td conteudo -->
                                <td>
                                    <div class="content-static">
                                        <span>
                                        39
                                        </span>
                                        <p>Killing sprees</p>
                                    </div>
                                </td>
                                <!-- fim bloco td conteudo -->
                            </tr>
                            <!-- fim linha td -->
                        </tbody>
                    </table>
                    <!-- fim tabela -->
                </div>
            </div>
        <!-- estatisticas -->
            <div class="col-lg-7 grafico text-center">
                    <img src="<?php echo base_url('assets/img/grafico.jpg') ?>" height="161" width="402" alt="" style="margin-top: 40px;">
                </div>
            </div>
        </div>
    </div>
<pre>   
<?php 
    //print_r( $tier );
    //print_r( $result );
?>
</pre>
