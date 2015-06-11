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
        <div class="row   ">
            <div class="col-lg-12 card-panel">
                <ul class="todas-partidas">
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
                                    $tipo_partida = "Formador de Equipes";
                                    break;
                                case "NONE":
                                    $tipo_partida = "Personalizado";
                                    break;
                                
                                default:
                                    $tipo_partida = $result->games[$key]->subType;
                                    break;
                            } 
                        ?>
                            <!-- partida -->
                                <li class=" partida-lista <?php echo ($result->games[$key]->stats->win == 1) ? 'vitoria' : 'derrota' ?>">
                                 <a class="modal-trigger " href="#modal<?php echo $result->games[$key]->gameId ?>">
                                    <div class="row">
                                        <div class="img-campeao">
                                            <img src="http://lkimg.zamimg.com/shared/riot/images/champions/<?php echo $result->games[$key]->championId; ?>.png" height="40" width="40" alt="">
                                        </div>
                                        <div class="name-campeao">
                                            <p> <strong>Id do campeão: <?php echo $result->games[$key]->championId; ?></strong></p>
                                            <p>Summorners-rifle</p>
                                        </div>
                                    <div class="static-campeao">
                                        <p>
                                            <?php echo (isset($result->games[$key]->stats->championsKilled)) ? $result->games[$key]->stats->championsKilled : '0'; ?> / 
                                            <?php echo (isset($result->games[$key]->stats->numDeaths)) ? $result->games[$key]->stats->numDeaths : '0'; ?> / 
                                            <?php echo (isset($result->games[$key]->stats->assists)) ? $result->games[$key]->stats->assists : '0'; ?> 
                                        </p>
                                        <p><?php echo $tipo_partida; ?></p>
                                    </div>
                                        <div class="item-campeao">
                                            <?php if(isset($result->games[$key]->stats->item0)): ?>
                                                <img src="http://ddragon.leagueoflegends.com/cdn/5.10.1/img/item/<?php echo $result->games[$key]->stats->item0; ?>.png" height="30" width="30" alt="">
                                            <?php else: ?>
                                                <img src="<?php echo base_url('assets/img') ?>/0.png" height="30" width="30" alt="">
                                            <?php endif; ?>
                                            <?php if(isset($result->games[$key]->stats->item1)): ?>
                                                <img src="http://ddragon.leagueoflegends.com/cdn/5.10.1/img/item/<?php echo $result->games[$key]->stats->item1; ?>.png" height="30" width="30" alt="">
                                            <?php else: ?>
                                                <img src="<?php echo base_url('assets/img') ?>/0.png" height="30" width="30" alt="">
                                            <?php endif; ?>
                                            <?php if(isset($result->games[$key]->stats->item2)): ?>
                                                <img src="http://ddragon.leagueoflegends.com/cdn/5.10.1/img/item/<?php echo $result->games[$key]->stats->item2; ?>.png" height="30" width="30" alt="">
                                            <?php else: ?>
                                                <img src="<?php echo base_url('assets/img') ?>/0.png" height="30" width="30" alt="">
                                            <?php endif; ?>
                                            <?php if(isset($result->games[$key]->stats->item3)): ?>
                                                <img src="http://ddragon.leagueoflegends.com/cdn/5.10.1/img/item/<?php echo $result->games[$key]->stats->item3; ?>.png" height="30" width="30" alt="">
                                            <?php else: ?>
                                                <img src="<?php echo base_url('assets/img') ?>/0.png" height="30" width="30" alt="">
                                            <?php endif; ?>
                                            <?php if(isset($result->games[$key]->stats->item4)): ?>
                                                <img src="http://ddragon.leagueoflegends.com/cdn/5.10.1/img/item/<?php echo $result->games[$key]->stats->item4; ?>.png" height="30" width="30" alt="">
                                            <?php else: ?>
                                                <img src="<?php echo base_url('assets/img') ?>/0.png" height="30" width="30" alt="">
                                            <?php endif; ?>
                                            <?php if(isset($result->games[$key]->stats->item5)): ?>
                                                <img src="http://ddragon.leagueoflegends.com/cdn/5.10.1/img/item/<?php echo $result->games[$key]->stats->item5; ?>.png" height="30" width="30" alt="">
                                            <?php else: ?>
                                                <img src="<?php echo base_url('assets/img') ?>/0.png" height="30" width="30" alt="">
                                            <?php endif; ?>
                                            <?php if(isset($result->games[$key]->stats->item6)): ?>
                                                <img src="http://ddragon.leagueoflegends.com/cdn/5.10.1/img/item/<?php echo $result->games[$key]->stats->item6; ?>.png" height="30" width="30" alt="">
                                            <?php else: ?>
                                                <img src="<?php echo base_url('assets/img') ?>/0.png" height="30" width="30" alt="">
                                            <?php endif; ?>



                                            -
                                            <img src="<?php echo base_url('assets/img/spells') ?>/<?php echo $result->games[$key]->spell1 ?>.png" height="30" width="30" alt="">
                                            <img src="<?php echo base_url('assets/img/spells') ?>/<?php echo $result->games[$key]->spell2 ?>.png" height="30" width="30" alt="">
                                        </div>
                                    <div class="date-campeao">
                                        <p>31:21</p>
                                        <p>19/5/2015</p>
                                    </div>
                                   </div>
                                 </a>
                                </li>
                                <!-- fim partida -->

                                 <div id="modal<?php echo $result->games[$key]->gameId ?>" class="modal modal-fixed-footer">
                                    <div class="modal-content text-center">

                                        <img src="<?php echo base_url('assets/img/') ?>/<?php echo ($result->games[$key]->stats->win == 1) ? 'victory' : 'defeat' ?>.png" class="img-responsive" alt="" style="margin: -62px auto;max-width: 40%;">
                                        <img src="<?php echo base_url('assets/img/temporario/detalhes.jpg') ?>" class="img-responsive" alt="">
                                        <br><br>
                                        <img src="<?php echo base_url('assets/img/temporario/201188547.jpg') ?>" class="img-responsive" alt="">
                                        <br><br>
                                        <img src="<?php echo base_url('assets/img/temporario/2.jpg') ?>" class="img-responsive" alt="">
                                    </div>
                                    <div class="modal-footer">
                                      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Fechar</a>
                                    </div>
                                  </div>
                            <?php 
                            }
                     ?>


                </ul>
            </div>
        </div>
    </div>

<pre>   
<?php 
    //print_r( $tier );
    //print_r( $result );
?>
</pre>
