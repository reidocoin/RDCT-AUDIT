<?php
$getDados = $SQL->query('SELECT * FROM graficos ORDER BY id DESC LIMIT 1');
foreach($getDados as $getD) {
    $getInfo = $getD['dados'];
}
$getInf = json_decode($getInfo, true);
$moedas = $getInf['moedas'];
$countMoedas = count($getInf['moedas']);
$totalMasternodesAtivos = $getInf['totalMasternodesAtivos'];
$totalUsuarios = $getInf['totalUsuarios'];

?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Estatisticas 4stake.com</h2>
        </div>
        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-orange hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">person_add</i>
                    </div>
                    <div class="content">
                        <div class="text">Usuarios ativos</div>
                        <div class="number count-to" data-from="0" data-to="<?=$totalUsuarios;?>" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-pink hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">playlist_add_check</i>
                    </div>
                    <div class="content">
                        <div class="text">Masternodes Ativos</div>
                        <div class="number count-to" data-from="0" data-to="<?=$totalMasternodesAtivos;?>" data-speed="15" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-cyan hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">https</i>
                    </div>
                    <div class="content">
                        <div class="text">Moedas em Captação</div>
                        <div class="number count-to" data-from="0" data-to="<?=$countMoedas;?>" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-light-green hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">attach_money</i>
                    </div>
                    <div class="content">
                        <div class="text">Nº de FEE recebidas</div>
                        <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Widgets -->
        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div class="card">
                    <div class="header">
                        <h2>Ultimas FEE recebidas</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover dashboard-task-infos">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>TIPO</th>
                                    <th>MOEDA</th>
                                    <th>VALOR</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $getRegistros = $SQL->query('SELECT * FROM registros ORDER BY id DESC LIMIT 10');
                                foreach($getRegistros as $getReg){
                                    $xR++;
                                    ?>
                                    <tr>
                                        <td><?=$xR;?></td>
                                        <td><?=$getReg['id'];?></td>
                                        <td><?=$getReg['tipo'];?></td>
                                        <td><?=$getReg['moeda_codigo'];?></td>
                                        <td><?=$getReg['valor'];?></td>
                                    </tr>

                                    <?php
                                }
                                ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Task Info -->
            <!-- Browser Usage -->
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="card">
                    <div class="header">
                        <h2>MASTERNODES ATIVOS</h2>
                        <small>Masternodes ativos no sistema 4stake</small>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover dashboard-task-infos">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>MOEDA</th>
                                    <th>QT</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                    $iC = 1;
                                    for ($i = 0; $i < $countMoedas; $i++) {
                                        ?>
                                        <tr>
                                            <td><?=$iC;?></td>
                                            <td><?=$moedas[$i]["nome"];?></td>
                                            <td><?=$moedas[$i]["masternodes"];?></td>
                                        </tr>
                                        <?php
                                        $iC++;
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Browser Usage -->
        </div>
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-6">
              <div class="card">
                <div class="header">
                    <h2>TOTAL DE USUÁRIOS REGISTRADOS</h2>
                </div>
                <div class="body">
                  <div id="grafico_usuarios" style="height:300px;"></div>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
              <div class="card">
                <div class="header">
                    <h2>MASTERNODES ATIVOS</h2>
                </div>
                <div class="body">
                  <div id="grafico_masternodes_ativos" style="height:300px;"></div>
                </div>
              </div>
            </div>
        </div>
    </div>
</section>
<?php
$rss = new DOMDocument();
$rss->load('https://rdctoken.io/blog/feed/');
$feed = array();
foreach ($rss->getElementsByTagName('item') as $node) {
    $item = array (
        'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
        'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
        'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
        'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
    );
    array_push($feed, $item);
}
$limit = 6;

?>
<section class="content">
    <div class="container-fluid">
        <!-- Basic Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Ultimas noticias em nosso blog
                            <small>Ultimos post em nosso blog, clique aqui e veja todos nossos post's <a href="https://www.rdctoken.io/blog">RDCToken.io/Blog</a></small>
                        </h2>

                    </div>
                    <div class="body table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Noticia</th>
                                <th>Data</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            for($x=1;$x<$limit;$x++) {
                                $title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
                                $link = $feed[$x]['link'];
                                $description = $feed[$x]['desc'];
                                $date = date('l F d, Y', strtotime($feed[$x]['date']));

                                echo '<tr>
                                    <th scope="row">'.$x.'</th>
                                    <td><p><strong><a href="'.$link.'" title="'.$title.'">'.$title.'</a></strong><br /><p>'.$description.'</p></td>
                                    <td><small><em> '.$date.'</em></small></p></td>
                                </tr>

                                ';

                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
